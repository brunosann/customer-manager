<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city',
        'state',
        'street',
        'number',
        'district',
        'complemento',
        'zip_code',
        'client_id',
    ];
}
