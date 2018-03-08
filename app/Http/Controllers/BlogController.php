<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Post;

class BlogController extends ViewShareController
{

    public function index(User $user) {

		$posts = Post::with('category.post', 'user.posts')->where('user_id', $user->id)->get();

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

	public function edit(User $user) {

		$this->validate(request(), [
			'blogname' => 'required',
			'blogpicture' => 'required'
		]);
		
		$user->blog_header_picture = request()->blogpicture;
		$user->blog_name = request()->blogname;
		$user->save();

		return back();

	}
}
