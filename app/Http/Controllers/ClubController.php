<?php
// ------------------------- (C) Bartłomiej Trojnar (II) styczeń 2021 ------------------------- //
namespace App\Http\Controllers;

use App\Models\Club;
use App\Repositories\ClubRepository;
use App\Models\Country;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(ClubRepository $clubRepo)  {
        $clubs = $clubRepo -> getAllSortedAndPaginate();
        $clubsTable = view('club.tableForIndex', ["clubs"=>$clubs, "subTitle"=>"", "links"=>true]);
        return view('club.index', ["clubsTable"=>$clubsTable]);
    }

    public function order($column)  {
        if(session()->get('ClubOrder[0]') == $column)
            if(session()->get('ClubOrder[1]') == 'desc')    session()->put('ClubOrder[1]', 'asc');
            else    session()->put('ClubOrder[1]', 'desc');
        else {
            session()->put('ClubOrder[2]', session()->get('ClubOrder[0]'));
            session()->put('ClubOrder[0]', $column);
            session()->put('ClubOrder[3]', session()->get('ClubOrder[1]'));
            session()->put('ClubOrder[1]', 'asc');
        }
        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create(Request $request) {
        if($request->version == "forIndex")     return $this -> createRow();
        return $request->version;
    }

    public function createRow()  {
        $countries = Country::all('name', 'id');
        return view('club.createRow', ["countries"=>$countries]);
    }

    public function store(Request $request)  {
        $this -> validate($request, [
          'name' => 'required',
          'city' => 'required',
          'country_id' => 'required',
        ]);

        $club = new Club;
        $club->id = $request->id;
        $club->name = $request->name;
        $club->city = $request->city;
        $club->year_of_establishment = $request->year_of_establishment;
        $club->country_id = $request->country_id;
        $club -> save();
        return $club->id;
    }

    public function show($id, $view='', ClubRepository $clubRepo)  {
        if( empty(session() -> get('clubView')) )  session() -> put('clubView', 'showInfo');
        if($view)  session() -> put('clubView', $view);
        session() -> put('clubSelected', $id);
        $club = $clubRepo -> find($id);
        $previous = $clubRepo -> PreviousRecordId($id);
        $next = $clubRepo -> NextRecordId($id);

        switch(session() -> get('clubView')) {
          case 'showInfo':
              return view('club.show', ["club"=>$club, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'club.showInfo', ["club"=>$club]);
          break;
          default:
              printf('<p style="background: #bb0; color: #f00; font-size: x-large; text-align: center; border: 3px solid red; padding: 5px;">Widok %s nieznany</p>', session()->get('clubView'));
              exit;
          break;
        }
    }

    public function edit(Request $request) {
    //    $club = Club::find($id);
    if( $request->version=="forIndex" )   return $this -> editRow($request->id);
        //if( $request->version=="forGrade" )     return $this -> editRowForGrade($request->id, $sgRepo, $studentRepo, $syRepo);
        return $request->version;
    }

    private function editRow($id)  {
    //    $countries = Country::all();
    //    return view('club.edit', ["club"=>$club])
    //        -> nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "countrySelected"=>$club->country_id]);
    }

    public function update(Request $request, $id)  {
        $club = Club::find($id);

        $this -> validate($request, [
          'name' => 'required',
          'city' => 'required',
          'country_id' => 'required',
        ]);

        $club->name = $request->name;
        $club->city = $request->city;
        $club->year_of_establishment = $request->year_of_establishment;
        $club->country_id = $request->country_id;
        $club -> save();

        return redirect( $request->history_view );
    }

    public function destroy($id)  {
        $club = Club::find($id);
        $club -> delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function refreshRow(Request $request, Club $club) {
        $club = $club -> find($request->id);
        if( $request->version=="forIndex" )     
            return view('club.row', ["club"=>$club]);
        return $request->version;

        //$studentGrade = $studentGrade -> find($request->id);
        //return view('studentGrade.row', ["studentGrade"=>$studentGrade]);
    }
}
