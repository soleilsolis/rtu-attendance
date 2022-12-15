<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'instance_id',
        'section_id',
        'start_time',
        'end_time',
        'day',
    ];
    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }
}
