<div class="form-group">
<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

<label for="{{$id}}" class="{{$viewClass['label']}} col-sm-5 control-label form-control-label">{{$label}}</label>

    <div class="col-md-1 colan" align="center">:</div>
    <div class="col-sm-6 pad-input">
    <div class="{{$viewClass['field']}}">

        <input type="hidden" name="{{$name}}"/>

        <select class="form-control {{$class}}" name="{{$name}}" {!! $attributes !!} >
            <option></option>
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
            @endforeach
        </select>
        @include('admin::form.help-block')
        @include('admin::form.error')
    </div>
</div>
</div>
</div>
