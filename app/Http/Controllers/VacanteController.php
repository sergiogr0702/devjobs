<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        if(auth()->user()->id != 2)
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');
        
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->id != 2)
            abort(403, 'THIS ACTION IS UNAUTHORIZED.');

        return view('vacantes.create');
    }

    /**
     * Shows the details of the resource.
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', ['vacante' => $vacante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('update', $vacante);

        return view('vacantes.edit', ['vacante' => $vacante]);
    }
}
