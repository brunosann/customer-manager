<?php

namespace App\Services;

use Error;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ClientService
{
  public static function getDataByRequestPrefix(array $data, string $prefix): Collection
  {
    return collect($data)->reject(function ($value, $key) use ($prefix) {
      return !Str::contains($key, $prefix);
    });
  }

  public static function removeRequestPrefix(Collection $data, string $prefix): Collection
  {
    return $data->keys()
      ->map(fn ($item) => Str::replace($prefix, '', $item))
      ->combine($data->values()->toArray());
  }
}
