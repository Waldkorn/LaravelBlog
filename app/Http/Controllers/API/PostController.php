<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    //
    public function get() 
    {

    	return Post::with('category.post', 'user.posts')->get();

    }

    public function getArchives() {

    	return $this->archives();

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
