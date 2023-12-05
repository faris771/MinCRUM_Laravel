<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="{{asset('css/editEmployee.css')}}">
</head>
<body>

<!-- Back button -->
<a href="{{ route('employee.index') }}">Back</a>

<!-- Edit Employee Form -->
<form method="post" action="{{ route('editEmployee.update', $employee->id) }}">
    @csrf


    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName" value="{{ $employee->firstName }}">

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" value="{{ $employee->lastName }}">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ $employee->email }}">

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ $employee->phone }}">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="">

    <button type="submit">Update</button>
</form>

</body>
</html>
