<?php

class About extends Controller
{
    public function index($name = "Sultoni", $job = "Student", $age = "22")
    {
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        $data['judul'] = "About";
        $this->view('layout/header', $data);
        $this->view('about/index', $data);
        $this->view('layout/footer');
    }

    public function page()
    {
        $data['judul'] = "Page";
        $this->view('layout/header', $data);
        $this->view('about/page', $data);
        $this->view('layout/footer');
    }
}
