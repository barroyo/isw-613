<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $data['students'] = $model->findAll();
        return view('students/index', $data);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        $model = new StudentModel();

        $model->save([
            'first_name'  => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/students');
    }

    public function edit($id)
    {
        $model = new StudentModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new StudentModel();

        $model->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new StudentModel();
        $model->delete($id);
        return redirect()->to('/users');
    }
}
