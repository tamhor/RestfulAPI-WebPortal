<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CommentsModel;

class Comments extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new CommentsModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    // get single product
    public function show($id = null)
    {
        $model = new CommentsModel();
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
        $model = new CommentsModel();
        $data = [
            'article_id' => $this->request->getPost('article_id'),
            'comment' => $this->request->getPost('comment'),
            'user_id' => $this->request->getPost('user_id'),
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
        $model = new CommentsModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'article_id' => $json->article_id,
                'comment' => $json->comment,
                'user_id' => $json->user_id,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'article_id' => $input['article_id'],
                'comment' => $input['comment'],
                'user_id' => $input['user_id'],
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
        $model = new CommentsModel();
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
