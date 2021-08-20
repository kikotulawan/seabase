<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTRACT OF EMPLOYMENT</title>
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
    <div class="center">
        Republic of the Philippines <br>
        Department of Labor and Employment <br>
        PHILIPPINE OVERSEAS EMPLOYMENT ADMINISTRATION <br>
        <h4>CONTRACT OF EMPLOYMENT</h4>
    </div>
    <strong><p>KNOW ALL MEN BY THESE PRESENTS:</p> </strong>
    <p style="text-indent: 40px">This Contract, entered into voluntarily by and between:</p>
    <table class="table" width="100%">
        <tr>
            <td width="100px" style="border: none">Name of Seafarer:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->last_name .', ' .$crew->first_name . ' ' .$crew->middle_name}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="80px" style="border: none">Date Of Birth:</td>
            <td width="70px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }}</td>
            <td width="30px" style="border: none">Age:</td>
            <td width="30px" style="border-top: none; border-bottom: thin solid; border-right: none;">23</td>
            <td width="40px" style="border: none">Place of Birth :</td>
            <td width="397px" style="border-top: none; border-bottom: thin solid; border-right: none;">{{ $crew->birth_place }}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="50px" style="border: none">Address:</td>
            <td width="645px"style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$crew->contact_address}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="60px" style="border: none">SIRB No.:</td>
            <td width="160px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $fsmb['document_number']}}</td>
            <td width="30px" style="border: none">SRC No.:</td>
            <td width="190px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $src['document_number']}}
            </td>
            <td width="70px" style="border: none">License No.:</td>
            <td width="150px" style="border-top: none; border-bottom: thin solid; border-right: none;">&nbsp;</td>
        </tr>
    </table>
    hereinafter referred to as the Seafarer <br>
    <div class="center" style="margin-top:10px;margin-bottom:10px">
        and
    </div>

    <table class="table" width="100%">
        <tr>
            <td width="100px" style="border: none">Name of Agent:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$agency->agency}}</td>
        </tr>
        <tr>
            <td width="100px" style="border: none">Address of Agent:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$agency->address}}</td>
        </tr>
        <tr>
            <td width="170px" style="border: none">Name of Principal / Shipowner:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['principal_name']}}</td>
        </tr>
        <tr>
            <td width="150px" style="border: none">Address of Principal / Shipowner:</td>
            <td style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['principal_address']}}</td>
        </tr>
    </table>
    for the following vessel: <br>
    <table class="table" >
        <tr>
            <td width="100px" style="border: none">Name of Vessel:</td>
            <td width="595px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{$embarkation['vessel_name']}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="60px" style="border: none">IMO Number:</td>
            <td width="163px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $embarkation['imo_number']}}</td>
            <td width="100px" style="border: none">Gross Registered Tonnage (GRT):</td>
            <td width="70px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $embarkation['grt']}}
            </td>
            <td width="70px" style="border: none">Year Built :</td>
            <td width="140px" style="border-top: none; border-bottom: thin solid; border-right: none;">&nbsp;{{$embarkation['year_built']}}</td>
        </tr>
    </table>
    <table class="table" >
        <tr>
            <td width="30px" style="border: none">Flag:</td>
            <td width="163px"  style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $embarkation['flag_name']}}</td>
            <td width="60px" style="border: none">Type of Vessel:</td>
            <td width="170px" style="border-top: none; border-bottom: thin solid; border-right: none;">
                {{ $embarkation['vessel_type']}}
            </td>
            <td width="70px" style="border: none">Classification Society: </td>
            <td width="130px" style="border-top: none; border-bottom: thin solid; border-right: none;">&nbsp;{{$embarkation['classification_society']}}</td>
        </tr>
    </table>
    hereinafter referred to as the Employer, <br>
    <div class="center" style="margin-top:10px;margin-bottom:10px">
        W I T N E S S E T H
    </div>
    <table class="table" width="100%" >
        <tr>
            <td colspan="2" style="border: none;">
                <span style="margin-left:20px">1.</span>
                <span style="margin-left:20px">
                    That the seafarer shall be employed on board under the following terms and conditions:
                </span>
            </td>

        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.1 Duration of Contract:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">{{$embarkation['contract_duration']}}</td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.2 Position:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">{{$crew->rank}}</td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.3 Basic Monthly Salary:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">
                @foreach ($salary as $s )
                    @if($s->description=='Basic Pay')
                        {{ '$ ' . number_format($s->monthly, 2)}}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.4 Hours of Work:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">{{$hours_work}}</td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.5 Overtime:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">
                @foreach ($salary as $s )
                @if($s->description=='Overtime')
                    {{ '$ ' . number_format($s->monthly, 2) .' '.$s->remarks}}
                @endif
            @endforeach
            </td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.6 Vacation Leave with Pay:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">
                @foreach ($salary as $s )

                @if($s->description=='Leave Pay' || $s->description=='Leave Subsistence' )
                    @if($s->description!='Leave Pay')
                        {{ '$ ' . number_format($s->monthly, 2) .' per month' . ' Leave Days: ' . $s->days . ' days/'}}
                    @else
                        {{ 'Leave Subsistence: $ ' . number_format($s->monthly, 2) .' per month'}}

                    @endif
                @endif

                {{-- @if($s->description=='Leave Subsistence')
                    {{ 'Leave Subsistence: $ ' . number_format($s->monthly, 2) .' per month'}}
                @endif --}}
            @endforeach
            </td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.7 Point of Hire:</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">{{$embarkation['point_of_hire']}}</td>
        </tr>
        <tr>
            <td width="320px"><span style="margin-left:55px">1.8 Collective Bargaining Agreement, if any::</span></td>
            <td  style="border-top: none; border-bottom: thin solid; border-right: none;">{{$embarkation['cba']}}</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td colspan="2" style="border: none;margin-top:30px" >
                <span style="margin-left:20px">2.</span>
                <span style="margin-left:20px">
                    That herein terms and conditions in accordance with Governing Board Resolution No. 09 and Memorandum Circular No. 10, both
                </span>
                <span style="margin-left:55px">
                    Series of 2010, shall be strictly and faithfully observed.
                </span>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr >
            <td colspan="2" style="border: none;margin-top:30px" >
                <span style="margin-left:20px">3.</span>
                <span style="margin-left:20px">
                    Any alterations or charges, in any of this Contract shall be evaluated, verified, processed and approved by the Philippine Overseas
                </span>
                <span style="margin-left:55px">
                    Employment Administration (POEA). Upon approval, the same shall be deemed an integral part of the Standard Terms and
                </span>
                <span style="margin-left:55px">
                    Conditions Governing the Employment of Filipino Seafarers On Board Ocean-Going Vessels.
                </span>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr >
            <td colspan="2" style="border: none;margin-top:30px" >
                <span style="margin-left:20px">4.</span>
                <span style="margin-left:20px">
                    Violations of the terms and conditions of this Contract with its approved addendum shall be ground for disciplinary action
                </span>
                <span style="margin-left:55px">
                    against the erring party.
                </span>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr >
            <td colspan="2" style="border: none;margin-top:30px" >
                <span style="margin-left:80px">IN WITNESS WHEREOF the parties have hereto set their hands this
                <span style="text-decoration: underline">{{date('dS')}}</span> day of
                <span style="text-decoration: underline">{{date('F Y')}}</span> at Ermita, Manila Philippines.
            </span>
            </td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <table class="table" width="100%" style="margin-left:50px">
        <tr>

            <td width="300px" style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">
                {{$crew->last_name .', ' .$crew->first_name . ' ' .$crew->middle_name}} <br>
            </td>
            <td>&nbsp;</td>
            <td width="300px"  style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center;border-spacing: 15px 50px;">
                <strong>{{$signatory->name}}</strong> <br> {{$signatory->position}}
            </td>
        </tr>
    </table>
    <table class="table" width="100%" style="margin-left:50px">
        <tr>

            <td width="300px" style="border: none; text-align:center">
                Seafarer
            </td>
            <td>&nbsp;</td>
            <td width="300px" style="border: none; text-align:center">
                For the Employer
            </td>
        </tr>
    </table>
    <p style="margin-left:50px">Verified and approved by the POEA</p>
    <table class="table" width="100%" style="margin-left:50px">
        <tr>

            <td width="300px" style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center">

            </td>
            <td>&nbsp;</td>
            <td width="300px"  style="border-top: none; border-bottom: thin solid; border-right: none;text-align:center;border-spacing: 15px 50px;">
            </td>
        </tr>
    </table>
    <table class="table" width="100%" style="margin-left:50px">
        <tr>

            <td width="300px" style="border: none; text-align:center">
                Date
            </td>
            <td>&nbsp;</td>
            <td width="300px" style="border: none; text-align:center">
                Signature of POEA Official
            </td>
        </tr>
    </table>
</body>
</html>
