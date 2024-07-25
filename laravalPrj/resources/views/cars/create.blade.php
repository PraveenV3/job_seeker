<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Car</title>
</head>
<body>

    <div style="text-align: right; padding: 10px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
<h2>Add a new Car</h2>

@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('Car.store') }}" method="POST">
    @csrf
    <div>
        <strong>Vehicle_No:</strong>
        <input type="text" name="Vehicle_No" value="{{ old('Vehicle_No') }}">
</div>

<div>
    <strong>Brand:</strong>
    <input type="text" name="brand" value="{{ old('brand') }}">
</div>

<div>
    <strong>Model:</strong>
    <input type="text" name="model" value="{{ old('model') }}">
</div>

<div>
    <strong>Description:</strong>
    <input type="text" name="description" value="{{ old('description') }}">
</div>

<div>
    <strong>Price:</strong>
    <input type="text" name="price" value="{{ old('price') }}">
</div>

<div>
    <button type="submit">Submit</button>
</div>
</form>

</body>
</html>
