<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    public function store(Post $post)
    {
        if ($post->comments_allowed == 1) 
        {

        	$this->validate(request(), [ 'body' => 'required|min:2']);
        	$post->addComment(request('body'));
        	return back();
        }

    }

    	public function delete(Comment $comment)
	{ 

        $comments = comment::get();
        
        $correctComment = Comment::Latest()->where('id', '=', $comment->id)->get();
        
        Comment::find($correctComment[0]->id)->delete();
      
		return back();
	}

    public function toggle(Post $post)
    {
        if ($post->comments_allowed == 1) {

            $post->comments_allowed = 0;

            $post->save();

            return back();

        } else {

            $post->comments_allowed = 1;

            $post->save();

            return back();
        }
    }
}
