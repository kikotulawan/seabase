<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFO TO THE MASTER</title>
    <style>
        body {
            font-family: Helvetica, Arial, Sans-Serif;
            font-size: 12px;
        }
        table {
            border-spacing: 10px;
            /* border-width: thin; */
            border-spacing: 0px;
            border-style: none;
            /* border: 0.5px solid black; */
            width: 100%
        }
        td, th {
            /* border: 0.5px solid black; */
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
            /* border: 0px solid black; */
            margin: 20px;
            padding: 20px;
            }
        .border{
            /* border: 1px solid black; */

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
    <div>

            <h3 style="text-align: right">{{ $agency->agency}}</h3>
            <div style="width: 200px;float:right;margin-bottom: 55px;">
                <small>{{ $agency->address}}</small> <br>
            </div>
    </div>
    <hr>
    Date:	{{date('d F Y')}} <br>
    Principal:	{{$embarkation['principal_name']}} <br>
    Attention:	Mr. Huub Siegers <br>
    Fax Number:	+63 2 567 2120 <br>
    Regarding:	Info crew joining vessel : {{$embarkation['vessel_name']}}. <br>

    <hr>


    <table class="table">
        <tr>
            <th>Personal Info</th>
            <th>Vessel Position</th>
        </tr>
        <tr>
            <td width="100px">
                Name of crew <br>
                Date of Birth <br>
                Place of Birth <br>
                Status <br>
                Address <br>
            </td>
            <td>
                <label for="">{{$crew->last_name .', ' .$crew->first_name . ' ' .$crew->middle_name}}</label> <br>
                <label for="">{{ $crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date)) : '' }}</label> <br>
                <label for="">{{ $crew->birth_place }}</label> <br>
                <label for="">{{ $crew->civil_status }}</label> <br>
                <label for="">{{ $crew->contact_address }}</label>
            </td>
            <td width="100px">
                Vessel <br>
                Position <br>
                Departure Manila
            </td>
            <td>
                <label for="">{{$embarkation['vessel_name']}}</label> <br>
                <label for="">{{ $crew->rank }}</label> <br>
                <label for="">{{ $embarkation['departure_place'] }}</label>
            </td>
        </tr>
    </table>
    <br>
    <p class="label">Official Documents</p>
    <table class="table">
        <thead>
            <tr>
                <th ></th>
                <th>Nos</th>
                <th>Issued</th>
                <th>Expiry</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="100px">Passport</td>
                <td>{{$passport['document_number']}}</td>
                <td width="100px">{{$passport['issue_date'] ? date('d-M-Y', strtotime($passport['issue_date'])) : ''  }}</td>
                <td>{{$passport['expiry_date'] ? date('d-M-Y', strtotime($passport['expiry_date'])) : ''  }}</td>
            </tr>
            <tr>
                <td width="100px">FSMB</td>
                <td>{{$fsmb['document_number']}}</td>
                <td width="100px">{{$fsmb['issue_date'] ? date('d-M-Y', strtotime($fsmb['issue_date'])) : ''  }}</td>
                <td>{{$fsmb['expiry_date'] ? date('d-M-Y', strtotime($fsmb['expiry_date'])) : ''  }}</td>

            </tr>
            <tr>
                <td width="100px">VISA</td>
                <td>{{$visa['document_number']}}</td>
                <td width="100px">{{$visa['issue_date'] ? date('d-M-Y', strtotime($visa['issue_date'])) : ''  }}</td>
                <td>{{$visa['expiry_date'] ? date('d-M-Y', strtotime($visa['expiry_date'])) : ''  }}</td>

            </tr>
            <tr>
                <td width="100px">OEC</td>
                <td>{{$oec['document_number']}}</td>
                <td width="100px">{{$oec['issue_date'] ? date('d-M-Y', strtotime($oec['issue_date'])) : ''  }}</td>
                <td>{{$oec['expiry_date'] ? date('d-M-Y', strtotime($oec['expiry_date'])) : ''  }}</td>

            </tr>
            <tr>
                <td width="100px">PDOS</td>
                <td>{{$pdos['document_number']}}</td>
                <td width="100px">{{$pdos['issue_date'] ? date('d-M-Y', strtotime($pdos['issue_date'])) : ''  }}</td>
                <td>{{$pdos['expiry_date'] ? date('d-M-Y', strtotime($pdos['expiry_date'])) : ''  }}</td>

            </tr>
            <tr>
                <td width="100px">Medical</td>
                <td>{{$medical['document']}}</td>
                <td width="100px">{{$medical['issue_date'] ? date('d-M-Y', strtotime($medical['issue_date'])) : ''  }}</td>
                <td>{{$medical['expiry_date'] ? date('d-M-Y', strtotime($medical['expiry_date'])) : ''  }}</td>

            </tr>
        </tbody>

    </table>
    <br>

    <p class="label">Flag State Documents</p>
    <table class="table">
        <thead>
            <tr>
                <th ></th>
                <th>Issued</th>
                <th>Expiry</th>
            </tr>
        </thead>
       <tbody>
        @foreach ($flags as $flag )
        <tr>
            <td width="150px" style="border:none">{{$flag['flag_name']}}</td>
            <td width="100px"  style="border:none">{{$flag['issue_date'] ? date('d-M-Y', strtotime($flag['issue_date']))  : '' }}</td>
            <td style="border:none">{{$flag['expiry_date'] ? date('d-M-Y', strtotime($flag['expiry_date']))  : '' }}</td>

        </tr>

        @endforeach
       </tbody>
    </table>
    <p class="label">Flag State Documents</p>
    <table class="table" boreder="1">
        <thead>
            <tr>
                <th>Wage Info</th>
                <th></th>
                <th>Payees</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="150px"></td>
                <td>monthly</td>
                <td width="150px"></td>
                <td></td>
            </tr>
            <tr>
                <td width="150px">Basic</td>
                <td>@foreach ($salary as $s )
                    @if($s->description=='Basic Pay')
                    {{ '$ ' . $s->monthly .' ' . $s->remarks}}
                    @endif
                @endforeach &nbsp;</td>
                <td width="150px">Name of Allottee</td>
                <td>{{ $allottee['account_name']}}</td>
            </tr>
            <tr>
                <td>Overtime</td>
                <td>@foreach ($salary as $s )
                    @if($s->description=='Overtime')
                    {{ '$ ' . $s->monthly}}
                    @endif
                @endforeach &nbsp;</td>
                <td>Relationship</td>
                <td>{{ $allottee['relationship']}}</td>
            </tr>
            <tr>
                <td>Gas/Tanker Allowance</td>
                <td></td>
                <td>Bank, Branch</td>
                <td>{{ $allottee['bank']}} - {{ $allottee['branch']}}</td>
            </tr>
            <tr>
                <td>Owner's Bonus</td>
                <td>@foreach ($salary as $s )
                    @if($s->description=='Owners Bonus')
                    {{ '$ ' . $s->monthly .' ' . $s->remarks}}
                    @endif
                @endforeach &nbsp;</td>
                <td>Bank Account No.</td>
                <td>{{ $allottee['account_number']}}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>{{'$ ' .    $add_to_total->monthly}}</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Allotment</td>
                <td>{{'$ ' .    $total_allotment->allotment}}</td>
                <td>Beneficiary(Insur)</td>
                <td>{{$beneficiary['name']}}</td>
            </tr>
            <tr>
                <td>Pay on Board</td>
                <td>{{'$ ' .    $pob}}</td>
                <td>Relationship</td>
                <td>{{$beneficiary['relationship']}}</td>
            </tr>
            <tr>
                <td>OT/hour</td>
                <td>@foreach ($salary as $s )
                    @if($s->description=='If OT in excess of 103 hrs' || $s->description=='If OT in excess of 85 hrs')
                    {{  $s->description }}
                    @endif
                @endforeach</td>
                <td>@foreach ($salary as $s )
                    @if($s->description=='If OT in excess of 103 hrs' || $s->description=='If OT in excess of 85 hrs')
                    {{ '$ ' .  $s->monthly }}
                    @endif
                @endforeach</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="label">Training and Other Certificates</p>
    <table class="table">
        <thead>
            <tr>
                <th>Course</th>
                <th>Training Center</th>
                <th>Issued</th>
                <th>Valid Till</th>
            </tr>
        </thead>
       <tbody>
        @foreach ($trainings as $t )
        <tr>
            <td width="200px" style="border:none">{{$t['course']}}</td>
            <td width="200px"  style="border:none">{{$t['center']}}</td>
            <td style="border:none">{{$t['issue_date'] ? date('d-M-Y', strtotime($t['issue_date']))  : '' }}</td>
            <td style="border:none">{{$t['expiry_date'] ? date('d-M-Y', strtotime($t['expiry_date']))  : '' }}</td>

        </tr>

        @endforeach
       </tbody>
    </table>
</body>
</html>
