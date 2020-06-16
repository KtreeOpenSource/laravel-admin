<div class="form-group">
<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label form-control-label col-sm-5">{{$label}}</label>


    <div class="col-md-1 colan" align="center">:</div>
    <div class="{{$viewClass['field']}} col-sm-6 pad-input">

        <div class="input-group">

             @if ($prepend == '₹')
            <span class="input-group-addon">{!! $prepend !!}</span>
            @endif

            <input  {!! $attributes !!} />

            <?php /*@if ($append)
                <span class="input-group-addon clearfix">{!! $append !!}</span>
            @endif */ ?>

        </div>

        @include('admin::form.help-block')
        @include('admin::form.error')

    </div>
</div>
</div>
