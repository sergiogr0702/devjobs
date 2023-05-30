<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $imagen;
    public $descripcion;
    public $empresa;
    public $salario;
    public $categoria;
    public $ultimo_dia;

    use WithFileUploads;

    protected $rules=[
        'titulo'=>'required|string',
        'imagen'=>'required|image|max:2048',
        'descripcion'=>'required',
        'empresa'=>'required',
        'salario'=>'required',
        'categoria'=>'required',
        'ultimo_dia'=>'required'
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        $ruta_imagen = $this->imagen->store('public/vacantes');
        $datos['imagen'] = str_replace('public/vacantes/', '', $ruta_imagen);

        Vacante::create([
            'titulo'=>$datos['titulo'],
            'imagen'=>$datos['imagen'],
            'descripcion'=>$datos['descripcion'],
            'empresa'=>$datos['empresa'],
            'salario_id'=>$datos['salario'],
            'categoria_id'=>$datos['categoria'],
            'ultimo_dia'=>$datos['ultimo_dia'],
            'user_id'=>auth()->user()->id,
        ]);

        session()->flash('mensaje', 'Vacante creada correctamente');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios=Salario::all();
        $categorias=Categoria::all();

        return view('livewire.crear-vacante', ['salarios'=>$salarios, 'categorias'=>$categorias]);
    }
}
