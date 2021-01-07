<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lits → Ajout') }}
            <a href="{{ route('create_lit') }}" class="btn btn-primary float-right"> + Lit</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="container-fluid col-md-6 my-5">
                    <form action="{{route('update.lit', $lit->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group mb-3">
                        <label for="formGroupExampleInput">Numero du Lit</label>
                        <input type="text" name="libelle" class="form-control" id="libelle" placeholder="Example input" name="libelle" value="{{ $lit->libelle }}" disabled>
                      </div>
                      <div class="form-group mb-3">
                        <input value="{{ Auth::user()->hopital->id }}" type="hidden" name="hopital_id" class="form-control" id="hopital_id" placeholder="Example input" name="hopital_id">
                      </div>
                        <hr>
                        <b>Statut du lit</b>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="est_ocuppe" id="gridRadios1" value="1" {{ $lit->libelle }} == 1 ?? checked>
                        <label class="form-check-label" for="gridRadios1">
                          Occupé
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="est_ocuppe" id="gridRadios2" value="2" {{ $lit->est_ocuppe }} == 2 ?? checked>
                        <label class="form-check-label" for="gridRadios2">
                          Libre
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                    </form>
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>