<div class="admin-grid">
    @if(session()->has('message.level'))
      <div class="alert alert-{{ session('message.level') }}">
      <?php $spanClass = (session('message.level') == 'danger') ? 'glyphicon glyphicon-ban-circle' : 'glyphicon glyphicon-ok';?>
      <span class="{{$spanClass}}"></span>
      {!! session('message.content') !!}
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
    @endif

    <div class="btn-container pull-right">
      {!! $grid->renderCreateButton() !!}
      <?php //echo $grid->renderFilter();?>
      {!! $grid->renderExportButton() !!}
    </div>
    <div class="box">
        <div class="box-header">

            <div class="pull-right grid-pagination">
                {!! $grid->paginator() !!}
            </div>

            <div class="grid-header-tools">
                {!! $grid->renderHeaderTools() !!}
            </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <?= Form::open(['url'=>$grid->getFormAction(),'method'=>'get','id'=>'grid-form','pjax-container'=>true])?>
            <table class="table table-hover">
                <thead>
                  <tr>
                      @foreach($grid->columns() as $column)
                      <th>{{$column->getLabel()}}{!! $column->sorter() !!}</th>
                      @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      @foreach($grid->columns() as $column)
                      <td>{!! $column->filtering() !!}</td>
                      @endforeach
                  </tr>


                  @foreach($grid->rows() as $row)
                  <tr {!! $row->getRowAttributes() !!}>
                      @foreach($grid->columnNames as $name)
                      <td {!! $row->getColumnAttributes($name) !!}>
                          {!! $row->column($name) !!}
                      </td>
                      @endforeach
                  </tr>
                  @endforeach

                {!! $grid->renderFooter() !!}
              </tbody>

            </table>
            {{Form::close()}}
        </div>
        <div class="box-footer clearfix">
            {!! $grid->paginator()->renderPaginationRange() !!}
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- <script src="{{ admin_asset ("/vendor/laravel-admin/jquery-ui/jquery-ui.min.js") }}"></script> -->
