<!DOCTYPE html>
<html>
<head>
    <title>Revenue Report</title>
</head>
<body>
    <h1>Revenue Report</h1>
    <p><strong>Total Revenue:</strong> ${{ number_format($revenue, 2) }}</p>
    <a href="{{ route('reports.rental-history') }}">View Rental History</a>
</body>
</html>
