<?php


require_once('application/models/BaseModel.php');

class BimbelModel extends BaseModel
{
    public $table            = 'tb_bimbel';
    public $primaryKey       = 'id_bimbel';
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

        $this->checkDeleted('tb_bimbel');

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function findAll()
    {
        $this->checkDeleted('tb_bimbel');

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
        $this->checkDeleted('tb_bimbel');

        if ($this->returnType == 'array') {
            $data = $this->db->get($this->table)->row_array();
        } else {
            $data = $this->db->get($this->table)->row();
        }
        return $data;
    }

    public function getBimbel()
    {
        $this->db->select('tb_bimbel.*');
        return $this->db->get('tb_bimbel')->result_array();
    }
}

