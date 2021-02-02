<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Config\Database;

class Model_test extends Model{
    protected $table = 'first';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];

    public function selectAll(){
        
        // die();
        // $this->load->database();
        // $this->db->select('*');
        // $this->db->from('first');
        // $query = $this->db->get();

        // $this->db->where('id', '1');
        // $result = $this->db->get('first');
        // return $result->result_array();

        //***requred*** database connect
        $db = \Config\Database::connect();

        //select table
        $sadsad = $db->table('first');
        //start query
        $query = $sadsad->get();
        //collect result to array
        $query=$query->getResult('array');

        return $query;

        // foreach ($query->getResult('array') as $row)
        // {
        //     echo $row['id'];
        //     echo $row['name'];

        // }


        // foreach ($query->getResult() as $row)
        // {
        //     echo $row->id;
        // }
        // die(json_encode($query));
    }

    public function edit_name($id,$name){
        $db = \Config\Database::connect();
        $builder = $db->table('first');
        $builder->set('name', $name);
        $builder->where('id', $id);
        $builder->update();
    }

    public function delete($id){
        $db = \Config\Database::connect();
        $builder = $db->table('first');
        $builder->where('id', $id);
        $builder->delete();
    }
}



?>