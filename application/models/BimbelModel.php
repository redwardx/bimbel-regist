<?php


require_once('application/models/BaseModel.php');

class BimbelModel extends BaseModel
{
    public $table            = 'tb_bimbel';
    public $primaryKey       = 'id_bimbel';
    public $useAutoIncrement = true;
    public $insertID         = 0;
    public $returnType       = 'array';

    public function __construct()
    {
        parent::__construct();
    }

    public function getBimbel()
    {
        $this->db->select('tb_bimbel.*');
        return $this->db->get('tb_bimbel')->result_array();
    }
}
