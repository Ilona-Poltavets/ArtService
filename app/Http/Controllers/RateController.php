<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    const VALIDATION_RULE = [
        'complexityRadio' => 'required',
        'creativityRadio' => 'required',
        'innovativenessRadio' => 'required',
        'review' => 'required',
    ];

    function index()
    {

    }

    function create($id)
    {
        return view('rates.create', ['postId' => $id]);
    }

    function edit($id, $postId)
    {
        $rate = Rate::find($id);
        return view('rates.edit', ['rate' => $rate, 'postId' => $postId]);
    }

    function update(Request $request, $id, $postId)
    {
        if (Auth::user() && Auth::user()->hasPermission('can_rate')) {
            $request->validate(self::VALIDATION_RULE);
            $rate = Rate::find($id);
            $post = Post::find($postId);
            $rate->user_id = Auth::user()->id;
            $rate->post_id = $id;
            $rate->mark_complexity = (int)$request->complexityRadio;
            $rate->mark_creativity = (int)$request->creativityRadio;
            $rate->mark_innovativeness = (int)$request->innovativenessRadio;
            $rate->review = $request->review;

            $arr = DB::table('rates')->where('post_id', $id)->get()->toArray();
            if (count($arr) == 0) {
                $avr_comp = (float)$request->complexityRadio;
                $avr_creativ = (float)$request->creativityRadio;
                $avr_innovat = (float)$request->innovativenessRadio;
            } else {
                $avr_comp = 0;
                $avr_creativ = 0;
                $avr_innovat = 0;
                foreach ($arr as $item) {
                    $avr_comp += $item->mark_complexity;
                    $avr_creativ += $item->mark_creativity;
                    $avr_innovat += $item->mark_innovativeness;
                }
                $avr_comp /= count($arr) + 1;
                $avr_creativ /= count($arr) + 1;
                $avr_innovat /= count($arr) + 1;
            }
            $post->avr_mark_complexity = $avr_comp;
            $post->avr_mark_creativity = $avr_creativ;
            $post->avr_mark_innovativeness = $avr_innovat;
            $post->rating=($avr_comp+$avr_creativ+$avr_innovat)/3;
            $post->save();

            $rate->save();
            return redirect()->route('posts.index')->with('success', 'Rate has been added');
        } else {
            return redirect()->route('posts.index')->withErrors(['You dont have permission'])->withInput();
        }
    }

    function store(Request $request, $id)
    {
        if (Auth::user() && Auth::user()->hasPermission('can_rate')) {
            $request->validate(self::VALIDATION_RULE);
            $rate = new Rate();
            $post = Post::find($id);
            $rate->user_id = Auth::user()->id;
            $rate->post_id = $id;
            $rate->mark_complexity = (int)$request->complexityRadio;
            $rate->mark_creativity = (int)$request->creativityRadio;
            $rate->mark_innovativeness = (int)$request->innovativenessRadio;
            $rate->review = $request->review;

            $arr = DB::table('rates')->where('post_id', $id)->get()->toArray();
            if (count($arr) == 0) {
                $avr_comp = (float)$request->complexityRadio;
                $avr_creativ = (float)$request->creativityRadio;
                $avr_innovat = (float)$request->innovativenessRadio;
            } else {
                $avr_comp = 0;
                $avr_creativ = 0;
                $avr_innovat = 0;
                foreach ($arr as $item) {
                    $avr_comp += $item->mark_complexity;
                    $avr_creativ += $item->mark_creativity;
                    $avr_innovat += $item->mark_innovativeness;
                }
                $avr_comp /= count($arr) + 1;
                $avr_creativ /= count($arr) + 1;
                $avr_innovat /= count($arr) + 1;
            }
            $post->avr_mark_complexity = $avr_comp;
            $post->avr_mark_creativity = $avr_creativ;
            $post->avr_mark_innovativeness = $avr_innovat;
            $post->rating=($avr_comp+$avr_creativ+$avr_innovat)/3;
            $post->save();

            $rate->save();
            return redirect()->route('posts.index')->with('success', 'Rate has been added');
        } else {
            return redirect()->route('posts.index')->withErrors(['You dont have permission'])->withInput();
        }
    }
}
