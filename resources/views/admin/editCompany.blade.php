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

<form method="post" action="{{route('companyEdit.update',$company->id)}}">
    @csrf
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{$company->name}}">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{$company->email}}">
    <label for="websiteLink">Website</label>
    <input type="text" name="websiteLink" id="websiteLink" value="{{$company->websiteLink}}">
    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo" value="{{$company->logo}}">

    <button type="submit">update</button>


</form>

</body>
</html>
