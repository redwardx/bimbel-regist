<?php


require_once('application/models/BaseModel.php');

class SiswaModel extends BaseModel
{
    public $table            = 'tb_siswa';
    public $primaryKey       = 'id_siswa';
    public $useAutoIncrement = true;
    public $insertID         = 0;
    public $useSoftDeletes   = true;
    public $returnType       = 'array';
    
    public $useTimestamps = true;
    public $dateFormat    = 'datetime';
    public $createdField  = 'created_at';
    public $updatedField  = 'updated_at';
    public $deletedField  = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
    }

    public function find($id)
    {
        $this->db->where($this->table . '.' . $this->primaryKey, $id);

        $this->checkDeleted('tb_siswa');

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function findAll()
    {
        $this->checkDeleted('tb_siswa');

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->result_array();
        } else {
            $data = $this->db->get($this->table)->result();
        }
        return $data;
    }

    public function first()
    {
        $this->db->limit(1);
        $this->checkDeleted('tb_siswa');

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function getBimbel()
    {
        $this->db->where('id_bimbel !=', 1);
        return $this->db->get('tb_bimbel')->result_array();
    }

    public function getSiswa($id_bimbel = null)
    {
        $this->db->select('tb_siswa.*, nama_bimbel, cabang');
        $this->db->join('tb_bimbel', 'tb_siswa.id_bimbel = tb_bimbel.id_bimbel');
        if ($id_bimbel != null) {
            $this->db->where('id_bimbel', $id_bimbel);
        }
        return $this->db->get('tb_siswa')->result_array();
    }
}
