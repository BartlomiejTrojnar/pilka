<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public $timestamps = false;

  public function __construct()
  {
    if( empty(session() -> get('CountryOrder[0]')) )    session() -> put('CountryOrder[0]', 'id');
    if( empty(session() -> get('CountryOrder[1]')) )    session() -> put('CountryOrder[1]', 'asc');
    if( empty(session() -> get('CountryOrder[2]')) )    session() -> put('CountryOrder[2]', 'id');
    if( empty(session() -> get('CountryOrder[3]')) )    session() -> put('CountryOrder[3]', 'asc');
  }

  public function clubs()  { return $this->hasMany(Club::class); }

  public function players()  { return $this->hasMany(Player::class); }

  public function referees()  { return $this->hasMany(Referee::class); }
}