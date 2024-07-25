<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show Car</title>
</head>
<body>

<h2>Show Car</h2>

<div>
    <strong>Vehicle_No:</strong>

    {{ $car->Vehicle_No }}
</div>

<div>
    <strong>Brand:</strong>
    {{ $car->brand }}
</div>

<div>
    <strong>Model:</strong>
    {{ $car->model }}
</div>

<div>
    <strong>Description:</strong>
    {{ $car->description }}
</div>

<div>
    <strong>Price:</strong>
    {{ $car->price }}
</div>

<div>
    <a href="{{ route('cars.index') }}">Back</a>
</div>

</body>
</html>
