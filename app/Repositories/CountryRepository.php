<?php
namespace App\Repositories;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryRepository extends BaseRepository {
  public function __construct(Country $model) {
      $this->model = $model;
  }

  public function getAllSorted() {
      return $this->model
        -> orderBy( session()->get('CountryOrder[0]'), session()->get('CountryOrder[1]') )
        -> orderBy( session()->get('CountryOrder[2]'), session()->get('CountryOrder[3]') )
        -> get();
  }

  public function getAllSortedAndPaginate() {
      return $this->model
        -> orderBy( session()->get('CountryOrder[0]'), session()->get('CountryOrder[1]') )
        -> orderBy( session()->get('CountryOrder[2]'), session()->get('CountryOrder[3]') )
        -> paginate(20);
  }
}
?>