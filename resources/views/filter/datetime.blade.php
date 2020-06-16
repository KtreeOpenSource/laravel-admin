@if(isset($columnFilter) && $columnFilter)
<?php
  if(strpos($filterName,".") != false) {
      $filterValue = request()->input($filterName);
  } else {
      $filterValue = request($name, $value);
  }
?>
  <input type="text" class="form-control date-filter" id="{{$id}}" placeholder="{{$label}}" name="{{$name}}" value="{{ $filterValue }}">
@else
  <div class="input-group">
      <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
      </div>
      <input type="text" class="form-control date-filter" id="{{$id}}" placeholder="{{$label}}" name="{{$name}}" value="{{ request($name, $value) }}">
  </div>
@endif
