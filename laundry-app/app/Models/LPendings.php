<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LPendings extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'typesId',
        'weight',
        'owner'
    ];

    public function types()
    {
        return $this->belongsTo(Types::class, 'typesId');
    }
}
