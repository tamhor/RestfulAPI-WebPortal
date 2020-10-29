<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsersModel;

class Users extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new UsersModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    // get single product
    public function show($id = null)
    {
        $model = new UsersModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }

    // create a product
    public function create()
    {
        $model = new UsersModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'role' => $this->request->getPost('role'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        //$data = $this->request->getPost();
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];

        return $this->respondCreated($data, 201);
    }

    // update product
    public function update($id = null)
    {
        $model = new UsersModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'username' => $json->username,
                'password' => $json->password,
                'email' => $json->email,
                'phone' => $json->phone,
                'role' => $json->role,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'username' => $input['username'],
                'password' => $input['password'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'role' => $input['role'],
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    // delete product
    public function delete($id = null)
    {
        $model = new UsersModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }
}
