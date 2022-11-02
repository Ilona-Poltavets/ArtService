<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store(Request $request){
        $comment=new Comment();
        $comment->user_id=$request->user_id;
        $comment->post_id=$request->post_id;
        $comment->text=$request->text_input;
        $comment->save();

        $comments=Comment::where('post_id',$request->post_id)->get();
        foreach ($comments as $item){
            $item->user_name=$item->user->name;
            $item->user_surname=$item->user->surname;
        }
        $answers=Answer::where('post_id',$request->post_id)->get();
        return response()->json(array('comments'=>$comments,'answers'=>$answers));
    }
    function answer(Request $request){
        $comment=new Answer();
        $comment->user_id=$request->user_id;
        $comment->post_id=$request->post_id;
        $comment->comment_id=$request->comment_id;
        $comment->text=$request->text_input;
        $comment->save();

        $comments=Comment::where('post_id',$request->post_id)->get();
        foreach ($comments as $item){
            $item->user_name=$item->user->name;
            $item->user_surname=$item->user->surname;
        }
        $answers=Answer::where('post_id',$request->post_id)->get();
        foreach ($answers as $item){
            $item->user_name=$item->user->name;
            $item->user_surname=$item->user->surname;
        }
        return response()->json(array('comments'=>$comments,'answers'=>$answers));
    }
}
