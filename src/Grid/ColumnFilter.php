<?php

namespace Encore\Admin\Grid;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid\Filter\AbstractFilter;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;

/**
 * Class Filter.
 *
 * @method AbstractFilter     equal($column, $label = '')
 * @method AbstractFilter     notEqual($column, $label = '')
 * @method AbstractFilter     like($column, $label = '')
 * @method AbstractFilter     ilike($column, $label = '')
 * @method AbstractFilter     gt($column, $label = '')
 * @method AbstractFilter     lt($column, $label = '')
 * @method AbstractFilter     between($column, $label = '')
 * @method AbstractFilter     in($column, $label = '')
 * @method AbstractFilter     notIn($column, $label = '')
 * @method AbstractFilter     where($callback, $label)
 * @method AbstractFilter     date($column, $label = '')
 * @method AbstractFilter     day($column, $label = '')
 * @method AbstractFilter     month($column, $label = '')
 * @method AbstractFilter     year($column, $label = '')
 */
class ColumnFilter extends \Encore\Admin\Grid\Filter
{
    /**
     * Create a new filter instance.
     *
     * @param Model $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the string contents of the filter view.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (empty($this->filters)) {
            return '';
        }



        $script
            = <<<EOT
$(document).on("keypress",".table-responsive input.grid-filter",function (event) {
    if (event.keyCode == 13) {
      $(this).closest("form").submit();
    }
});
$(document).on("change",".table-responsive .date-filter",function (event) {
            var data = {};
            $.each($(this).closest("table").find('.grid-filter').serializeArray(), function () {
                if (!(this.name in data)) {
                    data[this.name] = [];
                }
                data[this.name].push(this.value);
            });
            console.log(data); return false;
  $(this).closest("form").submit();
});
$(document).on("change",".table-responsive select.grid-filter",function (event) {
      $(this).closest("form").submit();
});

EOT;
        Admin::script($script);

        return $this->filters->columnFilterRender();
    }

    /**
     * Add a filter to grid.
     *
     * @param AbstractFilter $filter
     *
     * @return AbstractFilter
     */
    public function addFilter(AbstractFilter $filter)
    {
        $filter->setColumnsFilterParent($this);

        return $this->filters = $filter;
    }
}
