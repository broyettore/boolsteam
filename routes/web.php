<?php
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Guest\GameController as GuestGameController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('homepage');
Route::resource('games', GuestGameController::class)->only(['index', 'show']);

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {

    Route::resource('games', GameController::class);

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');


    /* Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
});


require __DIR__.'/auth.php';
