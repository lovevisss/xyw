<?php

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

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('page/{id}', ['as' => 'page', 'uses' => 'PagesController@show']);
Route::get('post/{id}', ['as' => 'post', 'uses' => 'PostsController@show']);


Route::get('category/{id}', ['as' => 'category', 'uses' => 'HomeController@get_category']);

Route::post('search', ['as' => 'search', function(){
    $keys = Input::get('keys');
    return $keys;
//    return redirect(route('search_get',['keys' => $keys]));  //post 第二页会出问题  需要改成get
}]);






//Route::get('newxls', function ()
//{
//    \Excel::import(new \App\Imports\PostImport, 'mxxw.csv');
//
//    return redirect('/')->with('success', 'All good!');
//});
//
//
//Route::get('xlstest', function(){
//    \Excel::load('public/xls/core_content.csv', function($reader){
//        $data = $reader->all();
//        foreach($data as $item)
//        {
//            echo $item->id."\n";
//            if($item->categoryid == 680)  //母校新闻
//            {
//                echo $item->contenttitle."\n";
////                echo TCG\Voyager\Models\Post::where('title' ,'=', $item->contenttitle)->first();
//                if(! TCG\Voyager\Models\Post::where('title' ,'=', $item->contenttitle)->first())
//                {
//                    echo 'not exit'."\n";
//                    if($item->contentfull != null)
//                    {
//                        echo 'creating'."\n";
//                        DB::table('posts')->insert([
//                            'author_id' => 1,
//                            'category_id' => 6,
//                            'title' => $item->contenttitle,
//                            'body'       => $item->contentfull,
//                            'slug' => $item->id,
//                            'created_at' => \Carbon\Carbon::createFromTimestamp($item->createtime ? $item->createtime : $item->addtime),
//                            'updated_at' => \Carbon\Carbon::createFromTimestamp($item->createtime ? $item->createtime : $item->addtime),
//                        ]);
//
//                    }
//
//                }
////                echo $item->contenttitle;
//            }
//        }
////       dd($data);
//    });
//});