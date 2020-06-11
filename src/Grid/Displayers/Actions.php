<?php

namespace Encore\Admin\Grid\Displayers;

use Encore\Admin\Admin;

class Actions extends AbstractDisplayer
{
    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var array
     */
    protected $prepends = [];

    /**
     * @var bool
     */
    protected $allowEdit = true;

    /**
     * @var bool
     */
    protected $allowView = false;

    /**
     * @var bool
     */
    protected $allowDelete = true;

    /**
     * @var bool
     */
    protected $allowcustomDelete = false;

    /**
     * @var string
     */
    protected $resource;

    /**
     * @var string
     */
    protected $deletecustomUrl;

    /**
     * @var
     */
    protected $key;

    protected $editUrl;

    /**
     * Append a action.
     *
     * @param $action
     *
     * @return $this
     */

    public function append($action)
    {
        array_push($this->appends, $action);

        return $this;
    }

    /**
     * Prepend a action.
     *
     * @param $action
     *
     * @return $this
     */
    public function prepend($action)
    {
        array_unshift($this->prepends, $action);

        return $this;
    }

    /**
     * Disable delete.
     *
     * @return void.
     */
    public function disableDelete()
    {
        $this->allowDelete = false;
    }

    /**
     * Enable custome delete.
     *
     * @return void.
     */
    public function enablecustomDelete($param)
    {
      $this->deletecustomUrl = $param;
        $this->allowcustomDelete = true;
    }

    /**
     * Disable edit.
     *
     * @return void.
     */
    public function disableEdit()
    {
        $this->allowEdit = false;
    }

    /**
     * Enable  view.
     *
     * @return void.
     */
    public function enableView()
    {
        $this->allowView = true;
    }

    /**
     * Set resource of current resource.
     *
     * @param $resource
     *
     * @return void
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get resource of current resource.
     *
     * @return string
     */
    public function getResource()
    {
        return $this->resource ?: parent::getResource();
    }

    /**
     * {@inheritdoc}
     */
    public function display($callback = null)
    {


        if ($callback instanceof \Closure) {
            $callback->call($this, $this);
        }

        $actions = $this->prepends;
        if ($this->allowEdit) {
            array_push($actions, $this->editAction());
        }

        if ($this->allowView) {
            array_push($actions, $this->viewAction());
        }

        if ($this->allowcustomDelete) {
            array_push($actions, $this->customdeleteAction());
        }

        if ($this->allowDelete) {
            array_push($actions, $this->deleteAction());
        }

        $actions = array_merge($actions, $this->appends);

        return implode('', $actions);
    }

    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    public function getKey()
    {
        if ($this->key) {
            return $this->key;
        }

        return parent::getKey();
    }

    public function url($url = null)
    {
          $this->editUrl = $url;
        return $this->editUrl;
    }
    /**
     * Built edit action.
     *
     * @return string
     */
    protected function editAction()
    {
        if ($this->editUrl == null)
        {
            $this->editUrl = $this->getResource().'/'.$this->getKey().'/edit';
        }

        return <<<EOT
<a href="{$this->editUrl}">
    <i class="fa fa-pencil"></i>
</a>
EOT;
    }

    /**
     * Built view action.
     *
     * @return string
     */
    protected function viewAction()
    {
        return <<<EOT
<a href="{$this->getResource()}/{$this->getKey()}/view">
    <i class="fa fa-eye"></i>
</a>
EOT;
    }



    /**
     * Built delete action.
     *
     * @return string
     */
    protected function deleteAction()
    {
        $deleteConfirm = trans('admin.delete_confirm');
        $confirm = trans('admin.confirm');
        $cancel = trans('admin.cancel');

        $script = <<<SCRIPT

$('.grid-row-delete').unbind('click').click(function() {

    var id = $(this).data('id');

    swal({
      title: "$deleteConfirm",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "$confirm",
      closeOnConfirm: false,
      cancelButtonText: "$cancel"
    },
    function(){
        $.ajax({
            method: 'post',
            url: '{$this->getResource()}/' + id,
            data: {
                _method:'delete',
                _token:LA.token,
            },
            success: function (data) {
                $.pjax.reload('#pjax-container');

                if (typeof data === 'object') {
                    if (data.status) {
                        swal(data.message, '', 'success');
                    } else {
                        swal(data.message, '', 'error');
                    }
                }
            }
        });
    });
});

SCRIPT;

        Admin::script($script);

        return <<<EOT
<a href="javascript:void(0);" data-id="{$this->getKey()}" class="grid-row-delete">
    <i class="fa fa-trash"></i>
</a>
EOT;
    }

    /**
     * Built custom delete action.
     *
     * @return string
     */
    protected function customdeleteAction()
    {
        $deleteConfirm = trans('admin.delete_confirm');
        $confirm = trans('admin.confirm');
        $cancel = trans('admin.cancel');

        $script = <<<SCRIPT

$('.grid-row-delete').unbind('click').click(function() {

    var id = $(this).data('id');

    swal({
      title: "$deleteConfirm",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "$confirm",
      closeOnConfirm: false,
      cancelButtonText: "$cancel"
    },
    function(){
        $.ajax({
            method: 'post',
            url: '$this->deletecustomUrl/' + id,
            data: {
                _method:'delete',
                _token:LA.token,
            },
            success: function (data) {
                $.pjax.reload('#pjax-container');

                if (typeof data === 'object') {
                    if (data.status) {
                        swal(data.message, '', 'success');
                    } else {
                        swal(data.message, '', 'error');
                    }
                }
            }
        });
    });
});

SCRIPT;

        Admin::script($script);

        return <<<EOT
<a href="javascript:void(0);" data-id="{$this->getKey()}" class="grid-row-delete">
    <i class="fa fa-trash"></i>
</a>
EOT;
    }
}
