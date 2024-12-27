@extends('layout.layout')
@section('content')
    <div class="row mt-4">
        <div class="col">
            <h2 style='color:white;'>Employees List</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>
    </div>

    @if ($employees->isEmpty())
        <p>No employees found.</p>
    @else
        <table class="table table-custom mt-4">
            <thead>
                <tr>
                    <th>Registration Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->reg_no }}</td>
                        <td>{{ $employee->emp_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->contact }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                            <a href="{{ route('employees.downloadPdf', $employee->id) }}" class="btn btn-sm btn-secondary download-btn">Download PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

<style>
    .table-custom {
        background-color: #f5f5f5; /* Light grey background for the table */
        border: 1px solid #ddd; /* Light grey border */
    }
    .table-custom th, .table-custom td {
        background-color: #e0e0e0; /* Slightly darker grey for table cells */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const downloadButtons = document.querySelectorAll('.download-btn');
        downloadButtons.forEach(button => {
            button.addEventListener('click', function() {
                alert('The PDF file is being downloaded.');
            });
        });
    });
</script>


