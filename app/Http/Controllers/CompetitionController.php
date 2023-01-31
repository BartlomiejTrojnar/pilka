<?php
// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 31.01.2023 ------------------------ //
namespace App\Http\Controllers;
use App\Repositories\CompetitionRepository;
use Illuminate\Http\Request;

class CompetitionController extends Controller {
    public function create(Request $request) {
        return view('competition.create');
    }

    public function index(CompetitionRepository $competitionRepo) {
        $competitions = $competitionRepo -> getAllSortedAndPaginate();
        return view('competition.index', ["competitions"=>$competitions]);
    }
}