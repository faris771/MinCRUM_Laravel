@extends('layouts.master')

@section('navbar-brand')

    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            {{\App\Models\Company::find(Auth::user()->employee->companyID)->name . ' Admin'}}
        </a>
    </div>
@endsection


@section('nav-items')

    <div class="navbar-menu">

        <ul>
            <li>

                <form action="{{ route('logout') }}" method="post" class="position-absolute end-0 top-0">
                    @csrf
                    <button type="submit" class="btn btn-warning">Log out</button>
                </form>
                <br>
                <div class="d-flex justify-content-end align-items-start">
                    <img
                        src="{{ asset('storage/' . basename(\App\Models\Company::where('id', Auth::user()->employee->companyID)->first()->logo)) }}"
                        width="150" height="150" alt="Company Logo" class="mb-10">
                    <div class="ms-3">
                        <a href="{{ route('addEmployee.index') }}">
                            <button>Add</button>
                        </a>
                    </div>
                </div>


            </li>

        </ul>
    </div>

@endsection





@section('data-info')
    <p>
        Email: {{Auth::user()->employee->email}}
    </p>
    <p>

        Website: <a href="{{\App\Models\Company::find(Auth::user()->employee->companyID)->websiteLink}}">
        {{\App\Models\Company::find(Auth::user()->employee->companyID)->websiteLink}}
        </a>
    </p>

    {{--    <img src="{{ asset('storage/' . basename(Auth::user()->employee->company->logo)) }}" width="150" height="150"--}}
    {{--         alt="Company Logo" class="position-absolute end-0 top-auto mb-10">--}}
@endsection

@section('info-text')
    <p>
        Employees:
    </p>

@endsection


@section('table')

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>

            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->firstName}}</td>
                <td>{{$employee->lastName}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>
                    <form action="{{route('employee.destroy',$employee->id)}}" method='post'>
                        @csrf
                        <button><a href={{route('editEmployee.index',$employee->id)}}>Edit </a></button>
                        @if($employee->userID != \Illuminate\Support\Facades\Auth::user()->id)
                            @method('DELETE')
                            <button type='submit'>Delete</button>
                        @endif

                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
        @section('pagination')
            {{$employees->links('pagination::bootstrap-4')}}
        @endsection
    </table>

@endsection

