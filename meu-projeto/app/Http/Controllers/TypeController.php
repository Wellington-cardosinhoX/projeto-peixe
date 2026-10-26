<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::withCount('fish')->orderBy('name')->get();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $request->merge(['name' => mb_strtolower(trim($data['name']))]);
        $data = $request->validate(['name' => 'required|string|unique:types|max:255']);
        Type::create($data);
        return redirect()->route('types.index')->with('success', 'Tipo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $type->load('fish'); // Carrega os peixes relacionados
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $request->merge(['name' => mb_strtolower(trim($data['name']))]);
        $data = $request->validate(['name' => ['required', 'string', 'max:255', Rule::unique('types')->ignore($type)]]);
        $type->update($data);
        return redirect()->route('types.index')->with('success', 'Tipo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if ($type->fish()->exists()) {
            return redirect()->route('types.index')->with('error', 'Esta categoria possui peixes. Altere a categoria desses peixes antes de excluir.');
        }

        $type->delete();
        return redirect()->route('types.index')->with('success', 'Tipo excluído com sucesso!');
    }
}
