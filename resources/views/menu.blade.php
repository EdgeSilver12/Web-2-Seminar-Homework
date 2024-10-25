<!-- resources/views/menu.blade.php -->
<ul>
@foreach($menuItems as $item)
    <li>
        <a href="{{ $item->url }}">{{ $item->name }}</a>
        @if($item->children->isNotEmpty())
            @include('menu', ['menuItems' => $item->children])
        @endif
    </li>
    @endforeach
    </ul>
