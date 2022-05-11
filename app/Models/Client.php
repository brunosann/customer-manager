<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'contact',
        'type',
        'cpf/cnpj',
        'interested',
    ];

    protected $casts = [
        'interested' => 'boolean',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function information()
    {
        return $this->hasOne(ClientInformation::class);
    }
}
