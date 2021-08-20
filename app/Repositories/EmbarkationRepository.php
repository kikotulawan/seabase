<?php

namespace App\Repositories;

use App\Embarkation;

class EmbarkationRepository
{




    public function embarkation($id){
        return Embarkation::where('id',$id)
        ->with('vessel','vessel.principal','departureplace','embarkationplace')
        ->first();
        // ->map(function($query){
        //     return [
        //         'id' => $query->id,

        //         // 'principal_name' => $query->embarkation->vessel->principal->principal,
        //         // 'principal_address' => $query->embarkation->vessel->principal->address,
        //         // 'principal_email' => $query->embarkation->vessel->principal->email,
        //         // 'flag_name' => $query->embarkation->vessel->flagstatedocument->flag,
        //          'vessel_name' => $query->embarkation->vessel->vessel_name,
        //         // 'vessel_contact_person_no' => $query->embarkation->vessel->contact_person_no,
        //         // 'vessel_type' => $query->embarkation->vessel->vesseltype->vessel_type,
        //         // 'port_of_registry' => $query->embarkation->vessel->port_of_registry,
        //         // 'owner_name' => $query->embarkation->vessel->owner_name,
        //         // 'imo_number' => $query->embarkation->vessel->imo_number,
        //         // 'classification_society' => $query->embarkation->vessel->classification_society,
        //         // 'year_built' => $query->embarkation->vessel->year_built,
        //         // 'grt' => $query->embarkation->vessel->grt,
        //         'contract_duration' => $query->contract_duration . " mos",
        //         'point_of_hire' => $query->point_of_hire,
        //         'embarkation_date' => $query->embarkation_date,
        //         'departure_date' => $query->departure_date,
        //         'embarkation_place' => $query->embarkationplace->seaport,
        //         'departure_place' => $query->departureplace->airport,
        //         // 'cba' => $query->embarkation->vessel->cba,
        //         //'vessel_address' => $query->embarkation->vessel->address,

        //     ];
        // });
    }




}
