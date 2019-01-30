<?php
namespace App\Repositories;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubRepository extends BaseRepository {
  public function __construct(Club $model) {
      $this->model = $model;
  }

  public function getAllSortedAndPaginate() {
      return $this->model
        -> orderBy( session()->get('ClubOrderBy[0]'), session()->get('ClubOrderBy[1]') )
        -> orderBy( session()->get('ClubOrderBy[2]'), session()->get('ClubOrderBy[3]') )
        -> paginate(20);
  }
}
?>