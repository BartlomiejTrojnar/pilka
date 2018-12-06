<?php
namespace App\Repositories;
use App\Models\Referee;
use Illuminate\Support\Facades\DB;

class RefereeRepository extends BaseRepository {
  public function __construct(Referee $model) {
      $this->model = $model;
  }
}
?>