<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postular para esta vacante</h3>

    @if (session('mensaje'))
        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postular'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum')" />
                <x-text-input 
                            id="cv" 
                            name="cv"
                            class="block mt-1 w-full" 
                            type="file"
                            accept=".pdf" 
                            wire:model="cv"
                />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Postular') }}
            </x-primary-button>
        </form>    
    @endif
</div>
