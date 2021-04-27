<?php

namespace App\Http\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getAll()
    {
        $user = Auth::user();
        if ($user->isWriter()) {
            $posts = $user->posts;
            return $posts;
        }
        if ($user->isOrganization()) {
            // find orginazation using by relation ship belongTo
            $organization = $user->organization;
            // find all users using by relation ship hasMany
            $users = $organization->users;
            foreach ($users as $key => $user) {
                $value[] = $user->posts;
            }
            return $value;
        }
        return $this->postModel->all();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $post;
    }

    public function store($request)
    {
        $post = new Post();
        $post->user_id = $request->name;
        $post->title = $request->email;
        $post->title = $request->address;
        $post->is_active = $request->address;
        $post->save();
        return $post;
    }
}
