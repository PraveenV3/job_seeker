<!DOCTYPE html>
<html>
<head>
    <title>Car Sale</title>
</head>
<body>

    <div style="text-align: right; padding: 10px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <h2>Choose the best Car</h2>

    <a href="{{ route('Car.create') }}">Create New Car</a>

    @if ($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif

    <table>
        <tr>
            <th>Vehicle_No</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Description</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($cars as $car)
        <tr>
            <td>{{ $car->Vehicle_No }}</td>
            <td>{{ $car->brand }}</td>
            <td>{{ $car->model }}</td>
            <td>{{ $car->description }}</td>
            <td>{{ $car->price }}</td>
            <td>
                <a href="{{ route('Car.show', $car->id) }}">Show</a>
                <a href="{{ route('Car.edit', $car->id) }}">Edit</a>
                <form action="{{ route('Car.destroy', $car->Vehicle_No) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
