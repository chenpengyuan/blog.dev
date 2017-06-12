<?php

use App\Post;
use App\User;
use App\Role;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('read',function(){
    $posts = Post::all();

    // $posts = Post::where('is_admin',0)
    //             ->orderBy('id','desc')
    //             ->take(2)
    //             ->get();

       // $post = Post::find(2);
   //$post = Post::where('is_admin',0)->first();
    //return $post->title;
    return $posts;

    // foreach($posts as $post) {
    //     echo $post->id .": ".$post->title ."<br>\n";
    // }

});

Route::get('insert/{title}/{fulltext}',function($title,$fulltext){  //傳參數
    $post = new Post;  //INSERT才需要
    $post->title="$title";
    $post->fulltext="$fulltext";
    $post->save();

});


Route::get('create',function(){

    Post::create([
        'title'=>'金少爺',
        'fulltext'=>'好棒棒'
    ]);

});

Route::get('update/{id}/{title}/{fulltext}',function($id,$title,$fulltext){

    //$post = new Post;
    // $post =Post::find($id);
    // $post->title="$title";
    // $post->fulltext="$fulltext";
    //$post->save();

    //update專屬方法 流暢的寫法
    post::where('id',$id)->where('is_admin',0)
    ->update([
        'title'=>$title,
        'fulltext'=>$fulltext
    ]);

});


Route::get('delete/{id}',function($id){
   
    $post =Post::find($id);
    $post->delete();
    
    Post::destroy([1,3,5]); //刪除1,3,5三筆
});

// Route::get('delete',function(){
           
//     Post::destroy([1,3,5]); //刪除1,3,5三筆
// });

Route::get('readall',function(){
   
    $posts =Post::withTrashed()->get();  //將被刪除的資料也顯示出來
    return $posts;
});

Route::get('onlytrash',function(){
   
    $posts =Post::onlyTrashed()->get();  //只撈出被刪除的資料顯示出來
    return $posts;
});

Route::get('restore',function(){
   
    Post::onlyTrashed()->where('is_admin',1)->restore();  //還原被刪除資料
    
});

Route::get('forcedelete',function(){
   
    Post::onlyTrashed()->forceDelete();  //真的刪除全部資料
    
});

Route::get('forcedelete/{id}',function($id){
   
    //Post::find($id)->forceDelete();  //真的刪除資料
    Post::where('id',$id)->forceDelete();
    
});

Route::get('user/{userid}/post',function($userid){
   
    return User::find($userid)->post->title;
    
});

// Route::get('user/{userid}/posts',function($userid){
//    $user = User::find($userid);

//    foreach($user->posts as $post){
//        echo $post->title. "<br>\n";
//    }
    
    
// });

Route::get('post/{postid}/post',function($postid){
   
    return Post::find($postid)->user->name;
    
});

Route::get('user/{userid}/role',function($userid){
   
//     $user = User::find($userid);

//    foreach($user->roles as $role){
//        echo $role->name. "<br>\n";
//    }
//以上為取用roles屬性

    $role = User::find($userid)->roles()->orderBy('id','desc')->get();
    return $role;
    //呼叫roles()方法
});

Route::get('role/{roleid}/user',function($roleid){
    $users = Role::find($roleid)
        ->users()
        ->orderBy('id','desc')
        ->get();
    return $users;    
});  

// Route::get('insert',function(){

//     DB::insert('insert into posts (title, `fulltext`) values (?, ?)', ['高醫大', '教務處']);
// });

// Route::get('/read',function(){
    
    
//     $results=DB::select('select * from posts where 1=1 ');
//     //return $results;
//     // foreach($results as $result) {
//     //     echo $result->title. "<br>\n";
//     //     echo $result->fulltext. "<br>\n";
//     //     //return 只能一個
//     // }
//     var_dump($results);

// });

// Route::get('update',function(){

//     $sql = DB::update('update posts set title = "台灣" where  id = ?', [1]);
//     var_dump($sql);

// });

// Route::get('delete',function(){
//     $num=2;
//     DB::delete('delete from posts where id = ?', [$num] );
//     //var_dump($sql);

// });

// Route::get('contact', 'PostsController@showContact' );

// Route::get('post/{category}/{date}/{id}','PostsController@showPost');

// Route::get('error',function(){
//     return view('errors.503');
// });

// Route::get('post/{id}','PostsController@index'); //controllers

// Route::resource('posts','PostsController');

// Route::get('/about', function () {
//     return "Page: About";
// });

// Route::get('/contact', function () {
//     return "Page: Contact";
// });

// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return "Page: Contact" . $id .",Name:" . $name;
// });

// // Route::get('/demo', function () {
// //     //return view('welcome');
// //     return "Hello World";
// // });
