<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function searchByAuthor(Request $request)
    {
        $text_input = $request->input('text_input');
        if ($text_input != '') {
            $users = User::where('name', 'like', "%{$text_input}%")->pluck('id');
            $usersId = str_replace('"', '', trim($users, '[]'));
            if($usersId!='')
                $posts = Post::whereRaw('user_id IN (' . $usersId . ')')->get();
            else
                $posts = [];
        } else {
            $posts = Post::get();
        }
        $expertCat = Auth::user()->expertData == null ? null : Auth::user()->expertData->category;
        return response()->json(array(
            'posts' => $posts,
            'user' => Auth::user(),
            'expert' => $expertCat,
            'can_rate' => Auth::user()->hasPermission('can_rate')));
    }

    public function sortBy(Request $request)
    {
        $sort = $request->sort;
        $cat = $request->category;
        $order = 'desc';
        $column = 'created_at';

        if ($sort == 'low_to_high') {
            $order = 'asc';
            $column = 'rating';
        } elseif ($sort == 'old_to_new') {
            $order = 'asc';
            $column = 'created_at';
        } elseif ($sort == 'high_to_low') {
            $order = 'desc';
            $column = 'rating';
        } else {
            $order = 'desc';
            $column = 'created_at';
        }

        $posts = DB::table('posts')->where(function ($data) use ($cat) {
            if ($cat != null || $cat != '') {
                $data->whereRaw("category='" . $cat . "'");
            }
        })->orderBy($column, $order)->get();

        $expertCat = Auth::user()->expertData == null ? null : Auth::user()->expertData->category;
        return response()->json(array(
            'posts' => $posts,
            'user' => Auth::user(),
            'expert' => $expertCat,
            'can_rate' => Auth::user()->hasPermission('can_rate')));
    }

}
