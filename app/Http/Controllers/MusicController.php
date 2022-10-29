<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    function index()
    {
        $data["music"] = Music::paginate(10);
        return view('music.index', $data);
    }

    function create()
    {

    }

    function edit()
    {

    }

    function update()
    {

    }

    function store()
    {

    }
}
