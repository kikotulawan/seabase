<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEAFARER EMPLOYMENT CONTRACT</title>
    <style>
        body {
            font-family: Helvetica, Arial, Sans-Serif;
            font-size: 12px;
        }
        table {
            border-spacing: 10px;
            border-width: thin;
            border-spacing: 0px;
            border-style: none;
            border: 0.5px solid black;
        }
        td, th {
            border: 0.5px solid black;
            padding: 2px;
            text-align: left;
            vertical-align: top;
        }
        label{
            font-weight:bold;
        }
        .padding {
            background-color: tomato;
            color: white;
            border: 2px solid black;
            margin: 20px;
            padding: 20px;
            }
        .border{
            border: 1px solid black;

        }
        .label{
            font-weight:bold;
        }
        .center {
            margin: auto;
            width: 50%;
            /* border: 3px solid green; */
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="center">

            <h3>SEAFARER EMPLOYMENT CONTRACT</h3>

    </div>
    <p>
        Date: {{ date('d-M-Y') }} and agreed to be effective from date of departure {{ $embarkation['point_of_hire'] }} .
        {{ $embarkation['embarkation_place'] }},  {{ $embarkation['embarkation_date'] ? date('d-M-Y', strtotime($embarkation['embarkation_date'])) : ''  }} of commencement of service on board.
    </p>

    <table width="100%" class="table">
        <tr><td class"border"> This employment contract is entered into between the Seafarer and the Employer</td></tr>

    </table>
    <p class="label">THE SEAFARER</p>
    <table width="100%" class="table" >
        <tr>
            <td width="50%">Surname : <strong>{{$crew->last_name}}</strong></td>
            <td>Given Name: <strong>{{$crew->first_name}}</strong></td>
        </tr>
        <tr>
            <td valign="top">Full home address : <br> {{$crew->contact_address }}</td>
            <td>
                Date of Birth : {{$crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }} <br>
                Place of Birth : {{$crew->birth_place}}<br>
                Nationality : {{$crew->nationality}}
            </td>
        </tr>
        <tr>
            <td>Position : {{$crew->rank}}</td>
            <td>Medical Certificates issued on: {{$crew->medical_issue_date ? date('d-M-Y', strtotime($crew->medical_issue_date))  : '' }}</td>
        </tr>
        <tr>
            <td colspan="2">Certificates(s) of competence<br>
                @if($trainings->count()>0)
                <table style="border:none;font-size:10px">
                    <thead>
                        <tr>
                          <th width="140px" style="border:none">Course/Title</th>
                          <th width="70px" style="border:none">Certificate No.</th>
                          <th width="60px" style="border:none">Issue Date</th>
                          <th width="60px" style="border:none">Expiry Date</th>
                          <th width="150px" style="border:none">Institution</th>
                          <th width="90px" style="border:none">Place</th>
                          <th width="60px" style="border:none">STCW Code</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($trainings as $training )
                        @if($training['mlc']===1)
                        <tr>
                            <td style="border:none">{{$training['course']}}</td>
                            <td style="border:none">{{$training['certificate_number']}}</td>
                            <td style="border:none">{{$training['issue_date'] ? date('d-M-Y', strtotime($training['issue_date']))  : '' }}</td>
                            <td style="border:none">{{$training['expiry_date'] ? date('d-M-Y', strtotime($training['expiry_date']))  : '' }}</td>
                            <td style="border:none">{{$training['center']}}</td>
                            <td style="border:none">{{$training['place_issued']}}</td>
                            <td style="border:none"> {{$training['stcw_code']}}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                @endif
            </td>
        </tr>
        <tr>
            <td>Sign On Date:  <span style="margin-right:4em"> {{ $embarkation['embarkation_date'] ? date('d-M-Y', strtotime($embarkation['embarkation_date'])) : ''   }}</span></td>
            <td>
                International Seaman's book no :  <br>
                Issue :
            </td>
        </tr>
        <tr>
            <td>
                <span style="margin-right:1em">Passport No:</span> {{ $passport['document_number']}} <br>
                <span style="margin-right:4em">Issue:</span> {{ $passport['issue_date'] ? date('d-M-Y', strtotime($passport['issue_date']))  : '' }} &nbsp;
                <span style="margin-right:2em">Expiry Date:</span> {{ $passport['expiry_date'] ? date('d-M-Y', strtotime($passport['expiry_date']))  : '' }}
            </td>
            <td>
                <span style="margin-right:1em">Philippine Seaman's book no:</span> {{ $fsmb['document_number']}} <br>
                <span style="margin-right:4em">Issue:</span> {{ $fsmb['issue_date'] ? date('d-M-Y', strtotime($fsmb['issue_date']))  : '' }} &nbsp;
                <span style="margin-right:2em">Expiry Date:</span> {{ $fsmb['expiry_date'] ? date('d-M-Y', strtotime($fsmb['expiry_date']))  : '' }}
            </td>
        </tr>
    </table>


    <!-- AGENCY -->
    <p class="label">THE EMPLOYER</p>
    <table width="100%" class="table" >
        <tr>
            <td width="100px">Name :</td>
            <td>{{$agency->agency}}</td>
        </tr>
        <tr>
            <td width="100px">Address :</td>
            <td>{{$agency->address}}</td>
        </tr>
    </table>

   <!-- PRINCIPAL -->
   <p class="label">SHIP'S OPERATOR</p>
   <table width="100%" class="table" >
       <tr>
           <td width="100px">Name :</td>
           <td>{{$embarkation['principal_name']}}</td>
       </tr>
       <tr>
           <td width="100px">Address :</td>
           <td>{{$embarkation['principal_address']}}</td>
       </tr>
   </table>

   <!-- vessel -->
   <p class="label">THE VESSEL</p>
   <table width="100%" class="table" >
       <tr>
           <td width="100px">Name :</td>
           <td>{{$embarkation['vessel_name']}}</td>
           <td>IMO Number: {{$embarkation['imo_number']}}</td>

       </tr>
       <tr>
           <td width="100px">Flag :</td>
           <td>{{$embarkation['flag_name']}}</td>
           <td></td>
       </tr>
   </table>


   <!-- TERMS -->
   <p class="label">TERMS OF CONTRACT</p>
   <table width="100%" class="table" >
       <tr>
           <td valign="top">Duration of Contract : <br> {{$embarkation['contract_duration']}}&nbsp;</td>
           <td valign="top"> Hours of Work : <br> 40hrs/wk</td>
           <td>Basic Monthly Salary : <br>
                @foreach ($salary as $s )
                    @if($s->description=='Basic Pay')
                        {{ '$ ' . number_format($s->monthly,2)}}
                    @endif&nbsp;
                @endforeach
            </td>


       </tr>
       <tr>
            <td>Vacation Leave with Pay : <br>
                @foreach ($salary as $s )
                    @if($s->description=='Leave Pay')
                        {{ '$ ' . number_format($s->monthly,2) }}
                    @endif
                @endforeach
            </td>
            <td>Leave Subsistence : <br>
                @foreach ($salary as $s )
                    @if($s->description=='Leave Subsistence')
                        {{ '$ ' . number_format($s->monthly, 2)}}
                    @endif
                @endforeach
            </td>
            <td>Collective Bargaining Agreement : <br> {{$embarkation['cba']}}&nbsp;</td>
        </tr>
       <tr>
            <td>Guaranteed Overtime : <br>
                @foreach ($salary as $s )
                    @if($s->description=='Overtime')
                        {{ '$ ' . number_format($s->monthly,2) . $s->remarks }}
                    @endif
                @endforeach
            </td>
            <td>Point of Hire : <br>{{$embarkation['point_of_hire']}} &nbsp;</td>
            <td>Owner's Bonus: <br>
                @foreach ($salary as $s )
                @if($s->description=='Owners Bonus')
                    {{ '$ ' . $s->monthly }}
                @endif
            @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="3">The ITF "TCC" COLLECTIVE BARGAINING AGREEMENT 2012 — 2014
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 8px">
                1. The current ITF Collective Agreement shall be considered to be incorporated into and to form part of this contract. <br>
                2. The ship's Articles shall be deemed for all purposes to include the terms of this Contract (including the ITF Collective Agreement) and it shall be the duty of the Employer to ensure that the Ship's Articles reflect these terms. These terms shall precedence over all the other terms. <br>
                3. The ITF may vary the terms and conditions of the ITF Collective Agreement from time to time. Terms and Conditions as so varied shall form part of this Contract with effect from the date of the Variation in place of the Terms and Conditions current immediately preceding the Variation.<br>
                4. Furthermore it is Expressly understood that the employee will observe and abide to the instructions and regulations provided by or on behalf of the employer including ISM instructions and regulations being applicable on board which amongst others contain strict provisions as to use of drugs, alcohol and/or medication.
            </td>
        </tr>
   </table>


   <!-- FOOTER   -->
   <p class="label">CONFIRMATION OF THE CONTRACT</p>
   <table width="100%" class="table" >
       <tr>
            <td> (The Master) : <br> &nbsp;</td>
            <td> (The Seafarer) <br> &nbsp;
                <p style="text-align: center">{{$crew->last_name .', ' .$crew->first_name}}</p>
            </td>
       </tr>

   </table>
</body>
</html>
