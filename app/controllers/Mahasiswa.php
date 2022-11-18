<?php 

class Mahasiswa extends Controller {
    public function index()
    {
        $data = [
            'judul' => 'Mahasiswa | Index',
            'mhs' => $this->model('Mahasiswa_model')->getAllMahasiswa()
        ];

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data = [
            'judul' => 'Detail | Mahasiswa',
            'mhs' => $this->model('Mahasiswa_model')->getMahasiswaById($id)
        ];

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubahkan', 'success');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubahkan', 'danger');
            header('location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        
        $data = [
            'judul' => 'Mahasiswa | Index',
            'mhs' => $this->model('Mahasiswa_model')->cariDataMahasiswa()
        ];

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    
}