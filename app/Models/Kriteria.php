<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function bobot($bobot)
    {
        $sum_bobot = Kriteria::sum('bobot');
        $data = floatval(number_format($bobot / $sum_bobot, 1));
        return $data;
    }
}
