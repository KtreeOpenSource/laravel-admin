<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

<label for="{{$id}}" class="{{$viewClass['label']}} control-label form-control-label">{{$label}}</label>
    @include('admin::form.error')

    <div class="{{$viewClass['field']}}">

        <input type="hidden" name="{{$name}}"/>

        <select class="form-control {{$class}}" style="width: 100%;" name="{{$name}}" {!! $attributes !!} >
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
            @endforeach
        </select>

        @include('admin::form.help-block')

    </div>
</div>
