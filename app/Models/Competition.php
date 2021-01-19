<?php
// ------------------------- (C) Bartłomiej Trojnar (II) styczeń 2021 ------------------------- //
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
  public function __construct()  {
    if( empty(session() -> get('CompetitionOrder[0]')) )    session() -> put('CompetitionOrder[0]', 'id');
    if( empty(session() -> get('CompetitionOrder[1]')) )    session() -> put('CompetitionOrder[1]', 'asc');
    if( empty(session() -> get('CompetitionOrder[2]')) )    session() -> put('CompetitionOrder[2]', 'id');
    if( empty(session() -> get('CompetitionOrder[3]')) )    session() -> put('CompetitionOrder[3]', 'asc');
  }
}