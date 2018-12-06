<?php
namespace App\Repositories;
use App\Models\Club;
use Illuminate\Support\Facades\DB;

class ClubRepository extends BaseRepository {
  public function __construct(Club $model) {
      $this->model = $model;
  }
}
?>