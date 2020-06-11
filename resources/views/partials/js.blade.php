<script>
  var baseUrl = "{{ url('/') }}";
</script>
@foreach($js as $j)
<script src="{{ admin_asset ("$j") }}"></script>
@endforeach
