<div class="form-group">
<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label form-control-label  col-sm-5">{{$label}}</label>
	<span class="col-md-1 colan" align="center">:</span>

  <div class="{{$viewClass['field']}} col-sm-6 pad-input">
      <input type="file" class="{{$class}}" name="{{$name}}" {!! $attributes !!} />
        @include('admin::form.error')
        @include('admin::form.help-block')

    </div>
</div>
</div>
