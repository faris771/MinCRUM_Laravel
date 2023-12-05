<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        if (Auth::user()->id != 1) {
            return redirect()->route('employee.index');
        }
        $companies = Company::paginate(10);
        return view('admin.adminDashBoard', compact('companies'));
    }

    public function home()
    {
        $companies = Company::paginate(10);
        return view('welcome', compact('companies'));

    }

    public function destroy(Company $company)
    {
        $employees = Employee::where('companyID', $company->id)->get();

        foreach ($employees as $employee) {
            $user = User::find($employee->userID);
            $user->delete();
            $employee->delete();
        }
        $company->delete();

        return redirect()->route('admin.index');
    }


}
