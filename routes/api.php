<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api routes that need auth

Route::middleware(['auth:api', 'rbac'])->group(function () {


/* routes for AgendaCinema Controller  */	
	Route::get('agendacinema', 'AgendaCinemaController@index');
	Route::get('agendacinema/index', 'AgendaCinemaController@index');
	Route::get('agendacinema/index/{filter?}/{filtervalue?}', 'AgendaCinemaController@index');	
	Route::get('agendacinema/view/{rec_id}', 'AgendaCinemaController@view');	
	Route::post('agendacinema/add', 'AgendaCinemaController@add');	
	Route::any('agendacinema/edit/{rec_id}', 'AgendaCinemaController@edit');	
	Route::any('agendacinema/delete/{rec_id}', 'AgendaCinemaController@delete');

/* routes for AgendaFablab Controller  */	
	Route::get('agendafablab', 'AgendaFablabController@index');
	Route::get('agendafablab/index', 'AgendaFablabController@index');
	Route::get('agendafablab/index/{filter?}/{filtervalue?}', 'AgendaFablabController@index');	
	Route::get('agendafablab/view/{rec_id}', 'AgendaFablabController@view');	
	Route::post('agendafablab/add', 'AgendaFablabController@add');	
	Route::any('agendafablab/edit/{rec_id}', 'AgendaFablabController@edit');	
	Route::any('agendafablab/delete/{rec_id}', 'AgendaFablabController@delete');

/* routes for AgendaLaboratorio Controller  */	
	Route::get('agendalaboratorio', 'AgendaLaboratorioController@index');
	Route::get('agendalaboratorio/index', 'AgendaLaboratorioController@index');
	Route::get('agendalaboratorio/index/{filter?}/{filtervalue?}', 'AgendaLaboratorioController@index');	
	Route::get('agendalaboratorio/view/{rec_id}', 'AgendaLaboratorioController@view');	
	Route::post('agendalaboratorio/add', 'AgendaLaboratorioController@add');	
	Route::any('agendalaboratorio/edit/{rec_id}', 'AgendaLaboratorioController@edit');	
	Route::any('agendalaboratorio/delete/{rec_id}', 'AgendaLaboratorioController@delete');

/* routes for Cargos Controller  */	
	Route::get('cargos', 'CargosController@index');
	Route::get('cargos/index', 'CargosController@index');
	Route::get('cargos/index/{filter?}/{filtervalue?}', 'CargosController@index');	
	Route::get('cargos/view/{rec_id}', 'CargosController@view');	
	Route::post('cargos/add', 'CargosController@add');	
	Route::any('cargos/edit/{rec_id}', 'CargosController@edit');	
	Route::any('cargos/delete/{rec_id}', 'CargosController@delete');

/* routes for CatInvent Controller  */	
	Route::get('catinvent', 'CatInventController@index');
	Route::get('catinvent/index', 'CatInventController@index');
	Route::get('catinvent/index/{filter?}/{filtervalue?}', 'CatInventController@index');	
	Route::get('catinvent/view/{rec_id}', 'CatInventController@view');	
	Route::post('catinvent/add', 'CatInventController@add');	
	Route::any('catinvent/edit/{rec_id}', 'CatInventController@edit');	
	Route::any('catinvent/delete/{rec_id}', 'CatInventController@delete');

/* routes for Emprestimos Controller  */	
	Route::get('emprestimos', 'EmprestimosController@index');
	Route::get('emprestimos/index', 'EmprestimosController@index');
	Route::get('emprestimos/index/{filter?}/{filtervalue?}', 'EmprestimosController@index');	
	Route::get('emprestimos/view/{rec_id}', 'EmprestimosController@view');	
	Route::post('emprestimos/add', 'EmprestimosController@add');	
	Route::any('emprestimos/edit/{rec_id}', 'EmprestimosController@edit');	
	Route::any('emprestimos/delete/{rec_id}', 'EmprestimosController@delete');	
	Route::post('emprestimos/add_membro', 'EmprestimosController@add_membro');	
	Route::get('emprestimos/minhas_solicitacoes', 'EmprestimosController@minhas_solicitacoes');
	Route::get('emprestimos/minhas_solicitacoes/{filter?}/{filtervalue?}', 'EmprestimosController@minhas_solicitacoes');

/* routes for Eventos Controller  */	
	Route::get('eventos', 'EventosController@index');
	Route::get('eventos/index', 'EventosController@index');
	Route::get('eventos/index/{filter?}/{filtervalue?}', 'EventosController@index');	
	Route::get('eventos/view/{rec_id}', 'EventosController@view');	
	Route::post('eventos/add', 'EventosController@add');	
	Route::any('eventos/edit/{rec_id}', 'EventosController@edit');	
	Route::any('eventos/delete/{rec_id}', 'EventosController@delete');

/* routes for Inventario Controller  */	
	Route::get('inventario', 'InventarioController@index');
	Route::get('inventario/index', 'InventarioController@index');
	Route::get('inventario/index/{filter?}/{filtervalue?}', 'InventarioController@index');	
	Route::get('inventario/view/{rec_id}', 'InventarioController@view');	
	Route::post('inventario/add', 'InventarioController@add');	
	Route::any('inventario/edit/{rec_id}', 'InventarioController@edit');	
	Route::any('inventario/delete/{rec_id}', 'InventarioController@delete');

/* routes for ModelHasPermissions Controller  */	
	Route::get('modelhaspermissions', 'ModelHasPermissionsController@index');
	Route::get('modelhaspermissions/index', 'ModelHasPermissionsController@index');
	Route::get('modelhaspermissions/index/{filter?}/{filtervalue?}', 'ModelHasPermissionsController@index');	
	Route::get('modelhaspermissions/view/{rec_id}', 'ModelHasPermissionsController@view');	
	Route::post('modelhaspermissions/add', 'ModelHasPermissionsController@add');	
	Route::any('modelhaspermissions/edit/{rec_id}', 'ModelHasPermissionsController@edit');	
	Route::any('modelhaspermissions/delete/{rec_id}', 'ModelHasPermissionsController@delete');

/* routes for ModelHasRoles Controller  */	
	Route::get('modelhasroles', 'ModelHasRolesController@index');
	Route::get('modelhasroles/index', 'ModelHasRolesController@index');
	Route::get('modelhasroles/index/{filter?}/{filtervalue?}', 'ModelHasRolesController@index');	
	Route::get('modelhasroles/view/{rec_id}', 'ModelHasRolesController@view');	
	Route::post('modelhasroles/add', 'ModelHasRolesController@add');	
	Route::any('modelhasroles/edit/{rec_id}', 'ModelHasRolesController@edit');	
	Route::any('modelhasroles/delete/{rec_id}', 'ModelHasRolesController@delete');

/* routes for Permissions Controller  */	
	Route::get('permissions', 'PermissionsController@index');
	Route::get('permissions/index', 'PermissionsController@index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view');	
	Route::post('permissions/add', 'PermissionsController@add');	
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit');	
	Route::any('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Permissoes Controller  */	
	Route::get('permissoes', 'PermissoesController@index');
	Route::get('permissoes/index', 'PermissoesController@index');
	Route::get('permissoes/index/{filter?}/{filtervalue?}', 'PermissoesController@index');	
	Route::get('permissoes/view/{rec_id}', 'PermissoesController@view');	
	Route::post('permissoes/add', 'PermissoesController@add');	
	Route::any('permissoes/edit/{rec_id}', 'PermissoesController@edit');	
	Route::any('permissoes/delete/{rec_id}', 'PermissoesController@delete');

/* routes for RoleHasPermissions Controller  */	
	Route::get('rolehaspermissions', 'RoleHasPermissionsController@index');
	Route::get('rolehaspermissions/index', 'RoleHasPermissionsController@index');
	Route::get('rolehaspermissions/index/{filter?}/{filtervalue?}', 'RoleHasPermissionsController@index');	
	Route::get('rolehaspermissions/view/{rec_id}', 'RoleHasPermissionsController@view');	
	Route::post('rolehaspermissions/add', 'RoleHasPermissionsController@add');	
	Route::any('rolehaspermissions/edit/{rec_id}', 'RoleHasPermissionsController@edit');	
	Route::any('rolehaspermissions/delete/{rec_id}', 'RoleHasPermissionsController@delete');

/* routes for Roles Controller  */	
	Route::get('roles', 'RolesController@index');
	Route::get('roles/index', 'RolesController@index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view');	
	Route::post('roles/add', 'RolesController@add');	
	Route::any('roles/edit/{rec_id}', 'RolesController@edit');	
	Route::any('roles/delete/{rec_id}', 'RolesController@delete');

/* routes for Users Controller  */	
	Route::get('users', 'UsersController@index');
	Route::get('users/index', 'UsersController@index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index');	
	Route::get('users/view/{rec_id}', 'UsersController@view');	
	Route::any('account/edit', 'AccountController@edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword');	
	Route::get('account/currentuserdata', 'AccountController@currentuserdata');	
	Route::post('users/add', 'UsersController@add');	
	Route::any('users/edit/{rec_id}', 'UsersController@edit');	
	Route::any('users/delete/{rec_id}', 'UsersController@delete');

});

Route::get('home', 'HomeController@index');
	
	Route::post('auth/register', 'AuthController@register');	
	Route::post('auth/login', 'AuthController@login');
	Route::get('login', 'AuthController@login')->name('login');
		
	Route::post('auth/forgotpassword', 'AuthController@forgotpassword')->name('password.reset');	
	Route::post('auth/resetpassword', 'AuthController@resetpassword');
	
	Route::get('components_data/id_usuario_option_list/{arg1?}', 'Components_dataController@id_usuario_option_list');	
	Route::get('components_data/id_inventario_option_list/{arg1?}', 'Components_dataController@id_inventario_option_list');	
	Route::get('components_data/categoria_option_list/{arg1?}', 'Components_dataController@categoria_option_list');	
	Route::get('components_data/nome_option_list/{arg1?}', 'Components_dataController@nome_option_list');	
	Route::get('components_data/inventario_categoria_autofill/{arg1?}', 'Components_dataController@inventario_categoria_autofill');	
	Route::get('components_data/cargo_id_option_list/{arg1?}', 'Components_dataController@cargo_id_option_list');	
	Route::get('components_data/users_name_exist/{arg1?}', 'Components_dataController@users_name_exist');	
	Route::get('components_data/users_email_exist/{arg1?}', 'Components_dataController@users_email_exist');	
	Route::get('components_data/cargo_usuario_option_list/{arg1?}', 'Components_dataController@cargo_usuario_option_list');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');