<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
  public function __construct() {
    if(empty(session()->get('ClubOrder[0]')))    session()->put('ClubOrder[0]', 'id');
    if(empty(session()->get('ClubOrder[1]')))    session()->put('ClubOrder[1]', 'asc');
    if(empty(session()->get('ClubOrder[2]')))    session()->put('ClubOrder[2]', 'id');
    if(empty(session()->get('ClubOrder[3]')))    session()->put('ClubOrder[3]', 'asc');
  }

  public function country()
  {
    return $this->belongsTo(Country::class);
  }
}