<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Mutation extends Model
{
    use HasFactory;

    // public function getDateAttribut()
    // {
    //     return Carbon::parse($this->attributes['date'])->translatedFormat('I, d F Y');
    // }

}
