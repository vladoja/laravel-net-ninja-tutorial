<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;
use App\Models\Dojo;

class NinjaController extends Controller
{
    public function index()
    {
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);
        // N+1 Problem avoided with eager loading
        // $ninjas = Ninja::orderBy('created_at', 'desc')->paginate(10);
        return view('ninjas.index', [ "greeting" => "Hello Ninjas!", "ninjas" => $ninjas]);
    }

    public function show($id)
    {
        $ninja = Ninja::findOrFail($id);
        return view('ninjas.show', ['ninja' => $ninja]);
    }

    public function create()
    {
        $dojos = Dojo::all();
        return view('ninjas.create', ['dojos' => $dojos]);
    }
}
