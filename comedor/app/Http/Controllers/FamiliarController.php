<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('familiares.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Familiar $familiar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familiar $familiar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familiar $familiar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familiar $familiar)
    {
        //
    }
}
