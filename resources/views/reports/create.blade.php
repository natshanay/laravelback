<!DOCTYPE html>
<html>
<head>
    <title>Create Reservation</title>
</head>
<body>
    <h1>Create Reservation</h1>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="car_id">Car:</label>
        <select name="car_id" id="car_id">
            @foreach ($cars as $car)
                <option value="{{ $car->id }}">{{ $car->model->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="customer_id">Customer:</label>
        <select name="customer_id" id="customer_id">
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="start_date">Start Date:</label>
        <input type="datetime-local" name="start_date" id="start_date" />
        <br />
        <label for="end_date">End Date:</label>
        <input type="datetime-local" name="end_date" id="end_date" />
        <br />
        <button type="submit">Reserve</button>
    </form>
    <a href="{{ route('reservations.index') }}">Back to list</a>
</body>
</html>
