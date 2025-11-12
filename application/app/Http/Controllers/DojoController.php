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
        $dojo = Dojo::with('ninjas')->findOrFail($id);
        $ninjas_count = $dojo->ninjas->count();
        return view('dojos.show', compact('dojo', 'ninjas_count'));
    }

    public function destroy($id)
    {
        $dojo = Dojo::findOrFail($id);
        $dojo->delete();

        return redirect()->route('dojos.index')->with('success', 'Dojo deleted successfully!');
    }
}
