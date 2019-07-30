<?php
namespace App\Repositories;
use App\Models\Referee;
use Illuminate\Support\Facades\DB;

class RefereeRepository extends BaseRepository {
  public function __construct(Referee $model)  { $this->model = $model; }

  public function getAllSortedAndPaginate()
  {
    return $this->model
      -> orderBy( session() -> get('RefereeOrder[0]'), session() -> get('RefereeOrder[1]') )
      -> orderBy( session() -> get('RefereeOrder[2]'), session() -> get('RefereeOrder[3]') )
      -> paginate(20);
  }

  public function sortAndPaginateRecords($records)
  {
    return $records
      -> orderBy( session() -> get('RefereeOrder[0]'), session() -> get('RefereeOrder[1]') )
      -> orderBy( session() -> get('RefereeOrder[2]'), session() -> get('RefereeOrder[3]') )
      -> paginate(20);
  }
}
?>