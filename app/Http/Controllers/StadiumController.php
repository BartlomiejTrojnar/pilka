<?php
// ------------------------ (C) mgr inż. Bartłomiej Trojnar; 28.12.2022 ------------------------ //
namespace App\Http\Controllers;
use App\Models\Stadium;
use App\Repositories\StadiumRepository;
use Illuminate\Http\Request;

class StadiumController extends Controller {
   public function index(StadiumRepository $stadiumRepo) {
      $stadiums = $stadiumRepo -> getAllSortedAndPaginate();
      $stadiumsTable = view('stadium.table', ["stadiums"=>$stadiums]);
      return view('stadium.index', ["stadiumsTable"=>$stadiumsTable]);
   }

   public function create() {
      return view('stadium.create');
   }

   public function store(Request $request) {
      $this -> validate($request, [
         'city' => 'required',
         'name' => 'required',
      ]);

      $stadium = new Stadium;
      $stadium->city = $request->city;
      $stadium->name = $request->name;
      $stadium->capacity = $request->capacity;
      $stadium -> save();

      return $stadium->id;
   }

   public function refreshRow(Request $request, Stadium $stadium) {
      $this->stadium = $stadium -> find($request->id);
      return view('stadium.row', ["stadium"=>$this->stadium, "lp"=>$request->lp]);
   }

   public function edit(Request $request) {
      $stadium = Stadium::find($request->id);
      return view('stadium.edit', ["stadium"=>$stadium, "lp"=>$request->lp]);
   }

   public function update(Request $request, Stadium $stadium) {
      $this -> validate($request, [
         'city' => 'required',
         'name' => 'required',
      ]);

      $stadium = Stadium::find($request->id);
      $stadium->city = $request->city;
      $stadium->name = $request->name;
      $stadium->capacity = $request->capacity;
      $stadium -> save();

      return $stadium->id;
   }

   public function destroy($id, Stadium $stadium) {
      $stadium = Stadium::find($id);
      $stadium -> delete();
      return 1;
   }


/*
    public function order($column)
    {
        if(session()->get('StadiumOrder[0]') == $column)
          if(session()->get('StadiumOrder[1]') == 'desc')
            session()->put('StadiumOrder[1]', 'asc');
          else
            session()->put('StadiumOrder[1]', 'desc');
        else
        {
          session()->put('StadiumOrder[2]', session()->get('StadiumOrder[0]'));
          session()->put('StadiumOrder[0]', $column);
          session()->put('StadiumOrder[3]', session()->get('StadiumOrder[1]'));
          session()->put('StadiumOrder[1]', 'asc');
        }

        return redirect( $_SERVER['HTTP_REFERER'] );
    }


    public function show($id, $view='', StadiumRepository $stadiumRepo)
    {
        if( empty(session() -> get('stadiumView')) )  session() -> put('stadiumView', 'showInfo');
        if($view)  session() -> put('stadiumView', $view);
        session() -> put('stadiumSelected', $id);
        $stadium = $stadiumRepo -> find($id);
        $previous = $stadiumRepo -> PreviousRecordId($id);
        $next = $stadiumRepo -> NextRecordId($id);

        switch( session() -> get('stadiumView') ) {
          case 'showInfo':
              return view('stadium.show', ["stadium"=>$stadium, "previous"=>$previous, "next"=>$next])
                  -> nest('subView', 'stadium.showInfo', ["stadium"=>$stadium]);
          break;
          default:
              printf('<p style="background: #bb0; color: #f00; font-size: x-large; text-align: center; border: 3px solid red; padding: 5px;">Widok %s nieznany</p>', session() -> get('stadiumView'));
          break;
        }
    }


   */
}