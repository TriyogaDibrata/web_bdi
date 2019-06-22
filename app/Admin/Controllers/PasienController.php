<?php

namespace App\Admin\Controllers;

use App\Pasien;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PasienController extends Controller
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
        $grid = new Grid(new Pasien);

        $grid->id('Id');
        $grid->nama('Nama');
        $grid->umur('Umur');
        $grid->jenis_kelamin_id('Jenis kelamin id');
        $grid->pekerjaan_id('Pekerjaan id');
        $grid->pendidikan_id('Pendidikan id');
        $grid->status_perkawinan_id('Status perkawinan id');
        $grid->agama_id('Agama id');
        $grid->tgl_pemeriksaan('Tgl pemeriksaan');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Pasien::findOrFail($id));

        $show->id('Id');
        $show->nama('Nama');
        $show->umur('Umur');
        $show->jenis_kelamin_id('Jenis kelamin id');
        $show->pekerjaan_id('Pekerjaan id');
        $show->pendidikan_id('Pendidikan id');
        $show->status_perkawinan_id('Status perkawinan id');
        $show->agama_id('Agama id');
        $show->tgl_pemeriksaan('Tgl pemeriksaan');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pasien);

        $form->text('nama', 'Nama');
        $form->number('umur', 'Umur');
        $form->number('jenis_kelamin_id', 'Jenis kelamin id');
        $form->number('pekerjaan_id', 'Pekerjaan id');
        $form->number('pendidikan_id', 'Pendidikan id');
        $form->number('status_perkawinan_id', 'Status perkawinan id');
        $form->number('agama_id', 'Agama id');
        $form->datetime('tgl_pemeriksaan', 'Tgl pemeriksaan')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
