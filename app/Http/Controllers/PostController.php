<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
    const PAGINATION_NUMBER = 10;

    public function userPosts(User $user){
        return view('post.user_posts', [
            'user'=>$user,
            'posts'=>Post::where('user_id', $user->id)->where(function($q){
                $q->orWhere('published', 1)->orWhere('user_id', \Auth::user()->id);
            })->with('user')->orderBy('updated_at', 'desc')->paginate(self::PAGINATION_NUMBER)
        ]);
    }

    public function show(Post $post){
        return view('post.show', ['post'=>$post]);
    }

    public function create(Post $post){
        return view('post.create', ['post'=>$post]);
    }

    public function store(PostRequest $request, Post $post){
        $post->user_id = \Auth::user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->published = $request->input('published', 0);
        $post->save();

        return redirect()->route('users.posts', \Auth::user()->id)->with(['messages'=>['Статья успешно создана']]);
    }
}
