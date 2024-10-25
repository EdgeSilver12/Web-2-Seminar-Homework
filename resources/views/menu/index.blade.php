<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<ul>
    @foreach ($menuItems as $item)
        <li>{{ $item->name }}
            @if ($item->children->isNotEmpty())
                @include('menu.submenu', ['children' => $item->children])
            @endif
        </li>
    @endforeach
</ul>
</body>
</html>
