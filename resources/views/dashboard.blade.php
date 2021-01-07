<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    @if(Auth::user()->est_admin)
                    <div class="card text-white bg-primary mb-3 m-5" style="max-width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Nombre d'hôpitaux</h5>
                          <p class="card-text"><h1>{{ \App\Models\Hopital::all()->count() }}</h1></p>
                    </div>
                    </div>
                    @endif
                    @if(Auth::user()->est_admin)
                    <div class="card text-white bg-success mb-3 m-5" style="max-width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Nombre de lits occupés</h5>
                          <p class="card-text"><h1>{{ \App\Models\Lit::where('est_ocuppe', 1)->count() }}</h1></p>
                        </div>
                    </div>
                    @else
                    <div class="card text-white bg-success mb-3 m-5" style="max-width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Nombre de lits occupés</h5>
                          <p class="card-text"><h1>{{ \App\Models\Lit::where('est_ocuppe', 1)->where('hopital_id', Auth::user()->hopital_id)->count() }}</h1></p>
                        </div>
                    </div>
                    @endif
                    @if(Auth::user()->est_admin)
                    <div class="card text-white bg-secondary mb-3 m-5" style="max-width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Nombre de lits libres</h5>
                          <p class="card-text"><h1>{{ \App\Models\Lit::where('est_ocuppe', 2)->count() }}</h1></p>
                        </div>
                    </div>
                    @else
                    <div class="card text-white bg-secondary mb-3 m-5" style="max-width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Nombre de lits libres</h5>
                          <p class="card-text"><h1>{{ \App\Models\Lit::where('est_ocuppe', 2)->where('hopital_id', Auth::user()->hopital_id)->count() }}</h1></p>
                        </div>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="progress">
                    @if(\App\Models\Lit::where('hopital_id', Auth::user()->hopital_id)->count()!= 0 && !Auth::user()->est_admin)
                        <div class="progress-bar" role="progressbar" style="width: {{ \App\Models\Lit::where('est_ocuppe', 1)->count() *100 / \App\Models\Lit::all()->count() }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="{{ \App\Models\Lit::where('hopital_id', Auth::user()->hopital_id)->count() }}">{{ \App\Models\Lit::where('est_ocuppe', 1)->count() *100 / \App\Models\Lit::where('hopital_id', Auth::user()->hopital_id)->count() }}%</div>
                    @endif
                    @if(\App\Models\Lit::all()->count()!= 0 && Auth::user()->est_admin)
                        <div class="progress-bar" role="progressbar" style="width: {{ \App\Models\Lit::where('est_ocuppe', 1)->count() *100 / \App\Models\Lit::all()->count() }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="{{ \App\Models\Lit::all()->count() }}">{{ \App\Models\Lit::where('est_ocuppe', 1)->count() *100 / \App\Models\Lit::all()->count() }}%</div>
                    @endif
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
