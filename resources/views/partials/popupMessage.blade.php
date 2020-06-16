@if(Session::has('popupMessage'))
    @php
        $popupMessage = Session::get('popupMessage');
        $type         = array_get($popupMessage->get('type'), 0, 'success');
        $message      = array_get($popupMessage->get('message'), 0, '');

        if(count($popupMessage->get('options')) > 0)
        {
           $options   = json_encode($popupMessage->get('options', []));
        }
        else
        {
           $options   = '';
        }
    @endphp
    <script>
        $(function () {
              var customClass = '';
             if('<?= $type ?>' == 'success')
             {
                type = "<h4 class='sucess-head'><span><i class='fa fa-check icon-success'></i></span>&nbsp;&nbsp;&nbsp; {!! $message !!} </h4>";
                customClass = 'success-custom-class';
             }
             else if('<?= $type ?>' == 'error')
             {
                type = "<h4 class='sucess-head'><span><i class='fa fa-times icon-error'></i></span>&nbsp;&nbsp;&nbsp; {!! $message !!} </h4>";
                customClass = 'error-custom-class';
             }

             message = "<div class='clearfix top3'></div><div class='row form-btm form-btm1'><div class='col-md-1'>&nbsp;</div><div class='col-md-10'><div class='form-part-design success-error' align='center'><img src='/images/logo.png' class='img-success'></div></div><div class='col-md-1'>&nbsp;</div></div>";
             $("body").append("<div id='myDialog' class='dialog'></div>");
             $("#myDialog").html(message);
             $(".success-error").append(type);

             $("#myDialog").dialog({
                      modal: true,
                      width: 900,
                      buttons: {
                        "Ok": {
                              click: function () {
                                  $(this).dialog("close");
                              },
                              text: 'Ok',
                              class: 'ok-custom-class '+customClass
                          }
                    }
              });
        });
    </script>
@endif
