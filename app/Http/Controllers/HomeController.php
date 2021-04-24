<?php

namespace App\Http\Controllers;

use App\Services\PostService;

class HomeController extends Controller
{
    private PostService $postsService;

    public function __construct(PostService $postsService)
    {
        $this->postsService = $postsService;
    }

    public function Home()
    {
        return view('front.home.index');
    }

    public function getAllPosts()
    {
        $posts = $this->postsService->getAllPosts();
        return view('front.posts.index', compact('posts'));
    }

    public function getPostById(int $ID)
    {
        $post = $this->postsService->getPostById($ID);
        if (empty($post)) {
            abort(404);
        }

        return view('front.posts.post', compact('post'));
    }
}
