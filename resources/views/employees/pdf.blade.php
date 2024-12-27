<!DOCTYPE html>
<html>
<head>
    <title style='text-align:center;'>Employee Details</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: center; border: 3px #ddd; }
        th { background-color:  #A9A9A9; }
        td { background-color:  #D3D3D3; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Employee Details</h2>
    <table>
        <tr>
            <th>Registration Number</th>
            <td>{{ $employee->reg_no }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $employee->emp_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $employee->email }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{{ $employee->contact }}</td>
        </tr>
    </table>
</body>
</html>
