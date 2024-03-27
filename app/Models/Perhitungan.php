<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'perhitungans';

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
