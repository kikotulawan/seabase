<?php

namespace App\Repositories;

use App\CrewAllottee;
use App\CrewChildrenBenificiary;
use App\CrewDocument;
use App\CrewFlagStateDocument;
use App\CrewMedical;
use App\CrewTraining;
use App\EmbarkationDetail;

class TravelDocumentRepository
{
    public function documents($id){
        return CrewDocument::with('document')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'crew_id' => $query->crew_id,
                'document' => $query->document->document,
                'document_number' => $query->document_number,
                'issue_date' => $query->issue_date,
                'expiry_date' => $query->expiry_date,
                'issued_by' => $query->issued_by,
                'place_issued' => $query->place_issued,
            ];
        });
    }

    public function trainings($id){
        return CrewTraining::with('trainingcourse','trainingcenter')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'crew_id' => $query->crew_id,
                'course' => $query->trainingcourse->course,
                'center' => $query->trainingcenter->center,
                'certificate_number' => $query->certificate_number,
                'issue_date' => $query->issue_date,
                'expiry_date' => $query->expiry_date,
                'issued_by' => $query->issued_by,
                'place_issued' => $query->place_issued,
                'mlc' => $query->mlc,
                'stcw_code' => $query->stcw_code,
            ];
        });
    }

    public function flag($id){
        return CrewFlagStateDocument::with('flagstatedocument','license')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'crew_id' => $query->crew_id,
                'document_number' => $query->document_number,
                'issue_date' => $query->issue_date,
                'expiry_date' => $query->expiry_date,
                'flag_name' => $query->flagstatedocument->flag,

            ];
        });
    }
    public function embarkation($id){
        return EmbarkationDetail::with('embarkation','embarkation.vessel','embarkation.vessel.principal','embarkation.embarkationplace','embarkation.vessel.flagstatedocument','embarkation.departureplace')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'crew_id' => $query->crew_id,
                'principal_name' => $query->embarkation->vessel->principal->principal,
                'principal_address' => $query->embarkation->vessel->principal->address,
                'principal_email' => $query->embarkation->vessel->principal->email,
                'flag_name' => $query->embarkation->vessel->flagstatedocument->flag,
                'vessel_name' => $query->embarkation->vessel->vessel_name,
                'vessel_contact_person_no' => $query->embarkation->vessel->contact_person_no,
                'vessel_type' => $query->embarkation->vessel->vesseltype->vessel_type,
                'port_of_registry' => $query->embarkation->vessel->port_of_registry,
                'owner_name' => $query->embarkation->vessel->owner_name,
                'imo_number' => $query->embarkation->vessel->imo_number,
                'classification_society' => $query->embarkation->vessel->classification_society,
                'year_built' => $query->embarkation->vessel->year_built,
                'grt' => $query->embarkation->vessel->grt,
                'contract_duration' => $query->embarkation->contract_duration . " mos",
                'point_of_hire' => $query->embarkation->point_of_hire,
                'embarkation_date' => $query->embarkation->embarkation_date,
                'departure_date' => $query->embarkation->departure_date,
                'embarkation_place' => $query->embarkation->embarkationplace->seaport,
                'departure_place' => $query->embarkation->departureplace->airport,
                'cba' => $query->embarkation->vessel->cba,
                //'vessel_address' => $query->embarkation->vessel->address,

            ];
        });
    }

    public function travel_documents($id){
        return CrewDocument::whereHas('document', function($q)
        {
            $q->where('document','like','%Visa');

        })
        ->with('document')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'document_number' => $query->document_number,
                'document' => $query->document->document,
                'issue_date' => $query->issue_date,
                'expiry_date' => $query->expiry_date,
            ];
        });
    }

    public function medical($id){
        return CrewMedical::whereHas('medicalcertificate', function($q)
        {


        })
        ->with('medicalcertificate')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'certificate_number' => $query->certificate_number,
                'document' => $query->medicalcertificate->medicalcertificate,
                'issue_date' => $query->issue_date,
                'expiry_date' => $query->expiry_date,
            ];
        });
    }

    public function allottee($id){
        return CrewAllottee::with('bank','branch')
        ->where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'account_name' => $query->account_name,
                'bank' => $query->bank->bank,
                'branch' => $query->branch->branch,
                'relationship' => $query->relationship,
                'account_number' => $query->account_number,

            ];
        });
    }
    public function beneficiary($id){
        return CrewChildrenBenificiary::where('crew_id',$id)
        ->get()
        ->map(function($query){
            return [
                'id' => $query->id,
                'relationship' => $query->relationship,
                'name' => $query->first_name .  ' ' .$query->last_name,


            ];
        });
    }
}
