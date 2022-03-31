<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td><h2>Easy Learning</h2></td>
        <td><h2>Easy School ERP</h2></td>
    </tr>
</table>

<table id="customers">
    <tr>
        <th width="10%">Sl</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>
    <tr>
        <td>1</td>
        <td><b>Student Name</b></td>
        <td>{{ $data['detail']->student->name }}</td>
    </tr>
</table>

</body>
</html>


