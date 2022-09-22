<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program1Response extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function infaq()
    {
        return $this->belongsTo(Infaq::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
