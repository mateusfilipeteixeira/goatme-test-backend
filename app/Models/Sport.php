<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'schedule_date',
        'start',
        'end',
        'recurrent',
        'weeks'
    ];

    public function schedules ()
    {
        return $this->hasMany(Schedule::class);
    }

    public function generateSchedules () 
    {
        $start = date('Y-m-d H:i:s', strtotime("$this->date $this->start"));
        $end = date('Y-m-d H:i:s', strtotime("$this->date $this->end"));
        if (!$this->weeks || $this->weeks == 1) {
            Schedule::create([
                'sport' => $this->id,
                'title' => $this->name,
                'start' => $start,
                'end' => $end
            ]);

            return [
                'status' => 'ok',
                'message' => 'schedule created successfully'
            ];
        }

        for ($i = 0; $i < $this->weeks; $i++) {
            Schedule::create([
                'sport' => $this->id,
                'title' => $this->name,
                'start' => date('Y-m-d', strtotime("+$i week", $start)),
                'end' => date('Y-m-d', strtotime("+$i week", $end))
            ]);
        }

        return [
            'status' => 'ok',
            'message' => 'schedule created successfully'
        ];
    }
}
