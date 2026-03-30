<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories')->with('success', 'Categoría creada exitosamente.');
    }
    public function index()
    {
        $categories = Category::where('user_id', Auth::id())
            ->withCount('credentials') 
            ->get();

        return view('categories', compact('categories'));
    }
}
