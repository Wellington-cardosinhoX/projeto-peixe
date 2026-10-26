<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;
use App\Models\Type;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fish = Fish::with('type')->get();
        $types = Type::all();

        return view('dashboard', compact('fish', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate(['name' => 'required|string|max:255', 'color' => 'required|string|max:255', 'type_id' => 'required|exists:types,id']);

        Fish::create($dados);

        return redirect()->to(route('dashboard') . '#peixes')->with('success', 'Peixes salvos');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Fish $fish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fish $fish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fish $fish)
    {
        $dadosAtualizados = $request->validate(['name' => 'required|string|max:255', 'color' => 'required|string|max:255', 'type_id' => 'required|exists:types,id']);
        $fish->update($dadosAtualizados);

        return redirect()->to(route('dashboard'))->with('success', 'Peixe atualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fish $fish)
    {
        $fish->delete();

        return redirect('/dashboard')->with('success', 'Chirp deleted!');
    }
}
