<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Visualizzazione Lista Viaggi
     */
    public function index()
    {
        $trips = Trip::all();
        return view('admin.trips.index', compact('trips'));
    }

    /**
     * Visualizzazione di un singolo viaggio con relativi dettagli
     */
    public function show($id)
    {
        $trip = Trip::with('days.stops.images', 'days.stops.ratings')->findOrFail($id);
        return view('admin.trips.show', compact('trip'));
    }

    /**
     * Visualizzazione Form per la creazione di un nuovo Viaggio
     */
    public function create()
    {
        return view('admin.trips.create');
    }

    /**
     * Salvataggio di un nuovo viaggio nel database
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Aggiunta dell'ID dell'utente autenticato
        $validatedData['user_id'] = auth()->id();

        // Gestione del caricamento immagine
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('trip_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Creazione del Viaggio
        $trip = Trip::create($validatedData);

        // redirect alla pagina di Index
        return redirect()->route('admin.trips.index')->with('success', 'Viaggio creato correttamente');
    }

    /**
     * Visualizzazione del form per modificare un viaggio esistente
     */
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        return view('admin.trips.edit', compact('trip'));
    }

    /**
     * Aggiornamento dei dati di un viaggio esistente
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update($validatedData);

        return redirect()->route('admin.trips.show', $trip->id)->with('success', 'Viaggio aggiornato correttamente');
    }

    /**
     * Eliminazione di un Viaggio dal Database
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('admin.trips.index')->with('success', 'Viaggio eliminato correttamente');
    }
}
