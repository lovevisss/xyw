<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\MenuItem;
class PostsController extends Controller
{
    public function show($id)
    {
        $page = Post::where('id', '=', $id)->first();
        $title = $page->category->name;
        echo $title;
//        $menu = MenuItem::where('title', $title)->first();
//        $menus = MenuItem::where('parent_id', $menu->parent_id)->get();
//        $parent_menu = MenuItem::where('id', $menu->parent_id)->first();
//        return view('pages.page', compact('page', 'title', 'menu', 'menus', 'parent_menu'));
    }
}
