<div {!! $attributes !!}>

    <ul class="{{$navType}}">

        @foreach($tabs as $id => $tab)
        <li {{ $id == $active ? 'class=active' : '' }}><a href="#tab_{{ $tab['id'] }}" data-toggle="tab" index="tab_{{$id}}">{{ $tab['title'] }}</a></li>
        @endforeach

        @if (!empty($dropDown))
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($dropDown as $link)
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ $link['href'] }}">{{ $link['name'] }}</a></li>
                @endforeach
            </ul>
        </li>
        @endif
        <li class="pull-right header">{{ $title }}</li>
    </ul>
    <div class="tab-content {{$align}}">
        @foreach($tabs as $id => $tab)
        <div class="tab-pane {{ $id == $active ? 'active' : '' }}" id="tab_{{ $tab['id'] }}">
            {!! $tab['content'] !!}
        </div>
        @endforeach

    </div>
</div>
