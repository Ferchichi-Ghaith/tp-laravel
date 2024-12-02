<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::all(); // Fetch all matieres
        return view('Matiere.matiere', compact('matieres')); // Pass to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Matiere.create'); // Show form to create a new matiere
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Create a new matiere
        Matiere::create($validated);

        // Redirect to index with a success message
        return redirect()->route('matiere.index')->with('success', 'Matiere created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        return view('matiere.show', compact('matiere')); // Show details of a matiere
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        return view('Matiere.edit', compact('matiere')); // Show edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Update the matiere
        $matiere->update($validated);

        // Redirect to index with a success message
        return redirect()->route('matiere.index')->with('success', 'Matiere updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete(); // Delete the matiere

        // Redirect to index with a success message
        return redirect()->route('matiere.index')->with('success', 'Matiere deleted successfully.');
    }
}
