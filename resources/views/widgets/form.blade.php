<form {!! $attributes !!}>
    <div class="box-body fields-group">

      <div class="col-md-12">
            <div class="left-field-groups">
          <?php
            $fieldsCount = sizeof($fields);

            foreach($fields as $key => $field){
                if($key == round($fieldsCount/2)){
                  echo '</div><div class="right-field-groups">';
                }
                echo $field->render();
            }
          ?>
          </div>
       </div>

    </div>

    <!-- /.box-body -->
    <div class="box-footer">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2">
            <div class="btn-group pull-left">
                <button type="reset" class="btn btn-warning pull-right">{{ trans('admin.reset') }}</button>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="btn-group pull-right">
                <button type="submit" class="btn btn-info pull-right">{{ trans('admin.submit') }}</button>
            </div>
        </div>

    </div>
</form>
