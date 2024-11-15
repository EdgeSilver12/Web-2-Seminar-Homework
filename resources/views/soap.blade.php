<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAP Service</title>
    <!-- Bootstrap CSS for table styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">SOAP Service Test</h1>

    <h2>Counties</h2>
    <button onclick="fetchCounties()" class="btn btn-primary mb-3">Fetch Counties</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>County Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody id="countiesBody"></tbody>
    </table>

    <h2>Populations</h2>
    <button onclick="fetchPopulations()" class="btn btn-primary mb-3">Fetch Populations</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Town ID</th>
            <th>Year</th>
            <th>Women</th>
            <th>Total</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody id="populationsBody"></tbody>
    </table>

    <h2>Towns</h2>
    <button onclick="fetchTowns()" class="btn btn-primary mb-3">Fetch Towns</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Town Name</th>
            <th>County ID</th>
            <th>County Seat</th>
            <th>County Level</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody id="townsBody"></tbody>
    </table>
</div>

<script>
    async function fetchCounties() {
        const response = await fetch('/soap/counties');
        const data = await response.json();
        const countiesBody = document.getElementById('countiesBody');
        countiesBody.innerHTML = '';

        data.forEach(county => {
            const row = `<tr>
                <td>${county.id}</td>
                <td>${county.cname}</td>
                <td>${county.created_at}</td>
                <td>${county.updated_at}</td>
            </tr>`;
            countiesBody.innerHTML += row;
        });
    }

    async function fetchPopulations() {
        const response = await fetch('/soap/populations');
        const data = await response.json();
        const populationsBody = document.getElementById('populationsBody');
        populationsBody.innerHTML = '';

        data.forEach(population => {
            const row = `<tr>
                <td>${population.townid}</td>
                <td>${population.ryear}</td>
                <td>${population.women}</td>
                <td>${population.total}</td>
                <td>${population.created_at}</td>
                <td>${population.updated_at}</td>
            </tr>`;
            populationsBody.innerHTML += row;
        });
    }

    async function fetchTowns() {
        const response = await fetch('/soap/towns');
        const data = await response.json();
        const townsBody = document.getElementById('townsBody');
        townsBody.innerHTML = '';

        data.forEach(town => {
            const row = `<tr>
                <td>${town.id}</td>
                <td>${town.tname}</td>
                <td>${town.countyid}</td>
                <td>${town.countyseat}</td>
                <td>${town.countylevel}</td>
                <td>${town.created_at}</td>
                <td>${town.updated_at}</td>
            </tr>`;
            townsBody.innerHTML += row;
        });
    }
</script>
</body>
</html>
