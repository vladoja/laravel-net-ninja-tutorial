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
        return view('ninjas.index', ["greeting" => "Hello Ninjas!", "ninjas" => $ninjas]);
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:1000',
            'dojo_id' => 'required|exists:dojos,id',
        ]);

        // $ninja = new Ninja();
        // $ninja->name = $validated['name'];
        // $ninja->skill = $validated['skill'];
        // $ninja->bio = $validated['bio'];
        // $ninja->dojo_id = $validated['dojo_id'];
        // $ninja->save();
        Ninja::create($validated);

        return redirect()->route('ninjas.index')->with('success', 'Ninja created successfully!');
    }
}
