<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class Student extends BaseController
{
    // show students list
    public function index(){
        // $studentModel = new StudentModel();
        $data['title'] = 'Students Page';
        $studentModel = model(StudentModel::class);
        $data['students'] = $studentModel->findAll();

        return view('students/index', $data);
    }
    // add student form
    // public function create(){
    //     return view('add_student');
    // }

    // // insert data
    // public function store() {
    //     $studentModel = new StudentModel();
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email'  => $this->request->getVar('email'),
    //     ];
    //     $studentModel->insert($data);
    //     return $this->response->redirect(site_url('/students-list'));
    // }
    // // show single student
    // public function singlestudent($id = null){
    //     $studentModel = new StudentModel();
    //     $data['student_obj'] = $studentModel->where('id', $id)->first();
    //     return view('edit_student', $data);
    // }
    // // update student data
    // public function update(){
    //     $studentModel = new StudentModel();
    //     $id = $this->request->getVar('id');
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email'  => $this->request->getVar('email'),
    //     ];
    //     $studentModel->update($id, $data);
    //     return $this->response->redirect(site_url('/students-list'));
    // }

    // // delete student
    // public function delete($id = null){
    //     $studentModel = new StudentModel();
    //     $data['student'] = $studentModel->where('id', $id)->delete($id);
    //     return $this->response->redirect(site_url('/students-list'));
    // }
}
