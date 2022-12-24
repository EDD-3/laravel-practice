<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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

// Route::get('/about', function () {
//     return "Hi about page";
// });

// Route::get('/contact', function () {
//     return "Hi I am contact";
// });

// Route::get('/post/{id}/{name}', function  ($id, $name) {
//     return "This is post number ". $id . " " . $name;
// });

// Route::get('admin/posts/example',array('as' => 'admin.home', function () {

//     $url = route('admin.home');

//     return "this url is ". $url;
// }));

//Laravel 8 <=
//Route::get('/post', 'PostsController@index');
//Laravel 8 >=
//Route::get('/post', 'App\\Http\\Controllers\\PostsController@index');
//Route::get('/post/{id}/{name}', [PostController::class, 'index']);
// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}/{password}', 'PostsController@showPost');

// Route::get('/insert', function() {

//     DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is the best thing that has happened to PHP']);

// });

// Route::get('/read', function() {

//     $results = DB::select('select * from posts where id = ?', [1]);
    
//     // foreach($results as $row ) {
//     //     return $row->title;
//     // }

// });

// Route::get('/update', function() {

//     $updated = DB::update('update posts set title = "Updated title" where id = ?', [1]);

//     return $updated;
// });

Route::get('/delete', function() {
    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});