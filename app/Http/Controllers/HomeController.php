<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Post;
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
        $info = Post::with('category')->where('category_id', '=', 1)->orderBy('created_at', 'DESC')->take(9)->get();
        $student_info = Post::with('category')->where('category_id', '=', 31)->orderBy('created_at', 'DESC')->take(9)->get();

        return view('index', compact('parent_menu','info'));
    }

    public function get_category($id)
    {
        return $id;
    }
}
