<?php
namespace App\Repositories;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubRepository extends BaseRepository
{
  public function __construct(Club $model)  { $this->model = $model; }

  public function getAllSortedAndPaginate()
  {
    return $this->model
      -> orderBy( session() -> get('ClubOrder[0]'), session() -> get('ClubOrder[1]') )
      -> orderBy( session() -> get('ClubOrder[2]'), session() -> get('ClubOrder[3]') )
      -> paginate(20);
  }
}
?>