<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
  public function __construct()
  {
    if( empty(session() -> get('StadiumOrder[0]')) )    session() -> put('StadiumOrder[0]', 'id');
    if( empty(session() -> get('StadiumOrder[1]')) )    session() -> put('StadiumOrder[1]', 'asc');
    if( empty(session() -> get('StadiumOrder[2]')) )    session() -> put('StadiumOrder[2]', 'id');
    if( empty(session() -> get('StadiumOrder[3]')) )    session() -> put('StadiumOrder[3]', 'asc');
  }
}