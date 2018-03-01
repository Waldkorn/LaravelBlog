<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

use App\User;
use App\Post;
use App\Category;

class ViewShareController extends Controller
{
    //
    public function __construct() {
	    $topUsers = $this->topUsers();
	    $archives = $this->archives();
	    $categories = Category::get();

	    View::share('topUsers', $topUsers);
	    View::share('archives', $archives);
	    View::share('categories', $categories);
	}

	private function topUsers()
    {

    $topUsers = User::with('followers')->get()->sortBy(function(User $user)
    {

        return $user->followers->count();

    })->reverse();

    return $topUsers;

    }

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
}


