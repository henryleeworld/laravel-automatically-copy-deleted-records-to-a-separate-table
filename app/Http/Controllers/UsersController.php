<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class UsersController extends Controller
{
    public function show() 
    {
        $user = User::where('created_at', '>=', now()->subMonth())->first();
        $post = $user->posts()->first();
        $postId = $post->id;
        echo '刪除文章編號：' . $postId . PHP_EOL;
        $post->delete();
        // dd(Post::makeRestored($postId));
        echo '還原文章編號：' . $postId . PHP_EOL;
        $post = Post::restore($postId);
        // $post = Post::makeRestored($postId);
        // $post->save();
        echo '取得還原文章編號：' . $post->id . PHP_EOL;
    }
}
