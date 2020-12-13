<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport',
        'title',
        'start',
        'end'
    ];

    public function sport ()
    {
        return $this->hasOne(Sport::class);
    }
}
