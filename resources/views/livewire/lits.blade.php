<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lits') }}

            @if(!Auth::user()->est_admin)
            <a href="{{ route('create_lit') }}" class="btn btn-primary float-right"> + Lit</a>
            @endif
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Hopital</th>
                        <th scope="col">Etat</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($lits as $lit) 
                      <tr>
                        <th scope="row">{{ $lit->libelle }}</th>
                        <td>{{ $lit->hopital->libelle }}</td>
                        <td>
                          @if($lit->est_ocuppe == 1)
                          <form action="{{route('update.lit', $lit->id)}}" method="POST">
                            @csrf
                            @method('PUT')        
                          <button type="submit" class="btn btn-primary">Occupé</button>
                          </form>
                        @else
                        <form action="{{route('update.lit', $lit->id)}}" method="POST">
                          @csrf
                          @method('PUT')        
                          <button type="submit" class="btn btn-success">Libre</button> 
                        </form>      
                        @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>