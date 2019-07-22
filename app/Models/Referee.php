<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
  public function __construct() {
      if(empty(session()->get('RefereeOrder[0]')))    session()->put('RefereeOrder[0]', 'id');
      if(empty(session()->get('RefereeOrder[1]')))    session()->put('RefereeOrder[1]', 'asc');
      if(empty(session()->get('RefereeOrder[2]')))    session()->put('RefereeOrder[2]', 'id');
      if(empty(session()->get('RefereeOrder[3]')))    session()->put('RefereeOrder[3]', 'asc');
  }

  public function country()
  {
      return $this->belongsTo(Country::class);
  }
}