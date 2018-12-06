<?php
namespace App\Repositories;
use App\Models\Stadium;
use Illuminate\Support\Facades\DB;

class StadiumRepository extends BaseRepository {
  public function __construct(Stadium $model) {
      $this->model = $model;
  }
}
?>