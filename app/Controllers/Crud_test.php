<?php

namespace App\Controllers;

use App\Models\Model_test;

class Crud_test extends BaseController
{
    //landing page
    function index()
	{
        $crudModel = new Model_test();
        // die($crudModel->selectAll());
        $test = $crudModel->selectAll();


        // die($test);

		// $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

		// $data['pagination_link'] = $crudModel->pager;

		return view('pages/crud/Add', $test);
		
    }
    //add validation
	function add_validation()
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

			$session = \Config\Services::session();

			$session->setFlashdata('success', 'User Data Added');

			return $this->response->redirect(base_url('/public/crud_test'));
		}
    }
    //edit landing page
    function edit($id)
    {
        $crudModel = new Model_test();

        $data['edit_data'] = $crudModel->where('id', $id)->first();

        return view("pages/crud/Edit", $data);
    }
    //edit confirm
    function edit_validation($id){
        helper(['form', 'url']);
        
        $error = $this->validate([
            'name' 	=> 'required|min_length[3]'
        ]);

        $crudModel = new Model_test();

        // $id = $this->request->getVar('id'); removed for single data only

        if(!$error)
        {
        	// $data['user_data'] = $crudModel->where('id', $id)->first();
        	// $data['error'] = $this->validator;
            // return view("pages/crud/Edit", $data);
            

            $session = \Config\Services::session();

            $session->setFlashdata('failed', 'User Data Must be 3 or higher, Data is NOT Updated');

            return $this->response->redirect(base_url('/public/crud_test/edit/'.$id));
        } 
        else 
        {
	        $data = [
	            'name' => $this->request->getVar('name')
	        ];

        	$crudModel->update($id, $data);

        	$session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

        	return $this->response->redirect(base_url('/public/crud_test'));
        }
    }

    function delete($id){
        $crudModel = new Model_test();
        $crudModel->delete($id);
        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data '.$id.' is Deleted');
        return $this->response->redirect(base_url('/public/crud_test'));
    }

    function image_upload(){
        echo view('pages/crud/image');
    }

    function image(){

        // die ($file=$this->request->getFile('image'));
        
        $file = $this->request->getFile('file');
        if($file){
            if($file->getSize()>0){
                echo "File name : ".$file->getName();
                echo "File Random name : ".$file->getRandomName();
                echo "File Size : ".$file->getSize();
                echo "File extension : ".$file->getExtension();
                $file->move('./upload',$file->getRandomName());


                $session = \Config\Services::session();

                $session->setFlashdata('success', 'Image Uploaded');
                die();
                echo view('pages/crud/image');
            }
        }else{
            $session = \Config\Services::session();

            $session->setFlashdata('failed', 'Failed to upload Image');
            echo view('pages/crud/image');
        }
    }




}

?>