<!DOCTYPE html>
<html>
<head>
    <title>Car List</title>
</head>
<body>
    <h1>Car List</h1>
    <a href="{{ route('cars.create') }}">Add New Car</a>
    <ul>
        @foreach ($cars as $car)
            <li>
                {{ $car->model->name }} - {{ $car->availability ? 'Available' : 'Not Available' }}
                @foreach ($car->images as $image)
                    <img src="{{ Storage::url($image->image_path) }}" width="100" />
                @endforeach
                <a href="{{ route('cars.edit', $car->id) }}">Edit</a>
                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
