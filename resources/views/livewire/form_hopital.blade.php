<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hôpital → Ajout') }}

            <a href="{{ route('create_lit') }}" class="btn btn-primary float-right"> + Lit</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="container-fluid col-md-6 my-5">
                    <form action="{{ route('store.hopital') }}" method="POST">
                      @csrf
                      <div class="form-group mb-3">
                        <label for="formGroupExampleInput">Nom de l'hôpital</label>
                        <input type="text" name="libelle" class="form-control" id="libelle" placeholder="Hopital FAN" name="libelle">
                      </div>
                      <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                    </form>
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>