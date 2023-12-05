<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //

    public function index()
    {
        // find all employees that work for the company
//        $employees =Employee::find()
        $employee = Auth::user()->employee;
        $employees = Employee::where('companyID', $employee->companyID)->paginate(10);

        return view('employee.employee', compact('employees'));

    }

    public function edit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required',
            'website' => 'required',
        ]);


        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->logo = $request->logo;
        $employee->website = $request->website;
        $employee->save();
        return redirect()->route('companies');
    }

    public function destroy(Employee $employee)
    {
        $user = Auth::user();


        $employeeAsUser = User::where('id', $employee->userID)->first();
        $employeeAsUser->delete();

        $employee->delete();
        return redirect()->route('employee.index', $user->id);
    }


    public function logout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect('login');
        }


    }
}
