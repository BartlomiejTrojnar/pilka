<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}