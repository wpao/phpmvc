<?php 

class About extends Controller {
    public function index($nama = 'Developer', $hoby = 'game')
    {
        $data = [
            'nama' => $nama,
            'hoby' => $hoby,
            'judul' => 'About | Index'
        ];
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}