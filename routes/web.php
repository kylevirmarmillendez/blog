<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Photo;
use Faker\Provider\Lorem;
use Carbon\Carbon;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about',function(){
//         return "hi About page";
// });

// Route::get('/contact',function(){
//     return "Hi Contact page";
// });


// Route::get('/post/{id}/{name}',function($id,$name){
//     return "this is post".$id." ".$name;
// });

// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//     $url = route('admin.home');
//     return "this URL is".$url;
// }));


// Route::get('/post/{id}', [PostController::class, 'index']);
// Route::get('/contact', [PostController::class, 'contact']);
// Route::get('post/{id}',[PostController::class,'show_post']);



// Route::get('/insert',function(){
//     DB::insert('insert into posts(title, body) values(?,?)',['Nodejs','Nodejs is the best thing that has happen to JavaScript']);
// });

// Route::get('/read',function(){
//     $results = DB::select('select * from posts');

//     return $results;
 
// });

// Route::get('/update', function(){
//     $updated = DB::update('update posts set title = "update title no.2" where id = ?',[3]);

//     return $updated."is now updated";
// });


// Route::get('/delete', function(){
//   $deleted = DB::delete('delete from posts where id = ?',[3]);
//   return $deleted;
// });

// Route::resource('posts', PostController::class);


// Eloquent or ORM

// Route::get('/find',function(){
//     $posts = Post::all();

//     foreach($posts as $post){
//         return $post->title;
//     }
// });


// Route::get('/findwhere',function(){

//     $posts = Post::where('id',5)->orderBy('id','desc')->take(1)->get();
//     return $posts;
// });

// Route::get('/findmore',function(){
//     $posts = Post::findOrFail(3);

//     return $posts;

  
// });

// Route::get('/basicinsert', function(){
//     $post = new Post;
//     $post->title = 'new ORM title insert';
//     $post->body= 'Kyle is Real cool';

//     $post->save();
// });



// Route::get('/basicinsert2', function(){
//     $post = Post::find(3);
//     $post->title = 'new ORM title override';
//     $post->body= 'ORM makalibug';

//     $post->save();
// });

// Route::get('/create', function(){
//     Post::create(['title'=>'udate kyle gwapo', 'body'=>'I am so gwapo with marjorie']);
// });

// Route::get('/update',function(){
//     Post::where('id','3')->where('is_Admin', 0)->update(['title'=>'New old title', 'body'=>'I love cebu sheyt']);
// });

// Route::get('/delete', function(){
//     $post = Post::find(3);

//     $post->delete();
// });

// Route::get('/softdelete',function(){
//     Post::find(3)->delete();
// });

// Route::get('/softdelete',function(){
//     Post::find(3)->delete();
// });

// Route::get('/forcedelete',function(){
//     Post::where('id',3)->forcedelete();
// });



// //  1 to 1 relationship

// Route::get('/user/{id}/post',function($id){
//       return  User::find($id)->post;
// });

// Route::get('/post/{id}/user',function($id){

//     return Post::find($id)->user;
// });



// Route::get('/insertcomment',function(){

//     $comment  =  new Comment;
//     $comment->comment='Gwapo kaayu si kyle';

//     $comment->save();

// });


// Route::get('/getcomments',function(){

//   $comments = Post::find(1)->comments;

//     return $comments;

// });

// Route::get('/postseloquent',function(){
//      $user = User::find(1);
//      $userPosts = $user->posts;
//      foreach($userPosts as $post){
//         echo $post->title.'<br>';
//      }
// });

// Route::get('/user/{id}/role',function($id){
    
//     $user = User::find($id);

//     foreach($user->roles as $role){
//         return $role->name;
//     }
// });

// Route::get('user/pivot',function(){

//     $user = User::find(1);
//     foreach($user->roles as $role){
//         return $role->pivot->created_at;
//     }
// });

// Route::get('/user/country', function(){
//    $country = Country::find(4);

//    foreach($country->posts as $post){
//     return $post;
//    }
// });

// Route::get('/photo',function(){
//     $user = User::find(1);

//     foreach($user->photos as $photo) {
//         return $photo;
//     }
// });

// Route::get('photo/{id}/post',function($id){
//    $photo = Photo::findOrFail($id);

//    return $photo->imageable;
// });



// CRUD Application




Route::group(['middleware'=>'web'],function(){
    Route::resource('/posts',PostsController::class);
});


    Route::get('/dates',function(){

        $date = new DateTime('+1 week');

        echo $date->format('m-d-Y');

        echo '<br>';

        echo Carbon::now()->addMonths(10)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->subDays(5)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->yesterday()->diffForHumans();

        echo '<br>';


    });


    Route::get('/getname',function(){
            $user = User::find(4);

            echo $user->name;
    }); 


    Route::get('/setname',function(){
        $user = User::find(1);

        $user->name = 'william';
        $user->save();
    });

    Route::get('/fileform',[PostsController::class,'fileForm']);
    Route::post('/uploadfile',[PostsController::class,'fileUpload']);

    





   
