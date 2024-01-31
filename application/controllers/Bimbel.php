<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbel extends CI_Controller
{
    private $title = 'Bimbel';
    private $view = 'bimbel';
    private $link = 'bimbel';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('BimbelModel', 'model');
        $this->load->model('SiswaModel', 'siswa_model');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $this->model->select('tb_bimbel.*')->where('id_bimbel !=', 1)->findAll();
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('nama_bimbel', 'Nama Bimbel', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'nama_bimbel' => $this->input->post('nama_bimbel', true),
                'cabang' => $this->input->post('cabang', true),
            ];
            $res = $this->model->save($data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Add Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Add Failed');
            }
            redirect($this->link, 'refresh');
        }
    }

    public function detail($id)
    {
        $result = $this->model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $result;
        $data['siswa'] = $this->siswa_model->select('tb_siswa.*')->where('id_bimbel', $id)->findAll();
        $this->template->load('template/index', $this->view . '/detail', $data);
    }

    public function edit($id)
    {
        $result = $this->model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $result;
        $this->template->load('template/index', $this->view . '/edit', $data);
    }

    public function update($id)
    {

        $result = $this->model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $data = [
            'nama_bimbel' => $this->input->post('nama_bimbel', true),
            'cabang' => $this->input->post('cabang', true),
        ];

        $this->form_validation->set_rules('nama_bimbel', 'Nama Bimbel', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {

            $res = $this->model->update($id, $data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Update Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Update Failed');
            }
            redirect($this->link, 'refresh');
        }
    }

    public function delete($id)
    {
        $result = $this->model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $res = $this->model->delete($id);
        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        redirect($this->link, 'refresh');
    }
}
