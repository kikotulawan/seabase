<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV STANDARD</title>
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

    <table width="100%"  style="border:none">
        <tr><td align="center" style="border:none"><h2>Conautic Maritime Inc.</h2> <p><h5>Curriculum Vitae</h5></p></td></tr>

    </table>

    <table width="100%" style="border:none" >
        <tr>
            <td width="150px" style="border:none"><label for="">Last Name : <br></label></td>
            <td width="280px" style="border:none">{{$crew->last_name}}</td>
            <td  rowspan="9" style="border:none" align="center">
                <img src="{{ asset('/storage/uploads/' .$crew->crew_no .'/' .$crew->image_path) }}" alt="" id="image_source" name="image_source">

                <div class="d-flex justify-content-center align-items-center rounded" style="float: initial">
                    {{-- <img src="{{ asset('public/img/default.jpeg') }}" alt="" id="image_source" name="image_source"> --}}


                  </div>
            </td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">First Name : <br></label></td>
            <td width="120px" style="border:none">{{$crew->first_name}}</td>

        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Date of birth: : <br></label></td>
            <td width="120px" style="border:none">{{$crew->birth_date ? date('d-M-Y', strtotime($crew->birth_date))  : '' }}</td>

        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Place of birth: : <br></label></td>
            <td width="120px" style="border:none">{{$crew->birth_place}}</td>

        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Nationality: : <br></label></td>
            <td width="120px" style="border:none">{{$crew->nationality}}</td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Religion : <br></label></td>
            <td width="120px" style="border:none">{{$crew->religion}}</td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Height/Weight : <br></label></td>
            <td width="120px" style="border:none">{{$crew->height . '/' . $crew->weight}}</td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Email Address : <br></label></td>
            <td width="120px" style="border:none">{{$crew->email}}</td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Marital Status : <br></label></td>
            <td width="120px" style="border:none">{{$crew->civil_status}}</td>
        </tr>
        <tr>
            <td width="120px" style="border:none"><label for="">Language : <br></label></td>
            <td width="120px" style="border:none">{{$crew->foreign_language}}</td>
            <td style="border:none">Education :  {{ $crew->course_degree}}</td>
        </tr>
    </table>
    <br>
    <table width="100%" class="table" style="border: 0.5px solid black;">
        <tr>
            <td colspan="5" style="border: 0.5px solid black;">Documents and Certificates</td>

        </tr>
        <tr>
            <th style="border: 0.5px solid black;">Description</th>
            <th style="border: 0.5px solid black;">Number</th>
            <th style="border: 0.5px solid black;">Place Issued</th>
            <th style="border: 0.5px solid black;">Date Issued</th>
            <th style="border: 0.5px solid black;">Valid Until</th>
        </tr>
        @foreach ($document as $doc )
        <tr>
            <td width="220px" style="border: 0.5px solid black;">{{$doc->document->document}}</td>
            <td style="border: 0.5px solid black;">{{$doc->document_number}}</td>
            <td style="border: 0.5px solid black;">{{$doc->place_issued}}</td>
            <td style="border: 0.5px solid black;">{{$doc->issue_date ? date('d-M-Y', strtotime($doc->issue_date))  : ''}}</td>
            <td style="border: 0.5px solid black;">{{$doc->expiry_date ? date('d-M-Y', strtotime($doc->expiry_date))  : ''}}</td>
        </tr>
        @endforeach

    </table>
    <br>
    <table width="100%" class="table"  style="border: 0.5px solid black;">
        <tr>
            <td colspan="11" style="border: 0.5px solid black;">Previous SEA Experience</td>

        </tr>
        <tr>
            <th style="border: 0.5px solid black;">From</th>
            <th style="border: 0.5px solid black;">To</th>
            <th style="border: 0.5px solid black;"># Months</th>
            <th style="border: 0.5px solid black;">Position</th>
            <th style="border: 0.5px solid black;">Vessel</th>
            <th style="border: 0.5px solid black;">Type</th>
            <th style="border: 0.5px solid black;">Flag</th>
            <th style="border: 0.5px solid black;">GRT</th>
            <th style="border: 0.5px solid black;">Engine</th>
            <th style="border: 0.5px solid black;">KW</th>
            <th style="border: 0.5px solid black;">Company</th>

        </tr>

    </table>


    <br>
    <table width="100%" class="table"  style="border: 0.5px solid black;">
        <tr>
            <td colspan="6" style="border: 0.5px solid black;">STCW78*95 Certificates</td>

        </tr>
        <tr>
            <th style="border: 0.5px solid black;">Training / Certificates</th>
            <th style="border: 0.5px solid black;">Code</th>
            <th style="border: 0.5px solid black;">Number</th>
            <th style="border: 0.5px solid black;">Place Issued</th>
            <th style="border: 0.5px solid black;">Date Issued</th>
            <th style="border: 0.5px solid black;">Valid Until</th>


        </tr>
        @foreach ($trainings as $doc )
        <tr>
            <td style="border: 0.5px solid black;" width="220px">{{$doc->trainingcourse->course}}</td>
            <td style="border: 0.5px solid black;">{{$doc->trainingcourse->code}}</td>
            <td style="border: 0.5px solid black;">{{$doc->certificate_number}}</td>
            <td style="border: 0.5px solid black;">{{$doc->place_issued}}</td>
            <td style="border: 0.5px solid black;">{{$doc->issue_date ? date('d-M-Y', strtotime($doc->issue_date))  : ''}}</td>
            <td style="border: 0.5px solid black;">{{$doc->expiry_date ? date('d-M-Y', strtotime($doc->expiry_date))  : ''}}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>
