<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    
    protected $table = 'mis_personas';
    protected $primaryKey = 'personas_id';

    // public $timestamps = false;

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';

    protected $dateFormat = 'U';
}
