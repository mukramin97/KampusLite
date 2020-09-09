<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asrama extends Model
{
    protected $fillable = [
        'nama', 'idPembina', 'kapasitas', 'volume'
    ];
}
