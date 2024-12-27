<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Employee;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeController extends Controller
{
    
    public function index(): View
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    
    public function create(): View
    {
        return view('employees.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'reg_no' => 'required|unique:employees',
            'emp_name' => 'required',
            'email' => 'required|email|unique:employees',
            'contact' => 'required|size:10',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    
    public function show(string $id): View
    {
        $employee = Employee::find($id);
        if (!$employee) {
        abort(404); 
    }
        return view('employees.show', compact('employee'));
    }

    
    public function edit(string $id): View
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

   
    public function update(Request $request, string $id): RedirectResponse
    {
     
        $request->validate([
        'reg_no' => 'required',
        'emp_name' => 'required',
        'email' => 'required|email|unique:employees,email,' . $id,
        'contact' => 'required|size:10',
    ]);

    $employee = Employee::findOrFail($id);
    $employee->update($request->all());

    return redirect()->route('employees.index')
        ->with('success', 'Employee updated successfully.');


    }

    
    public function destroy(string $id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }

    public function downloadPdf($id)
    {
        $employee = Employee::findOrFail($id);

        $pdf = Pdf::loadView('employees.pdf', compact('employee'));

        return $pdf->download('employee_' . $employee->id . '.pdf');
    }
}
