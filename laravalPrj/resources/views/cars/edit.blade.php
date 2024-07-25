<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Car</title>
</head>
<body>

<h2>Edit Car</h2>

@if($errors->any())
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action ="{{ route('Car.update', $car->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <strong>Vehicle_No:</strong>
        <input type="text" name="Vehicle_No" value="{{ $car->Vehicle_No }}">
</div>

<div>
    <strong>Brand:</strong>
    <input type="text" name="brand" value="{{ $car->brand }}">
</div>

<div>
    <strong>Model:</strong>
    <input type="text" name="model" value="{{ $car->model }}">
</div>

<div>
    <strong>Description:</strong>
    <input type="text" name="description" value="{{ $car->description }}">
</div>

<div>
    <strong>Price:</strong>
    <input type="text" name="price" value="{{ $car->price }}">
</div>

<div>
    <button type="submit">Submit</button>
</div>
</form>

</body>
</html>
