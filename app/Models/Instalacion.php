<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'Direccion',
        'Dotacion',
    ];

    function getData() {
        $query = $this->db->get('instalacions');
        return $query->result();
    }
}
