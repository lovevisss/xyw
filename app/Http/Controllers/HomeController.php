<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_menu = MenuItem::where('id', '=', 15)->first();
        $info = Post::with('category')->where('category_id', '=', 3)->orderBy('created_at', 'DESC')->take(9)->get();
        $student_info = Post::with('category')->where('category_id', '=', 31)->orderBy('created_at', 'DESC')->take(9)->get();

        return view('index', compact('parent_menu','info'));
    }

    public function get_category($id)
    {
        $category = Category::where('id', '=', $id)->first();
        $title = $category->name;
        $menu = MenuItem::where('title' , '=', $title)->first();
        $menus = MenuItem::where('parent_id', '=', $menu->parent_id)->get();
        // dd($menus);
        $parent_menu = MenuItem::where('id', '=', $menu->parent_id)->first();
        $posts = Post::where('category_id', '=', $id)->orderBy('created_at', 'DESC')->paginate(15);
        return view('posts.list', compact('category', 'posts', 'title', 'menus', 'parent_menu'));
    }
}
