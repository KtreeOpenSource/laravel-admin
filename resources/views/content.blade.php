@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            {{ $header or trans('admin.title') }}
            <small>{{ $description or trans('admin.description') }}</small>
        </h1>

        @if($extraColumns)
            <div class="info">
                <div class="attribute-info">
                    <ul>
                        @foreach($extraColumns as $key => $value)
                            <li>
                                <label>{{$key}} : </label>
                                <span>{{$value}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}"><i
                            class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
            @if($breadcrumb)
                @foreach($breadcrumb as $key => $value)
                    @if($value['route'])
                        <li class="{{$value['class']}}"><a href="{{ $value['route'] }}">{{$key}}</a></li>
                    @else
                        <li class="{{$value['class']}}">{{$key}}</li>
                    @endif
                @endforeach
            @endif
        </ol>
    </section>

    <section class="content">

        @include('admin::partials.error')
        @include('admin::partials.success')
        @include('admin::partials.exception')
        @include('admin::partials.toastr')

        {!! $content !!}

    </section>
@endsection
