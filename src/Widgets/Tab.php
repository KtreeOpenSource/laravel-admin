<?php

namespace Encore\Admin\Widgets;

use Illuminate\Contracts\Support\Renderable;
use Encore\Admin\Admin;

class Tab extends Widget implements Renderable
{
    /**
     * @var string
     */
    protected $view = 'admin::widgets.tab';

    protected $align = 'horizontal';

    protected $navType = 'nav nav-tabs';

    /**
     * @var array
     */
    protected $data
        = [
            'id' => '',
            'title' => '',
            'tabs' => [],
            'dropDown' => [],
            'active' => 0,
        ];

    public function __construct()
    {
        $this->class('nav-tabs-custom');
        $this->setActiveTab();
    }

    /**
     * Add a tab and its contents.
     *
     * @param string $title
     * @param string|Renderable $content
     *
     * @return $this
     */
    public function add($title, $content, $active = false)
    {
        $this->data['tabs'][] = [
            'id' => mt_rand(),
            'title' => $title,
            'content' => $content,
        ];

        if ($active) {
            $this->data['active'] = count($this->data['tabs']) - 1;
        }

        return $this;
    }

    public function align($type)
    {
        $this->align = $type;

        $this->navType = ($this->align == 'vertical') ? 'nav nav-pills nav-stacked' : $this->navType;

        return $this;
    }

    /**
     * Set title.
     *
     * @param string $title
     */
    public function title($title = '')
    {
        $this->data['title'] = $title;
    }

    /**
     * Set drop-down items.
     *
     * @param array $links
     *
     * @return $this
     */
    public function dropDown(array $links)
    {
        if (is_array($links[0])) {
            foreach ($links as $link) {
                call_user_func([$this, 'dropDown'], $link);
            }

            return $this;
        }

        $this->data['dropDown'][] = [
            'name' => $links[0],
            'href' => $links[1],
        ];

        return $this;
    }

    /**
     * Render Tab.
     *
     * @return string
     */
    public function render()
    {
        $variables = array_merge(
            $this->data,
            ['attributes' => $this->formatAttributes(), 'navType' => $this->navType, 'align' => $this->align]
        );

        return view($this->view, $variables)->render();
    }

    /**
     * Set active tabs.
     *
     * @return Collection
     */
    public function setActiveTab()
    {
      $script = <<<SCRIPT
            $(function() {
                         $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                              localStorage.setItem('activeTab', $(e.target).attr('index'));
                          });
                          var activeTab = localStorage.getItem('activeTab');
                          if (activeTab) {
                            $('a[index="' + activeTab + '"]').tab('show');
                          }
            });
SCRIPT;
        Admin::script($script);
    }
}
