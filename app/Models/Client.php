<?php

namespace App\Models;

use Carbon\Carbon;
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
        'user_id',
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

    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', "%$name%");
    }

    public function scopeFilterByDates($query, $request)
    {
        if ($request->input('date') === 'week')
            $query->whereDate('created_at', '>=', Carbon::today()->subWeek());

        if ($request->input('date') === 'month') {
            $date = explode('-', $request->input('month'));
            $year = filter_var($date[0], FILTER_SANITIZE_NUMBER_INT);
            $month = filter_var(end($date), FILTER_SANITIZE_NUMBER_INT);
            $query->whereDate('created_at', '>=', Carbon::create($year, $month));
        }

        if (!$request->has('date') || $request->input('date') === 'day')
            $query->whereDate('created_at', Carbon::today());

        return $query;
    }

    public function scopeInterested($query, $request)
    {
        if ($request->has('interested'))
            $query->where('interested', true);

        return $query;
    }

    public function scopeByUser($query, $id)
    {
        return $query->where('user_id', $id);
    }
}
