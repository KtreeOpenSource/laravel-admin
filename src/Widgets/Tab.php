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
            'url' => '',
            'title' => '',
            'tabs' => [],
            'dropDown' => [],
            'active' => 0,
        ];

    public function __construct()
    {
        $this->class('register-form nav-tabs-custom inner-nav-tabs ');
        //$this->setActiveTab();
    }

    /**
     * Add a tab and its contents.
     *
     * @param string $title
     * @param string|Renderable $content
     *
     * @return $this
     */
    public function add($title, $content, $active = false, $id = null, $url=null)
    {
        $this->data['tabs'][] = [
            'id' => ($id) ? $id : mt_rand(),
            'title' => $title,
            'content' => $content,
            'url'   => $url,
        ];

        if ($active) {
            $this->data['active'] = count($this->data['tabs']) - 1;
        }

        return $this;
    }

    public function align($type)
    {
        $this->align = $type;

        $this->navType = ($this->align == 'vertical') ? 'nav nav-tabs tab-design breadcrumb1' : $this->navType;

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
                         $('a[data="tab"]').on('show.bs.tab', function(e) {
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
