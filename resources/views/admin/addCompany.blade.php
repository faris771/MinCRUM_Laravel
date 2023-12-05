<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Company</title>
    <link rel="stylesheet" href="{{asset('css/addCompany.css')}}">
</head>
<body>

<!-- Back button -->
<a href="{{ route('admin.index') }}">Back</a>

<!-- Add Company Form -->
<form method="post" action="{{ route('addCompany.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">
    @error('name') <p style="color: red">{{ $message }}</p> @enderror

    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="{{ old('email') }}">
    @error('email') <p style="color: red">{{ $message }}</p> @enderror

    <label for="websiteLink">Website</label>
    <input type="text" name="websiteLink" id="websiteLink" value="{{ old('websiteLink') }}">
    @error('websiteLink') <p style="color: red">{{ $message }}</p> @enderror

    <label for="logo">Logo</label>
    <input type="file" name="logo" id="logo"  class="custom-file-input">
    @error('logo') <p style="color: red">{{ $message }}</p> @enderror

    <button type="submit">Add</button>
</form>

</body>
</html>
