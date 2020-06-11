<div class="grid-header-actions">
  <input type="checkbox" class="grid-select-all" />&nbsp;

  <div class="btn-group">
      @if($batchActionsTitle)
        <label>{{$batchActionsTitle}}</label>
      @endIF
      <a class="btn btn-sm btn-default default-action-btn">  {{ trans('admin.action') }}</a>
      <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
          @foreach($actions as $action)
              <li><a href="#" class="grid-batch-{{ $action['id'] }}">{{ $action['title'] }}</a></li>
          @endforeach
      </ul>
  </div>
  <div class="btn-group extra-actions-btn-group"></div>
</div>
