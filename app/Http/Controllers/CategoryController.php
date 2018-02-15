<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index()
    {

    	$categories = category::Latest()->get();

    	return view('categories', compact('categories'));

    }
    public function show(Category $category)
    {

    	$categories = category::get();
    	$posts = Post::Latest()->where('category_id', '=', $category->id)->get();

    	return view('index', compact('posts', 'categories'));
    	
    }
}
