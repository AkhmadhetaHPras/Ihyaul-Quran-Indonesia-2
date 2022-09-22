<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function file()
    {
        return $this->hasMany(File::class);
    }

    public function batch()
    {
        return $this->hasMany(Batch::class);
    }

    public function response()
    {
        if ($this->id == 1) {
            return $this->hasManyThrough(Program1Response::class, Batch::class);
        }
        // add new response table every adding new program
        // and add if condition in this response relationship every adding new program
        // for maping the program and the response
    }
}
