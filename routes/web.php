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


Route::post('search', ['as' => 'search', function(){
    $keys = Input::get('keys');
    return $keys;
//    return redirect(route('search_get',['keys' => $keys]));  //post 第二页会出问题  需要改成get
}]);

Route::get('category/{id}', ['as' => 'category', 'uses' => 'HomeController@get_category']);



Route::get('xlstest', function(){
    \Excel::load('public/xls/mxxw.csv', function($reader){
        $data = $reader->all();
        foreach($data as $item)
        {
            echo $item->id;
            if($item->categoryid == 556)  //母校新闻
            {
                if(! TCG\Voyager\Models\Post::where('title' ,'=', $item->contenttitle)->first())
                {
                    if($item->contentfull != null)
                    {
                        DB::table('posts')->insert([
                            'author_id' => 1,
                            'category_id' => 1,
                            'title' => $item->contenttitle,
                            'body'       => $item->contentfull,
                            'slug' => $item->id,
                            'created_at' => \Carbon\Carbon::createFromTimestamp($item->publishtime),
                            'updated_at' => \Carbon\Carbon::createFromTimestamp($item->publishtime),
                        ]);

                    }

                }
//                echo $item->contenttitle;
            }
        }
//       dd($data);
    });
});