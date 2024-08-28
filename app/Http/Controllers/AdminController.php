<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'createAdmin']);
	}

	private function isAdmin()
	{
		if (Auth::role()->role == 1) return true;
		else return false;
	}

	public function admin()
	{
		if ($this->isAdmin()) {
			return View('admin.createadmin');
		} else {
			return redirect()->back();
		}
	}

	public function createAdmin(Request $request)
	{

		if ($request->isMethod('post')) {
			//Roles de validación
			$rules = [
				'name'     => 'required|min:3|max:30|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
				'username' => 'required|max:255|unique:users,username',
				'password' => 'required|min:6|max:18|confirmed',
			];

			//Posibles mensajes de error de validación
			$messages = [
				'name.required' => 'El campo es requerido',
				'name.min' => 'El mínimo de caracteres permitidos son 3',
				'name.max' => 'El máximo de caracteres permitidos son 30',
				'name.regex' => 'Sólo se aceptan letras',
				'role.required' => 'El campo es requerido',
				'active.required' => 'El campo es requerido',
				'username.required' => 'El campo es requerido',
				'username.username' => 'El formato de usuario es incorrecto',
				'username.max' => 'El máximo de caracteres permitidos son 255',
				'username.unique' => 'El usuario ya existe',
				'password.required' => 'El campo es requerido',
				'password.min' => 'El mínimo de caracteres permitidos son 6',
				'password.max' => 'El máximo de caracteres permitidos son 18',
				'password.confirmed' => 'Las contraseñas no coinciden',
			];

			$validator = Validator::make($request->all(), $rules, $messages);

			//Si la validación no es correcta redireccionar al formulario con los errores
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			} else { // De los contrario guardar al usuario
				$user                 = new User;
				$user->name           = $request->name;
				$user->username       = $request->username;
				$user->role           = $request->role;
				$user->active         = $request->active;
				$user->password       = bcrypt($request->password);
				$user->remember_token = str_random(100);
				$user->confirm_token  = str_random(100);
				//Activar al administrador sin necesidad de enviar correo electrónico
				$user->active = 1;
				//El valor 1 en la columna determina si el usuario es administrador o no

				if ($user->save()) {
					return redirect()->back()->with('message', 'Usuario creado satisfactoriamente');
				} else {
					return redirect()->back()->with('error', 'Ha ocurrido un error al guardar los datos');
				}
			}
		}
		return View('admin.createadmin');
	}
}
