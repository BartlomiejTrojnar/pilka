<?php
namespace App\Http\Controllers;

use App\Club;
use App\Repositories\ClubRepository;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index(ClubRepository $clubRepo)
    {
        $clubs = $clubRepo->getAllSortedAndPaginate();
        return view('club.index')
            -> nest('clubTable', 'club.table', ["clubs"=>$clubs, "subTitle"=>""]);

    }

    public function orderBy($column)
    {
        if(session()->get('ClubOrderBy[0]') == $column)
          if(session()->get('ClubOrderBy[1]') == 'desc')
            session()->put('ClubOrderBy[1]', 'asc');
          else
            session()->put('ClubOrderBy[1]', 'desc');
        else
        {
          session()->put('ClubOrderBy[2]', session()->get('ClubOrderBy[0]'));
          session()->put('ClubOrderBy[0]', $column);
          session()->put('ClubOrderBy[3]', session()->get('ClubOrderBy[1]'));
          session()->put('ClubOrderBy[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }

    public function create()
    {
        return view('club.create');
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
}
