<?php

namespace Encore\Admin\Grid\Tools;

use Encore\Admin\Grid;

class CreateButton extends AbstractTool
{
    /**
     * Create a new CreateButton instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Render CreateButton.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->allowCreation()) {
            return '';
        }

        $new = $this->grid->getCreateButtonTitle();

        $action = $this->grid->getCreateButtonAction();

        $action = ($action) ? $action : $this->grid->resource().'/create';

        return <<<EOT

<div class="btn-group pull-right">
    <a href="{$action}" class="btn btn-block btn-success btn-custom">
        <i class="fa fa-user-plus"></i>&nbsp;&nbsp;{$new}
    </a>
</div>

EOT;
    }
}
