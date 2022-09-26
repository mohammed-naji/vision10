<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Route::get('url', 'Action');
// Route::post('url', 'Action');
// Route::put('url', 'Action');
// Route::patch('url', 'Action');
// Route::delete('url', 'Action');

// namespace
// use

Route::get('/new', [HomeController::class, 'new']);

Route::post('/', function () {
    return 'Homepage';
});

Route::put('/', function () {
    return 'Homepage';
});

Route::patch('/', function () {
    return 'Homepage';
});

Route::delete('/', function () {
    return 'Homepage';
});

Route::get('/', function () {

    $name = 'Ali';
    $age = 18;
    $user = 'ali18';

    // return url("/user/$name/$age/$user");
    return route('profile', [$name, $age, $user]);
});

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
