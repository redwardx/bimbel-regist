<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp extends CI_Controller
{
    private $title = 'SPP';
    private $view = 'spp';
    private $link = 'spp';
    public function __construct()
    {
        parent::__construct();
        cekLogin();
        $this->load->model('SppModel', 'model');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['data'] = $this->model->select('tb_spp.*, username, nama_lengkap, nama_bimbel, cabang')->join('tb_user', 'tb_user.id = tb_spp.id_user')->join('tb_bimbel', 'tb_bimbel.id_bimbel = tb_spp.id_bimbel')->findAll();
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['user'] = $this->model->getUser();
        $this->template->load('template/index', $this->view . '/new', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('id_bimbel', 'Id Bimbel', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'id_user' => $this->input->post('id_user', true),
                'id_bimbel' => $this->input->post('id_bimbel', true),
                'nominal' => $this->input->post('nominal', true),
                'jatuh_tempo' => $this->input->post('jatuh_tempo', true),
                'status' => 0,
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
        $data['user'] = $this->model->getUser();
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
            'id_user' => $this->input->post('id_user', true),
            'id_bimbel' => $this->input->post('id_bimbel', true),
            'nominal' => $this->input->post('nominal', true),
            'jatuh_tempo' => $this->input->post('jatuh_tempo', true),
            'status' => 0,
        ];

        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('id_bimbel', 'Id Bimbel', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'required');

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
