<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Crew;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id=1;
        // $query = Crew::select('crews.*', 'ranks.rank as rank','statuses.status as status')
        //         ->leftJoin('crew_ranks', function($query) {
        //             $query->on('crew_ranks.crew_id','=','crews.id')
        //         ->whereRaw('crew_ranks.id IN (select MAX(a2.id) from crew_ranks as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
        //         })
        //     ->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
        //     ->leftJoin('crew_statuses', function($query) {
        //         $query->on('crew_statuses.crew_id','=','crews.id')
        //     ->whereRaw('crew_statuses.id IN (select MAX(a2.id) from crew_statuses as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
        //     })
        //     ->join('statuses', 'crew_statuses.status_id', '=', 'statuses.id')
        //     ->where('crews.id', '=', $id)->first();

        // $pdf = PDF::loadView('test',['crew' => $query])->setPaper('a4', 'portrait');
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // //return $pdf->stream('invoice.pdf');

        return view('home');
    }

    public function test(){

        $branch=Branch::all();
        $pdf = PDF::loadView('test',['branch' => $branch])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->stream('invoice.pdf');
    }
}
