<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\TodoController;

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

//NON CONVIENE METTERE IL MIDDLEWARE QUI MA IN TodoController@construct
//Route::middleware('auth')->group(function (){
    //Route::get('todo', [TodoController::class, 'index'])->name('todo.index');
    //Route::get('todo/create', [TodoController::class, 'create'])->name('todo.create');
    //Route::post('todo/', [TodoController::class, 'store'])->name('todo.store');
    //Route::get('todo/{todo}', [TodoController::class, 'edit'])->name('todo.show');
    //Route::patch('todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
    //Route::delete('todos/{todo}/delete', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::resource('todo', TodoController::class);

    Route::put('todos/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::delete('todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todo.incomplete');
//});



Route::get('/', function () {
    return view('welcome');
});

Route::view('/prova','prova');


//Route::resources([
//    'users' => UserController::class,
////    'posts' => PostController::class,
//]);

Route::resource('users', UserController::class)
    ->only(['index', 'show']);
//LA CANCELLERO' E LASCERO' QUELLA DI SOPRA CON TUTTE LE ROTTE CRUD

//Route::get('users', [UserController::class, 'index']);


Route::post('/upload', [UserController::Class, 'uploadAvatar']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




