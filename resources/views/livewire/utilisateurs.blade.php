<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Utilisateurs') }}

          <a href="{{ route('user.create') }}" class="btn btn-primary float-right"> + Utilisateur</a>
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">name</th>
                      <th scope="col">email</th>
                      <th scope="col">hopital</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user) 
                    <tr>
                      <th scope="row">{{ $user->name }}</th>
                      <th scope="row">{{ $user->email }}</th>
                      <th scope="row">{{ optional($user->hopital)->libelle }}</th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
      </div>
  </div>
</x-app-layout>