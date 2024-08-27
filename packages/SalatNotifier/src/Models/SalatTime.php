<?php

namespace SalatNotifier\Models;

use Illuminate\Database\Eloquent\Model;

class SalatTime extends Model
{
    protected $table = 'salat_times';

    protected $fillable = [
        'fajr', 'dhuhr', 'asr', 'maghrib', 'isha',
    ];
}
