<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $descripcion;
    public $empresa;
    public $salario;
    public $categoria;
    public $ultimo_dia;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules=[
        'titulo'=>'required|string',
        'descripcion'=>'required',
        'empresa'=>'required',
        'salario'=>'required',
        'categoria'=>'required',
        'ultimo_dia'=>'required',
        'imagen_nueva'=>'nullable|image|max:2048'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->descripcion = $vacante->descripcion;
        $this->empresa = $vacante->empresa;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        if($this->imagen_nueva)
        {
            $ruta_imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $ruta_imagen);
        }

        $vacante = Vacante::find($this->vacante_id);

        $vacante->titulo = $datos['titulo'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->empresa = $datos['empresa'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        $vacante->save();

        session()->flash('mensaje', 'Vacante modificada correctamente');

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios=Salario::all();
        $categorias=Categoria::all();

        return view('livewire.editar-vacante', ['salarios'=>$salarios, 'categorias'=>$categorias]);
    }
}
