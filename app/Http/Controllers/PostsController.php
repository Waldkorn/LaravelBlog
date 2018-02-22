<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;

class PostsController extends Controller
{	
	private function archives() 
	{
		return Post::orderBy('created_at', 'desc')
	        ->whereNotNull('created_at')
	        ->get()
	        ->groupBy(function(Post $post) {
	            return $post->created_at->format('F');
	        })
	        ->map(function ($item) {
	            return $item
	                ->sortByDesc('created_at')
	                ->groupBy( function ( $item ) {
	                    return $item->created_at->format('Y');
	                });
      			
			});
	}

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
    	$archives = $this->archives();

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

		$post = new Post;

		$post->title = request('title');
		$post->body = request('body');
		$post->user_id = Auth()->id();

		$post->save();

		$post->category()->attach(request('category_id'));
	
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
		$archives = $this->archives();
		return view('index', compact('posts', 'categories', 'archives'));

	}

	public function month( $year)
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
    	$archives = $this->archives();

    	return view('index', compact('posts', 'categories', 'archives'));
	}

	public function blog(User $user) {

		$categories = Category::get();
		$posts = $user->posts;
		$archives = $this->archives();

		return view('index', compact('user', 'posts', 'categories', 'archives'));

	}

	public function blogEdit(User $user) {

		$this->validate(request(), [
			'blogname' => 'required',
			'blogpicture' => 'required'
		]);
		
		$user->blog_header_picture = request()->blogpicture;
		$user->blog_name = request()->blogname;
		$user->save();

		return back();

	}

	function remove(Post $post) {

		$post->delete();

		return redirect('/');

	}

}