<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{{--back button--}}
<a href="{{route('admin.index')}}">Back</a>

<form method="post" action="{{route('editEmployee.update',$employee->id)}}">
    @csrf
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName" value="{{$employee->firstName}}">
    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" value="{{$employee->lastName}}">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$employee->email}}">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="{{$employee->phone}}">
{{--    password--}}
    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="{{$employee->password}}">

    <button type="submit">update</button>


</form>

</body>
</html>
