<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = "Home";
        $data['name'] = $this->Model('UserModel')->getUser();
        $this->view('layout/header', $data);
        $this->view('home/index', $data);
        $this->view('layout/footer');
    }
}
