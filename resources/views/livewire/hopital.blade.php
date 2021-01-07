<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hôpitaux') }}

            <a href="{{ route('create_hopital') }}" class="btn btn-primary float-right"> + Hopital</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">N° de l'hopital</th>
                        <th scope="col">Libellé</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($hopitals as $hop) 
                      <tr>
                        <th scope="row">{{ $hop->id }}</th>
                        <td>{{ $hop->libelle }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>