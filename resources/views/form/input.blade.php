<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label form-control-label">{{$label}}</label>

    @include('admin::form.error')

    <div class="{{$viewClass['field']}}">

        <div class="input-group">

            <?php /*@if ($prepend)
            <span class="input-group-addon">{!! $prepend !!}</span>
            @endif */?>

            <input {!! $attributes !!} />

            <?php /*@if ($append)
                <span class="input-group-addon clearfix">{!! $append !!}</span>
            @endif */ ?>

        </div>

        @include('admin::form.help-block')

    </div>
</div>
