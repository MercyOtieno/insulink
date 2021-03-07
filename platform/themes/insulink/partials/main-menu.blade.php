<ul {!! clean($options) !!}>
    @foreach ($menu_nodes as $key => $row)

    @if ($row->has_child)
        <li
            class="nav-item  menu-item-has-children dropdown {{ $row->css_class }} @if ($row->active) active @endif">
            <a class="nav-link dropdown-toggle" id="{{\Illuminate\Support\Str::slug($row->title, '-')}}" href="{{ $row->url }}"
                target="{{ $row->target }}" data-toggle="dropdown">
                @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
                 <span class="toggle-icon">
                     <svg class="text-gray-300 inline-flex" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                 </span>
            </a>
        
           
            {!!
            Menu::generateMenu([
            'menu' => $menu,
            'menu_nodes' => $row->child,
            'view' => 'main-menu',
            'options' => ['class' => 'sub-menu dropdown-menu', 'aria-labelledby' =>
            \Illuminate\Support\Str::slug($row->title, '-')],
            ])
            !!}
        </li>
    @else
        <li
            class="nav-item {{ $row->css_class }} @if ($row->active) active @endif">
            <a class="nav-link" id="{{\Illuminate\Support\Str::slug($row->title, '-')}}" href="{{ $row->url }}"
                target="{{ $row->target }}">
                @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
            </a>
        </li>
    @endif
   
    @endforeach
</ul>