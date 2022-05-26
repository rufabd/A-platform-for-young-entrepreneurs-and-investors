<?php

// use App\Http\Controllers\Founder\ProfileController;
// use App\Models\FounderProfile;

use App\Models\ProjectPostHiringTag;
use App\Models\ProjectPostIndustryTag;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified');


// Founder Profile
Route::get('/dashboard/profile/founder', [App\Http\Controllers\Founder\ProfileController::class, 'index'])->middleware('auth', 'founder', 'verified')->name('dashboard-profile');

Route::post('/dashboard/profile/founder/create', [App\Http\Controllers\Founder\ProfileController::class, 'store'])->middleware('auth', 'founder', 'verified')->name('create-profile');

Route::get('/dashboard/profile/founder/create', ['middleware' => 'founder', function() {
    return view('founder.profile.create');
}]);

Route::get('/founder/profile/{founderprofile}', [App\Http\Controllers\Founder\ProfileController::class, 'edit'])->middleware('auth', 'founder')->name('founder-profile-edit-view');

Route::put('/founder/profile/{founderprofile}', [App\Http\Controllers\Founder\ProfileController::class, 'update'])->middleware('auth', 'founder')->name('founder-profile-update');


// Skilled Profile

Route::get('/dashboard/profile/skilled', [App\Http\Controllers\Skilled\ProfileController::class, 'index'])->middleware('auth', 'skilled')->name('dashboard-profile-skilled');

Route::post('/dashboard/profile/skilled/create', [App\Http\Controllers\Skilled\ProfileController::class, 'store'])->middleware('auth', 'skilled')->name('create-profile-skilled');

Route::get('/dashboard/profile/skilled/create', ['middleware' => 'skilled', function() {
    $hiringtagg = ProjectPostHiringTag::all();
    $industrytagg = ProjectPostIndustryTag::all();
    return view('skilled.profile.create', compact('hiringtagg', 'industrytagg'));
}]);



// Investor Profile
Route::get('/dashboard/profile/investor', [App\Http\Controllers\Investor\ProfileController::class, 'index'])->middleware('auth', 'investor')->name('dashboard-profile-investor');

Route::get('/dashboard/profile/investor/create', [App\Http\Controllers\Investor\ProfileController::class, 'create'])->middleware('auth', 'investor', 'verified')->name('view-profile-investor');

Route::post('/dashboard/profile/investor/create', [App\Http\Controllers\Investor\ProfileController::class, 'store'])->middleware('auth', 'investor', 'verified')->name('create-profile-investor');


// Admin Profile

// Actions related Users
Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->middleware('auth', 'admin')->name('admin-users-index');

Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->middleware('auth', 'admin')->name('admin-users-create');

Route::get('/users/update/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->middleware('auth', 'admin')->name('admin-users-edit-view');

Route::post('/users/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->middleware('auth', 'admin')->name('admin-users-store');

Route::put('/users/update/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->middleware('auth', 'admin')->name('admin-users-update');

Route::delete('/users/delete/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->middleware('auth', 'admin')->name('admin-users-delete');

// Actions related Project Posts
Route::get('/admin/project-posts', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->middleware('auth', 'admin')->name('admin-project-posts-index');
Route::delete('/admin/project-posts/{projectpostt}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->middleware('auth', 'admin')->name('admin-project-posts-delete');

// Project Hiring Tag
Route::get('/project/hiring-tags', [App\Http\Controllers\ProjectHiringTagController::class, 'index'])->middleware('auth', 'admin')->name('admin-tags-projecthiring');

Route::post('/project/hiring-tags', [App\Http\Controllers\ProjectHiringTagController::class, 'store'])->middleware('auth', 'admin')->name('admin-tags-projecthiring-store');

// Project Industry Tag
Route::get('/project/industry-tags', [App\Http\Controllers\ProjectIndustryTagController::class, 'index'])->middleware('auth', 'admin')->name('admin-tags-projectindustry');

Route::post('/project/industry-tags', [App\Http\Controllers\ProjectIndustryTagController::class, 'store'])->middleware('auth', 'admin')->name('admin-tags-projectindustry-store');

// Project Post
Route::get('/project/posts', [App\Http\Controllers\Founder\ProjectPostController::class, 'index'])->middleware('auth', 'founder')->name('founder-project-posts-index');

Route::get('/project/posts/create', [App\Http\Controllers\Founder\ProjectPostController::class, 'create'])->middleware('auth', 'founder')->name('founder-project-posts-create');

Route::post('/project/posts/create', [App\Http\Controllers\Founder\ProjectPostController::class, 'store'])->middleware('auth', 'founder')->name('founder-project-posts-store');


// Skilled Post
Route::get('/skilled/posts', [App\Http\Controllers\Skilled\SkilledPostController::class, 'index'])->middleware('auth', 'skilled')->name('skilled-posts-index');

Route::get('/skilled/posts/create', [App\Http\Controllers\Skilled\SkilledPostController::class, 'create'])->middleware('auth', 'skilled')->name('skilled-posts-create');

Route::post('/skilled/posts/create', [App\Http\Controllers\Skilled\SkilledPostController::class, 'store'])->middleware('auth', 'skilled')->name('skilled-posts-store');

// Public Project Posts

Route::get('/founder/project-posts', [App\Http\Controllers\ProjectPostController::class, 'index'])->middleware('auth')->name('project-post-public');

Route::get('/founder-posts/{post}',[App\Http\Controllers\ProjectPostController::class, 'show'])->middleware('auth')->name('auth-founder-posts-show');

// Comments

Route::post('comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/admin/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');

// Public Skilled Posts

Route::get('/skilled/hiring-posts', [App\Http\Controllers\SkilledPostController::class, 'index'])->middleware('auth')->name('skilled-post-public');

Route::get('/skilled-posts/{post}',[App\Http\Controllers\SkilledPostController::class, 'show'])->middleware('auth')->name('auth-skilled-posts-show');

Route::get('/download/{file}', [App\Http\Controllers\Skilled\SkilledPostController::class, 'download']);

Route::get('/payment', [App\Http\Controllers\PaymentController::class, 'index']);

Route::post('/charge', [App\Http\Controllers\PaymentController::class, 'charge']);

// Favorites

// Route::resource('/favorites', [App\Http\Controllers\Investor\FavoriteController::class, ['except' => ['create', 'edit', 'show', 'update']]]);

Route::post('/favorites', [App\Http\Controllers\Investor\FavoriteController::class, 'store'])->name('add-to-favorite');

Route::get('/favorites', [App\Http\Controllers\Investor\FavoriteController::class, 'store'])->name('index-favorite');