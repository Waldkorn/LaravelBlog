<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        if ($post->comments_allowed == 1) 
        {   

        	$this->validate(request(), [ 
                'body' => 'required|min:2',
                'user_id' => 'required'
            ]);

            $comment = new Comment;

            $comment->post_id = $post->id;
            $comment->user_id = request()->user_id;
        	$comment->body = request()->body;

            $comment->save();

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
