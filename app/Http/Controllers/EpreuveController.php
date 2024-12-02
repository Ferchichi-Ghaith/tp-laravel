<?php
namespace App\Http\Controllers;

use App\Models\Epreuve;
use App\Models\Matiere;
use Illuminate\Http\Request;

class EpreuveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $epreuves = Epreuve::all();
        $matieres = Matiere::all();

        // Correct the compact variables to match what you're passing
        return view('Epreuve.epreuve', compact('epreuves', 'matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all matieres for the create form
        $matieres = Matiere::all();
        return view('Epreuve.create', compact('matieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time_begin' => 'required|date_format:H:i|before:time_end', // Ensure time_begin is before time_end
            'time_end' => 'required|date_format:H:i|after:time_begin',  // Ensure time_end is after time_begin
            'classroom' => 'required|string|max:255',
            'type' => 'required|string|max:255', // Type is required for the store method
            'matiere_id' => 'required|exists:matieres,id', // Assuming 'matieres' table exists
        ]);

        // Store the Epreuve
        Epreuve::create($validated);

        return redirect()->route('epreuve.index')->with('success', 'Épreuve créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Epreuve $epreuve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Epreuve $epreuve)
    {
        // Fetch all matieres for the edit form
        $matieres = Matiere::all();
        return view('Epreuve.edit', compact('epreuve', 'matieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Epreuve $epreuve)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'date' => 'required|date',
            'time_begin' => 'required|date_format:H:i|before:time_end', // Ensure time_begin is before time_end
            'time_end' => 'required|date_format:H:i|after:time_begin',  // Ensure time_end is after time_begin
            'classroom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        // Update the Epreuve model with the validated data
        $epreuve->update($validated);

        // Redirect back to the index with a success message
        return redirect()->route('epreuve.index')->with('success', 'Épreuve mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Epreuve $epreuve)
    {
        $epreuve->delete();
        return redirect()->route('epreuve.index')->with('success', 'Épreuve supprimée avec succès.');
    }
}
