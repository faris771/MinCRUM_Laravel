<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddEmployeeController extends Controller
{

    public function index()
    {


        return view('employee.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $employee = new Employee();
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->companyID = $user->employee->companyID;
        $employee->email = $request->email;
        $employee->password = $request->password;
        $employee->phone = $request->phone;

        $employeeAsUser = new User();
        $employeeAsUser->name = $employee->firstName . ' ' . $employee->lastName;
        $employeeAsUser->email = $employee->email;
        $employeeAsUser->password = $employee->password;
        $employeeAsUser->save();

        $employee->userID = $employeeAsUser->id;

        $employee->save();

        return redirect()->route('employee.index');

    }
    //
}
