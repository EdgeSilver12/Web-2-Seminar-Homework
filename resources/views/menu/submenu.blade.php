<ul>
    @foreach ($children as $child)
        <li>{{ $child->name }}
            @if ($child->children->isNotEmpty())
                @include('menu.submenu', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
