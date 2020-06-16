@if(isset($columnFilter) && $columnFilter)
<?php
  if(strpos($filterName,".") != false) {
      $filterValue = request()->input($filterName);
  } else {
      $filterValue = request($name, $value);
  }
?>
<div class="input-group">
  <input type="{{ $type }}" class="grid-filter form-control {{ $id }}" id="{{ $id }}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{$filterValue}}">
  <div class="input-group-addon input-grid-search-addon"> <i class="fa fa-search"></i> </div>
</div>
@else
  <div class="input-group">
      <div class="input-group-addon">
          <i class="fa fa-{{ $icon }}"></i>
      </div>
      <input type="{{ $type }}" class="form-control {{ $id }}" id="{{ $id }}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{ request($name, $value) }}">
  </div>
@endif
