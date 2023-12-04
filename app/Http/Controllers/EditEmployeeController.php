<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditEmployeeController extends Controller
{

    public function index()
    {
        return view('employee.edit');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'companyID' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required'
        ]);
        $employee = Employee::find($request->id);
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->companyID = $request->companyID;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect()->route('employee.index');

    }


    //
}
