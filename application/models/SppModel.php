<?php


require_once('application/models/TabModel.php');

class SppModel extends TabModel
{
    public $table            = 'tb_spp';
    public $primaryKey       = 'id_spp';
    public $useAutoIncrement = true;
    public $insertID         = 0;
    public $useSoftDeletes   = true;
    public $returnType       = 'array';

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($id_bimbel = null)
    {
        $this->db->where('id_role', 2);
        $this->db->join('tb_bimbel', 'tb_user.id_bimbel = tb_bimbel.id_bimbel');
        $this->db->where('tb_user.deleted_at', null);
        if ($id_bimbel != null) {
            $this->db->where('id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_user')->result_array();
    }

    public function getSiswa($id_bimbel = null)
    {
        $this->db->join('tb_bimbel', 'tb_siswa.id_bimbel = tb_bimbel.id_bimbel');
        $this->db->where('tb_siswa.deleted_at', null);
        if ($id_bimbel != null) {
            $this->db->where('id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_siswa')->result_array();
    }

    public function getBimbel()
    {
        $this->db->where('id_bimbel !=', 1);
        $this->db->where('deleted_at', null);
        return $this->db->get('tb_bimbel')->result_array();
    }

    public function getSpp($id_user = null, $id_bimbel = null)
    {
        $this->db->select('tb_spp.*, username, nama_lengkap, nama_bimbel, cabang');
        $this->db->join('tb_user', 'tb_spp.id_user = tb_user.id');
        if ($id_user != null) {
            $this->db->where('id_user', $id_user);
        }
        $this->db->join('tb_bimbel', 'tb_spp.id_bimbel = tb_bimbel.id_bimbel');
        if ($id_bimbel != null) {
            $this->db->where('id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_spp')->result_array();
    }

    public function getNom($id_bimbel = 1, $tanggal = null)
    {
        $this->db->select('tb_spp.*, SUM(nominal) as total_nominal');
        if ($tanggal != null) {
            $this->db->where('DATE(tgl_input)', $tanggal);
        }
        $this->db->join('tb_bimbel', 'tb_spp.id_bimbel = tb_bimbel.id_bimbel');
        if ($id_bimbel != 1) {
            $this->db->where('tb_spp.id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_spp')->row_array();
    }

    public function getTrx($id_bimbel = null, $tanggal = null)
    {
        $this->db->select('count(*) as trx');
        if ($tanggal != null) {
            $this->db->where('DATE(tgl_input)', $tanggal);
        }
        $this->db->join('tb_bimbel', 'tb_spp.id_bimbel = tb_bimbel.id_bimbel');
        if ($id_bimbel != null) {
            $this->db->where('tb_spp.id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_spp')->row_array();
    }
}
