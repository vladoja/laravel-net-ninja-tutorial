<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dojo;

class DojoController extends Controller
{
    //
    public function index()
    {
        $dojos = Dojo::paginate(10);
        return view('dojos.index', compact('dojos'));
    }

    public function show($id)
    {
        $dojo = Dojo::findOrFail($id);
        return view('dojos.show', compact('dojo'));
    }
}
