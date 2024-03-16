<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    private $title = 'Siswa';
    private $view = 'siswa';
    private $link = 'siswa';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('SiswaModel', 'model');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $id_bimbel = $this->session->userdata('id_bimbel');
        $id_role = $this->session->userdata('id_role');
        if ($id_role == 1) {
            $data['data'] = $this->model->select('tb_siswa.*')->findAll();
        }
        if ($id_role == 2 && $id_bimbel != null) {
            $data['data'] = $this->model->select('tb_siswa.*')->where('id_bimbel', $id_bimbel)->findAll();
        }
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['bimbel'] = $this->model->getBimbel();
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required|is_unique[tb_siswa.nisn]');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('id_bimbel', 'Id Bimbel', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'nisn' => $this->input->post('nisn', true),
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'alamat' => $this->input->post('alamat', true),
                'id_bimbel' => $this->input->post('id_bimbel', true),
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
        $data['bimbel'] = $this->model->getBimbel();
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
            'nisn' => $this->input->post('nisn', true),
            'nama_siswa' => $this->input->post('nama_siswa', true),
            'alamat' => $this->input->post('alamat', true),
            'id_bimbel' => $this->input->post('id_bimbel', true),
        ];

        $this->form_validation->set_rules('nisn', 'NISN Siswa', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('id_bimbel', 'Bimbel', 'required');


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
