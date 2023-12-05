<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditEmployeeController extends Controller
{

    public function index(Employee $employee)
    {
        return view('employee.edit', compact('employee'));

    }

    public function edit(Request $request, Employee $employee)
    {
//        dd($request->all());
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required'
        ]);
//        $employeeAsUser = $employee->user;
//        dd($employeeAsUser);

//        $employee = Employee::find($employee->id);
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->phone = $request->phone;
        $employee->save();
        return redirect()->route('employee.index');

    }


    //
}
