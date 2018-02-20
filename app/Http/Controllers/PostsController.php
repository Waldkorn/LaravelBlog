<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::Latest()->get();
    	$categories = Category::get();

    	return view('index', compact('posts', 'categories'));

    }

	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	public function create()
	{

		$categories = Category::get();
		return view('posts.create', compact('categories'));

	}

	public function store()
	{

		$this->validate(request(), [

			'title' => 'required',
			'body' => 'required'

		]);

		Post::create([

			'title' => request('title'),
			'body' => request('body'),
			'category_id' => request('category_id')

		]);
	
		return redirect('/');

	}

	public function edit(Post $post) 
	{

		return view('/posts.edit', compact('post'));

	}
}