<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lit extends Model
{
    public $timestamps = true;
    protected $fillable = ['libelle', 'est_ocuppe', 'hopital_id'];

    public function hopital()
    {
        return $this->belongsTo('App\Models\Hopital');
    }
    use HasFactory;
}
