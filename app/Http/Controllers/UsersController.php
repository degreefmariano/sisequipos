<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Crypt;
use Hash;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $users = DB::table('users')
                ->Where('id', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'DESC')
                ->paginate(20);
            return view('User.index', ["users" => $users, "searchText" => $query]);
        }
    }

    public function create(Request $request)
    {
        return view('User.create', compact('users'));
    }

    public function store(Request $request)
    {
        $user           = new User;
        $user->id       = $request->id;
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->role     = $request->role;
        $user->active   = $request->active;
        $user->password = $request->password;

        $user->save();
        return redirect()->route('user.create')
            ->with('success', 'USUARIO N° ' . $user->id . ' CREADO SATISFACTORIAMENTE');
    }

    public function show(Request $request)
    {
        return $request->user();
    }

    public function edit($id)
    {
        $id   = Crypt::decrypt($id);
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user           = User::find($id);
        $user->id       = $request->id;
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->role     = $request->role;
        $user->active   = $request->active;
        $user->password = $request->password;

        $user->update();
        return redirect()->route('user.index')->with('info', 'Registro actualizado');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function password()
    {
        return View('User.password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'mypassword' => 'required',
            'password'   => 'required|confirmed|min:6|max:18',
        ];

        $messages = [
            'mypassword.required' => 'El campo es requerido',
            'password.required'   => 'El campo es requerido',
            'password.confirmed'  => 'Las contraseñas no coinciden',
            'password.min'        => 'El mínimo permitido son 6 caracteres',
            'password.max'        => 'El máximo permitido son 18 caracteres',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('user/password')->withErrors($validator);
        } else {
            if (Hash::check($request->mypassword, Auth::user()->password)) {
                $user = new User;
                $user->where('username', '=', Auth::user()->username)
                    ->update(['password' => bcrypt($request->password)]);
                Auth::logout();
                return redirect('/')->with('message', 'CONTRASEÑA CAMBIADA CON ÉXITO. INGRESE CON SU NUEVA CONTRASEÑA');
            } else {
                return redirect('user/password')->with('message', 'CONTRASEÑAS INCORRECTAS');
            }
        }
    }

    protected function downloadFile($src)
    {
        if (is_file($src)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $content_type = finfo_file($finfo, $src);
            finfo_close($finfo);
            $file_name = basename($src) . PHP_EOL;
            $size = filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        } else {
            return false;
        }
    }

    public function download()
    {
        $path = 0;
        if (!$this->downloadFile(app_path() . "/files/manual.pdf")) {
            return response()->download($path);
        }
    }
}
