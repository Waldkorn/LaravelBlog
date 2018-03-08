<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    
    public function get() {

    	echo Category::get();

    }

    public function getPostsFromCategory(Category $category) {

    	$posts = $category->post()->Latest()->with('category.post', 'user.posts')->get();
    	echo $posts;

    }

}
