<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Hero extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'fullName',
        'strength',
        'speed',
        'durability',
        'power',
        'combat',
        'race_id',
        'height0',
        'height1',
        'weight0',
        'weight1',
        'eyeColor',
        'hairColor',
        'publisher_id',
    ];

    protected $guarded = [];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
