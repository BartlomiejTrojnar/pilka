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
            -> nest('countryTable', 'country.table', ["countries"=>$countries, "subTitle"=>""]);
    }

    public function orderBy($column)
    {
        if(session()->get('CountryOrderBy[0]') == $column)
          if(session()->get('CountryOrderBy[1]') == 'desc')
            session()->put('CountryOrderBy[1]', 'asc');
          else
            session()->put('CountryOrderBy[1]', 'desc');
        else
        {
          session()->put('CountryOrderBy[2]', session()->get('CountryOrderBy[0]'));
          session()->put('CountryOrderBy[0]', $column);
          session()->put('CountryOrderBy[3]', session()->get('CountryOrderBy[1]'));
          session()->put('CountryOrderBy[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
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

        return redirect( $request->history_view );
    }

    public function show($id, $view='', CountryRepository $countryRepo)
    {
        if( empty(session()->get('countryView')) )  session()->put('countryView', 'showInfo');
        if($view)  session()->put('countryView', $view);
        $country = $countryRepo -> find($id);
        $previous = $countryRepo->PreviousRecordId($id);
        $next = $countryRepo->NextRecordId($id);

        switch( session()->get('countryView') ) {
          case 'showInfo':
              return view('country.show', ["country"=>$country, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'country.showInfo', ["country"=>$country]);
              exit;
          break;
          case 'change':
              session()->put('countrySelected', $id);
              return redirect( $_SERVER['HTTP_REFERER'] );
          break;
          default:
              printf('<p style="background: #bb0; color: #f00; font-size: x-large; text-align: center; border: 3px solid red; padding: 5px;">Widok %s nieznany</p>', session()->get('countryView'));
              exit;
          break;
        }
    }

    public function edit(Country $panstwo)
    {
        return view('country.edit', ["country"=>$panstwo]);
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
