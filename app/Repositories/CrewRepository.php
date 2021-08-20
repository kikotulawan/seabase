<?php

namespace App\Repositories;

use App\Crew;
use Illuminate\Support\Facades\DB;

class   CrewRepository
{

    public function applicants(){
        return Crew::select('crews.*', 'ranks.id as rank_id','ranks.rank as rank','statuses.status as status','statuses.id as status_id','crew_vessels.id as vessel_id')
                ->leftJoin('crew_vessels', function($query) {
                    $query->on('crew_vessels.crew_id','=','crews.id')
                ->whereRaw('crew_vessels.id IN (select MAX(a2.id) from crew_vessels as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                //->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
                ->leftJoin('crew_ranks', function($query) {
                    $query->on('crew_ranks.crew_id','=','crews.id')
                ->whereRaw('crew_ranks.id IN (select MAX(a2.id) from crew_ranks as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
                ->leftJoin('crew_statuses', function($query) {
                    $query->on('crew_statuses.crew_id','=','crews.id')
                ->whereRaw('crew_statuses.id IN (select MAX(a2.id) from crew_statuses as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
            ->join('statuses', 'crew_statuses.status_id', '=', 'statuses.id')
            ->where('statuses.id', '<=', 5)
            ->latest();
    }

    public function crews(){
        return Crew::select(DB::raw('CONCAT(last_name, ", ", first_name, " " ,middle_name) AS full_name'),'crews.*', 'ranks.id as rank_id','ranks.rank as rank','statuses.status as status','statuses.id as status_id','crew_vessels.id as vessel_id')
                ->leftJoin('crew_vessels', function($query) {
                    $query->on('crew_vessels.crew_id','=','crews.id')
                ->whereRaw('crew_vessels.id IN (select MAX(a2.id) from crew_vessels as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->leftJoin('crew_ranks', function($query) {
                    $query->on('crew_ranks.crew_id','=','crews.id')
                ->whereRaw('crew_ranks.id IN (select MAX(a2.id) from crew_ranks as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
                ->leftJoin('crew_statuses', function($query) {
                    $query->on('crew_statuses.crew_id','=','crews.id')
                ->whereRaw('crew_statuses.id IN (select MAX(a2.id) from crew_statuses as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->join('statuses', 'crew_statuses.status_id', '=', 'statuses.id')

            ->where('statuses.id', '>=', 6)
            ->latest();
    }
    public function getById($id){

        return Crew::select('crews.*',
                        'ranks.id as rank_id',
                        'ranks.rank as rank',
                        'statuses.status as status',
                        'statuses.id as status_id',
                        'vessels.vessel_name as vessel_name',
                        'vessels.id as vessel_id',
                        'flag_state_documents.flag as flag_name',
                        'crew_education.course_degree as course_degree',
                        'crew_medicals.issue_date as medical_issue_date',
                        'crew_office_histories.remarks as office_history',
                        'crew_office_histories.created_at as office_datetime')
                ->leftJoin('crew_medicals', function($query) {
                    $query->on('crew_medicals.crew_id','=','crews.id')
                ->whereRaw('crew_medicals.id IN (select MAX(a2.id) from crew_medicals as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->leftJoin('crew_office_histories', function($query) {
                    $query->on('crew_office_histories.crew_id','=','crews.id')
                ->whereRaw('crew_office_histories.id IN (select MAX(a2.id) from crew_office_histories as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->leftJoin('crew_education', function($query) {
                    $query->on('crew_education.crew_id','=','crews.id')
                ->whereRaw('crew_education.id IN (select MAX(a2.id) from crew_education as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->leftJoin('crew_vessels', function($query) {
                    $query->on('crew_vessels.crew_id','=','crews.id')
                ->whereRaw('crew_vessels.id IN (select MAX(a2.id) from crew_vessels as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->leftjoin('vessels', 'crew_vessels.vessel_id', 'vessels.id')
                ->leftjoin('flag_state_documents', 'flag_state_documents.id', 'vessels.flag_id')
                ->leftJoin('crew_ranks', function($query) {
                    $query->on('crew_ranks.crew_id','=','crews.id')
                ->whereRaw('crew_ranks.id IN (select MAX(a2.id) from crew_ranks as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
                ->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
                ->leftJoin('crew_statuses', function($query) {
                    $query->on('crew_statuses.crew_id','=','crews.id')
                ->whereRaw('crew_statuses.id IN (select MAX(a2.id) from crew_statuses as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
                })
            ->join('statuses', 'crew_statuses.status_id', '=', 'statuses.id')
            ->where('crews.id', $id)
            ->first();


    }

    // public function getById($id){

    //     return Crew::select('crews.*', 'ranks.id as rank_id','ranks.rank as rank','statuses.status as status','statuses.id as status_id')
    //             // ->leftJoin('crew_vessels', function($query) {
    //             //     $query->on('crew_vessels.crew_id','=','crews.id')
    //             // ->whereRaw('crew_vessels.id IN (select MAX(a2.id) from crew_vessels as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
    //             // })
    //             //->join('vessels', 'crew_vessels.vessel_id', '=', 'vessels.id')
    //             ->leftJoin('crew_ranks', function($query) {
    //                 $query->on('crew_ranks.crew_id','=','crews.id')
    //             ->whereRaw('crew_ranks.id IN (select MAX(a2.id) from crew_ranks as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
    //             })
    //             ->join('ranks', 'crew_ranks.rank_id', '=', 'ranks.id')
    //             ->leftJoin('crew_statuses', function($query) {
    //                 $query->on('crew_statuses.crew_id','=','crews.id')
    //             ->whereRaw('crew_statuses.id IN (select MAX(a2.id) from crew_statuses as a2 join crews as u2 on u2.id = a2.crew_id group by u2.id)');
    //             })
    //         ->join('statuses', 'crew_statuses.status_id', '=', 'statuses.id')
    //         ->where('crews.id', $id)
    //         ->first();


    // }
}
