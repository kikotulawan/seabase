<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DUTCH CONTRACT</title>
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

            <h3>Contract of Employment</h3>

    </div>
    <p style="text-align: justify;">
        This contract of employment is made up between:
        {{ $embarkation['owner_name']}} , owners of the vessel {{ $embarkation['vessel_name']}}., (hereafter called "the employer") and {{$crew->last_name .', ' .$crew->first_name . ' ' .$crew->middle_name }}., born on {{date(' l F d, Y ', strtotime($crew->birth_date)) }} in {{$crew->birth_place}}, of Philippine nationality (hereafter called "the employee").

        <p>
            This contract is made up in accordance with Dutch Law (Code of Commerce and Civil Code) and is complementary to the employment contract made up between the employee and the crew manager.
        </p>
        <p>
            Termination of this contract by either of the parties to this contract can only be done in accordance with Dutch Law.
        </p>
        <p>
            Fines imposed on the employee by the master will come to the benefit of the "Noord- en Zuid Hollandse Redding Maatschappij" (North and South Holland's rescue association).

        </p>
        <p>
            The employee shall be placed by the employer on a vessel which the employer uses for seagoing trade.
        </p>
        <p>
            This contract of employment is valid from Tuesday, {{date('d-M-Y', strtotime($embarkation['departure_date']))}} on which date the employee has left from Manila on and will last for a period of {{$embarkation['contract_duration']}} . The employee will be relieved in the first convenient port after this date and will at that time receive free transport to his home country.
        </p>
        <p>
            The employee shall work on board in the position of {{$crew->rank}} / SCALE NO. 1.
        </p>

        <p>
           The wages and other benefits of the employee are arranged in accordance with the contract between the employee and the crew manager of which the essential financial components are as follows:
        </p>

    </p>

</body>
</html>
