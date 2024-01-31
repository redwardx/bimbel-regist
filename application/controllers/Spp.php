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
        $this->load->model('SiswaModel', 'siswa_model');
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $id_bimbel = $this->session->userdata('id_bimbel');
        $id_role = $this->session->userdata('id_role');
        if ($id_role == 1) {
            $data['data'] = $this->model->select('tb_spp.*, nisn, nama_siswa, nama_bimbel, cabang')->join('tb_siswa', 'tb_siswa.id_siswa = tb_spp.id_siswa')->join('tb_bimbel', 'tb_bimbel.id_bimbel = tb_spp.id_bimbel')->findAll();
        }
        if ($id_role == 2 && $id_bimbel != null) {
            $data['data'] = $this->model->select('tb_spp.*, nisn, nama_siswa, nama_bimbel, cabang')->join('tb_siswa', 'tb_siswa.id_siswa = tb_spp.id_siswa')->join('tb_bimbel', 'tb_bimbel.id_bimbel = tb_spp.id_bimbel')->where('tb_siswa.id_bimbel', $id_bimbel)->findAll();
        }
        $this->template->load('template/index', $this->view . '/index', $data);
    }

    public function new($id)
    {
        $result = $this->siswa_model->find($id);

        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            redirect($this->link, 'refresh');
        }

        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $data['userdata'] = $result;
        $data['bimbel'] = $this->siswa_model->getBimbel();
        $this->template->load('template/index', $this->view . '/new', $data);
    }

    public function siswa()
    {
        $data['title'] = $this->title;
        $data['link'] = $this->link;
        $id_bimbel = $this->session->userdata('id_bimbel');
        $id_role = $this->session->userdata('id_role');
        if ($id_role == 1) {
            $data['siswadata'] = $this->model->getSiswa();
        }
        if ($id_role == 2 && $id_bimbel != null) {
            $data['siswadata'] = $this->model->where('tb_siswa.id_bimbel', $id_bimbel)->getSiswa();
        }
        $this->template->load('template/index', $this->view . '/siswa', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('id_siswa', 'Id siswa', 'required');
        $this->form_validation->set_rules('id_user', 'Id User', 'required');
        $this->form_validation->set_rules('id_bimbel', 'Id Bimbel', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->new();
        } else {
            $data = [
                'id_siswa' => $this->input->post('id_siswa', true),
                'id_user' => $this->input->post('id_user', true),
                'id_bimbel' => $this->input->post('id_bimbel', true),
                'nominal' => $this->input->post('nominal', true),
            ];
            $key_name = 'image';
            if (!empty($_FILES[$key_name]['name'])) {
                // Set preference 
                $config['upload_path'] = 'assets/uploads/bukti/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '1000'; // max_size in kb 
                $config['file_name'] = $_FILES[$key_name]['name'];

                // Load upload library 
                $this->load->library('upload', $config);

                // File upload
                if ($this->upload->do_upload($key_name)) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['bukti'] = $filename;
                } else {
                    $this->alert->set('warning', 'Warning', 'Image Failed');
                    redirect($link . '/' . $data['id_siswa'] . '/new', 'refresh');
                }
            }

            $res = $this->model->save($data);
            if ($res) {
                $this->alert->set('success', 'Success', 'Add Success');
            } else {
                $this->alert->set('warning', 'Warning', 'Add Failed');
            }
            redirect($this->link, 'refresh');
        }
    }

    public function print($id)
    {
        $this->load->library('Pdf');
        $result = $this->model->select('tb_spp.*, nisn, nama_siswa, nama_lengkap, alamat, nama_bimbel, cabang')->join('tb_siswa', 'tb_siswa.id_siswa = tb_spp.id_siswa')->join('tb_bimbel', 'tb_bimbel.id_bimbel = tb_spp.id_bimbel')->join('tb_user', 'tb_user.id = tb_spp.id_user')->find($id);

        $pdf = new FPDF('P', 'mm',array(130,150));
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(0,7,'BIMBEL ABC',0,1,'C');
                $pdf->Ln(7);
                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(0,7,'Invoice',0,1,'C');
                $pdf->Cell(10,7,'',0,1);
                $pdf->Ln(10);
                if ($result) {
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(14,6,'NISN',0,0,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(106,6,$result['nisn'],0,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(30,6,'Nama Lengkap',0,0,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(65,6,$result['nama_siswa'],0,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(28,6,'Alamat Siswa',0,0,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(89,6,$result['alamat'],0,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(17,6,'Bimbel',0,0,'C'); // Sel pertama dengan teks "Bimbel"
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(104,6,$result['nama_bimbel'],0,0,'C'); // Sel kedua dengan nama bimbel (87 = 104 - 17)
                $pdf->Cell(-60,6,$result['cabang'],0,1,'C');
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(28,6,'Tanggal Input',0,0,'C');
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(94,6,$result['tgl_input'],0,1,'C');
                $pdf->Ln(5);
                $pdf->SetFont('Arial','',10);
            $pdf->Cell(70,6,'Jumlah Tagihan',1,0);
            $pdf->Cell(40,6,'Rp.'.$result['nominal'],1,1);
            $pdf->Ln(10);
            $pdf->Cell(70,6,' ',0,0);
            $pdf->Cell(40,6,'Petugas',0,1);
            $pdf->Ln(15);
            $pdf->Cell(70,6,' ',0,0);
            $pdf->Cell(40,6,$result['nama_lengkap'],0,1);
        } else {
            // Jika data tidak ditemukan, tampilkan pesan
            $pdf->Cell(0,6,'Data tidak ditemukan',1,1,'C');
        }
        
        $pdf->Output();
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
