<?php
namespace App;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

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

    Post::create([ 'user_id'=> 2,'title'=>'the create method 2', 'content' => 'Wow I\'m learning a lot with Edwin Diaz 2']);
});

// Route::get('/update', function () {
//     Post::where('id', 2)->where('is_admin',0)->update(['title'=>'New PHP TITLE', 'content'=>'I love my instructor Edwin']);
// });

// Route::get('/delete', function(){

//     $post = Post::find(4);
//     $post->delete();
// });

// Route::get('/delete2', function() {

//     Post::destroy(3);

//     Post::destroy([4,5]);

//     Post::where('is_admin', 0)->delete();
// });

// Route::get('/softdelete',function() {

//     Post::find(2)->delete();

// });

// Route::get('/readsoftdelete', function() {

//     $post = Post::find(1);
//     return $post;

//     $post = Post::withTrashed()->where('id', 1)->get();

//     return $post;

//     $posts = Post::withTrashed()->where('is_admin', 0)->get();

//     $posts = Post::onlyTrashed()->where('is_admin', 0)->get();

//     return $posts;

// });

// Route::get('/restore', function() {

//     Post::withTrashed()->where('id', 2)->restore();

// });

// Route::get('/forcedelete', function () {
    
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });


//ELONQUENT RELATIONSHIPS

//One-to-one relationship
// Route::get('/user/{id}/post', function ($id){

//     try 
//     {
//         $post = User::findOrFail($id)->post;
//         return $post;

//     } catch (Exception $error) {
        
//         return 'Error Message : '.$error->getMessage();
//     }
   
// });

//One-to-one inverse relationship
//Get the user by looking at the user id on the posts
// Route::get('/post/{id}/user', function($id) {

//     try {
//         $user = Post::findOrFail($id)->user;
//         return $user;   
//     } catch (Exception $error) {
//         return 'Error Message : '.$error->getMessage();
//     }
// });

//One to many relationship
// Route::get('/posts', function() {

//         $posts = User::find(1)->posts;

        
//         foreach($posts as $post) {
//             echo $post->title . '<br>';
//         }

// });

// Route::get('/user/{id}/role', function($id) {

//     $roles = User::find($id)->roles;
//     $roles = User::find($id)->roles()->orderBy('id','desc')->get();

//     return $roles;
//     foreach($roles as $role) 
//     {
//         return $role->name;
//     }

//     $user = User::find($id);
//     return $user;

//     foreach ($user->roles as $role) {
        
//         return $role->name;
//     }

// } );

//Accessing the intermediate / pivtot table

// Route::get('/user/pivot', function () {

//     $user = User::find(1);

//     foreach($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }

// });

// Route::get('/user/country', function (){


//     $country = Country::find(4);

//     foreach ($country->posts as $post) {

//         return  $post->title;
//     }
// });

//Polymorphic relations

//One-to-many polymorphic relations
// Route::get('/photos', function () {

//     $user = User::find(1);

//     foreach ($user->photos as $photo) {
        
//         return $photo;
//     }
// });

// Route::get('/post/{id}/photos', function($id) {

//     $post = Post::find($id);

//     foreach ($post->photos as $photo) {
//         echo $photo->path . '<br>';
//     }

// });

// Route::get('/photo/{id}/post', function($id) {

//     try {
        
//         $photo = Photo::findOrFail($id);

//         return $photo->imageable;

//     } catch (Exception $error) {
        
//         return "Error message : " . $error->getMessage();
//     }

// });

// Polymorphic Many-to-many

// Route::get('/post/tag', function() {
//     $post = Post::find(1);

//     foreach($post->tags as $tag) {
//         echo $tag;
//     }
// });

// Route::get('/tag/post', function() {

//     $tag = Tag::find(1);
//     return $tag->posts;
    
// });


// CRUD Application



Route::group(['middleware' => 'web'], function () {

    Route::resource('/posts', 'PostsController');
    
});