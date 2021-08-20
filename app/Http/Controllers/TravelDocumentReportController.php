<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Agent;
use App\CrewAllottee;
use App\CrewChildrenBenificiary;
use App\CrewDocument;
use App\CrewSalaryScale;
use App\CrewTraining;

use App\Repositories\CrewRepository;
use App\Repositories\EmbarkationRepository;
use App\Repositories\TravelDocumentRepository;
use App\Signatory;
use App\TravelDocumentReport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class TravelDocumentReportController extends Controller
{

    private $crewRepository;
    private $travelRepository;
    private $embarkation;
    public function __construct(CrewRepository $crewRepository,TravelDocumentRepository $travelRepository, EmbarkationRepository $embark)
    {
        $this->crewRepository=$crewRepository;
        $this->travelRepository=$travelRepository;
        $this->embarkation=$embark;
    }
    public function traveldocumentreports(){
        $output=TravelDocumentReport::orderBy('id','ASC')->get();
        //Post::orderBy('id', 'DESC')->get();
        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['id'] = $value->id;
                $nestedData['report_name'] = $value->report_name;
                $nestedData['slug'] = $value->slug;

                $nestedData['options'] = "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Preview' class='btn btn-default preview fas fa-print nav-icon'> Preview</a>";
                $data[] = $nestedData;

            }
        }
        $json_data = array(

            "data"            => $data
            );

            return json_encode($json_data);
        // return response()->json();
    }

    public function cv_standard($id){
        $crew=$this->crewRepository->getById($id);
        $document= CrewDocument::where(['crew_id' => $id])->with('document')->get();
        $trainings= CrewTraining::where(['crew_id' => $id])->with('trainingcourse')->get();

        $pdf = PDF::loadView('reports.cvstandard',
            ['crew' => $crew,
            'document' => $document,
            'trainings' =>$trainings
            ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->stream('cv-standard.pdf');
    }

    public function seafarer_employment_contract($id){
        $crew=$this->crewRepository->getById($id);
        $passport=$this->travelRepository->documents($id)
                    ->where('document','Passport')
                    ->first();
        $fsmb=$this->travelRepository->documents($id)
                    ->where('document','FSMB')
                    ->first();
        $agency=Agency::find(1);
        $trainings=$this->travelRepository->trainings($id);
        $embarkation=$this->travelRepository->embarkation($id)->last();
        $salary=CrewSalaryScale::where('crew_id',$id)->get();
        $report='';
        if($crew->flag_name=='Dutch'){
            $report='reports.seafarer_employment_contract_dutch';
        }else{
            $report='reports.seafarer_employment_contract_itf';
        }
        $pdf = PDF::loadView($report,
        [
            'crew' => $crew,
            'passport' => $passport,
            'fsmb' => $fsmb,
            'agency' => $agency,
            'trainings' => $trainings,
            'embarkation' => $embarkation,
            'salary' => $salary,

        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function dutch_contract($id){
        $crew=$this->crewRepository->getById($id);


        $embarkation=$this->travelRepository->embarkation($id)->last();
        $pdf = PDF::loadView('reports.dutch_contract',
        [
             'crew' => $crew,

             'embarkation' => $embarkation
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function letter_of_guarantee(Request $request){
    //     $this->validate($request, [
    //         'signatory_id' => 'required',
    //         'agent_id' => 'required'
    //      ],
    //      ['required' => 'Please select :attribute field'],
    //      ['signatory_id' => 'Signatory','agent_id' => 'Agent'],

    //  );

        $crew=$this->crewRepository->getById($request->crew_id);
        $agent=Agent::find($request->agent_id);
        $signatory=Signatory::find($request->signatory_id);

        $embarkation=$this->travelRepository->embarkation($request->crew_id)->last();
        $pdf = PDF::loadView('reports.letter_of_guarantee',
        [
             'crew' => $crew,
             'embarkation' => $embarkation,
             'agent' => $agent,
             'signatory' => $signatory,
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        return $pdf->stream();
        //phpreturn $pdf->stream('cv-standard.pdf',array('Attachment'=>0));
    }
    public function info_to_the_master(Request $request){
    //     $test=$request->validate([
    //         'allottee_id' => ['required'],
    //         'beneficiary_id' => ['required'],
    //         'visa_id' => ['required'],
    //       ]);
    //       return response()->json([
    //         'message' => $test
    //    ]);
    //      exit();
        $crew=$this->crewRepository->getById($request->crew_id);
        $passport=$this->travelRepository->documents($request->crew_id)->where('document','Passport')->first();
        $fsmb=$this->travelRepository->documents($request->crew_id)->where('document','FSMB')->first();
        $oec=$this->travelRepository->documents($request->crew_id)->where('document','OEC')->first();
        $pdos=$this->travelRepository->documents($request->crew_id)->where('document','PDOS')->first();
        $visa=$this->travelRepository->documents($request->crew_id)->where('id',$request->visa_id)->first();
        $medical=$this->travelRepository->medical($request->crew_id)->where('id',$request->medical_id)->first();
        $flag=$this->travelRepository->flag($request->crew_id);
        $trainings=$this->travelRepository->trainings($request->crew_id);
        $embarkation=$this->travelRepository->embarkation($request->crew_id)->last();
        $agency=Agency::find(1);
        $salary=CrewSalaryScale::where('crew_id',$request->crew_id)->get();
        $allottee=$this->travelRepository->allottee($request->crew_id)->where('id',$request->allottee_id)->first();
        $beneficiary=$this->travelRepository->beneficiary($request->crew_id)->where('id',$request->beneficiary_id)->first();
        $total_allotment=CrewAllottee::selectRaw('SUM(allotment) as allotment')->where('crew_id',$request->crew_id)
        ->groupBy(['crew_id'])->first();
        $add_to_total=CrewSalaryScale::selectRaw('SUM(monthly) as monthly')->where(['add_to_total'=> 1,'crew_id' => $request->crew_id])
        ->groupBy(['crew_id'])->first();
        $pob=$add_to_total->monthly-$total_allotment->allotment;
        $pdf = PDF::loadView('reports.info_to_the_master',
        [
             'crew' => $crew,
             'embarkation' => $embarkation,
             'passport' => $passport,
             'fsmb' => $fsmb,
             'oec' => $oec,
             'pdos' => $pdos,
             'flags' =>$flag,
             'trainings' =>$trainings,
             'visa' =>$visa,
             'agency' =>$agency,
             'medical' =>$medical,
             'salary' =>$salary,
             'allottee' =>$allottee,
             'beneficiary' =>$beneficiary,
             'total_allotment' =>$total_allotment ,
             'add_to_total' => $add_to_total,
             'pob' => $pob
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        //dd($request->all());
        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function jsu_contract(Request $request){
        $crew=$this->crewRepository->getById($request->crew_id);
        $passport=$this->travelRepository->documents($request->crew_id)
                    ->where('document','Passport')
                    ->first();
                    $fsmb=$this->travelRepository->documents($request->crew_id)
                    ->where('document','FSMB')
                    ->first();
        $agency=Agency::find(1);
        $salary=CrewSalaryScale::where('crew_id',$request->crew_id)->get();
        $embarkation=$this->travelRepository->embarkation($request->crew_id)->last();
        $signatory=Signatory::find($request->jsu_signatory_id);
        $pdf = PDF::loadView('reports.jsu_contract',
        [
            'crew' => $crew,
            'passport' =>$passport,
            'embarkation' => $embarkation,
            'fsmb' => $fsmb,
            'agency' => $agency,
            'salary' => $salary,
            'signatory' => $signatory,
            'accomplished_date' =>$request->accomplished_date
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function contract_of_employment(Request $request){
        $crew=$this->crewRepository->getById($request->crew_id);
        $passport=$this->travelRepository->documents($request->crew_id)
                    ->where('document','Passport')
                    ->first();
        $fsmb=$this->travelRepository->documents($request->crew_id)
            ->where('document','FSMB')
            ->first();
        $src=$this->travelRepository->documents($request->crew_id)
            ->where('document','Crew ERS# (SBECS)')
            ->first();
        $agency=Agency::findOrFail(1);
        $salary=CrewSalaryScale::where('crew_id',$request->crew_id)->get();
        $embarkation=$this->travelRepository->embarkation($request->crew_id)->last();
        $signatory=Signatory::find($request->coe_signatory_id);
        $pdf = PDF::loadView('reports.contract_of_employment',
        [
            'crew' => $crew,
            'passport' =>$passport,
            'embarkation' => $embarkation,
            'fsmb' => $fsmb,
            'agency' => $agency,
            'salary' => $salary,
            'signatory' => $signatory,
            'src' => $src,
            'hours_work' => $request->coe_hours . ' hrs/wk'
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function poea_info_sheet($id){
        $crew=$this->crewRepository->getById($id);
        $passport=$this->travelRepository->documents($id)
                    ->where('document','Passport')
                    ->first();
        $fsmb=$this->travelRepository->documents($id)
            ->where('document','FSMB')
            ->first();
        $src=$this->travelRepository->documents($id)
            ->where('document','Crew ERS# (SBECS)')
            ->first();
        $agency=Agency::findOrFail(1);
        $salary=CrewSalaryScale::where('crew_id',$id)->get();
        $embarkation=$this->travelRepository->embarkation($id)->last();
        $beneficiary =CrewChildrenBenificiary::where(['crew_id' => $id,'type' => 'B'])->get();
        $children =CrewChildrenBenificiary::where(['crew_id' => $id,'type' => 'C'])->get();
        $allottee=$this->travelRepository->allottee($id);
        $pdf = PDF::loadView('reports.poea_info_sheet',
        [
            'crew' => $crew,
            'passport' =>$passport,
            'embarkation' => $embarkation,
            'fsmb' => $fsmb,
            'agency' => $agency,
            'salary' => $salary,
            'src' => $src,
            'beneficiary' =>$beneficiary,
            'children' =>$children,
            'allottee' =>$allottee,
        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }

    public function poea_seafarer_info_sheet($id){
        $crew=$this->crewRepository->getById($id);

        $beneficiary =CrewChildrenBenificiary::where(['crew_id' => $id,'type' => 'B'])->get();
        $children =CrewChildrenBenificiary::where(['crew_id' => $id,'type' => 'C'])->get();
        $allottee=$this->travelRepository->allottee($id);
        $pdf = PDF::loadView('reports.poea_seafarer_info_sheet',
        [
            'crew' => $crew,

            'beneficiary' =>$beneficiary,
            'children' =>$children,

        ])->setPaper('a4', 'portrait');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);


        //dd($test);
        return $pdf->stream('cv-standard.pdf');
    }
    public function show($id){
        // $posts = CrewSalaryScale::selectRaw('SUM(monthly) as monthly')->where('add_to_total',1)
        // ->groupBy(['crew_id'])->first();;
        // dd($salary=CrewSalaryScale::where('crew_id',$id)->get());

        // $test=CrewSalaryScale::where('crew_id',1)->get();
        // dd($test);
        //return $pdf->stream('cv-standard.pdf');
        dd($this->embarkation->embarkation($id));
    }

    public function test(Request $request){


    }
}
