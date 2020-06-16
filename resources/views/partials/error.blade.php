@if(Session::has('error'))
    <?php $error = Session::get('error');?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          @if(is_object($error))
          <h4>
          <i class="icon fa fa-ban"></i>
          {{ array_get($error->get('title'), 0) }}
          </h4>
          @endif
        <p>
          @if(is_object($error))
            {!!  array_get($error->get('message'), 0) !!}
          @else
            <i class="icon fa fa-ban"></i>
            {{ $error }}
          @endif
        </p>
    </div>
@endif
