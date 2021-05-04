<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

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

Route::get('/', [FirstController::class, 'index']);

Route::get('/about', [FirstController::class, 'about']);

Route::get('/article/{id}', [FirstController::class, 'article'])->where("id", "[0-9]+");

Route::get("/create", [FirstController::class, "create"])->middleware("auth");

Route::post("/photos/store", [FirstController::class, "store"])->middleware("auth");

Auth::routes();

Route::get('/users/{id}', [FirstController::class, 'users']);
/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/changesuivi/{id}', [FirstController::class, 'changesuivi'])->where("id", "[0-9]+")->middleware("auth");
Route::get('/likes/{id}', [FirstController::class, 'likes'])->where("id", "[0-9]+")->middleware("auth");

Route::post('/users/updateoverview', [FirstController::class, 'updateoverview'])->middleware("auth");

Route::get('/newuser', function () {
    return redirect("/users/" . Auth::id());
});

Route::get('/search', [FirstController::class, 'search']);
