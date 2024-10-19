<!-- resources/views/items/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
</head>
<body>
    <h1>Items List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
