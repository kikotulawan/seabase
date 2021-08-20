<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSU CONTRACT</title>
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

            <h3>SEAFARER'S EMPLOYMENT CONTRACT</h3>

    </div>
    <p>
        Date ....................... {{$accomplished_date}}.................... and agreed to be effective from ..........................UPON DEPARTURE.............................
        {{-- Date: {{ date('d-M-Y') }} and agreed to be effective from date of departure {{ $embarkation['point_of_hire'] }} .
        {{ $embarkation['embarkation_place'] }},  {{ date('d-M-Y', strtotime($embarkation['embarkation_date']))   }} of commencement of service on board. --}}
    </p>

    <table width="100%" class="table">
        <tr><td class"border"> This Employment Contract is entered into between the Seafarer and the Onwer/Agent of the Owner of the Ship ................{{$embarkation['principal_name']}}................
            (hereinafter called the Company.) ............CONAUTIC MARITIME INC.............</td></tr>

    </table>
    <p class="label">THE SEAFARER</p>
    <table width="100%" class="table" >
        <tr>
            <td width="50%">Last Name : <br>{{$crew->last_name}}</td>
            <td>First Name: <br> {{$crew->first_name}}</td>
        </tr>
        <tr>
            <td valign="top" colspan="2">Home Address: <br> {{$crew->contact_address }}<br></td>

        </tr>
        <tr>
            <td>Position : <br>{{$crew->rank}}</td>
            <td>Medical Certificates issued on: <br> {{$crew->medical_issue_date ? date('d-M-Y', strtotime($crew->medical_issue_date))  : '' }}</td>
        </tr>
        <tr>
            <td>Estimated time of taking up position: <br>
                UPON DEPARTURE
            </td>
            <td>Port where position is taken up: <br>
                {{$embarkation['embarkation_place']}}
            </td>
        </tr>

        <tr>
            <td>Nationality :  <br> {{ $crew->nationality  }}</td>
            <td>
                <span style="margin-right:1em">Passport No:</span>  <br>{{ $passport['document_number']}}
            </td>
        </tr>
        <tr>
            <td>
                <span style="margin-right:1em">Date of Birth :</span>  <br> {{$crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }}
            </td>
            <td>
                <span style="margin-right:1em">Seaman's book no:</span>  <br>{{ $fsmb['document_number']}}
            </td>
        </tr>
    </table>


    <!-- AGENCY -->
    <p class="label">THE EMPLOYER</p>

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
   <p class="label">THE SHIP</p>
   <table width="100%" class="table" >
       <tr>
           <td width="100px">Name : <br>{{$embarkation['vessel_name']}} </td>
           <td>IMO Number: <br> {{$embarkation['imo_number']}}</td>

       </tr>
       <tr>
           <td width="100px">Flag : <br>{{$embarkation['flag_name']}}</td>
           <td width="100px">Port of registry : <br>{{$embarkation['port_of_registry']}}</td>

       </tr>
   </table>


   <!-- TERMS -->
   <p class="label">TERMS OF CONTRACT</p>
   <table width="100%" class="table" >
       <tr>
           <td valign="top">Period of employment: : <br> {{$embarkation['contract_duration']}}&nbsp;</td>
           <td valign="top">Wages from and including: <br>
            UPON DEPARTURE
        </td>
           <td valign="top"> Basic hours of work per week: <br>
            40 HOURS PER WEEK</td>

       </tr>
       <tr>
        <td>Basic Monthly Wage : <br>
            @foreach ($salary as $s )
            @if($s->description=='Basic Pay')
                {{ '$ ' . $s->monthly}}
            @endif&nbsp;
            @endforeach
        </td>
        <td>Monthly Overtime : <br>
            @foreach ($salary as $s )
            @if($s->description=='Overtime')
            {{ '$ ' . $s->monthly }}
            @endif
        @endforeach &nbsp;</td>
            <td>Overtime rate for hours worked in excess of xxx hrs:</td>
        </tr>
       <tr>
            <td>Leave: Number of days per month</td>
            <td>Monthly leave pay: <br>
                @foreach ($salary as $s )
                @if($s->description=='Leave Pay')
                {{ '$ ' . $s->monthly }}
                @endif
            @endforeach
            </td>

            <td>Monthly substinence allowance on leave: <br>
                @foreach ($salary as $s )
                @if($s->description=='Leave Subsistence')
                {{ '$ ' . $s->monthly }}
                @endif
            @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="3" valign="top">

                    1. The current IBF Collective shall be considered to be incorporated into and to form part of the contract

            </td>
        </tr>
        <tr>
            <td colspan="3" valign="top" >

                    2. The Ship's Artivles shall be deemed for all purposes to include the terms of this Contract (including the applicable IBF Agreement) and it shall be the duty of the Company to ensure that the Ship's Article reflect these terms. These terms shall take precedence over all other terms.
            </td>
        </tr>
        <tr>
            <td colspan="3" valign="top">

                    3. The Seafarer has read, understood the agreed to the terms and conditions of employment as indentified in the Collective Agreement and entres into this Contract freely.
                 </td>

        </tr>

   </table>


   <!-- FOOTER   -->
   <p class="label">CONFIRMATION OF THE CONTRACT</p>
   <table width="100%" class="table" >
       <tr>
            <td> Signature of Employer: : <br>
                <p style="text-align: center"><strong>{{$signatory->name}}</strong><br>{{$signatory->position}}</p>


            </td>
            <td> Signature of Seafarer: <br> &nbsp;
                <p style="text-align: center">{{$crew->last_name .', ' .$crew->first_name}}</p>
            </td>
       </tr>

   </table>
</body>
</html>
