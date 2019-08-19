<?php
namespace App\Http\Controllers;
use App\Models\Player;
use App\Repositories\PlayerRepository;

use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(PlayerRepository $playerRepo, CountryRepository $countryRepo)
    {
        $countries = $countryRepo -> getAllSorted();
        $countrySelected = session()->get('countrySelected');
        $countrySelectField = view('country.selectField', ["countries"=>$countries, "countrySelected"=>$countrySelected]);

        $players = $playerRepo -> getAllSortedAndPaginate();
        if( $countrySelected ) {
            $players = Player::where('country_id', $countrySelected);
            $players = $playerRepo -> sortAndPaginateRecords($players);
        }
        return view('player.index')
            -> nest('playerTable', 'player.table', ["players"=>$players, "links"=>true, "subTitle"=>"", "countrySelectField"=>$countrySelectField]);
    }

    public function order($column)
    {
        if(session()->get('PlayerOrder[0]') == $column)
          if(session()->get('PlayerOrder[1]') == 'desc')
            session()->put('PlayerOrder[1]', 'asc');
          else
            session()->put('PlayerOrder[1]', 'desc');
        else
        {
          session()->put('PlayerOrder[2]', session()->get('PlayerOrder[0]'));
          session()->put('PlayerOrder[0]', $column);
          session()->put('PlayerOrder[3]', session()->get('PlayerOrder[1]'));
          session()->put('PlayerOrder[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create()
    {
        $countries = Country::all('name', 'id');
        return view('player.create', ["countries"=>$countries]);
    }

    public function store(Request $request)
    {
        $this -> validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'country_id' => 'required',
        ]);

        $player = new Player;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->country_id = $request->country_id;
        $player->date_of_birth = $request->date_of_birth;
        $player->city_of_birth = $request->city_of_birth;
        $player -> save();

        return redirect( $request->history_view );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    public function edit($id, CountryRepository $countryRepo)
    {
        $countries = $countryRepo -> getAllSorted();
        $player = Player::find($id);
        return view('player.edit', ["player"=>$player])
             ->nest('countrySelectField', 'country.selectField', ["countries"=>$countries, "countrySelected"=>$player->country_id]);
    }

    public function update($id, Request $request)
    {
        $this -> validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'country_id' => 'required',
        ]);

        $player = Player::find($id);
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->date_of_birth = $request->date_of_birth;
        $player->city_of_birth = $request->city_of_birth;
        $player->country_id = $request->country_id;
        $player -> save();

        return redirect( $request->history_view );
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player -> delete();
        return redirect( $_SERVER['HTTP_REFERER'] );
    }
}
