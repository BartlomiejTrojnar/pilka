<?php
namespace App\Http\Controllers;
use App\Models\Referee;
use App\Repositories\RefereeRepository;

use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    public function index(RefereeRepository $refereeRepo, CountryRepository $countryRepo)
    {
        $countries = $countryRepo->getAllSorted();
        $countrySelected = session()->get('countrySelected');
        $countrySelectField = view('country.selectField', ["countries"=>$countries, "countrySelected"=>$countrySelected]);

        $referees = $refereeRepo -> getAllSortedAndPaginate();
        if( $countrySelected ) {
            $referees = Referee::where('country_id', $countrySelected);
            $referees = $refereeRepo -> sortAndPaginateRecords($referees);
        }
        return view('referee.index')
            -> nest('refereeTable', 'referee.table', ["referees"=>$referees, "links"=>true, "subTitle"=>"", "countrySelectField"=>$countrySelectField]);
    }

    public function orderBy($column)
    {
        if(session()->get('RefereeOrderBy[0]') == $column)
          if(session()->get('RefereeOrderBy[1]') == 'desc')
            session()->put('RefereeOrderBy[1]', 'asc');
          else
            session()->put('RefereeOrderBy[1]', 'desc');
        else
        {
          session()->put('RefereeOrderBy[2]', session()->get('RefereeOrderBy[0]'));
          session()->put('RefereeOrderBy[0]', $column);
          session()->put('RefereeOrderBy[3]', session()->get('RefereeOrderBy[1]'));
          session()->put('RefereeOrderBy[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create()
    {
        $countries = Country::all('name', 'id');
        return view('referee.create', ["countries"=>$countries]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
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
        $referee->save();

        return redirect(route('sedzia.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referee  $referee
     * @return \Illuminate\Http\Response
     */
    public function show(Referee $referee)
    {
        //
    }

    public function edit($id, CountryRepository $countryRepo)
    {
        $countries = $countryRepo->getAllSorted();
        $referee = Referee::find($id);
        return view('referee.edit', ["referee"=>$referee])
             ->nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "countrySelected"=>$referee->country_id]);
    }

    public function update(Request $request, $id)
    {
        $referee = Referee::find($id);

        $this->validate($request, [
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
        $referee->save();

        return redirect(route('sedzia.index'));
    }

    public function destroy($id)
    {
        $referee = Referee::find($id);
        $referee->delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }
}
