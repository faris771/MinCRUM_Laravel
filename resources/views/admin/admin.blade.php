@extends('layouts.master')



@section('nav-items')
    <div class="navbar-menu">

        <ul>
            <li>
                <button><a href="/">Sign out</a></button>

                <button><a href="{{ route('addCompany.index')}}">Add</a></button>

            </li>

        </ul>
    </div>
@endsection

@section('data-inf')
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
                        <button><a href={{route('companyEdit.index',$company->id)}}>Edit </a></button>

                        @method('DELETE')
                        <button type='submit'>Delete</button>

                    </form>

                </td>
            </tr>

        @endforeach
        </tbody>

    </table>
    @section('pagination')
        {{$companies->links('pagination::bootstrap-4')}}
    @endsection

@endsection
