<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries of the World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin: 30px 0;
            color: #28a745;
        }
        .btn-category {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 30px;
            transition: background-color 0.3s;
        }
        .btn-category:hover {
            background-color: #0056b3;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: white;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 2px solid #e9ecef;
        }
        .card-content {
            padding: 20px;
        }
        .card h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        .card p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            padding: 10px 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Countries of the World</h1>
    <a href="{{ url('category') }}" class="btn-category">View Categories</a>

    @if (count($countries) > 0)
        <div class="grid-container">
            @foreach ($countries as $country)
                <div class="card">
                    @if (isset($country['flags']['svg']))
                        <img src="{{ $country['flags']['svg'] }}" alt="Flag of {{ $country['name']['common'] }}">
                    @endif
                    <div class="card-content">
                        <h2>{{ $country['name']['common'] }}</h2>
                        <p><strong>Population:</strong> {{ number_format($country['population']) }}</p>
                        <p><strong>Region:</strong> {{ $country['region'] ?? 'N/A' }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Information provided by API</small>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align: center;">No data available.</p>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
