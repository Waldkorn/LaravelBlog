<?php

namespace App;

class Post extends Model
{

	public function comments()
	{

		return $this->hasMany(Comment::class)->Latest();

	}

	public function user()
    {
    	return $this->belongsTo(User::class);
    }

	public function addComment($body)
	{
		$this->comments()->create(compact('body'));

	}
	
	public function category()
	{

		return $this->belongsTo(Category::class);

	}


}
