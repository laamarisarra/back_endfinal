<?php
use App\Http\Controllers\Auth\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
 
use Laravel\Passport\HasApiTokens;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group ( function() {
    Route::post('/login','Auth\LoginController@login');
    Route::middleware('auth:api')->get('/all', 'api\user\UserController@index');
    Route::post('/showLoginForm','Auth\LoginController@showLoginForm');
});

//// showtoken
Route::get('/checktoken/{token}','Auth\LoginController@showtoken' ,function($token){
    return response('hiiiiii');
} );








///////////////

//medecin en tant que admin 
Route::get('/user/{id}','UserController@show');
Route::get('/users','UserController@index');
Route::get('/create','UserController@create');
Route::get('/edit/{id}','UserController@edit');
Route::post('/store','UserController@store');
Route::patch('/update/{id}','UserController@update');
Route::delete('/delete/{id}','UserController@destroy');


//patient en tant que admin 
Route::get('/patients','CrudPatient@index');
Route::get('/patcreate','CrudPatient@create');
Route::post('/patstore','CrudPatient@store');
Route::get('/patshow/{id}','CrudPatient@show');
Route::get('/patedit/{id}','CrudPatient@edit');
Route::patch('/patiupdate/{id}','CrudPatient@update');
Route::delete('/patdelete/{id}','CrudPatient@destroy');


//assistante en tant que admin 
Route::get('/assistante','CrudAssistante@index');
Route::get('/assicreate','CrudAssistante@create');
Route::post('/assistore','CrudAssistante@store');
Route::get('/assishow/{id}','CrudAssistante@show');
Route::get('/assiedit/{id}','CrudAssistante@edit');
Route::patch('/assiupdate/{id}','CrudAssistante@update');
Route::delete('/assidelete/{id}','CrudAssistante@destroy');


//assistante en tant que medecin
Route::get('/medassistante','CrudassiMedecin@index');
Route::get('/medassicreate','CrudassiMedecin@create');
Route::post('/medassistore','CrudassiMedecin@store');
Route::get('/medassishow/{id}','CrudassiMedecin@show');
Route::get('/medassiedit/{id}','CrudassiMedecin@edit');
Route::patch('/medassiupdate/{id}','CrudassiMedecin@update');
Route::delete('/medassidelete/{id}','CrudassiMedecin@destroy');


//patient en tant que medecin
Route::get('/medpatient','CrudpatiMedecin@index');
Route::get('/medpaticreate','CrudpatiMedecin@create');
Route::post('/medpatistore','CrudpatiMedecin@store');
Route::get('/medpatishow/{id}','CrudpatiMedecin@show');
Route::get('/medpatiedit/{id}','CrudpatiMedecin@edit');
Route::patch('/medpatiupdate/{id}','CrudpatiMedecin@update');
Route::delete('/medpatidelete/{id}','CrudpatiMedecin@destroy');


//patient en tant que assistante
Route::get('/patientassi','CrudassiController@index');
Route::get('/assipaticreate','CrudassiController@create');
Route::post('/assipatistore','CrudassiController@store');
Route::get('/assipatishow/{id}','CrudassiController@show');
Route::get('/assipatiedit/{id}','CrudassiController@edit');
Route::patch('/assipatiupdate/{id}','CrudassiController@update');
Route::delete('/assipatidelete/{id}','CrudassiController@destroy');


//agendas
Route::get('/agendas','AgendaController@index');
Route::post('/ajouter','AgendaController@ajouter');
Route::get('/show/{id}','AgendaController@show');
Route::post('/agendastore','AgendaController@store');
Route::get('/agendaedit/{id}','AgendaController@edit');
Route::patch('/agendaupdate/{id}','AgendaController@update');
Route::delete('/agendadelete/{id}','AgendaController@destroy');


//fiche

Route::get('/fiche','FicheController@index');
Route::post('/fiche/store','FicheController@store');
Route::get('/show/{id}','FicheController@show');
Route::get('/ficheedit/{id}','FicheController@edit');
Route::patch('/ficheupdate/{id}','FicheController@update');
Route::delete('/fichedelete/{id}','FicheController@destroy');


//aliments route
Route::get('/aliment','AlimentController@index');
Route::post('/aliment/store','AlimentController@store');
Route::get('/show/{id}','AlimentController@show');
Route::get('/alimentedit/{id}','AlimentController@edit');
Route::patch('/alimentupdate/{id}','AlimentController@update');
Route::delete('/alimentdelete/{id}','AlimentController@destroy');

//notification
Route::get('/notifications','NotificationController@index');
Route::get('/ajouternotification','NotificationController@create');
Route::post('/notificationstore','NotificationController@store');
Route::get('/shownotification/{id}','NotificationController@show');
Route::get('/notificationedit/{id}','NotificationController@edit');
Route::patch('/notificationupdate/{id}','NotificationController@update');
Route::delete('/notificationdelete/{id}','NotificationController@destroy');

//maladie

Route::get('/maladies','MaladieController@index');
Route::get('/ajoutermaladie','MaladieController@create');
Route::post('/storemaladie','MaladieController@store');
Route::get('/showmaladie/{id}','MaladieController@show');
Route::get('/editmaladie/{id}','MaladieController@edit');
Route::patch('/updatemaladie/{id}','MaladieController@update');
Route::delete('/deletemaladie/{id}','MaladieController@destroy');

//aliments

Route::get('/aliments','AlimentController@index');
Route::get('/ajouteraliment','AlimentController@create');
Route::post('/storealiment','AlimentController@store');
Route::get('/showaliment/{id}','AlimentController@show');
Route::get('/editaliment/{id}','AlimentController@edit');
Route::patch('/updatealiment/{id}','AlimentController@update');
Route::delete('/deletealiment/{id}','AlimentController@destroy');
