@extends('layouts.master')

@section('nav-items')

    <div class="navbar-menu">
        <ul>
            <li>
                <button><a href="/login">Login</a></button>
            </li>

        </ul>

    </div>
    @section('info-text')
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
            </tr>
            </thead>
            <tbody>

            @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><a href="{{$company->websiteLink}}">{{$company->websiteLink}}</td>


                </tr>

            @endforeach
            </tbody>

        </table>
        @section('pagination')
            {{$companies->links('pagination::bootstrap-4')}}
        @endsection

    @endsection

@endsection
