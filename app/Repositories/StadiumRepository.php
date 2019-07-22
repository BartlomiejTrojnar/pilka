<?php
namespace App\Repositories;
use App\Models\Stadium;
use Illuminate\Support\Facades\DB;

class StadiumRepository extends BaseRepository {
  public function __construct(Stadium $model) {
      $this->model = $model;
  }

  public function getAllSortedAndPaginate() {
      return $this->model
        -> orderBy( session()->get('StadiumOrder[0]'), session()->get('StadiumOrder[1]') )
        -> orderBy( session()->get('StadiumOrder[2]'), session()->get('StadiumOrder[3]') )
        -> paginate(20);
  }
}
?>