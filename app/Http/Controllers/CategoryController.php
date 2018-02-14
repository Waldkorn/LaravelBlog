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

    	//$post = Post::Latest()->get();
    	$categories = category::Latest()->get();

    	$posts = Post::where('category_id', '=', $category->id)->get();



    	//$post = $post->original;

    	//dd($post);

    	return view('index', compact('posts', 'categories'));
    	
    }
}
