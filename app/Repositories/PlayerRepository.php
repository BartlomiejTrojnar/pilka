<?php
namespace App\Repositories;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PlayerRepository extends BaseRepository
{
  public function __construct(Player $model)  { $this->model = $model; }

  public function getAllSortedAndPaginate()
  {
    return $this->model
      -> orderBy( session() -> get('PlayerOrder[0]'), session() -> get('PlayerOrder[1]') )
      -> orderBy( session() -> get('PlayerOrder[2]'), session() -> get('PlayerOrder[3]') )
      -> paginate(20);
  }
}
?>