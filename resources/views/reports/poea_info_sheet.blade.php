<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POEA INFO SHEET</title>
    <style>
        body {
            font-family: Helvetica, Arial, Sans-Serif;
            font-size: 11px;
        }
        table {
            border-spacing: 10px;
            border-width: thin;
            border-spacing: 0px;
            border-style: none;
            /* border: 0.5px solid black; */
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
    <table class="table" width="100%" border="1">
        <tr>
            <td width="170px" style="border-top: thin solid; border-bottom: thin solid; border-right: thin solid;">
                LATEST PAYMENT MADE <br>
                1. OWWA <br> Membership _______________<br>
                2. Philhealth/Medicare __________________________
            </td>
            <td style="border: none;text-align:center">

                    PHILIPPINE OVERSEAS EMPLOYMENT ADMINISTRATION <br>
                    OVERSEAS WORKERS WELFARE ADMINISTRATION <br>
                    PHILIPPINE HEALTH INSURANCE CORPORATION <br>


            </td>
            <td width="170px" style="border-top: thin solid; border-bottom: none; border-right: thin solid;text-align:center;font-size:9px">
                <strong>DO NOT WRITE ON THIS SPACE</strong> <br>
                (For POEA, OWWA, Philhealth Use Only) <br>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>CG No.</td>
                        <td width="120px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>RPS No.</td>
                        <td width="115px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>Assessment No.</td>
                        <td width="76px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>

            </td>

        </tr>
        <tr>
            <td style="border-top: none; border-bottom: none; border-right: none;border-left:none">
                <table class="table" >
                    <tr>
                        <td>OFW e-Card / ID No.</td>
                        <td width="60px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>
                <table class="table" >
                    <tr>
                        <td>SSS No.</td>
                        <td width="120px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">{{$crew->sss_no}}</td>
                    </tr>
                </table>
                <table class="table" >
                    <tr>
                        <td>SRC No.</td>
                        <td width="120px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none"> {{ $src['document_number']}}&nbsp;</td>
                    </tr>
                </table>
                <table class="table" >
                    <tr>
                        <td width="20px">Philhealth No.</td>
                        <td width="95px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">{{$crew->philhealth_no}}&nbsp;</td>
                    </tr>
                </table>
            </td>
            <td style="border: none;text-align:center"><h4>INFORMATION SHEET</h4></td>
            <td style="border-top: none; border-bottom: thin solid; border-right: thin solid;">


                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>Assessment Amount</td>
                    </tr>
                </table>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>POEA</td>
                        <td width="125px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>OWWA</td>
                        <td width="118px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table>
                <table class="table" style="font-size: 11px">
                    <tr>
                        <td>PHILHEALTH</td>
                        <td width="86px" style="border-top: none; border-bottom: thin solid; border-right: none;border-left:none">&nbsp;</td>
                    </tr>
                </table></td>
        </tr>
    </table>

    <strong><p>I. PERSONAL DATA</p> </strong>
    <table class="table" width="100%">
        <tr>
            <td width="100px" style="border: none">Name of Seafarer:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->last_name .', ' .$crew->first_name . ' ' .$crew->middle_name}}</td>
        </tr>
    </table>

    <table class="table" >
        <tr>
            <td width="50px" style="border: none">Address in the Philippines: (Tirahan):</td>
            <td width="510px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->contact_address}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="50px" style="border: none">Telephone No.</td>
            <td width="150px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->telephone}}</td>
            <td width="50px" style="border: none">Cellphone No.</td>
            <td width="150px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{$crew->mobile_no}}</td>
            <td width="40px" style="border: none">Email Address</td>
            <td width="27px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{ $crew->email }}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="80px" style="border: none">Date Of Birth:</td>
            <td width="80px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }}</td>
            <td width="30px" style="border: none">Gender:  </td>
            <td width="90px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{$crew->gender}} </td>
            <td width="70px" style="border: none">Civil Status :</td>
            <td width="107px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{ $crew->civil_status }}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="50px" style="border: none">Place of Birth:</td>
            <td width="625px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->birth_place}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="60px" style="border: none">SIRB No.:</td>
            <td width="80px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $fsmb['document_number']}}</td>
            <td width="70px" style="border: none">Passport No.:</td>
            <td width="90px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $passport['document_number']}}
            </td>
            <td width="100px" style="border: none">Highest Educational Attainment:</td>
            <td width="170px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{$crew->course_degree}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="100px" style="border: none">Name of Spouse (if married)</td>
            <td width="205px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $crew->spouse_first_name . ' ' .$crew->spouse_middle_name . ' ' .$crew->spouse_last_name }}</td>
            <td width="120px" style="border: none">Mother's Full Maiden Name</td>
            <td width="205px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $crew->mothers_name}}
            </td>
        </tr>
    </table>
    <strong><p>Legal Beneficiaries (Mga tatanggap ng benepisyo mula sa OWWA)</p></strong>
    <table class="table" width="100%" >
        <thead>
            <tr >
                <th width="200px" style="text-align: center">Name</th>
                <th width="100px"style="text-align: center">Relationship to Worker</th>
                <th style="text-align: center">Address</th>
             </tr>
        </thead>
        <tbody>
            @if($beneficiary->count()>0)

                @foreach ($beneficiary as $b)
                    <tr>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$b->first_name . ' '. $b->middle_name . ' ' .$b->last_name}}</td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$b->relationship}}</td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$b->address}}</td>
                    </tr>
                @endforeach

            @else
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            @endif
        </tbody>

    </table>
    <strong><p>Allottee (Itinalaga ng padadalhan ng bahagi ng sahod ng OFW/Seafarer)</p></strong>
    <table class="table" width="100%">
        <tr>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                @foreach ($allottee as $a)
                    {{$a['account_name'] .'/'}}
                @endforeach
            </td>
        </tr>
    </table>
    <strong><p>Legal Dependents (Mga tatanggap ng benepisyo mula sa Philhealth)</p></strong>
    <table class="table" width="100%" >
        <thead>
            <tr >
                <th width="200px" style="text-align: center">Name of Spouse/Children/Parent</th>
                <th width="50px"style="text-align: center">Gender</th>
                <th style="text-align: center">Relationship of Dependent to Worker</th>
                <th style="text-align: center">Date of Birth</th>
             </tr>
        </thead>
        <tbody>
            @if($children->count()>0)

                @foreach ($children as $c)
                    <tr>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$c->first_name . ' '. $c->middle_name . ' ' .$c->last_name}}</td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$c->gender}}</td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$c->relationship}}</td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">{{$c->birth_date ? date('d-M-Y', strtotime($c->birth_date))  : '' }}</td>
                    </tr>
                @endforeach

            @else
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">&nbsp;</td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
                <td style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center"></td>
            </tr>
            @endif
        </tbody>

    </table>
    <strong><p>II. CONTRACT PARTICULARS</p></strong>
    <table class="table" width="100">
        <tr>
            <td width="220px" style="border: none">Name of Principal / Company / Employer</td>
            <td width="318px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['principal_name']}}</td>
            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="60px" style="border: none">Address</td>
            <td width="238px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['principal_address']}}</td>
            <td width="80px" style="border: none">Email Address</td>
            <td width="155px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['principal_email']}}</td>
            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="80px" style="border: none">Name of Vessel</td>
            <td width="238px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['vessel_name']}}</td>
            <td width="40px" style="border: none">Tel No. </td>
            <td width="175px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['vessel_contact_person_no']}}</td>
            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="130px" style="border: none">Position of OFW/Seafarer</td>
            <td width="200px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->rank}}</td>
            <td width="90px" style="border: none">Contract Duration</td>
            <td width="115px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['contract_duration']}}</td>
            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="80px" style="border: none">Monthly Salary</td>
            <td width="290px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                @foreach ($salary as $s )
                    @if($s->description=='Basic Pay')
                    {{ '$ ' . $s->monthly .' ' . $s->remarks}}
                    @endif
                @endforeach</td>
            <td width="20px" style="border: none">Currency</td>
            <td width="120px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                USD</td>
            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="380px" style="border: none">Last date of arrival in the Phils. of the OFW balik-manggagawa/seafarer</td>
            <td width="165px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>

            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="380px" style="border: none">Date of scheduled departure/return of balik-manggagawa to the jobsite</td>
            <td width="165px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>

            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>
    <table class="table" width="100">
        <tr>
            <td width="320px" style="border: none">Name of Philippine Recruitment/Manning Agency (if applicable)</td>
            <td width="225px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$agency->agency}}</td>

            <td>&nbsp;</td>
            <td width="150px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>
    </table>

    <p style="text-align: justify">I hereby certify that the above statements are true and correct and further declare that the above-named dependents have not been declared by my spouse/brother/sister. (Ako ay nagpapatunay na ang nasa itaas na pahayag ay totoo at tama at dagdag kong inihahayag na ang mga nasabing makikinabang sa itaas ay hindi inihayag ng aking asawa o kapatid.)</p>
    <table class="table" width="100">
        <tr>
            <td width="400px" style="border: none">&nbsp;</td>

            <td width="300px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                &nbsp;</td>
        </tr>

        <tr>
            <td width="400px" style="border: none">&nbsp;</td>

            <td width="300px"style="border=none;text-align:center;">
                <strong>Signature/Thumbmark of OFW/Seafarer</strong></td>
        </tr>
    </table>
</body>
</html>
