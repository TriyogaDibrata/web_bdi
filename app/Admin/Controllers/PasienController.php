<?php

namespace App\Admin\Controllers;

use App\Pasien;
use App\MJenisKelamin;
use App\MPekerjaan;
use App\MPendidikan;
use App\MStatusPerkawinan;
use App\MAgama;

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

        $grid->model()->join('m_jenis_kelamin', 'm_jenis_kelamin.id', 't_pasien.jenis_kelamin_id')
        ->join('m_pekerjaan', 'm_pekerjaan.id', 't_pasien.pekerjaan_id')
        ->join('m_pendidikan', 'm_pendidikan.id', 't_pasien.pendidikan_id')
        ->join('m_status_perkawinan', 'm_status_perkawinan.id', 't_pasien.status_perkawinan_id')
        ->join('m_agama', 'm_agama.id', 't_pasien.agama_id')
        ->select('t_pasien.id', 't_pasien.nama as nama', 't_pasien.umur as umur', 'm_jenis_kelamin.jenis_kelamain as jenis_kelamin', 
                'm_pekerjaan.pekerjaan as pekerjaan', 'm_pendidikan.pendidikan as pendidikan', 'm_status_perkawinan.status_perkawinan', 
                'm_agama.agama as agama', 't_pasien.tgl_pemeriksaan as tgl_pemeriksaan');

        // $grid->id('Id');
        $grid->nama('Nama');
        $grid->umur('Umur');
        $grid->jenis_kelamin('Jenis kelamin');
        $grid->pekerjaan('Pekerjaan');
        $grid->pendidikan('Pendidikan');
        $grid->status_perkawinan('Status Perkawinan');
        $grid->agama('Agama');
        $grid->tgl_pemeriksaan('Tgl Pemeriksaan');
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

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
        $show = new Show(Pasien::join('m_jenis_kelamin', 'm_jenis_kelamin.id', 't_pasien.jenis_kelamin_id')
        ->join('m_pekerjaan', 'm_pekerjaan.id', 't_pasien.pekerjaan_id')
        ->join('m_pendidikan', 'm_pendidikan.id', 't_pasien.pendidikan_id')
        ->join('m_status_perkawinan', 'm_status_perkawinan.id', 't_pasien.status_perkawinan_id')
        ->join('m_agama', 'm_agama.id', 't_pasien.agama_id')
        ->select('t_pasien.*', 't_pasien.nama as nama', 't_pasien.umur as umur', 'm_jenis_kelamin.jenis_kelamain as jenis_kelamin', 
                'm_pekerjaan.pekerjaan as pekerjaan', 'm_pendidikan.pendidikan as pendidikan', 'm_status_perkawinan.status_perkawinan', 
                'm_agama.agama as agama', 't_pasien.tgl_pemeriksaan as tgl_pemeriksaan')
        ->where('t_pasien.id', $id)->first());

        $show->id('Id');
        $show->nama('Nama');
        $show->umur('Umur');
        $show->jenis_kelamin('Jenis Kelamin');
        $show->pekerjaan('Pekerjaan');
        $show->pendidikan('Pendidikan');
        $show->status_perkawinan('Status perkawinan');
        $show->agama('Agama');
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

        $jenis_kelamin = MJenisKelamin::all()->pluck('jenis_kelamain', 'id');
        $pekerjaan = MPekerjaan::all()->pluck('pekerjaan', 'id');
        $pendidikan = MPendidikan::all()->pluck('pendidikan', 'id');
        $status_perkawinan = MStatusPerkawinan::all()->pluck('status_perkawinan', 'id');
        $agama = MAgama::all()->pluck('agama', 'id');

        $form->text('nama', 'Nama');
        $form->number('umur', 'Umur');
        $form->select('jenis_kelamin_id', 'Jenis kelamin')->options($jenis_kelamin);;
        $form->select('pekerjaan_id', 'Pekerjaan')->options($pekerjaan);;
        $form->select('pendidikan_id', 'Pendidikan')->options($pendidikan);;
        $form->select('status_perkawinan_id', 'Status Perkawinan')->options($status_perkawinan);;
        $form->select('agama_id', 'Agama')->options($agama);;
        $form->datetime('tgl_pemeriksaan', 'Tgl pemeriksaan')->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
