<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Exchange Rate Lookup</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Daily Rate Lookup Form -->
    <form method="POST" action="{{ route('exchange.rate.by.date') }}" class="mb-4">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-md-5 mb-3">
                <label for="currencyPair">Currency Pair (e.g., EUR-HUF):</label>
                <input type="text" class="form-control" name="currencyPair" id="currencyPair" placeholder="e.g., EUR-HUF" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>
            <div class="col-md-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block mt-4">Get Exchange Rate</button>
            </div>
        </div>
    </form>

    <!-- Monthly Rate Lookup Form -->
    <form method="POST" action="{{ route('monthly.exchange.rate') }}" class="mb-4">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-md-5 mb-3">
                <label for="currencyPair">Currency Pair (e.g., EUR-HUF):</label>
                <input type="text" class="form-control" name="currencyPair" id="currencyPair" placeholder="e.g., EUR-HUF" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="month">Month:</label>
                <input type="month" class="form-control" name="month" id="month" required>
            </div>
            <div class="col-md-2 mb-3">
                <button type="submit" class="btn btn-primary btn-block mt-4">Get Monthly Rates</button>
            </div>
        </div>
    </form>

    <h2 class="text-center">Exchange Rate for {{ $currencyPair ?? '' }} on {{ $date ?? '' }}</h2>

    <div class="table-responsive">
        <table class="table table-striped mt-3">
            <thead class="thead-dark">
            <tr>
                <th>Currency</th>
                <th>Rate</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($rates))
                @foreach($rates as $currency => $rate)
                    <tr>
                        <td>{{ $currency }}</td>
                        <td>{{ $rate }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2" class="text-center">No rates available</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
