@extends('admin::layouts.master')

@section('content')
<div class="content1 back-clr">
        <div class="col-md-12 callouts">
          <div class="row">
            <!--<h3 class="inner-page-head">Detailed Customer Registration </h3>-->
    <section class="content-header custom-content-header ">
        <h2 class="page-sub-head">
            <i class="fa fa-user"></i>&nbsp;{{ $header or trans('admin.title') }}
            <small>{{ $description or trans('admin.description') }}</small>
        </h2>

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

        <ol class="breadcrumb custom-breadcrumb">
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

    @if($customBackButton)
        <div class="btn-group pull-right" style="margin-bottom: 8px; margin-right: 14px;">
        <a href="{{ $url }}" class="btn form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;{{$label}}</a>
        </div>
    @endif

    <section class="content">
        @if(session()->has('message.level'))
          <div class="alert alert-{{ session('message.level') }}">
          <?php $spanClass = (session('message.level') == 'danger') ? 'glyphicon glyphicon-ban-circle' : 'glyphicon glyphicon-ok';?>
          <span class="{{$spanClass}}"></span>
          {!! session('message.content') !!}
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          </div>
        @endif

        {!! $content !!}
      </div>
      </div>
      </div>
    </section>
@endsection
