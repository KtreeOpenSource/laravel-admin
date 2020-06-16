<?php

namespace Encore\Admin\Controllers;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Role;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Request;

class UserController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('User Details');
            $content->body($this->grid()->render());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('User Details');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('User Details');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Administrator::grid(function (Grid $grid) {
            $grid->id(trans('admin.id'))->sortable()->renderFilter(function ($filter) {
                $filter->equal('id', 'id');
            });
            $grid->userName(trans('admin.userName'))->sortable()->renderFilter(function ($filter) {
                $filter->like('userName', trans('admin.userName'));
            });
            $grid->firstName(trans('admin.firstName'))->sortable()->renderFilter(function ($filter) {
                $filter->like('firstName', trans('admin.firstName'));
            });
            $grid->roles(trans('admin.roles'))->pluck('name')->label()->renderFilter(function ($filter) {
                $filter->equal('roles.id', trans('admin.roles'))->select(Role::pluck('name', 'id')->toArray());
            });

            $grid->statusId(trans('admin.statusId'))->select(Administrator::getStatus())
            ->sortable()->renderFilter(function ($filter) {
                $filter->equal('statusId', trans('admin.statusId'))->select(Administrator::getStatus());
            });

            $grid->createdAt(trans('admin.createdAt'))->sortable()->renderFilter(function ($filter) {
                $filter->date('createdAt', trans('admin.createdAt'));
            });
            $grid->updatedAt(trans('admin.updatedAt'))->sortable()->renderFilter(function ($filter) {
                $filter->date('updatedAt', trans('admin.updatedAt'));
            });


            $grid->filter(function ($filter) {
                $filter->like('userName', trans('admin.userName'));
                $filter->like('firstName', trans('admin.firstName'));
                $filter->equal('statusId', trans('admin.statusId'))->select(Administrator::getStatus());
                $filter->equal('roles.id', trans('admin.roles'))->select(Role::pluck('name', 'id')->toArray());
                $filter->date('createdAt', trans('admin.createdAt'));
                $filter->date('updatedAt', trans('admin.updatedAt'));
            });

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if ($actions->getKey() == 1) {
                    $actions->disableDelete();
                }
            });

            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    public function form()
    {
        $id = Request::route('user');
        $adminUsersTable = config('admin.database.users_table');

        return Administrator::form(function (Form $form) use ($id, $adminUsersTable) {
            $form->row(function ($row) use ($id, $adminUsersTable) {
                $row->width(6);
                $row->text('userName', trans('admin.userName'))
                ->rules("required|unique:".$adminUsersTable.",userName,".$id);
                $row->email('email', trans('admin.email'))
                ->rules('required|email|unique:'.$adminUsersTable.',email,'.$id);
            });
            $form->row(function ($row) {
                $row->width(6);
                $row->text('firstName', trans('admin.firstName'))->rules('required');
                $row->text('lastName', trans('admin.lastName'));
            });
            $form->row(function ($row) {
                $row->width(6);
                $row->text('phoneNumber', trans('admin.phoneNumber'))
                ->rules('required|regex:/^[\+0-9\-\(\)\s]*$/|min:7|max:14');
                $row->image('avatar', trans('admin.avatar'));
            });
            $form->row(function ($row) use ($form) {
                $row->width(6);
                $row->password('password', trans('admin.password'))->rules('required|confirmed');
                $row->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
                ->default(function ($form) {
                      return $form->model()->password;
                });
            });
            $form->ignore(['password_confirmation']);
            $form->row(function ($row) {
                $row->width(6);
                $row->textarea('address', trans('admin.address'));
                $row->text('country', trans('admin.country'));
            });
            $form->row(function ($row) {
                $row->width(6);
                $row->display('currencyCode', trans('admin.currencyCode'))->default(Administrator::CURRENCY_CODE);
                $row->display('languageId', trans('admin.languageId'))->default(Administrator::LANGUAGE_ID);
            });
            $form->row(function ($row) {
                $row->width(6);
                $row->select('statusId', trans('admin.statusId'))->options(Administrator::getStatus())->default('1');
                $row->multipleSelect('roles', trans('admin.roles'))->options(Role::all()->pluck('name', 'id'));
            });
            $form->row(function ($row) use ($id) {
                $row->width(6);
                $row->multipleSelect('permissions', trans('admin.permissions'))
                ->options(Permission::all()->pluck('name', 'id'));
                if ($id) {
                    $row->display('createdAt', trans('admin.createdAt'));
                }
            });
            if ($id) {
                $form->row(function ($row) {
                    $row->width(6);
                    $row->display('updatedAt', trans('admin.updatedAt'));
                });
            }
            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = bcrypt($form->password);
                }
            });
        });
    }
}
