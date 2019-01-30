<?php
namespace App\Repositories;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryRepository extends BaseRepository {
  public function __construct(Country $model) {
      $this->model = $model;
  }

  public function getAllSortedAndPaginate() {
      return $this->model
        -> orderBy( session()->get('CountryOrderBy[0]'), session()->get('CountryOrderBy[1]') )
        -> orderBy( session()->get('CountryOrderBy[2]'), session()->get('CountryOrderBy[3]') )
        -> paginate(20);
  }
}
?>