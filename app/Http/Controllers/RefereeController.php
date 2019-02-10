<?php
namespace App\Http\Controllers;
use App\Referee;
use App\Country;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    public function index()
    {
        $referees = Referee::all();
        return view('referee.index', compact('referees'));
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

    public function edit($id)
    {
        $referee = Referee::find($id);
        $countries = Country::all();
        return view('referee.edit', ["referee"=>$referee])
             ->nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "selectedCountry"=>$referee->country_id]);
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
