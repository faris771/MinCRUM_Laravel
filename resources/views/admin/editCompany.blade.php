<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Company</title>
    <link rel="stylesheet" href="{{asset('css/editCompany.css')}}">
</head>
<body>

<!-- Back button -->
<a href="{{ route('admin.index') }}">Back</a>

<!-- Edit Company Form -->
<form method="post" action="{{ route('companyEdit.update', $company->id) }}" enctype="multipart/form-data">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $company->name }}">
    @error('name') <p style="color: red">{{ $message }}</p> @enderror

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ $company->email }}">
    @error('email') <p style="color: red">{{ $message }}</p> @enderror

    <label for="websiteLink">Website</label>
    <input type="text" name="websiteLink" id="websiteLink" value="{{ $company->websiteLink }}">
    @error('websiteLink') <p style="color: red">{{ $message }}</p> @enderror

    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo" value="{{ $company->logo }}">
    @error('logo') <p style="color: red">{{ $message }}</p> @enderror

    <button type="submit">Update</button>
</form>

</body>
</html>
