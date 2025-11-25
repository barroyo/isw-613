<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $data['title'] = "Students List";
        $data['students'] = $model->findAll();
        return view('common/head', $data)
            . view('common/nav')
            . view('students/index', $data)
            . view('common/footer'); 
    }

    public function validateEmail($email) {
        if($email == 'bladimir.ab@gmail.com') {
            echo "Is Valid";
        } else {
            echo "Is Not Valid";
        }
    }

    public function create()
    {
        $data['title'] = "Add new Student";
        return view('common/head', $data)
            . view('common/nav')
            . view('students/create')
            . view('common/footer'); 
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

    public function show($id)
    {
        $model = new StudentModel();
        $data['student'] = $model->find($id);
        return view('students/show', $data);
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
