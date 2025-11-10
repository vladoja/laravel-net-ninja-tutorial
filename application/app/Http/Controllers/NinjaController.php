<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;

class NinjaController extends Controller
{
    public function index()
    {
        $ninjas = Ninja::orderBy('created_at', 'desc')->get();
        return view('ninjas.index', [ "greeting" => "Hello Ninjas!", "ninjas" => $ninjas]);
    }

    public function show($id)
    {
        return view('ninja.show', ['id' => $id]);
    }
}
