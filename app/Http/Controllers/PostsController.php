<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;
use App\Mail\Followmail;
use App\Role;

class PostsController extends ViewShareController
{	

    public function index()
    {	

    	$posts = $this->getPosts();

    	return view('index', compact('posts'));

    }

	public function show(Post $post)
	{

		return view('posts.show', compact('post'));

	}

	public function create()
	{

		return view('posts.create');

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

		$id = Auth::id();
		$user = User::find($id);
		$followers = $user->followers()->get();

		$user->increment('posts_count');

		foreach ($followers as $follower) {

		\Mail::to($follower->email)->send( new Followmail($user,$post));

		}

		$post->category()->attach(request('category_id'));
	
		return redirect('/');

	}

	public function edit(Post $post) 
	{

		return view('/posts.edit', compact('post'));

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
		return view('index', compact('posts'));

	}

	public function month($year)
	{
		$posts = Post::Latest();

    	if ($month = request('month')) {

    		$posts->whereMonth('created_at', Carbon::parse($month)->month);

    	}
    	if ($year = request('year')) {

    		$posts->whereYear('created_at', $year);

    	}

    	$posts = $posts->with('category.post', 'user.posts')->get();

    	return view('index', compact('posts'));
	}

	function remove(Post $post) {

		$post->delete();

		return redirect('/');

	}

	private function array_sort_by_column(&$array, $column, $direction = SORT_DESC) {
	    $reference_array = array();

	    foreach($array as $key => $row) {
	        $reference_array[$key] = $row[$column];
	    }

	    array_multisort($reference_array, $direction, $array);
	}

	private function getPosts() {

		if (Auth::check()) {

    		$id = Auth::id();
	    	$user = User::find($id);
	    	$followings = $user->followings()->get();
	    	$posts = array();
		  	foreach ($followings as $following) {
				$helperPosts = $following->posts()->Latest()->with('category.post', 'user.posts')->get();
				foreach($helperPosts as $helperPost) {
					$posts[] = $helperPost;
				}
			}

			$this->array_sort_by_column($posts, 'created_at');

		} else {

	    	$posts = Post::Latest()->with('category.post', 'user.posts')->get();
	    	
	    }

	    return $posts;
	}

}