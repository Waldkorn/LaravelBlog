<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index()
    {

    	$categories = category::get();

    	return view('categories', compact('categories'));

    }

    public function show(Category $category)
    {

    	$categories = category::get();
    	$posts = Post::Latest()->where('category_id', '=', $category->id)->get();

    	return view('index', compact('posts', 'categories'));
    	
    }
    public function create()
    {
    	$this->validate(request(), [

			'category_title' => 'required'

		]);

		Category::create([

			'category_title' => request('category_title'),

		]);

		return back();
    }

}
