<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function response1()
    {
        return $this->hasMany(Program1Response::class);
    }

    // add more responseX relationship when adding new program and response
}
