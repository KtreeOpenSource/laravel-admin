@if(Session::has('success'))
    <?php $success = Session::get('success');?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if(is_object($success))
        <h4><i class="icon fa fa-check"></i>{{ array_get($success->get('title'), 0) }}</h4>
        @endif
        <p>
          @if(is_object($success))
            {!!  array_get($success->get('message'), 0) !!}
          @else
            <i class="icon fa fa-check"></i>
            {{ $success }}
          @endif
        </p>
    </div>
@endif
