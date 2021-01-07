<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['libelle', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function lits()
    {
        return $this->hasMany('App\Models\Lit');
    }
}
