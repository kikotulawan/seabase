<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LETTER OF GUARANTEE</title>
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
    {{date('d F Y')}}
    <div class="center">

            <h4>G U A R A N T E E</h4>

    </div>
    <p style="text-align: justify;">
        <p>
            To whom it may concern:
        </p>
        <p>
            This is to certify that the Filipino seaman mentioned below is travelling on  <strong>{{date('d F Y')}}</strong>
            to join the vessel <strong>{{$embarkation['vessel_name']}}</strong>
            in the port of <strong>{{$embarkation['embarkation_place']}}</strong> on <strong>{{$embarkation['embarkation_date'] ? date('l F d,Y', strtotime($embarkation['embarkation_date']))  : '' }}</strong>.
        </p>
        <p>
            Full name of seaman: <label for="">{{$crew->last_name. ', '.$crew->first_name . ' '.$crew->middle_name}}</label> <br>
            Duty on Board: <label for="">{{$crew->rank }}</label>

        </p>
        <p>
            We further certify that he will be met at {{$embarkation['departure_place']}} airport by the agent of the ship owner.
        </p>
        <p>
            <table class="table" width="100%" style="border: none">
                <tr>
                    <th style="border: none">ATTENDING AGENT</th>
                    <th style="border: none">ADDRESS</th>
                </tr>
                <tr>
                    <td style="border: none">{{$agent->agent}}</td>
                    <td style="border: none">H{{$agent->address}} <br>
                        Tel No. {{$agent->telephone}} <br>
                        Fax No. {{$agent->fax}} <br>
                        </td>
                </tr>
            </table>
        </p>
        <p>

            We hereby accept all responsibilities and to absorb all cost should it happen that the
            passenger is refused entry at the (air)port of destination.

            Conautic Maritime Inc.
        </p>

        <p>

            <strong>{{$signatory->name}} </strong> <br>
            {{$signatory->position}}
        </p>

    </p>

</body>
</html>
