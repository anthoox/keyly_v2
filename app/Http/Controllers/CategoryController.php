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

    public function destroy($id)
    {
        // Buscamos por ID pero FORZAMOS que el user_id coincida con el usuario logueado
        $category = Category::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        // Si no existe o no es suya, $category será null
        if (!$category) {
            return redirect()->route('categories')->with('error', 'No tienes permiso para eliminar esta categoría.');
        }

        $category->delete();

        return redirect()->route('categories')->with('success', 'Categoría eliminada con éxito.');
    
    }   

    public function index()
    {
        $categories = Category::where('user_id', Auth::id())
            ->withCount('credentials') 
            ->get();

        return view('categories', compact('categories'));
    }
}
