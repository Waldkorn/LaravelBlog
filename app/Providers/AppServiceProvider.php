<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\User;
use App\Post;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $topUsers = $this->topUsers();
        $archives = $this->archives();
        $categories = Category::get();

        View::share('topUsers', $topUsers);
        View::share('archives', $archives);
        View::share('categories', $categories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
