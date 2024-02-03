<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    cekLogin();
    $this->load->model('SppModel', 'model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $today = date('Y-m-d');    
    $id_bimbel = $this->session->userdata('id_bimbel');
    $id_role = $this->session->userdata('id_role');
    if ($id_role == 1) {
      $totalNominalToday = $this->model->getNom(1, $today)['total_nominal'];
      $trxToday = $this->model->getTrx(1, $today)['trx'];
      $siswa = $this->model->getSiswa();
      $siswaCount = count($siswa);
      $bimbel = $this->model->getBimbel();
      $bimbelCount = count($bimbel);
      $data['bimbelCount'] = $bimbelCount;
      $data['siswaCount'] = $siswaCount;
      $data['trxToday'] = $trxToday;
      $data['totalNominal'] = $totalNominal;
      $data['totalNominalToday'] = $totalNominalToday;
    }
    if ($id_role == 2 && $id_bimbel != null) {
      $totalNominal = $this->model->getNom($id_bimbel)['total_nominal'];
      $totalNominalToday = $this->model->getNom($id_bimbel, $today)['total_nominal'];
      $trxToday = $this->model->getTrx($id_bimbel, $today)['trx'];
      $siswa = $this->model->where('tb_siswa.id_bimbel', $id_bimbel)->getSiswa();
      $siswaCount = count($siswa);
      $data['siswaCount'] = $siswaCount;
      $data['trxToday'] = $trxToday;
      $data['totalNominal'] = $totalNominal;
      $data['totalNominalToday'] = $totalNominalToday;
    }
    $this->template->load('template/index', 'dashboard/index', $data);
  }
}
