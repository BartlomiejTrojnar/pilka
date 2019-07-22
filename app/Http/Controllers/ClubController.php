<?php
namespace App\Http\Controllers;

use App\Models\Club;
use App\Repositories\ClubRepository;
use App\Models\Country;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(ClubRepository $clubRepo)
    {
        $clubs = $clubRepo->getAllSortedAndPaginate();
        return view('club.index')
            -> nest('clubTable', 'club.table', ["clubs"=>$clubs, "subTitle"=>"", "links"=>true]);
    }

    public function order($column)
    {
        if(session()->get('ClubOrder[0]') == $column)
          if(session()->get('ClubOrder[1]') == 'desc')
            session()->put('ClubOrder[1]', 'asc');
          else
            session()->put('ClubOrder[1]', 'desc');
        else
        {
          session()->put('ClubOrder[2]', session()->get('ClubOrder[0]'));
          session()->put('ClubOrder[0]', $column);
          session()->put('ClubOrder[3]', session()->get('ClubOrder[1]'));
          session()->put('ClubOrder[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create()
    {
        $countries = Country::all('name', 'id');
        return view('club.create', ["countries"=>$countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
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
        $club->save();

        return redirect( $request->history_view );
    }

    public function show($id, $view='', ClubRepository $clubRepo)
    {
        if(empty(session()->get('clubView')))  session()->put('clubView', 'showInfo');
        if($view)  session()->put('clubView', $view);
        session()->put('clubSelected', $id);
        $club = $clubRepo -> find($id);
        $previous = $clubRepo -> PreviousRecordId($id);
        $next = $clubRepo -> NextRecordId($id);

        switch(session()->get('clubView')) {
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

    public function edit($id)
    {
        $club = Club::find($id);
        $countries = Country::all();
        return view('club.edit', ["club"=>$club])
             ->nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "countrySelected"=>$club->country_id]);
    }

    public function update(Request $request, $id)
    {
        $club = Club::find($id);

        $this->validate($request, [
          'name' => 'required',
          'city' => 'required',
          'country_id' => 'required',
        ]);

        $club->name = $request->name;
        $club->city = $request->city;
        $club->year_of_establishment = $request->year_of_establishment;
        $club->country_id = $request->country_id;
        $club->save();

        return redirect( $request->history_view );
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }
}
