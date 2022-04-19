<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInformation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'cell',
        'cell_package',
        'cell_operator',
        'cell_value',
        'net',
        'net_package',
        'net_operator',
        'net_value',
        'telephone',
        'telephone_package',
        'telephone_operator',
        'telephone_value',
        'tv',
        'tv_package',
        'tv_operator',
        'tv_value',
        'satisfaction',
        'change_operator',
        'observation',
        'client_id',
    ];

    protected $casts = [
        'cell' => 'boolean',
        'net' => 'boolean',
        'telephone' => 'boolean',
        'tv' => 'boolean',
        'change_operator' => 'boolean',
    ];
}
