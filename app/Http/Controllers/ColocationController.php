<?php

namespace App\Http\Controllers;


use App\Models\Colocation;

use Illuminate\Http\Request;




class ColocationController extends Controller
{

 public function index()
{
    $user = auth()->user();

    $owned = Colocation::where('owner_id', $user->id)->get();
    $member = $user->colocations;

    $colocation = $owned->merge($member);
    // dd($colocation);
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
        'status' => 'active',
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
    $colocation = Colocation::with(['members','categories','expenses','owner','expenses.payer'])->findOrFail($id);

    $user = auth()->user();

    if ($user->role !== 'admin' && $colocation->owner_id !== $user->id && !$colocation->members->contains($user->id)) {
        abort(403);
    }

    return view('showColoction', compact('colocation'));
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
