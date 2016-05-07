<?php

Class Crun0 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function privillege() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('fe/log');
        } else {
            $auth = $this->Muno->privillege();
            if ($auth) {
                foreach ($auth as $at) {
                    $username = $at['username'];
                }

                $userdata = array(
                    'username' => $username,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($userdata);

                redirect(base_url() . "Crun0/", 'refresh');
            } else {
                $this->load->view('fe/log');
            }
        }
    }

    function cek() {
        if ($this->session->userdata('username') == NULL && $this->session->userdata('logged_in') != TRUE)
            redirect(base_url() . "Cruno/log", 'refresh');
    }

    function cek_user($username) {
        if ($this->session->userdata('username') != $username && $this->session->userdata('logged_in') != TRUE) {
            redirect(base_url() . "Cruno/log", 'refresh');
        } else {
            $data['error'] = "";
            $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
            $data['cont'] = 'ed_user';
            $this->load->view('be/sked', $data);
        }
    }

    function edit_user() {
        if ($this->session->userdata('username') != $this->input->post('username') && $this->session->userdata('logged_in') != TRUE) {
            redirect(base_url() . "Cruno/log", 'refresh');
        } else {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('pass', 'Password', 'trim');
            $this->form_validation->set_rules('repass', 'Retype password', 'matches[pass]');

            $config = array(
                'upload_path' => './assets/img',
                'allowed_types' => 'gif|jpeg|jpg|png',
                'overwrite' => 'true'
            );

            if ($this->form_validation->run() == FALSE) {
                $this->view('user', validation_errors());
            } else {
                $this->load->library('upload', $config);
                $this->upload->do_upload('file');
                if ($this->Muno->edit_user()) {
                    $this->view('user', 'Selamat! Data anda telah terbarui');
                } else {
                    $this->view('user', 'Ups! Terjadi kesalahan. Silahkan masukan kembali data anda!');
                }
            }
        }
    }

    function add_user() {
        $this->cek();
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('repass', 'Retype password', 'required|matches[pass]');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('user', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_user()) {
                $this->view('user', 'Selamat! Data anda telah berhasil ditambahkan');
            } else {
                $this->view('user', 'Ups! Terjadi kesalahan. Silahkan masukan kembali data anda!');
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->load->view('fe/log');
    }

    function index() {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['aktifitas'] = $this->Muno->get_aktifitas();
        $data['cont'] = 'cont';
        $this->load->view('be/sked', $data);
    }

    function view($v, $error = "") {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['user'] = $this->Muno->get_user();
        $data['cont'] = $v;
        $data['error'] = $error;
        $data['tag'] = $this->Muno->get_tag();
        $data['harga'] = $this->Muno->get_harga();
        $data['artikel'] = $this->Muno->get_artikel();
        $data['event'] = $this->Muno->get_event();
        $data['klien'] = $this->Muno->get_klien();
        $data['tentang'] = $this->Muno->get_page(1);
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['produk'] = $this->Muno->get_produk();
        $data['testimoni'] = $this->Muno->get_testimoni();
        $data['karir'] = $this->Muno->get_karir();
        $data['pesan'] = $this->Muno->get_pesan();
        $this->load->view('be/sked', $data);
    }

    function vimi($id_vimi) {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Misi', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Misi perusahaan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->get_vimi($id_vimi, validation_errors());
        } else {
            if ($this->Muno->vimi($id_vimi)) {
                $this->get_vimi($id_vimi, 'Selamat! Data anda telah terbarui');
            } else {
                $this->get_vimi($id_vimi, 'Ups! Terjadi kesalahan. Silahkan masukan kembali data anda!');
            }
        }
    }

    function get_vimi($id_vimi, $error = "") {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['cont'] = 'vimi';
        $data['error'] = $error;
        $data['isi'] = $this->Muno->get_vimi($id_vimi);
        $this->load->view('be/sked', $data);
    }

    function get_visi($error = "") {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['cont'] = 'visi';
        $data['error'] = $error;
        $data['isi'] = $this->Muno->get_visi();
        $this->load->view('be/sked', $data);
    }

    function visi() {
        $this->cek();
        $this->form_validation->set_rules('editor1', 'Visi Perusahaan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->get_visi(validation_errors());
        } else {
            if ($this->Muno->visi()) {
                $this->get_visi('Selamat! Data anda telah terbarui');
            } else {
                $this->get_visi('Ups! Terjadi kesalahan. Silahkan masukan kembali data anda!');
            }
        }
    }

    function add_tag() {
        $this->cek();
        $this->form_validation->set_rules('tag', 'Tag', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->view('tag', validation_errors());
        } else {
            if ($this->Muno->add_tag()) {
                $this->view('tag', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('tag', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function del_tag($id) {
        $this->cek();
        if ($this->Muno->del_tag($id)) {
            $this->view('tag', "Berhasil! Data telah dihapus");
        } else {
            $this->view('tag', "Ups! Data masih digunakan sehingga tidak bisa dihapus.!");
        }
    }

    function add_artikel() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Artikel', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag Artikel', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Isi Artikel', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('art', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_artikel()) {
                $this->view('art', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('art', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function see_artikel($id) {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['data'] = $this->Muno->get_artikel($id);
        $data['tag'] = $this->Muno->get_tag();
        $data['cont'] = 'ed_artikel';
        $data['error'] = "";
        $this->load->view('be/sked', $data);
    }

    function edit_artikel() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Artikel', 'trim|required');
        $this->form_validation->set_rules('tag', 'Tag Artikel', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Isi Artikel', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('art', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->edit_artikel()) {
                $this->view('art', "Berhasil! Data telah diubah.");
            } else {
                $this->view('art', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_jaringan() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Jaringan', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('jaringan', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_jaringan()) {
                $this->view('jaringan', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('jaringan', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_jaringan() {
        $this->cek();
        $this->form_validation->set_rules('menu', 'Menu', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Jaringan', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('jaringan', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->edit_jaringan()) {
                $this->view('jaringan', "Berhasil! Data telah diubah");
            } else {
                $this->view('jaringan', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_event() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Event', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Event', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tgl. Event', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Isi Event', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('event', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_event()) {
                $this->view('event', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('event', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_event() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Event', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Event', 'trim|required');
        $this->form_validation->set_rules('tgl', 'Tgl. Event', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Isi Event', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('event', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->edit_event()) {
                $this->view('event', "Berhasil! Data telah diubah");
            } else {
                $this->view('event', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_klien() {
        $this->cek();
        $this->form_validation->set_rules('klien', 'Nama Klien', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('klien', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_klien()) {
                $this->view('klien', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('klien', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_klien() {
        $this->cek();
        $this->form_validation->set_rules('klien', 'Nama Klien', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('klien', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->edit_klien()) {
                $this->view('klien', "Berhasil! Data telah diubah");
            } else {
                $this->view('klien', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function pages($id, $v) {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('tentang', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->pages($id)) {
                $this->view($v, "Berhasil! Data telah diperbarui");
            } else {
                $this->view($v, "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_produk() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Produk', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Produk', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('prod', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_produk()) {
                $this->view('prod', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('prod', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_produk() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Produk', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Produk', 'trim|required');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpeg|jpg|png',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('prod', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->edit_produk()) {
                $this->view('prod', "Berhasil! Data telah diubah");
            } else {
                $this->view('prod', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_karir() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Produk', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Produk', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('karir', validation_errors());
        } else {
            if ($this->Muno->add_karir()) {
                $this->view('karir', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('karir', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_karir() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Produk', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi Produk', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('karir', validation_errors());
        } else {
            if ($this->Muno->edit_karir()) {
                $this->view('karir', "Berhasil! Data telah diubah");
            } else {
                $this->view('karir', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function add_harga() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Promosi', 'trim|required');
        $this->form_validation->set_rules('produk', 'Produk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('editor1', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('harga', validation_errors());
        } else {
            if ($this->Muno->add_harga()) {
                $this->view('harga', "Berhasil! Data telah ditambahkan");
            } else {
                $this->view('harga', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit_harga() {
        $this->cek();
        $this->form_validation->set_rules('title', 'Title Harga', 'trim|required');
        $this->form_validation->set_rules('produk', 'Produk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('editor1', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('harga', validation_errors());
        } else {
            if ($this->Muno->edit_harga()) {
                $this->view('harga', "Berhasil! Data telah diubah");
            } else {
                $this->view('harga', "Ups! Terjadi kesalahan. Silahkan masukkan kembali data anda!");
            }
        }
    }

    function edit($view, $table, $kolom, $id) {
        $this->cek();
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['cont'] = $view;
        $data['error'] = "";
        $data['data'] = $this->Muno->edit($table, $kolom, $id);
        $this->load->view('be/sked', $data);
    }

    function delete($view, $table, $kolom, $id) {
        $this->cek();
        if ($data['data'] = $this->Muno->delete($table, $kolom, $id)) {
            $data['error'] = "Data berhasil dihapus.!";
        } else {
            $data['error'] = "Data gagal dihapus.!";
        }
        $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
        $data['artikel'] = $this->Muno->get_artikel();
        $data['harga'] = $this->Muno->get_harga();
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['event'] = $this->Muno->get_event();
        $data['klien'] = $this->Muno->get_klien();
        $data['produk'] = $this->Muno->get_produk();
        $data['karir'] = $this->Muno->get_karir();
        $data['testimoni'] = $this->Muno->get_testimoni();
        $data['pesan'] = $this->Muno->get_pesan();
        $data['cont'] = $view;
        $this->load->view('be/sked', $data);
    }

    function approval($approval, $id_testi) {
        $this->cek();
        if ($this->Muno->approval($approval, $id_testi)) {
            $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
            $data['error'] = "";
            $data['testimoni'] = $this->Muno->get_testimoni();
            $data['cont'] = 'testi';
            $this->load->view('be/sked', $data);
        } else {
            $data['admin'] = $this->Muno->get_user($this->session->userdata('username'));
            $data['error'] = "Failed to update approval.!";
            $data['testimoni'] = $this->Muno->get_testimoni();
            $data['cont'] = 'testi';
            $this->load->view('be/sked', $data);
        }
    }

}
?>
