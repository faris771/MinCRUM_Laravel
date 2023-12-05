<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    <link rel="stylesheet" href="{{asset('css/addEmployee.css')}}">

</head>
<body>

<!-- Back button -->
<a href="{{ route('employee.index') }}">Back</a>

<!-- Add Employee Form -->
<form method="post" action="{{ route('addEmployee.store') }}">
    @csrf
    @method('POST')

    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}">

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}">

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}">

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{ old('phone') }}">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{ old('password') }}">

    <button type="submit">Add</button>
</form>

</body>
</html>
