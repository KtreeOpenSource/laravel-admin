<?php

namespace Encore\Admin\Form;

use Encore\Admin\Form;
use Illuminate\Support\Collection;

class Tab
{
    /**
     * @var Form
     */
    protected $form;

    /**
     * @var Collection
     */
    protected $tabs;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var int
     */
    protected $rowOffset = 0;

    /**
     * Tab constructor.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
        $this->tabs = new Collection();
    }

    /**
     * Append a tab section.
     *
     * @param string   $title
     * @param \Closure $content
     * @param bool     $active
     *
     * @return $this
     */
    public function append($title, \Closure $content, $active = false)
    {
        list($fields, $closureContent) = $this->collectFields($content);

        $rows = $this->collectRows($content);

        $id = 'form-' . ($this->tabs->count() + 1);

        $this->tabs->push(compact('id', 'title', 'fields', 'active', 'rows', 'closureContent'));

        return $this;
    }

    /**
     * Collect fields under current tab.
     *
     * @param \Closure $content
     *
     * @return array
     */
    protected function collectFields(\Closure $content)
    {
        $closureContent = call_user_func($content, $this->form);

        $all = $this->form->builder()->fields();

        $fields = $all->slice($this->offset);

        $this->offset = $all->count();

        return [$fields, $closureContent];
    }

    protected function collectRows(\Closure $content)
    {
        $rows = $this->form->builder()->getRows();

        $rows = array_slice($rows, $this->rowOffset, null, true);

        $this->rowOffset = count($rows);

        return $rows;
    }

    /**
     * Get all tabs.
     *
     * @return Collection
     */
    public function getTabs()
    {
        // If there is no active tab, then active the first.
        if ($this->tabs->filter(
            function ($tab) {
                return $tab['active'];
            }
        )->isEmpty()) {
            $first = $this->tabs->first();
            $first['active'] = true;

            $this->tabs->offsetSet(0, $first);
        }

        return $this->tabs;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->tabs->isEmpty();
    }
}
