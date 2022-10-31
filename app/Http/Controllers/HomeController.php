<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    const CATEGORIES = [
        null => 'Choose category...',
        'music' => 'Music',
        'art' => 'Art',
        'literature' => 'Literature'
    ];
    const VALIDATE_RULE = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'bday' => 'required|date',
        'gender' => 'required|string',
        'email' => 'required|string|email|max:255',
    ];
    const VALIDATE_RULE_EXPERT = [
        'nationality' => 'required|string|max:255',
        'phone_number' => 'required|numeric|max:12',
        'category' => 'required',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $data['posts'] = Post::where('user_id', $id)->paginate(10);
        return view('posts.index', $data);
    }

    public function adminPanel()
    {
        $data['users'] = User::paginate(10);
        return view('users.index', $data);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user->hasRole('expert')) {
            $user->nationality = DB::table('experts')->where('user_id', $id)->value('nationality');
            $user->phone = DB::table('experts')->where('user_id', $id)->value('phone_number');
            $user->category = DB::table('experts')->where('user_id', $id)->value('category');
        }
        return view('users.show', ['user' => $user, 'categories' => self::CATEGORIES]);
    }

    public function getPosts($id)
    {
        $data['posts'] = Post::where('user_id', $id)->paginate(10);
        return view('posts.index', $data);
    }

    public function save(Request $request, $id)
    {
        if (Auth::user() && (Auth::user()->hasPermission('edit_expert_profile') || Auth::user()->hasPermission('edit_author_profile') || Auth::user()->hasPermission('edit_admin_profile'))) {
            $user = User::find($id);
            $request->validate(self::VALIDATE_RULE);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->bday = $request->bday;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->save();
            if ($user->hasRole('expert') && Auth::user() && Auth::user()->hasPermission('edit_expert_profile')) {
                $request->validate(self::VALIDATE_RULE_EXPERT);
                $nationality = $request->nationality;
                $phone = $request->phone;
                if (Auth::user() && Auth::user()->hasPermission('change_category_expert')) {
                    $cat = $request->category;
                } else {
                    $user->category = DB::table('experts')->where('user_id', $id)->value('category');
                    $cat = $user->category;
                }

                $request->validate(self::VALIDATE_RULE_EXPERT);
                DB::table('experts')->where('user_id', $id)->update([
                    'nationality' => $nationality,
                    'phone_number' => $phone,
                    'category' => $cat,
                ]);
            }
            return redirect()->route('posts.index')->with('successMsg', 'User has been created successfully');
        } else {
            return redirect()->route('posts.index')->with('fail', 'You dont have permission');
        }
    }

    public function create()
    {
        return view('users.create', ['categories' => self::CATEGORIES]);
    }

    public function store(Request $request)
    {
        if (Auth::user() && (Auth::user()->hasPermission('add_expert'))) {
            $request->validate(self::VALIDATE_RULE);
            $request->validate(self::VALIDATE_RULE_EXPERT);
            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->bday = $request->bday;
            $user->gender = $request->gender;
            $user->email = $request->email;
            $user->save();
            $nationality = $request->nationality;
            $phone = $request->phone;
            $cat = $request->category;

            $request->validate(self::VALIDATE_RULE_EXPERT);
            DB::table('experts')->insert([
                'user_id' => $user->id,
                'nationality' => $nationality,
                'phone_number' => $phone,
                'category' => $cat,
            ]);
            return redirect()->route('posts.index')->with('successMsg', 'User has been created successfully');
        } else {
            return redirect()->route('posts.index')->with('fail', 'You dont have permission');
        }
    }
}
