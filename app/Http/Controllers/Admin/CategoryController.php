<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

// use function Pest\Laravel\session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($data);

        $request -> session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Categoria creada!',
            'text' => 'La categoria se ha creado correctamente',
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $catName = $category->name;
        return view('admin.categories.edit', compact('category', 'catName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' =>'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($data);

        $request -> session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Categoria actualizada!',
            'text' => 'La categoria se ha actualizado correctamente',
        ]);

        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('swal', [
                'icon'  => 'success',
                'title' => '¡Categoria eliminada!',
                'text'  => 'La categoria se ha eliminado correctamente',
            ]);

        return redirect()
            ->route('admin.categories.index');
    }
}
