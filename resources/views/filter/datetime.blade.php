@if(isset($columnFilter) && $columnFilter)
  <input type="text" class="form-control date-filter" id="{{$id}}" placeholder="{{$label}}" name="{{$name}}" value="{{ request($name, $value) }}">
@else
  <div class="input-group">
      <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
      </div>
      <input type="text" class="form-control date-filter" id="{{$id}}" placeholder="{{$label}}" name="{{$name}}" value="{{ request($name, $value) }}">
  </div>
@endif
