<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante)
        <div class="p-6 border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="#" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{ $vacante->empresa }}
                </p>
                <p class="text-sm text-gray-500">
                    Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                </p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-4 md:mt-0">
                <a href="#" class="bg-slate-700 py-2 px-4 text-white text-sx font-bold uppercase rounded-lg text-center hover:bg-slate-900">
                    Candidatos
                </a>

                <a href="{{ route('vacantes.edit', $vacante) }}" class="bg-blue-700 py-2 px-4 text-white text-sx font-bold uppercase rounded-lg text-center hover:bg-blue-900">
                    Editar
                </a>

                <a href="#" class="bg-red-600 py-2 px-4 text-white text-sx font-bold uppercase rounded-lg text-center hover:bg-red-800">
                    Eliminar
                </a>
            </div>
        </div>
    @empty
        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes creadas</p>
    @endforelse

</div>

<div class="mt-10">
    {{ $vacantes->links() }}
</div>