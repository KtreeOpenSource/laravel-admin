<!-- form start -->
@if($form->hasRows())
    {!! $form->open(['class' => 'form-container']) !!}
@else
    {!! $form->open(['class' => "form-horizontal form-container"]) !!}
@endif
    @if( ! $form->isMode(\Encore\Admin\Form\Builder::MODE_VIEW)  || ! $form->option('enableSubmit'))
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @endif
    <div class="btn-container">
      {!! $form->customButton() !!}
      {!! $form->submitButton() !!}
      {!! $form->renderHeaderTools() !!}
    </div>
    <div class="box box-info">
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">General Information</h3>--}}
        {{--</div>--}}
      <div class="form-box-body">
        @if(!$tabObj->isEmpty())
            @include('admin::form.tab', compact('tabObj'))
        @else
            <div class="fields-group">

                @if($form->hasRows())
                    @foreach($form->getRows() as $row)
                        {!! $row->render() !!}
                    @endforeach
                @else
                    <div class="col-md-12">
                      <?php
                        foreach ($form->fields() as $field) {
                            echo $field->render();
                        }
                      ?>
                   </div>
                @endif
            </div>
        @endif
      </div>

      @foreach($form->getHiddenFields() as $hiddenField)
          {!! $hiddenField->render() !!}
      @endforeach
  </div>
{!! $form->close() !!}
