<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            if ($setting->type === 'boolean') {
                return (bool) $setting->value;
            }
            return $setting->value;
        }
        return $default;
    }
}
