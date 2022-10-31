<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    const CATEGORIES = [
        null => 'Choose category...',
        'music' => 'Music',
        'art' => 'Art',
        'literature' => 'Literature'
    ];
    const VALIDATION_RULE = [
        'title' => 'required',
        'file' => 'required|mimetypes:application/pdf,image/jpeg,image/png,audio/mpeg'
    ];

    public function index()
    {
        $data['posts'] = Post::paginate(10);
        return view('posts.index', $data);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', ['categories' => self::CATEGORIES]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [compact($post), 'categories' => self::CATEGORIES]);
    }

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_post')) {
            $request->validate(self::VALIDATION_RULE);
            $post = new Post();

            $rootPath = '';
            if ($request->category == 'music')
                $rootPath = 'sounds/' . Auth::user()->id;
            elseif ($request->category == 'art')
                $rootPath = 'images/' . Auth::user()->id;
            elseif ($request->category == 'literature')
                $rootPath = 'files/' . Auth::user()->id;
            if ($request->file('file') != null) {
                $post->pathFile = ($request->file)->store($rootPath);
            }

            $post->title = $request->title;
            $post->category = $request->category;
            $post->user_id = Auth::user()->id;
            $post->save();
            return redirect()->route('posts.index')->with('successMsg', 'Post has been created successfully');
        } else {
            return redirect()->route('posts.index')->with('fail', 'You dont have permission');
        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::user() && Auth::user()->id == $post->user_id) {
            $request->validate(self::VALIDATION_RULE);

            $rootPath = '';
            if ($request->file != null) {
                if ($request->category == 'music')
                    $rootPath = 'sounds/' . Auth::user()->id;
                elseif ($request->category == 'art')
                    $rootPath = 'images/' . Auth::user()->id;
                elseif ($request->category == 'literature')
                    $rootPath = 'files/' . Auth::user()->id;
                if ($request->file('file') != null) {
                    $post->pathFile = ($request->file)->store($rootPath);
                }
            }

            $post->title = $request->title;
            $post->category = $request->category;
            $post->save();
            return redirect()->route('posts.index')->with('successMsg', 'Post has been edited successfully');
        } else {
            return redirect()->route('posts.index')->with('fail', 'You dont have permission');
        }
    }
}
