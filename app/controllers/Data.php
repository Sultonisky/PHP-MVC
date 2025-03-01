<?php

class Data extends Controller
{
    public function index()
    {
        $data['judul'] = 'List Data';
        $data['list_data'] = $this->Model('DataModel')->getAllData();
        $this->view('layout/header', $data);
        $this->view('data/index', $data);
        $this->view('layout/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Details from Data';
        $data['list_data'] = $this->Model('DataModel')->getDataById($id);
        $this->view('layout/header', $data);
        $this->view('data/detail', $data);
        $this->view('layout/footer');
    }

    public function create()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('DataModel')->createData($_POST) > 0) {
            Flasher::setFlash('Success!', 'Add Data Successfully', 'success');
            header('Location: ' . BASEURL . '/data');
            exit;
        } else {
            Flasher::setFlash('Error!', 'Add Data Failed', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }
    }

    public function delete()
    {
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            Flasher::setFlash('Error!', 'Invalid Data ID', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }

        $id = $_POST['id']; // Ambil ID dari form

        if ($this->model('DataModel')->deleteData($id) > 0) {
            Flasher::setFlash('Success!', 'Data deleted successfully!', 'success');
        } else {
            Flasher::setFlash('Error!', 'Data deletion failed or not found.', 'danger');
        }

        header('Location: ' . BASEURL . '/data');
        exit;
    }

    public function getEdit()
    {
        echo json_encode($this->model('DataModel')->getDataById($_POST['id']));
    }

    public function edit()
    {
        if ($this->model('DataModel')->editData($_POST) > 0) {
            Flasher::setFlash('Success!', 'Edit Data Successfully', 'success');
            header('Location: ' . BASEURL . '/data');
            exit;
        } else {
            Flasher::setFlash('Error!', 'Edit Data Failed', 'danger');
            header('Location: ' . BASEURL . '/data');
            exit;
        }
    }
}
