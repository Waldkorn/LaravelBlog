<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Carbon\Carbon;

class PostsController extends Controller
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

    	return view('index', compact('posts'));
	}

	public function blog(User $user) {

		$posts = $user->posts->sortByDesc('created_at');

		$followers = $user->followers()->get();

		$following = false;

		foreach ($followers as $follower) {
			if(Auth::check()) {
				if (Auth::user()->id == $follower->id) {
					$following = true;
				}
			}
		}

		return view('index', compact('user', 'posts', 'following'));

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
				$helperPosts = $following->posts()->Latest()->get();
				foreach($helperPosts as $helperPost) {
					$posts[] = $helperPost;
				}
			}

			$this->array_sort_by_column($posts, 'created_at');

		} else {

	    	$posts = Post::Latest()->get();
	    	
	    }

	    return $posts;
	}

}