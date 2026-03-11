<?php

namespace App\Http\Controllers;

use App\Models\InwardOutward;
use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class InwardOutwardController extends Controller
{

    // show form
    public function create()
    {
        $categories = Category::all();

        return view('inward.create',compact('categories'));
    }

    // store transaction
    public function store(Request $request)
    {

        $request->validate([
            'material_id' => 'required',
            'date' => 'required|date',
            'quantity' => 'required|numeric'
        ]);

        InwardOutward::create([
            'material_id' => $request->material_id,
            'date' => $request->date,
            'quantity' => $request->quantity
        ]);

        return redirect()->back()
        ->with('success','Transaction saved');
    }

}