<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidatoController extends Controller
{
    public function index(Vacante $vacante)
    {
        return view('candidatos.index', ['vacante' => $vacante]);
    }
}
