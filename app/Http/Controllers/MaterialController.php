<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{

    // display materials
    public function index()
    {
        // dd(Auth::user());
        $materials = Material::with('category')->get();

        return view('materials.index', compact('materials'));
    }

    // create form
    public function create()
    {
        $categories = Category::all();

        return view('materials.create', compact('categories'));
    }

    // store material
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'opening_balance' => 'required|numeric'
        ]);

        Material::create($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material created successfully');
    }

    // edit form
    public function edit(Material $material)
    {
        $categories = Category::all();

        return view(
            'materials.edit',
            compact('material', 'categories')
        );
    }

    // update material
    public function update(Request $request, Material $material)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'opening_balance' => 'required|numeric'
        ]);

        $material->update($request->all());

        return redirect()->route('materials.index')
            ->with('success', 'Material updated successfully');
    }

    // soft delete material
    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')
            ->with('success', 'Material deleted successfully');
    }

    public function getMaterials($category)
    {
        return \App\Models\Material::where(
            'category_id',
            $category
        )->get();
    }
}
