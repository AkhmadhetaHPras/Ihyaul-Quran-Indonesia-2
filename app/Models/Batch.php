<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function response()
    {
        if ($this->program_id == 1) {
            return $this->hasMany(Program1Response::class);
        } else {
            return 0;
        }
    }
}
