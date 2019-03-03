<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($id)
    {
        $page = Page::where('id', '=', $id)->first();
        $title = $page->menu_name;
        $menu = MenuItem::where('title', $title)->first();
        $menus = MenuItem::where('parent_id', $menu->parent_id)->get();
        $parent_menu = MenuItem::where('id', $menu->parent_id)->first();
        return view('pages.page', compact('page', 'title', 'menu', 'menus', 'parent_menu'));
    }
}
