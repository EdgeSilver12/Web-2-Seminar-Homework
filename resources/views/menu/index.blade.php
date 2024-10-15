<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <ul class="menu-items">
            @foreach($menuItems as $item)
                <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </nav>
</body>
</html>
