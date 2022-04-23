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
//O Laravel está lendo a seguinte linga da forma:
/*
    Buscando a classe SeriesController definida na pasta com caminho 
    app\Http\Controllers pegando a função listaSeries
*/
// Para passar um parametro para um metodo post será necessário passar o parametro na rota com o {}
//Posso definir nomes paras as rotas, assim evito esquecer uma rota 
Route::get('/series', 'SeriesController@index')->name('cns_serie');
Route::get('/series/criar', 'SeriesController@create')->name('frm_criar_serie')->middleware('auth');
Route::post('/series/criar', 'SeriesController@store')->middleware('auth');
Route::delete('/series/{id}', 'SeriesController@destroy')->middleware('auth');
Route::post('/series/{id}/editarNome', 'SeriesController@editaNome')->middleware('auth');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('auth');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
Route::get('/sair', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/entrar');
});

Route::get('/visualizarEmail', function (){
    return new \App\Mail\NovaSerie(
        'Arrow',15,5
    );
});
Route::get('/enviarEmail', function (){
    $email = new \App\Mail\NovaSerie(
        'Arrow',15,5
    );

    $email->subject = 'Nova Série Adicionada';
    $users = (object) [
        'name'=>'Igor',
        'email'=>'igor@teste.com'
    ];

    \Illuminate\Support\Facades\Mail::to($users)->send($email);
    return 'Email enviado';
});
