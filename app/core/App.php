<?php

class App
{
    protected $controller = 'Home'; // Default controller
    protected $method = 'index'; // Default method
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Jika URL kosong (akses pertama kali), tetap gunakan controller default
        if (empty($url) || !isset($url[0]) || $url[0] === '') {
            $url = [$this->controller]; // Pastikan array memiliki elemen default
        }

        // Periksa apakah file controller ada
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Load controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Cek method
        if (!empty($url) && isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Simpan parameter jika ada
        $this->params = !empty($url) ? array_values($url) : [];

        // Jalankan controller dan method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return []; // Kembalikan array kosong jika tidak ada parameter URL
    }
}
