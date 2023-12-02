<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //

    public function index()
    {
        return view('employee');
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
    public  function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        return redirect()->route('employee');
    }


    public function logout()
    {
        if (session()->has('loginId'))
        {
            session()->pull('loginId');
            return redirect('login');
        }


    }
}
