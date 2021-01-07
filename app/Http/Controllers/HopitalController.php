<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HopitalController extends Controller
{

    public function index (){
        $hopitals = Hopital::all();
        return view('livewire.hopital', compact('hopitals'));
    }

    public function indexUser (){
        $users = User::where('est_admin', 0)->get();
        return view('livewire.utilisateurs', compact('users'));
    }

    public function createUser (){
        return view('livewire.form_user');
    }
    
    public function storeUser (Request $request){
        //$inputs = $request->all();
        $inputs = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'hopital_id' => 'required',
            'password' => 'required',
        ]);
        $inputs['password']= Hash::make($request->password);
        $inputs['hopital_id']= (int)$request->hopital_id;
        $inputs['est_admin']= 0;
        //dd($inputs);
        User::create($inputs);

        return redirect()->route('users');
    }

    public function store(Request $request){
        $inputs=$request->all();
        Hopital::create($inputs);
 return redirect()->route('lit_hopital');
}
    //
}
