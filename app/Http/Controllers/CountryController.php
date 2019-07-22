<?php
namespace App\Http\Controllers;
use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(CountryRepository $countryRepo)
    {
        $countries = $countryRepo->getAllSortedAndPaginate();
        return view('country.index')
            -> nest('countryTable', 'country.table', ["countries"=>$countries, "subTitle"=>"", "links"=>true]);
    }

    public function order($column)
    {
        if(session()->get('CountryOrder[0]') == $column)
          if(session()->get('CountryOrder[1]') == 'desc')
            session()->put('CountryOrder[1]', 'asc');
          else
            session()->put('CountryOrder[1]', 'desc');
        else
        {
          session()->put('CountryOrder[2]', session()->get('CountryOrder[0]'));
          session()->put('CountryOrder[0]', $column);
          session()->put('CountryOrder[3]', session()->get('CountryOrder[1]'));
          session()->put('CountryOrder[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create()
    {
        $continents = array('Europa', 'Afryka', 'Ameryka Południowa', 'Ameryka Północna', 'Azja', 'Oceania');
        $continentSelected = 'Europa';

        return view('country.create')
            -> nest('continentSelectField', 'layouts.continentSelectField', ["continents"=>$continents, "continentSelected"=>$continentSelected]);
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

        return redirect( $request->history_view );
    }

    public function show($id, $view='', CountryRepository $countryRepo)
    {
        if( empty(session()->get('countryView')) )  session()->put('countryView', 'showInfo');
        if($view)  session()->put('countryView', $view);
        session()->put('countrySelected', $id);
        $country = $countryRepo -> find($id);
        $previous = $countryRepo->PreviousRecordId($id);
        $next = $countryRepo->NextRecordId($id);

        switch( session()->get('countryView') ) {
          case 'showInfo':
              return view('country.show', ["country"=>$country, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'country.showInfo', ["country"=>$country]);
          break;
          case 'showClubs':
              $subTitle = "Kluby w państwie";
              return view('country.show', ["country"=>$country, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'club.table', ["clubs"=>$country->clubs, "subTitle"=>$subTitle]);
          break;
          default:
              printf('<p style="background: #bb0; color: #f00; font-size: x-large; text-align: center; border: 3px solid red; padding: 5px;">Widok %s nieznany</p>', session()->get('countryView'));
          break;
        }
    }

    public function edit(Country $panstwo)
    {
        $continents = array('Europa', 'Afryka', 'Ameryka Południowa', 'Ameryka Północna', 'Azja', 'Oceania');
        $continentSelected = $panstwo->continent;

        return view('country.edit', ["country"=>$panstwo])
            -> nest('continentSelectField', 'layouts.continentSelectField', ["continents"=>$continents, "continentSelected"=>$continentSelected]);
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

        return redirect( $request->history_view );
    }

    public function destroy(Country $panstwo)
    {
        $panstwo->delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }
}
