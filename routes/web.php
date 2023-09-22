<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    //    fetch all users
    //    $users = DB::select("select * from users");
    //    $users = DB::table('users')->where('id', 1)->first();
    $user = User::find(17);


    //    create new user
    //    $user = DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
    //    'Kenny',
    //    'kenny31@bitfumess.com',
    //    'password',
    //    ]);
    //    $user = DB::table('users')->insert([
    //    'name' => 'Kenny',
    //    'email' => 'kenny42@bbitfumes.com',
    //    'password' => 'password'
    //    ]);
    //    $user = User::create([
    //    'name' => 'Kenny',
    //    'email' => 'kenny@bitfumestwee.com',
    //    'password' => 'password',
    //    ]);

    //    update a user
    //    $user = DB::update("update users set email=? where id=?", [
    //    'plugz@plugz.com',
    //    2,
    //    ]);
    //    $user = DB::table('users')->where('id', 3)->update(['email' => 'dyvex@bitfumes.com']);
    //    $user = User::find(4);
    //    $user->update([
    //    'email' => 'kenny@bitfumes.com'
    //    ]);


    //    delete a user
    //    $user = DB::delete("delete from users where id=2");
    //    $user = DB::table('users')->where('id', 3)->delete();
    //    $user = User::find(4);
    //    $user->delete();
    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
