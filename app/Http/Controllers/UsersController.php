<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class UsersController extends Controller
{
    public function show() 
    {
        $user = User::where('created_at', '>=', now()->subMonth())->first();
        $post = $user->posts()->first();
        $postId = $post->id;
        echo __('Delete post ID: ') . $postId . PHP_EOL;
        $post->delete();
        // dd(Post::makeRestored($postId));
        echo __('Restore post ID: ') . $postId . PHP_EOL;
        $post = Post::restore($postId);
        // $post = Post::makeRestored($postId);
        // $post->save();
        echo __('Get restored post ID: ') . $post->id . PHP_EOL;
    }
}
