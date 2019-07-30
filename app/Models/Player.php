<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  public function __construct()
  {
    if( empty(session() -> get('PlayerOrder[0]')) )    session() -> put('PlayerOrder[0]', 'id');
    if( empty(session() -> get('PlayerOrder[1]')) )    session() -> put('PlayerOrder[1]', 'asc');
    if( empty(session() -> get('PlayerOrder[2]')) )    session() -> put('PlayerOrder[2]', 'id');
    if( empty(session() -> get('PlayerOrder[3]')) )    session() -> put('PlayerOrder[3]', 'asc');
  }
}