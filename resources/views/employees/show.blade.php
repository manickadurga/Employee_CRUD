@extends('layout.layout')
@section('content')
    <div class="row mt-4">
        <div class="col">
            <h2 style='color:white;'>Employee Details</h2>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->emp_name }}</h5>
            <p class="card-text"><strong>Registration Number:</strong> {{ $employee->reg_no }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Contact:</strong> {{ $employee->contact }}</p>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
