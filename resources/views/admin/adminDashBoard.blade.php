@extends('layouts.master')

@section('navbar-brand')

    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            MinCRUM Admin
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
                <a href="{{ route('addCompany.index')}}">
                <button class="btn btn-warning">Add</button>

                </a>
                {{--    <img src="{{ asset('storage/' . basename(Auth::user()->employee->company->logo)) }}" width="150" height="150"--}}
                {{--         alt="Company Logo" class="position-absolute end-0 top-auto mb-10">--}}

            </li>

        </ul>
    </div>
@endsection

@section('data-info')
    <p>
        Companies:
    </p>

@endsection



@section('table')

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td><a href="{{$company->websiteLink}}">{{$company->websiteLink}}</a></td>
                <td>
                    <form action="{{route('company.destroy',$company->id)}} " method='post'>
                        @csrf

                        <button><a href="{{ route('companyEdit.index', $company->id) }}">Edit</a></button>
                        @method('DELETE')
                        <button type='submit'>Delete</button>

                    </form>

                </td>
            </tr>

        @endforeach
        </tbody>

    </table>
@endsection

@section('pagination')
    {{$companies->links('pagination::bootstrap-4')}}
@endsection
