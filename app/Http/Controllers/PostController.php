<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' In ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('name', request('author'));
            $title = ' By ' . $author->name;
        }
        return view(
            'post.index',
            [
                'title' => 'All Posts' . $title,
                'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()
            ]
        );
    }

    public function show(Post $post)
    {

        return view(
            'post.single_post',
            [
                'title' => Str::title($post->title),
                'post' => $post
            ]
        );
    }
}
