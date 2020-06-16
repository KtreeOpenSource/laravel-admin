<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label form-control-label">{{$label}}</label>

    @include('admin::form.error')

    <div class="{{$viewClass['field']}}">

        @foreach($options as $option => $label)
            @if(!$inline)<div class="radio">@endif
                <label @if($inline)class="radio-inline checkcontainer"@endif>
                    <input type="radio" name="{{$name}}" value="{{$option}}" class="minimal {{$class}}" {{ ($option == old($column, $value))?'checked':'' }} />&nbsp;{{$label}}&nbsp;&nbsp;
                    <span class="radiobtn"></span>
                </label>
            @if(!$inline)</div>@endif
        @endforeach

        @include('admin::form.help-block')

    </div>
</div>
