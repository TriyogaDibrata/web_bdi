<?php

namespace App\Admin\Controllers;

use App\Gejala;
use App\MGejala;

use App\Helpers\Counter;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TGejalaController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        // $query = Gejala::join('m_gejala', 'm_gejala.id', '=', 't_gejala.m_gejala_id')->get();
        // dd($query->groupBy('m_gejala_id'));
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $counter = new Counter();
        $grid = new Grid(new Gejala);
        $grid->disableRowSelector();
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('Pgejala.no_gejala', 'Parent');
            $filter->like('gejala', 'Gejala');
        });

        $grid->id('No.')->display(function() use ($counter){
            return $counter->plus();
        });
        // $grid->column('Parent Gejala')->display(function($m_gejala_id) {
        //     $query = Gejala::join('m_gejala', 'm_gejala.id', '=', 't_gejala.m_gejala_id')->select('no_gejala')->first();
        //     // $query->toArray();
        //     return "<span class='label label-warning'>{$query}</span>";
        // });

        $grid->column('Pgejala.no_gejala', 'Parent');
        $grid->gejala('Keluhan');
        $grid->nilai('Nilai');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Gejala::findOrFail($id));

        $show->id('Id');
        $show->m_gejala_id('M gejala id');
        $show->gejala('Gejala');
        $show->nilai('Nilai');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Gejala);
        $options = MGejala::all()->pluck('no_gejala', 'id');

        $form->select('m_gejala_id', 'Parent')->options($options);
        $form->text('gejala', 'Gejala');
        $form->number('nilai', 'Nilai');

        return $form;
    }
}
