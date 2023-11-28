<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
    'training_id',
    'materi',
    'title',
    'video',
    'thumbnail',];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
