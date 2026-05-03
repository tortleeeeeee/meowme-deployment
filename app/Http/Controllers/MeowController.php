<?php

namespace App\Http\Controllers;

use App\Models\Meow;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class MeowController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meows = Meow::with('user')
        ->latest()
        ->take(50)  // Limit to 50 most recent chirps
        ->get();
        return view('meows', ['meows'=>$meows]);
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
        $validated = $request->validate([
        'meowpost' => 'required|string|max:255',
        ]);
    
        auth()->user()->meow()->create($validated);

        // Redirect back to the feed
        return redirect('/')->with('success', 'Purr!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meow $meow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meow $meow)
    {
        $this->authorize('update', $meow);

        return view('meows.editMeow', compact('meow'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meow $meow)
    {
        $this->authorize('update', $meow);

        // Validate the request
        $validated = $request->validate([
        'meowpost' => 'required|string|max:255',
        ]);

        //Update meow
        $meow->update($validated);

        return redirect('/')->with('success', 'It\'s meowdated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meow $meow)
    {
        $this->authorize('delete', $meow);

        $meow->delete();

        return redirect('/')->with('success', 'It\'s deleted!');
    }
}
