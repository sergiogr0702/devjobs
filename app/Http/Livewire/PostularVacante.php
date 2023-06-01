<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf|max:2048'
    ];

    public function mount($vacante) 
    {
        $this->vacante = $vacante;
    }

    public function postular()
    {
        $datos = $this->validate();

        $ruta_cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $ruta_cv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        session()->flash('mensaje', 'Tu información se envió correctamente');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
