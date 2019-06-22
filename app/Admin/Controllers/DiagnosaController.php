<?php

namespace App\Admin\Controllers;

use App\Diagnosa;

use App\Helpers\Counter;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DiagnosaController extends Controller
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
        $grid = new Grid(new Diagnosa);
        $grid->disableRowSelector();

        $grid->id('No.')->display(function() use($counter){
            return $counter->plus();
        });
        $grid->diagnosa('Diagnosa');
        $grid->range_start('Range Start');
        $grid->range_end('Range End');

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
        $show = new Show(Diagnosa::findOrFail($id));

        $show->id('Id');
        $show->diagnosa('Diagnosa');
        $show->range_start('Range Start');
        $show->range_end('Range End');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Diagnosa);

        $form->text('diagnosa', 'Diagnosa');
        $form->number('range_start', 'Range Start');
        $form->number('range_end', 'Range End');

        return $form;
    }
}
