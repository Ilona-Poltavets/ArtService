<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        if (Auth::user() && Auth::user()->hasRole('expert')) {
            $data = Post::where('category', Auth::user()->expertData->category)->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $data = Post::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('posts.index', ['posts' => $data, 'categories' => self::CATEGORIES]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    public function create()
    {
        $lastPost = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if (!$lastPost == null) {
            $timePost = $lastPost->created_at;
            $now = new DateTime('now');
            $time = (24 * 60) * 60;
            $interval = $now->getTimestamp() - $timePost->getTimestamp();
            if ($interval > $time) {
                return view('posts.create', ['categories' => self::CATEGORIES]);
            } else {
                return redirect()->route('posts.index')->withErrors(['You dont have permission'])->withInput();
            }
        } else {
            return view('posts.create', ['categories' => self::CATEGORIES]);
        }
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post, 'categories' => self::CATEGORIES]);
    }

    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->hasPermission('add_post')) {
            $validator = Validator::make($request->all(), self::VALIDATION_RULE);
            if ($validator->fails()) {
                return redirect('post/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            $post = new Post();
            save($post,$request);

            return redirect()->route('posts.index')->with('Post has been created successfully');
        } else {
            return redirect()->route('posts.index')->withErrors(['You dont have permission'])->withInput();
        }
    }

    public function save($post, $postRequest)
    {
        $rootPath = '';
        
        if ($postRequest->category == 'music')
            $rootPath = 'sounds/' . Auth::user()->id;
        elseif ($postRequest->category == 'art')
            $rootPath = 'images/' . Auth::user()->id;
        elseif ($postRequest->category == 'literature')
            $rootPath = 'files/' . Auth::user()->id;
        if ($postRequest->file('file') != null) {
            $post->pathFile = ($postRequest->file)->store($rootPath);
        }

        $post->title = $postRequest->title;
        $post->category = $postRequest->category;
        $post->user_id = Auth::user()->id;
        $post->save();
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::user() && Auth::user()->id == $post->user_id) {
            $validator = Validator::make($request->all(), self::VALIDATION_RULE);
            if ($validator->fails()) {
                return redirect('post/create')
                    ->withErrors($validator);
            }

            save($post,$request);

            // $rootPath = '';
            // if ($request->file != null) {
            //     if ($request->category == 'music')
            //         $rootPath = 'sounds/' . Auth::user()->id;
            //     elseif ($request->category == 'art')
            //         $rootPath = 'images/' . Auth::user()->id;
            //     elseif ($request->category == 'literature')
            //         $rootPath = 'files/' . Auth::user()->id;
            //     if ($request->file('file') != null) {
            //         $post->pathFile = ($request->file)->store($rootPath);
            //     }
            // }

            // $post->title = $request->title;
            // $post->category = $request->category;
            // $post->save();
            return redirect()->route('posts.index')->with('status', 'Post has been edited successfully');
        } else {
            return redirect()->route('posts.index')->withErrors(['You dont have permission'])->withInput();
        }
    }
}