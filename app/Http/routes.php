
<?php
use App\post;
// use DateTime;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return "About is here";
// });
// Route::get('/contact', function () {
//     return "Contact is here";
// });
// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return "This is Post Number $id $name";
// });
// Route::get('admin/posts/example',array('as'=>'admin.home', function(){
//     $url = route('admin.home');
//     return "this is the $url";
// }));
// Route::get("/post/{id}","PostController@index");
// Route::resource('posts','PostController');
// Route::get("/contact",'PostController@contact');
// Route::get("/post/{id}/{name}",'PostController@show_post');

Route::get('/insert',function(){

    DB::insert("insert into posts(title,content) values(?,?)",['Post number 2','This is the second post inserted by laravel']);
});

Route::get("/select",function(){
   $result =  DB:: select("SELECT * FROM posts WHERE id= ?",[1]);
   foreach($result as $value){
       echo $value->content;
   }
});

Route::get("/update",function(){
   $update = DB::update("UPDATE posts SET title='New Title' WHERE id=1");
   return $update;
});

Route::get("/delete",function(){
   $delete = DB::delete("DELETE FROM posts WHERE id=1");
   return $delete;
});

//Eloquent

// Route::get("/read",function(){
//     $posts = Post::all();
//     foreach($posts as $post){
//         return $post->title;
//     }
// });
Route::get("/find",function(){
    $posts = Post::find(1);
    // foreach($posts as $post){
        return $posts->title;
    // }
});

Route::get("/findwhere",function(){
    $posts = Post::where('id',1)->orderBy('id','ASC')->take(1)->get();
    return $posts;
});

Route::get("/findmore",function(){
    $posts= Post::findOrFail(1);
    return $posts;
});

Route::get('/basicinsert', function(){
    $post = new Post;

    $post->title = "New Eloquent insertion";
    $post->content = "Hello from the first eloquent post insertion";
    // $post->created_at = new \DateTime();
    // $post->updated_at = new \DateTime();
    // $post->is_admin = 1;
    $post->save();
    
});
Route::get("updaterecord",function(){
    $post = Post::find(1);
    $post->title = "update the title";
    $post->content = "Hello from the updated eloquent post
    from route";
    $post->save();
});

Route::get('/updatenew',function(){
    Post::where("id", 2)->where("is_admin",0)->update(["title"=>"hello","content"=>"updated the content for the second time"]);
});

// Route::get("/deleterecord",function(){
//     $post = Post::find(1);
//     $post->delete();
// }); 

Route::get("/deleterecord",function(){
    Post::where("id",2)->delete();
    // $post->delete();
});

Route::get('/softdelete',function(){
    $post = Post::find(3);
    $post->delete();
});
