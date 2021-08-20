<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POEA SEAFARER INFO SHEET</title>
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
            /* border: 0.5px solid black; */
        }
        td, th {
            border: thin solid black; */
            padding: 2px;
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
        img {
            padding: 1px;
            width: 100px;
            height: 140px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="center">
        <h3>SEAFARER INFO SHEET</h3>
    </div>
    <table class="table" width="100%">
        <tr>
            <td width="220px" style="border-top: none; border-bottom: none; border-right: none;border-left:none"><strong>A. PERSONAL DATA</strong> </td>
            <td style="text-align: right;border-top: none; border-bottom: none; border-right: none;border-left:none">Code FM-POEA-03SB-09</td>
        </tr>
        <tr>
            <td>Family Name</td>
            <td>{{$crew->last_name}}</td>
        </tr>
        <tr>
            <td>Given Name</td>
            <td>{{$crew->first_name}}</td>
        </tr>
        <tr>
            <td>Middle Name</td>
            <td>{{$crew->middle_name}}</td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td>{{$crew->birth_date}}</td>
        </tr>
        <tr>
            <td>address</td>
            <td>{{$crew->contact_address}}</td>
        </tr>
        <tr>
            <td>Tel No.</td>
            <td>{{$crew->telephone}}</td>
        </tr>
        <tr>
            <td>Civil Status</td>
            <td>{{$crew->civil_status}}</td>
        </tr>
    </table>
    <strong><p>B. BENEFICIARY</p></strong>
    @foreach ($beneficiary as $b)
    <table class="table" width="100%">


                    <tr>
                        <td width="220px"  style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            Family Name
                        </td>
                        <td style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            {{$b->last_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            Given Name
                        </td>
                        <td style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            {{$b->first_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            Middle Name
                        </td>
                        <td style="border-top: thin solid; border-bottom: thin solid; border-right: none">
                            {{$b->middle_name}}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none">
                            Relationship to Seafarer
                        </td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none">
                            {{$b->relationship}}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none">
                            Address
                        </td>
                        <td style="border-top: none; border-bottom: thin solid; border-right: none">
                            {{$b->address}}
                        </td>
                    </tr>

    </table>
    @endforeach

</body>
</html>
