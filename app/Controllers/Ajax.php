<?php 

namespace App\Controllers;

use App\Models\Model_test;

class Ajax extends BaseController
{
	public function index()
	{
        echo view('pages/ajax-crud/index');
    }
    
    public function submitData()
    {
        helper(['form', 'url']);

		$error = $this->validate([
			'name'	=>	'required|min_length[3]'
		]);

		if(!$error)
		{
			echo view('pages/crud/Add', [
				'error' 	=> $this->validator
			]);
		}
		else
		{
			$crudModel = new Model_test();
			$crudModel->save([
				'name'	=>	$this->request->getVar('name')
            ]);
        }
    }

    public function getData()
    {
		$crudModel = new Model_test();
		
		$data = $crudModel->selectAll();

		// $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

		// $data['pagination_link'] = $crudModel->pager;

		return json_encode($data);
	}
	
	public function update_Data()
    {
		helper(['form', 'url']);
		$data_id = $this->request->getVar('data_id');
		$new_name = $this->request->getVar('new_name');

		
		$crudModel = new Model_test();
		$data = $crudModel->edit_name($data_id,$new_name);
		// $data = $crudModel->edit_name($data_id,$nanew_nameme);
		// console.log($data);

		// $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

		// $data['pagination_link'] = $crudModel->pager;

		// return json_encode($data);

		return $data;
	}

	public function delete_data(){
		helper(['form', 'url']);
		$id = $this->request->getVar('id');
		die($id);
		$crudModel = new Model_test();
		$data = $crudModel->delete($id);
	}
	
	
}
