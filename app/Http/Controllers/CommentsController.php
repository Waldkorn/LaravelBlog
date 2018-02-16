<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    public function store(Post $post)
    {
    	$this->validate(request(), [ 'body' => 'required|min:2']);
    	$post->addComment(request('body'));

    	return back();
    }

    	public function delete(Comment $comment)
	{ 

        $comments = comment::get();
        
        $correctComment = Comment::Latest()->where('id', '=', $comment->id)->get();
        
        Comment::find($correctComment[0]->id)->delete();
      
		return back();
	}
}
