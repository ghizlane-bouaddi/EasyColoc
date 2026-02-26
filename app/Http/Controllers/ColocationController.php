<?php

namespace App\Http\Controllers;


use App\Models\Colocation;

use Illuminate\Http\Request;




class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $colocation = $user->ownedColocation;


        $colocation = Colocation::all();
        return view('indexColoction', compact('colocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         return view('createColocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:20',
    ]);

    $colocation = Colocation::create([
        'name' => $request->name,
        'status' => 'active', // default
        'owner_id' => auth()->id(),
    ]);

    return redirect()->route('colocations.index')
                     ->with('success', 'Colocation créée avec succès !');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coloc = Colocation::FiNdOrFail($id);
        return view('showColoction', compact('coloc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
