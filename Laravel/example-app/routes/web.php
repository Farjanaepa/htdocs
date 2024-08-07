<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/post', function () {
//     return view('post');
// });



Route::get('/about', function () {
    return view('about');
});
Route::get('/postsssss', function () {
    return view('post');
})->name('mypost');


Route::get('/post/firstpost', function () {
    return view('firstpost');
});

// multiple parametter pass ------------

Route::get('/post/{id?}/comment/{commentid?}', function (string $id = null, string $comment=null) {
    
    if($id){
        return "<h1>Post Id : " . $id ."</h1><h2>" . $comment . "</h2>";
    }else {
        return "<h1> NO ID Found </h1>";
    }
    
    
});