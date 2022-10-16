<?php
// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 16.10.2022 ------------------------ //
namespace App\Http\Controllers;
use App\Models\Referee;
use App\Repositories\RefereeRepository;

use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    public function index(RefereeRepository $refereeRepo, CountryRepository $countryRepo) {
        $countries = $countryRepo -> getAllSorted();
        $countrySelected = session() -> get('countrySelected');
        $countrySelectField = view('country.selectField', ["countries"=>$countries, "countrySelected"=>$countrySelected]);

        $referees = $refereeRepo -> getAllSortedAndPaginate();
        if( $countrySelected ) {
            $referees = Referee::where('country_id', $countrySelected);
            $referees = $refereeRepo -> sortAndPaginateRecords($referees);
        }        
        $tableForIndex = view('referee.tableForIndex', ["referees"=>$referees, "countrySelectField"=>$countrySelectField]);
        return view('referee.index', ["referees"=>$referees, "tableForIndex"=>$tableForIndex]);
    }

    public function order($column) {
        if(session()->get('RefereeOrder[0]') == $column)
          if(session()->get('RefereeOrder[1]') == 'desc')
            session()->put('RefereeOrder[1]', 'asc');
          else
            session()->put('RefereeOrder[1]', 'desc');
        else
        {
          session()->put('RefereeOrder[2]', session()->get('RefereeOrder[0]'));
          session()->put('RefereeOrder[0]', $column);
          session()->put('RefereeOrder[3]', session()->get('RefereeOrder[1]'));
          session()->put('RefereeOrder[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create(Request $request) {
        $countries = Country::all('name', 'id');
        $countrySF = "";
        return view('referee.create', ["countrySF"=>$countrySF]);
    }

    public function store(Request $request) {
        $this -> validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'country_id' => 'required',
        ]);

        $referee = new Referee;
        $referee->first_name = $request->first_name;
        $referee->last_name = $request->last_name;
        $referee->country_id = $request->country_id;
        $referee->district = $request->district;
        $referee->date_of_birth = $request->date_of_birth;
        if($request->active == "on") $referee->active = true;
        else $referee->active = false;
        $referee -> save();

        return redirect( $request->history_view );
    }

    public function show($id, $view='', RefereeRepository $refereeRepo) {
        if( empty(session() -> get('refereeView')) )  session() -> put('refereeView', 'showInfo');
        if($view)  session() -> put('refereeView', $view);
        session() -> put('refereeSelected', $id);
        $referee = $refereeRepo -> find($id);
        $previous = $refereeRepo -> PreviousRecordId($id);
        $next = $refereeRepo -> NextRecordId($id);

        switch( session() -> get('refereeView') ) {
          case 'showInfo':
              return view('referee.show', ["referee"=>$referee, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'referee.showInfo', ["referee"=>$referee]);
          break;
          default:
              printf('<p style="background: #bb0; color: #f00; font-size: x-large; text-align: center; border: 3px solid red; padding: 5px;">Widok %s nieznany</p>', session()->get('countryView'));
          break;
        }
    }

    public function edit($id, CountryRepository $countryRepo) {
        $countries = $countryRepo -> getAllSorted();
        $referee = Referee::find($id);
        return view('referee.edit', ["referee"=>$referee])
             ->nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "countrySelected"=>$referee->country_id]);
    }

    public function update($id, Request $request) {
        $referee = Referee::find($id);

        $this -> validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'country_id' => 'required',
        ]);

        $referee->first_name = $request->first_name;
        $referee->last_name = $request->last_name;
        $referee->country_id = $request->country_id;
        $referee->district = $request->district;
        $referee->date_of_birth = $request->date_of_birth;
        if($request->active == "on") $referee->active = true;
          else $referee->active = false;
        $referee -> save();

        return redirect( $request->history_view );
    }

    public function destroy($id) {
        $referee = Referee::find($id);
        $referee -> delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }
}
