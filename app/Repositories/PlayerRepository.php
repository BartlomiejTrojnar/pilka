<?php
namespace App\Repositories;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PlayerRepository extends BaseRepository {
  public function __construct(Player $model) {
      $this->model = $model;
  }
}
?>