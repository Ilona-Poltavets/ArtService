<?php

namespace App\Http\Controllers;

use App\Models\Literature;
use Illuminate\Http\Request;

class LiteratureController extends Controller
{
    function index()
    {
        $data["literatures"] = Literature::paginate(10);
        return view('literatures.index', $data);
    }

    function show($id)
    {
        $lit=Literature::find($id);
        return view('literatures.show', compact('lit'));
    }

    function create()
    {
        return view("literatures.create");
    }

    function edit($id)
    {
        $lit=Literature::find($id);
        return view('literatures.edit',compact('lit'));
    }

    function update(Request $request)
    {

    }

    function store(Request $request)
    {

    }
}
