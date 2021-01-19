<?php
// ------------------------- (C) Bartłomiej Trojnar (II) styczeń 2021 ------------------------- //
namespace App\Repositories;
use App\Models\Competition;
use Illuminate\Support\Facades\DB;

class CompetitionRepository extends BaseRepository
{
  public function __construct(Competition $model)  { $this->model = $model; }

  public function getAllSortedAndPaginate()
  {
    return $this->model
      -> orderBy( session() -> get('CompetitionOrder[0]'), session() -> get('CompetitionOrder[1]') )
      -> orderBy( session() -> get('CompetitionOrder[2]'), session() -> get('CompetitionOrder[3]') )
      -> paginate(20);
  }
}
?>