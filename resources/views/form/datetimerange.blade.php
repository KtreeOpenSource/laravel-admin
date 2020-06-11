<div class="{{$viewClass['form-group']}} {!! ($errors->has($errorKey['start'].'start') || $errors->has($errorKey['end'].'end')) ? 'has-error' : ''  !!}">

    <label for="{{$id['start']}}" class="{{$viewClass['label']}} control-label form-control-label">{{$label}}</label>

    @include('admin::form.error')

    <div class="{{$viewClass['field']}}">

        <div class="row" style="width: 390px">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" name="{{$name['start']}}" value="{{ old($column['start'], $value['start']) }}" class="form-control {{$class['start']}}" style="width: 160px" {!! $attributes !!} />
                </div>
            </div>

            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" name="{{$name['end']}}" value="{{ old($column['end'], $value['end']) }}" class="form-control {{$class['end']}}" style="width: 160px" {!! $attributes !!} />
                </div>
            </div>
        </div>

        @include('admin::form.help-block')

    </div>
</div>
