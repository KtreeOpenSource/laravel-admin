<?php
if(strpos($filterName,".") != false) {
    $filterValue = request()->input($filterName);
} else {
    $filterValue = request($name, $value);
}
?>
<select class="grid-filter form-control {{ $class }}" name="{{$name}}" style="width: 100%;">
    <option></option>
    @foreach($options as $select => $option)
        <option value="{{$select}}" {{ (string)$select === $filterValue ?'selected':'' }}>{{$option}}</option>
    @endforeach
</select>
