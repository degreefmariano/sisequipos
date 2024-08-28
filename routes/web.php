<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensesController;

//VISTA PRINCIPAL
Route::get('/', function () {
    return view('auth/login');
});

//VISTAS SECUNDARIAS
Route::get('/vistapdf', function () {
    return view('vista');
});

Route::get('/estadisticaspdf', function () {
    return view('estadisticaspdf');
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/fechasequipo', function () {
    return view('fechasequipo');
});

Route::get('/fechasservicio', function () {
    return view('fechasservicio');
});

Route::get('/estadisticas', function () {
    return view('estadisticas');
});

Route::get('/estadisticas2', function () {
    return view('estadisticas2');
});

Route::get('/user/password', function () {
    return view('user/password');
});

Route::get('/download', 'UsersController@download');

//--------------------------------------------------------------
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses.index');



//EQUIPOS
Route::resource('equipo', 'EquiposController');
Route::get('api/v1/equipos', 'EquiposController@getEquipos');
Route::get('/equipo/create/{id}', 'EquiposController@create');

//SERVICIOS
Route::resource('servicio', 'ServiciosController');
Route::get('api/v1/servicios', 'ServiciosController@getServicios');
Route::get('nuevoServicio/{equipo}', 'ServiciosController@create')->name('nuevoServicio'); //CREATE
Route::post('guardarServicio', 'ServiciosController@store')->name('guardarServicio');
Route::get('getPersonal', 'ServiciosController@getEmpleado'); //RUTA PARA SCRIPT GET EMPLEADOS

Route::get('nuevoServicioDev/{equipo}', 'ServiciosController@edit')->name('nuevoServicioDev'); //CREATE
Route::post('guardarServicio', 'ServiciosController@store')->name('guardarServicio');
Route::get('getPersonalDev', 'ServiciosController@getEmpleadoDev'); //RUTA PARA SCRIPT GET EMPLEADOS

//EMPLEADOS
Route::resource('empleado', 'EmpleadosController');
Route::get('api/v1/empleados', 'EmpleadosController@getEmpleados');

//USUARIOS
Route::resource('user', 'UsersController');
Route::get('api/v1/users', 'UsersController@getUsers');

//PDF
Route::get('/pdf/{servicio}', 'ServiciosController@orderPdf')->name('orderPdf');
Route::get('pdfestadisticas', 'ServiciosController@estadisticasenPdf')->name('estadisticasenPdf');

//fechasequiporesultadofinal
Route::get('fechasequiporesultadofinal/{equipo?}', 'ConsultaController@fechaeq')->name('fechaeq');
Route::get('/fechasequiporesultadofinal', function () {
    return view('/fechasequiporesultadofinal');
});

//fechasservicioresultadofinal
Route::get('fechasservicioresultadofinal/{servicio?}', 'ConsultaController@fechaserv')->name('fechaserv');
Route::get('/fechasservicioresultadofinal', function () {
    return view('/fechasservicioresultadofinal');
});

//estadisticas
Route::get('estadisticasresultadofinal/{servicio?}', 'ConsultaController@estadisticas')->name('estadisticas');
Route::get('/estadisticasresultadofinal', function () {
    return view('/estadisticasresultadofinal');
});

//estadisticas2
Route::get('estadisticasresultadofinal2', 'ExpensesController@index')->name('estadisticas');

// Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses.index');


Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');
Route::get('admin', 'AdminController@admin');

//Protejemos las rutas. Agregamos un middleware a la ruta con dos restricciones.
// La primera asegura que el usuario debe estar registrado para acceder.
//La segunda condición es que el usuario tenga rol de administrador.
Route::put('post/{id}', function ($id) { })->middleware('auth', 'role:admin');

Route::get('user/password', 'UsersController@password');
Route::post('user/updatepassword', 'UsersController@updatepassword');

Route::resource('user', 'UsersController');
Route::get('api/v1/users', 'UsersController@password');

Route::resource('user', 'UsersController');
Route::get('api/v1/users', 'UsersController@updatepassword');
