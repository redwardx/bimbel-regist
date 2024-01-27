<?php


require_once('application/models/TabModel.php');

class BimbelModel extends TabModel
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
