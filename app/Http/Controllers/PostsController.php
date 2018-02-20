<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::Latest();

    	if ($month = request('month')) {

    		$posts->whereMonth('created_at', Carbon::parse($month)->month);

    	}
    	if ($year = request('year')) {

    		$posts->whereYear('created_at', $year);

    	}

    	$posts = $posts->get();
    	$categories = Category::get();
    	$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

    		->groupBy('year', 'month')
    		->orderByRaw('min(created_at) desc')
    		->get()
    		->toArray();

    	return view('index', compact('posts', 'categories', 'archives'));

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
			'category_id' => request('category_id'),
			'user_id' => auth()->id()

		]);
	
		return redirect('/');

	}

	public function edit(Post $post) 
	{

		$categories = Category::get();
		return view('/posts.edit', compact('post', 'categories'));

	}

	public function update($id) {

		$this->validate(request(), [

			'title' => 'required',
			'body' => 'required'
		]);

		$post = Post::find($id);

		$post->title = request()->title;
		$post->body = request()->body;

		$post->save();

		return redirect('/posts/' . $id);
	}

	public function search(Request $request) {

		$search = $request->search;

		$posts = Post::where('body','LIKE','%' . $search . '%')->Latest()->get();
		$categories = Category::get();
		$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

    		->groupBy('year', 'month')
    		->orderByRaw('min(created_at) desc')
    		->get()
    		->toArray();

		return view('index', compact('posts', 'categories', 'archives'));

	}
}