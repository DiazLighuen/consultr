<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

    public function heroes()
    {
        return $this->hasMany(Hero::class);
    }
}
