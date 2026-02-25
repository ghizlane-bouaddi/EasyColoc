<?php

namespace App\Http\Controllers;

use App\Models\Colocation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $coloc = Colocation::create([
        'name' => $request->name,
        'owner_id' => auth()->id(), // L-user lli m-connecti howa l-owner
        'status' => 'active'
    ]);

    $coloc->users()->attach(auth()->id(), ['role' => 'owner']);

    return redirect()->route('dashboard')->with('success', 'Colocation créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
