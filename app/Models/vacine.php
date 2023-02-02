<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'lote',
        'data_validade',
    ];

    public function employes(){
        return $this->hasMany(employee::class, 'vacines_id', 'id');
    }

}
