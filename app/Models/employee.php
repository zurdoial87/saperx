<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'CPF',
        'nome',
        'data_nascimento',
        'data_primeira_dose',
        'data_segunda_dose',
        'data_terceira_dose',
        'vacines_id',
        'comorbidade'
    ];

    public function vacina(){
        return $this->belongsTo(vacine::class, 'vacines_id', 'id');
    }  


}
