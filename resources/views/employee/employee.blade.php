@extends('layouts.master')



@section('nav-items')
    <div class="navbar-menu">

        <ul>
            <li>
                <image>LOGO</image>

                {{--                <form method="post" action={{route('admin.store')}}>--}}
                {{--                    @csrf--}}
                <button>Add</button>
                {{--                </form>--}}

            </li>

        </ul>
    </div>
@endsection



@section('data-info')
    <p>

{{--                Email: {{$employee->email}}--}}
{{--                Website: {{$employee->websiteLink}}--}}

    </p>

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
{{--                        <button><a href={{route('employee.edit',$employee->id)}}>Edit </a></button>--}}

                        @method('DELETE')
                        <button type='submit'>Delete</button>

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

