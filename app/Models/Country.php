<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public $timestamps = false;

  public function __construct() {
      if(empty(session()->get('CountryOrderBy[0]')))    session()->put('CountryOrderBy[0]', 'id');
      if(empty(session()->get('CountryOrderBy[1]')))    session()->put('CountryOrderBy[1]', 'asc');
      if(empty(session()->get('CountryOrderBy[2]')))    session()->put('CountryOrderBy[2]', 'id');
      if(empty(session()->get('CountryOrderBy[3]')))    session()->put('CountryOrderBy[3]', 'asc');
  }
}
