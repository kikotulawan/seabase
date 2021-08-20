<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Helvetica, Arial, Sans-Serif;
            font-size: 12px;
        }
        table {
    border-width: thin;
    border-spacing: 0px;
    border-style: none;
    border-color: black;
}
td, th {
    border: 0.5px solid black;
}
    </style>
</head>
<body>

    <table>
        <thead>
        <tr>
          <th>Course</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($branch as $b )
            <tr><td>{{ $b->branch }}</td></tr>


        @endforeach
        </tbody>
      </table>



</body>
</html>
