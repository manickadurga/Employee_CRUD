@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Employee</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reg_no" class="form-label">Registration Number</label>
                            <input type="text" class="form-control @error('reg_no') is-invalid @enderror" id="reg_no" name="reg_no" value="{{ old('reg_no') }}" required>
                            @error('reg_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="emp_name" class="form-label">Employee Name</label>
                            <input type="text" class="form-control @error('emp_name') is-invalid @enderror" id="emp_name" name="emp_name" value="{{ old('emp_name') }}" required>
                            @error('emp_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" required>
                            @error('contact')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .is-invalid {
        background-color: #f8d7da !important;
        border-color: #f5c6cb !important;
    }
    .card {
        background-color: #f0f0f0; 
        border-color: #ccc;
    }
    .card-header {
        background-color: #337ab7; 
        color: #fff;
    }
</style>
@endsection
