<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
  public function __construct() {
      if(empty(session()->get('RefereeOrderBy[0]')))    session()->put('RefereeOrderBy[0]', 'id');
      if(empty(session()->get('RefereeOrderBy[1]')))    session()->put('RefereeOrderBy[1]', 'asc');
      if(empty(session()->get('RefereeOrderBy[2]')))    session()->put('RefereeOrderBy[2]', 'id');
      if(empty(session()->get('RefereeOrderBy[3]')))    session()->put('RefereeOrderBy[3]', 'asc');
  }

  public function country()
  {
      return $this->belongsTo(Country::class);
  }
}