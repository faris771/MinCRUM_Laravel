<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddCompanyController extends Controller{
    public function index()
    {

        return view('admin.addCompany');
    }

    public function store(Request $request)
    {
        $isValid = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'websiteLink' => 'required',
            'logo' => 'required',

        ]);

        if ($isValid) {
            $company = new Company();
            $company->name = $request->name;
            $company->email = $request->email;
            $company->websiteLink = $request->websiteLink;
            $company->logo = $request->logo;
//            logo upload
            if ($request->hasFile('logo')) {

                $file = $request->file('logo');

                $extension = $file->getClientOriginalExtension();
                $fileName = $company->logo . '.' . $extension;
                $file->move('storage/', $fileName);
                $company->logo = $fileName;

//                $filePath = $file->store(assert('storage'), 'public');
//                $isValid['logo'] = $filePath;

            }
            $company->save();


            $user = new User();
            $user->name = $company->name . ' admin';
            $user->email = $company->email;
            $user->password = Hash::make('password');
            $user->save();


            $employee = new Employee();
            $employee->firstName = $company->name;
            $employee->lastName = 'admin';
            $employee->email = $company->email;
            $employee->password = Hash::make('password');
            $employee->phone = 0;
            $employee->userID = $user->id;
            $employee->companyID = $company->id;
            $employee->save();


            // added success message
            session()->flash('success', 'Company added successfully');
            return redirect()->route('admin.index');

        }

    }

}
