<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArticlesModel;

class Articles extends ResourceController
{
    use ResponseTrait;
    // get all product
    public function index()
    {
        $model = new ArticlesModel();
        $data = $model->findAll();
        return $this->respond($data, 200);
    }

    // get single product
    public function show($id = null)
    {
        $model = new ArticlesModel();
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
        $model = new ArticlesModel();
        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'image' => $this->request->getPost('image'),
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'article' => $this->request->getPost('article'),
            'user_id' => $this->request->getPost('user_id'),
            'status' => $this->request->getPost('status'),
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
        $model = new ArticlesModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'category_id' => $json->category_id,
                'image' => $json->image,
                'title' => $json->title,
                'slug' => $json->slug,
                'article' => $json->article,
                'user_id' => $json->user_id,
                'status' => $json->status,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'category_id' => $input['category_id'],
                'image' => $input['image'],
                'title' => $input['title'],
                'slug' => $input['slug'],
                'article' => $input['article'],
                'user_id' => $input['user_id'],
                'status' => $input['status'],
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
        $model = new ArticlesModel();
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
