<?php

use App\Http\Controllers\abdullah;
use App\Http\Controllers\FormsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use App\Http\Controllers\SiteController;

// Route::get('url', 'Action');
// Route::post('url', 'Action');
// Route::put('url', 'Action');
// Route::patch('url', 'Action');
// Route::delete('url', 'Action');

// namespace
// use

Route::get('/new', [HomeController::class, 'new']);

// Route::post('/', function () {
//     return 'Homepage';
// });

// Route::put('/', function () {
//     return 'Homepage';
// });

// Route::patch('/', function () {
//     return 'Homepage';
// });

// Route::delete('/', function () {
//     return 'Homepage';
// });

// Route::get('/', function () {

//     $name = 'Ali';
//     $age = 18;
//     $user = 'ali18';

//     // return url("/user/$name/$age/$user");
//     return route('profile', [$name, $age, $user]);
// });

Route::match(['put', 'post', 'get'], 'about', function () {
    return 'About Page Get, Post';
});

Route::any('developer', function () {
    return 'Developer page';
});

Route::get('admin', function () {
    // return redirect('/');
    return 'Admin page';
});

// Route::view('welcome', 'welcome');
Route::get('welcome', function () {
    return view('welcome');
});

Route::get('user/rteewtertw/{name}/{age}/fdsfa/tretwert/qerqw/{username}', function ($name, $age, $username) {
    // return 'Name ' . $name . ' Age ' . $age . ' Username ' . $username;
    return "Name $name Age $age Username $username";
})->whereAlpha('name')->whereNumber('age')->whereAlphaNumeric('username')->name('profile');


Route::get('/category/{category}', function ($category) {
    return "Category $category";
})->whereIn('category', ['movie', 'song', 'painting']);


// Route::get('news', function() {
//     return 'News';
// });

Route::get('news/{id?}', function ($id = null) {
    return 'News ' . $id;
});

Route::get('contact', function() {
    return 'Contact Us';
})->name('contactpage');


// Route::get('/', [SiteController::class, 'home']);


// First Normal Routes
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [MainController::class, 'about'])->name('main.about');
Route::get('/team', [MainController::class, 'team'])->name('main.team');
Route::get('/searvices', [MainController::class, 'searvices'])->name('main.searvices');
Route::get('/contact', [MainController::class, 'contact'])->name('main.contact');


// ---------------------------------------- //
// Route::get('abdullah', [abdullah::class, 'new'])->name('abdullah.new');

Route::get('site1', [Site1Controller::class, 'index'])->name('site1.index');


Route::prefix('site2')->name('site2.')->group(function() {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about', [Site2Controller::class, 'about'])->name('about');
    Route::get('/contact', [Site2Controller::class, 'contact'])->name('contact');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
});


Route::prefix('site3')->name('site3.')->group(function() {
    Route::get('/', [Site3Controller::class, 'about'])->name('about');
    Route::get('/experience', [Site3Controller::class, 'experience'])->name('experience');
    Route::get('/educations', [Site3Controller::class, 'educations'])->name('educations');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');
});

Route::get('/form1', [FormsController::class, 'form1'])->name('form1');
Route::post('/form1', [FormsController::class, 'form1_data'])->name('form1_data');

Route::get('/form2', [FormsController::class, 'form2'])->name('form2');
Route::post('/form2', [FormsController::class, 'form2_data'])->name('form2_data');

Route::get('/form3', [FormsController::class, 'form3'])->name('form3');
Route::post('/form3', [FormsController::class, 'form3_data'])->name('form3_data');

Route::get('/form4', [FormsController::class, 'form4'])->name('form4');
Route::post('/form4', [FormsController::class, 'form4_data'])->name('form4_data');

Route::get('/contact', [FormsController::class, 'contact'])->name('contact');
Route::post('/contact', [FormsController::class, 'contact_data'])->name('contact_data');


// CRUD Application For Posts

// Read Data
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// Create Data
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
