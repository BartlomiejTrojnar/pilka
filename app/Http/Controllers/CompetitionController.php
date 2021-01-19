<?php
// ------------------------- (C) Bartłomiej Trojnar (II) styczeń 2021 ------------------------- //
namespace App\Http\Controllers;

use App\Repositories\CompetitionRepository;

use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(CompetitionRepository $competitionRepo)
    {
        $competitions = $competitionRepo -> getAllSortedAndPaginate();
        return view('competition.index')
            -> nest('competitionTable', 'competition.table', ["competitions"=>$competitions, "subTitle"=>"", "links"=>true]);
    }
}
