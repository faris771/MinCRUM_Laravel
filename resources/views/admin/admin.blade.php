@extends('layouts.master')



@section('nav-items')
    <div class="navbar-menu">

        <ul>
            <li>
                <button><a href="/">Sign out</a></button>

                <form method="post" action={{route('admin.store')}}>
                    @csrf
                    <button>Add</button>
                </form>

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
                    <form action="{{route('admin.destroy',$company->id)}} method='post'>
                        @csrf
                        <button><a href={{route('admin.edit',$company->id)}}>Edit </a> </button>

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
