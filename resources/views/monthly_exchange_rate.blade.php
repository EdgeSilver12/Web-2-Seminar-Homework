<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Exchange Rates</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Monthly Exchange Rates</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <h2 class="text-center">Exchange Rates for {{ $currencyPair }} in {{ date('F Y', strtotime($startDate)) }}</h2>

    <div class="row">
        <div class="col-md-12">
            <canvas id="exchangeRateChart"></canvas>
        </div>
    </div>

    <script>
        // Prepare data for the chart
        const dates = @json($dates);
        const rates = @json($rates).map(rate => rate.rate);

        // Chart.js configuration
        var ctx = document.getElementById('exchangeRateChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',  // You can use 'line', 'bar', etc.
            data: {
                labels: dates,  // x-axis labels
                datasets: [{
                    label: '{{ $currencyPair }} Exchange Rate',
                    data: rates,  // y-axis values
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Exchange Rate'
                        },
                        beginAtZero: false,
                    }
                }
            }
        });
    </script>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
