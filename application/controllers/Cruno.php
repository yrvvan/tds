<?php

Class Cruno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $data['content'] = 'main';
        $data['vimi'] = $this->Muno->get_vimi();
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['visi'] = $this->Muno->get_visi();
        $data['event'] = $this->Muno->get_event();
        $data['artikel'] = $this->Muno->get_artikel();
        $data['klien'] = $this->Muno->get_klien();
        $data['produk'] = $this->Muno->get_produk();
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $this->load->view('fe/skel', $data);
    }

    function view($v, $error = "") {
        $data['content'] = $v;
        $data['artikel'] = $this->Muno->get_artikel();
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['klien'] = $this->Muno->get_klien();
        $data['vimi'] = $this->Muno->get_vimi();
        $data['visi'] = $this->Muno->get_visi();
        $data['about'] = $this->Muno->get_page('1');
        $data['dom'] = $this->Muno->get_page('2');
        $data['luneg'] = $this->Muno->get_page('3');
        $data['event'] = $this->Muno->get_event();
        $data['produk'] = $this->Muno->get_produk();
        $data['harga'] = $this->Muno->get_harga();
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['karir'] = $this->Muno->get_karir();
        $data['error'] = $error;
        $this->load->view('fe/skel', $data);
    }

    function produk($id) {
        $data['content'] = 'produk';
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['dtl_produk'] = $this->Muno->get_produk($id);
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['produk'] = $this->Muno->get_produk();
        $this->load->view('fe/skel', $data);
    }

    function jaringan($id) {
        $data['content'] = 'jaringan';
        $data['jar'] = $this->Muno->get_jaringan($id);
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['dtl_produk'] = $this->Muno->get_produk($id);
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['produk'] = $this->Muno->get_produk();
        $this->load->view('fe/skel', $data);
    }

    function all_evart($table) {
        $this->load->library('pagination');

        $config['base_url'] = site_url('Cruno/all_evart/' . $table . "/");
        $config['total_rows'] = $this->Muno->get_allevart($table)->num_rows();
        $config['per_page'] = $per_page = 3;
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['paging'] = $this->pagination->create_links();
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['produk'] = $this->Muno->get_produk();
        $data['tag'] = $this->Muno->get_tag();
        $data['event'] = $this->Muno->get_event();
        $data['arsip'] = $this->Muno->get_arsip($table);
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['content'] = 'evartcon';
        $data['table'] = $table;

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $data['data'] = $this->Muno->get_dataevart($table, $per_page, $page);
        $this->load->view('fe/skel', $data);
    }

    function read($tbl, $id) {
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['isi'] = $this->Muno->get_read($tbl, $id);
        $data['tag'] = $this->Muno->get_tag();
        $data['produk'] = $this->Muno->get_produk();
        $data['arsip'] = $this->Muno->get_arsip($tbl);
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['event'] = $this->Muno->get_event();
        $data['artikel'] = $this->Muno->get_artikel();
        $data['table'] = $tbl;
        $data['content'] = 'read';
        $data['tbl'] = $tbl;
        $this->load->view('fe/skel', $data);
    }

    function arsip($table, $year, $month) {
        $data['some_arsip'] = $this->Muno->get_some_arsip($table, $year, $month);
        $data['arsip'] = $this->Muno->get_arsip($table);
        $data['tag'] = $this->Muno->get_tag();
        $data['event'] = $this->Muno->get_event();
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['produk'] = $this->Muno->get_produk();
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['content'] = 'arsip';
        $data['table'] = $table;
        $this->load->view('fe/skel', $data);
    }

    function add_resume() {
        $this->form_validation->set_rules('nama', 'Nama Anda', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|valid_email');
        $this->form_validation->set_rules('posisi', 'Posisi', 'trim|required');

        $config = array(
            'upload_path' => './assets/file',
            'allowed_types' => 'zip|doc|docx|pdf',
            'overwrite' => 'true'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->view('karir', validation_errors());
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            if ($this->Muno->add_resume()) {
                $this->view('karir', "Resume anda telah kami terima.");
            } else {
                $this->view('karir', "Silahkan masukkan kembali data anda!");
            }
        }
    }

    function subscribe() {
        if ($this->Muno->subscribe()) {
            $this->view('main', "");
        } else {
            $this->view('main', "");
        }
    }

    function add_testimoni() {
        $this->form_validation->set_rules('nama', 'Nama Anda', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|valid_email');
        $this->form_validation->set_rules('testimoni', 'Testimoni', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('about', validation_errors());
        } else {
            if ($this->Muno->add_testimoni()) {
                $this->view('about', 'Terima kasih! Testimoni anda telah kami terima');
            } else {
                $this->view('about', 'Ups! Terjadi kesalahan. Silahkan masukkan kembali testimoni anda');
            }
        }
    }

    function add_pesan() {
        $this->form_validation->set_rules('nama', 'Nama Anda', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('contact', validation_errors());
        } else {
            if ($this->Muno->add_pesan()) {
                $this->view('contact', 'Terima kasih telah menghubungi kami.! Pesan akan kami respon melalui email anda.');
            } else {
                $this->view('contact', 'Ups! Terjadi kesalahan. Silahkan masukkan kembali testimoni anda');
            }
        }
    }

    function log() {
        $this->load->view('fe/log');
    }

    function search() {
        $param = $this->input->post('cari');
        $data['jaringan'] = $this->Muno->get_jaringan();
        $data['produk'] = $this->Muno->get_produk();
        $data['testimoni'] = $this->Muno->get_testimoni('yes');
        $data['src_event'] = $this->Muno->get_src_event($param);
        $data['src_artikel'] = $this->Muno->get_src_artikel($param);
        $data['src_jaringan'] = $this->Muno->get_src_jaringan($param);
        $data['src_karir'] = $this->Muno->get_src_karir($param);
        $data['src_produk'] = $this->Muno->get_src_produk($param);
        $data['content'] = "search";
        $this->load->view('fe/skel', $data);
    }

}

?>
