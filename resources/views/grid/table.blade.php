<div class="admin-grid row">

    <!-- <div class="btn-container pull-right">
      <?php //echo $grid->renderFilter(); ?>
      {!! $grid->renderExportButton() !!}
    </div>   -->
    <div class="box">
        <div class="box-header">
          <div class="pull-left">
            {!! $grid->renderCreateButton() !!}
          </div>
            <div class="pull-right grid-pagination">
                {!! $grid->paginator() !!}
            </div>

            <div class="grid-header-tools">
                {!! $grid->renderHeaderTools() !!}
            </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding sticky-table">
          <?= Form::open(['url'=>$grid->getFormAction(),'method'=>'get','id'=>'grid-form','pjax-container'=>true])?>
            <table class="table table-striped">
                <thead>
                  <tr class="table-tr">
                      @foreach($grid->columns() as $column)
                      <th>{{$column->getLabel()}}{!! $column->sorter() !!}</th>
                      @endforeach
                  </tr>
                </thead>
                <tbody>
                  <tr class="filter-row">
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
<script src="{{ admin_asset ('/vendor/laravel-admin/jquery-ui/jquery-ui.min.js') }}"></script>
