<div class="nav-tabs-custom">
    {{--<div class="container">--}}
        {{--<div class="col-sm-2">--}}
        <ul class="nav nav-pills nav-stacked">

            @foreach($tabObj->getTabs() as $tab)
                <li {{ $tab['active'] ? 'class=active' : '' }}>
                    <a href="#tab-{{ $tab['id'] }}" data-toggle="tab">
                        {{ $tab['title'] }} <i class="fa fa-exclamation-circle text-red hide"></i>
                    </a>
                </li>
            @endforeach

        </ul>
    {{--</div>--}}
    {{--</div>--}}
    <div class="tab-content fields-group vertical">
        @foreach($tabObj->getTabs() as $tab)
            <div class="tab-pane {{ $tab['active'] ? 'active' : '' }}" id="tab-{{ $tab['id'] }}">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $tab['title'] }}</h3>
                    </div>

                    <div class="box-body form-box-body">
                        @if(!empty($tab['rows']))
                            @foreach($tab['rows'] as $row)
                                {!! $row->render() !!}
                            @endforeach
                        @else
                            {!! $tab['closureContent']->render() !!}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
