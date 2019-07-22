<?php
namespace App\Http\Controllers;
use App\Stadium;
use App\Repositories\StadiumRepository;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index(StadiumRepository $stadiumRepo)
    {
        $stadiums = $stadiumRepo -> getAllSortedAndPaginate();
        return view('stadium.index')
            -> nest('stadiumTable', 'stadium.table', ["stadiums"=>$stadiums, "links"=>true, "subTitle"=>""]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function edit(Stadium $stadium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stadium  $stadium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $stadium)
    {
        //
    }
}
