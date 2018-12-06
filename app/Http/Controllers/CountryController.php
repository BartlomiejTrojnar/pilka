<?php
namespace App\Http\Controllers;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('country.index', compact('countries'));
    }

    public function create()
    {
        return view('country.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'symbol' => 'required',
          'name' => 'required',
          'continent' => 'required',
        ]);

        $country = new Country;
        $country->id = $request->id;
        $country->symbol = $request->symbol;
        $country->name = $request->name;
        $country->continent = $request->continent;
        $country->save();

        return redirect(route('panstwo.index'));
    }

    public function show(Country $panstwo)
    {
        $country = $panstwo;
        $next = Country::where('id', '>', $country->id)->first();
        if(empty($next)) $next = Country::all()->first();
        $previous = Country::where('id', '<', $country->id)->orderBy('id', 'desc')->first();
        if(empty($previous)) $previous = Country::all()->last();
        return view('country.show', compact('country'))->with('previous', $previous)->with('next', $next);
    }

    public function edit(Country $panstwo)
    {
        $country = $panstwo;
        return view('country.edit', compact('country'));
    }

    public function update(Request $request, Country $panstwo)
    {
        $this->validate($request, [
          'symbol' => 'required',
          'name' => 'required',
          'continent' => 'required',
        ]);

        $country = $panstwo;
        $country->symbol = $request->symbol;
        $country->name = $request->name;
        $country->continent = $request->continent;
        $country->save();

        return redirect(route('panstwo.index'));
    }

    public function destroy(Country $panstwo)
    {
        $panstwo->delete();
        return redirect()->route('panstwo.index');
    }
}
