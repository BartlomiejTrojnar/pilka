<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function __construct() {
        if(empty(session()->get('ClubOrderBy[0]')))    session()->put('ClubOrderBy[0]', 'id');
        if(empty(session()->get('ClubOrderBy[1]')))    session()->put('ClubOrderBy[1]', 'asc');
        if(empty(session()->get('ClubOrderBy[2]')))    session()->put('ClubOrderBy[2]', 'id');
        if(empty(session()->get('ClubOrderBy[3]')))    session()->put('ClubOrderBy[3]', 'asc');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
