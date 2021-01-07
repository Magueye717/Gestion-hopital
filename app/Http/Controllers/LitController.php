<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Lits;
use App\Models\Lit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LitController extends Controller
{   

    public function index(Request $request){
        if (Auth::user()->est_admin) {
            $lits = Lit::all();
        }else 
          $lits = Lit::where('hopital_id', Auth::user()->hopital_id)->get();
         
        
     return view('livewire.lits', compact('lits'));
    }
    
    public function store(Request $request){
            $inputs=$request->all();
            Lit::create($inputs);
     return redirect()->route('list_lit');
    }

    public function edit($id){
        $lit = Lit::find($id);
        return view('livewire.edit_form_lit', compact('lit'));
    }

    public function update($id){
        $lit = Lit::find($id);
        $lit->est_ocuppe == 1 ? $lit->est_ocuppe = 2 : $lit->est_ocuppe = 1;
        $lit->save();
        $etat = $lit->est_ocuppe == 1 ? 'occupé' : 'libre';
        return redirect()->route('list_lit')->withMessage('lit N°'.$lit->id.' '.$etat.'');
    }
}
