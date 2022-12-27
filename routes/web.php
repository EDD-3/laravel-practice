<?php
namespace App;

use Exception;
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

//     DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awesome with Edwin', 'Laravel is the best thing that has happened to PHP, PERIOD.']);

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

// Route::get('/delete', function() {
//     $deleted = DB::delete('delete from posts where id = ?', [1]);

//     return $deleted;
// });

/*
|--------------
| ELOQUENT ORM
|--------------
*/

// Route::get('/read', function() {

//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->title;
//     }
// });

// Route::get('/find', function() {

//     $post = Post::find(2);

//     return $post->title;

// });

// Route::get('/findwhere', function() {

//     $posts = Post::where('id', 3)->orderBy('id','desc')->take(1)->get();

//     return  $posts;
// });

// Route::get('/findmore', function() {

//     try 
//     {
//         $posts = Post::findOrFail(1);
//         return $posts;
//     }

//     catch (Exception $error) 
//     {
//         return ' Message: ' . $error->getMessage();
//     }
   

//     try {

//         $posts = Post::where('users_count', '<', 50)->firstOrFail();

//     } catch (Exception $error) {
//         return 'Message: ' . $error->getMessage();
//     }

    
// });

// Route::get('/basicinsert', function() {

//     $post = new Post();

//     $post->title= 'New Eloquent title insert';
//     $post->content='Wow Eloquent is really cool, look at this content';
//     $post->save();
// });

// Route::get('/basicinsert2', function() {

//     $post = Post::find(2);

//     $post->title= 'New Eloquent title insert 2';
//     $post->content='Wow Eloquent is really cool, look at this content 2';
//     $post->save();
// });


//Mass assignment vulnerability
Route::get('/create', function() {

    Post::create(['title'=>'the create method 4', 'content' => 'Wow I\'m learning a lot with Edwin Diaz 4']);
});

Route::get('/update', function () {
    Post::where('id', 2)->where('is_admin',0)->update(['title'=>'New PHP TITLE', 'content'=>'I love my instructor Edwin']);
});

Route::get('/delete', function(){

    $post = Post::find(4);
    $post->delete();
});

// Route::get('/delete2', function() {

//     Post::destroy(3);

//     Post::destroy([4,5]);

//     Post::where('is_admin', 0)->delete();
// });

Route::get('/softdelete',function() {

    Post::find(2)->delete();

});

Route::get('/readsoftdelete', function() {

    // $post = Post::find(1);
    // return $post;

    // $post = Post::withTrashed()->where('id', 1)->get();

    // return $post;

    // $posts = Post::withTrashed()->where('is_admin', 0)->get();

    $posts = Post::onlyTrashed()->where('is_admin', 0)->get();

    return $posts;

});

Route::get('/restore', function() {

    Post::withTrashed()->where('id', 2)->restore();

});

Route::get('/forcedelete', function () {
    
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});