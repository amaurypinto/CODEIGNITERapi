<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Register extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[225]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[225]'],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[password]']
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return $this->respond(['message' => 'Registered successfully'], 200);
        } else {
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'invalid inputs'
            ];
            return $this->fail($response, 409);
        }
    }
}
