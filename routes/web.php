<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MemberController::class, 'index'])->name('index');
Route::get('/members/{school}', [MemberController::class, 'showBySchool'])->name('members.by.school');
Route::get('/add/members', [MemberController::class, 'addMember'])->name('add.members');
Route::post('/members', [MemberController::class, 'store'])->name('store.members');

Route::get('/download-members-csv', [MemberController::class, 'downloadMembersCSV'])->name('download.members.csv');
