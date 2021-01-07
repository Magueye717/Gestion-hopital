<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur → Ajout') }}
        </h2>
    </x-slot>
    <div class=" container-fluid">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="container-fluid col-md-6 my-5">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="formGroupExampleInput">Nom</label>
                          <input type="text" name="name" class="form-control" id="name" placeholder="Le nom de l'utilisateur" name="Nom de l\'utilisateur">
                        </div>
                        <div class="form-group mb-3">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="email" email="Nom de l\'utilisateur">
                        </div>
                        <div class="form-group mb-3">
                            <select class="custom-select" name="hopital_id" id="hopital_id">
                                <option selected>Choisir hopital</option>
                                @foreach(App\Models\Hopital::all() as $hopital)
                                <option value="{{ $hopital->id }}">{{ $hopital->libelle }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="formGroupExampleInput">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password" email="Nom de l\'utilisateur">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Enregistrer</button>
                      </form>
                   </div>
            </div>
        </div>
    </div>
</x-app-layout>