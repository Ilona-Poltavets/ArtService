<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    function index()
    {
        $data["arts"] = Art::paginate(10);;
        return view('arts.index', $data);
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
