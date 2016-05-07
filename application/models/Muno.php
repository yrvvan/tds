<?php

Class Muno extends CI_Model {

    function get_aktifitas() {
        $this->db->select('*');
        $this->db->from('aktifitas a');
        $this->db->join('user b', 'b.username = a.username', 'left');
        $this->db->where('year(a.waktu)', date('Y'));
        $this->db->where('month(a.waktu)', date('m'));
        $this->db->order_by('a.waktu', 'desc');
        return($this->db->get()->result());
    }

    function vimi($id_vimi) {
        $data_vimi = array(
            'title_vimi' => $this->input->post('title'),
            'vimi' => $this->input->post('editor1')
        );

        $this->db->where('id_vimi', $id_vimi);
        if ($this->db->update('vimi', $data_vimi)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate konten misi",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_vimi($id_vimi = "") {
        if ($id_vimi != "") {
            $this->db->where('id_vimi', $id_vimi);
            return $this->db->get('vimi')->row();
        } else {
            return $this->db->get('vimi')->result();
        }
    }

    function visi() {
        $data_visi = array(
            'visi' => $this->input->post('editor1')
        );
        if ($this->db->update('visi', $data_visi)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate konten visi",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_visi() {
        return $this->db->get('visi')->row();
    }

    function get_tag() {
        return $this->db->get('tags')->result();
    }

    function add_tag() {
        $data_tag = array(
            'tag' => $this->input->post('tag'),
            'create_date' => date('Y-m-d')
        );
        if ($this->db->insert('tags', $data_tag)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => 'Menambah data "Tag"',
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function del_tag($id) {
        $this->db->select('count(id_tag) as jum');
        $this->db->where('id_tag', $id);
        $jum = $this->db->get('artikel')->row();
        if ($jum->jum > 0) {
            return FALSE;
        } else {
            $this->db->where('id_tags', $id);
            if ($this->db->delete('tags')) {
                $dt_user = array(
                    'username' => $this->session->userdata('username'),
                    'aktifitas' => 'Menghapus data "Tag"',
                    'waktu' => date('Y-m-d H:i:s')
                );
                $this->db->insert('aktifitas', $dt_user);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function add_artikel() {
        $data_artikel = array(
            'title_art' => $this->input->post('title'),
            'id_tag' => $this->input->post('tag'),
            'isi_art' => $this->input->post('editor1'),
            'create_date' => date('Y-m-d'),
            'img_art' => $_FILES['file']['name']
        );
        if ($this->db->insert('artikel', $data_artikel)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data artikel",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_artikel() {
        if ($_FILES['file']['name'] != "") {
            $data_artikel = array(
                'title_art' => $this->input->post('title'),
                'id_tag' => $this->input->post('tag'),
                'isi_art' => $this->input->post('editor1'),
                'modif_date' => date('Y-m-d'),
                'img_art' => $_FILES['file']['name']
            );
        } else {
            $data_artikel = array(
                'title_art' => $this->input->post('title'),
                'id_tag' => $this->input->post('tag'),
                'isi_art' => $this->input->post('editor1'),
                'modif_date' => date('Y-m-d')
            );
        }

        $this->db->where('id_artikel', $this->input->post('id_artikel'));
        if ($this->db->update('artikel', $data_artikel)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data artikel id " . $this->input->post('id_artikel'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_artikel($id = "") {
        if ($id == "") {
            $this->db->select('*');
            $this->db->from('artikel');
            $this->db->join('tags', 'artikel.id_tag = tags.id_tags');
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('artikel');
            $this->db->join('tags', 'artikel.id_tag = tags.id_tags');
            $this->db->where('id_artikel', $id);
            return $this->db->get()->row();
        }
    }

    function add_event() {
        $data_event = array(
            'title_eve' => $this->input->post('title'),
            'lokasi' => $this->input->post('lokasi'),
            'tgl_eve' => $this->input->post('tgl'),
            'isi_eve' => $this->input->post('editor1'),
            'img_eve' => $_FILES['file']['name']
        );
        if ($this->db->insert('event', $data_event)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data event",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_event() {
        if ($_FILES['file']['name'] != "") {
            $data_event = array(
                'title_eve' => $this->input->post('title'),
                'lokasi' => $this->input->post('lokasi'),
                'tgl_eve' => $this->input->post('tgl'),
                'isi_eve' => $this->input->post('editor1'),
                'img_eve' => $_FILES['file']['name']
            );
        } else {
            $data_event = array(
                'title_eve' => $this->input->post('title'),
                'lokasi' => $this->input->post('lokasi'),
                'tgl_eve' => $this->input->post('tgl'),
                'isi_eve' => $this->input->post('editor1')
            );
        }

        $this->db->where('id_event', $this->input->post('id_event'));
        if ($this->db->update('event', $data_event)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data event id " . $this->input->post('id_event'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_event() {
        return $this->db->get('event')->result();
    }

    function add_klien() {
        $data_klien = array(
            'alt' => $this->input->post('klien'),
            'img' => $_FILES['file']['name']
        );
        if ($this->db->insert('klien', $data_klien)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data klien",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_klien() {
        if ($_FILES['file']['name'] != "") {
            $data_klien = array(
                'alt' => $this->input->post('klien'),
                'img' => $_FILES['file']['name']
            );
        } else {
            $data_klien = array(
                'alt' => $this->input->post('klien')
            );
        }

        $this->db->where('id_klien', $this->input->post('id_klien'));
        if ($this->db->update('klien', $data_klien)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data klien id " . $this->input->post('id_klien'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_klien() {
        return $this->db->get('klien')->result();
    }

    function get_allevart($table) {
        return $this->db->get($table);
    }

    function get_dataevart($table, $limit, $start) {
        if ($table == "event") {
            return $this->db->order_by('id_event', 'asc')->limit($limit, $start)->get_where($table);
        } else {
            return $this->db->order_by('id_artikel', 'asc')->limit($limit, $start)->get_where($table);
        }
    }

    function get_read($tbl, $id) {
        if ($tbl == "event") {
            $this->db->where('id_event', $id);
            return $this->db->get('event')->row();
        } else {
            $this->db->select('*');
            $this->db->from('artikel');
            $this->db->join('tags', 'tags.id_tags = artikel.id_tag');
            $this->db->where('id_artikel', $id);
            return $this->db->get()->row();
        }
    }

    function get_some_arsip($tbl, $yr, $mnth) {
        if ($tbl == 'artikel') {
            $this->db->select('*');
            $this->db->from($tbl);
            $this->db->join('tags', 'tags.id_tags = artikel.id_tag');
            $this->db->where('year(artikel.create_date)', $yr);
            $this->db->where('month(artikel.create_date)', $mnth);
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from($tbl);
            $this->db->where('year(tgl_eve)', $yr);
            $this->db->where('month(tgl_eve)', $mnth);
            return $this->db->get()->result();
        }
    }

    function get_arsip($table) {
        if ($table == "event") {
            $this->db->select('tgl_eve, count(tgl_eve) as jum');
            $this->db->from($table);
            $this->db->group_by('month(tgl_eve), year(tgl_eve)');
            $this->db->order_by('year(tgl_eve), month(tgl_eve)', 'desc');
            return $this->db->get()->result();
        } else {
            $this->db->select('create_date, count(create_date) as jum');
            $this->db->from($table);
            $this->db->group_by('month(create_date), year(create_date)');
            $this->db->order_by('year(create_date), month(create_date)', 'desc');
            return $this->db->get()->result();
        }
    }

    function get_page($id) {
        $this->db->where('id_pages', $id);
        return $this->db->get('pages')->row();
    }

    function pages($id) {
        if ($_FILES['file']['name'] == "") {
            $data_pages = array(
                'title' => $this->input->post('title'),
                'isi' => $this->input->post('editor1')
            );
        } else {
            $data_pages = array(
                'title' => $this->input->post('title'),
                'isi' => $this->input->post('editor1'),
                'img' => $_FILES['file']['name']
            );
        }

        $this->db->where('id_pages', $id);
        if ($this->db->update('pages', $data_pages)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate konten tentang kami",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_produk() {
        $data_produk = array(
            'title' => $this->input->post('title'),
            'deskripsi' => $this->input->post('editor1'),
            'img' => $_FILES['file']['name']
        );
        if ($this->db->insert('produk', $data_produk)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data produk",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_produk() {
        if ($_FILES['file']['name'] != "") {
            $data_produk = array(
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('editor1'),
                'img' => $_FILES['file']['name']
            );
        } else {
            $data_produk = array(
                'title' => $this->input->post('title'),
                'deskripsi' => $this->input->post('editor1')
            );
        }

        $this->db->where('id_produk', $this->input->post('id_produk'));
        if ($this->db->update('produk', $data_produk)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data produk id " . $this->input->post('id_produk'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_produk($id = "") {
        if ($id == "") {
            return $this->db->get('produk')->result();
        } else {
            $this->db->where('id_produk', $id);
            return $this->db->get('produk')->row();
        }
    }

    function add_testimoni() {
        $data_testi = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'testi' => $this->input->post('testimoni'),
            'approval' => 'no'
        );
        if ($this->db->insert('testi', $data_testi)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_testimoni($appr = "") {
        if ($appr == "yes") {
            $this->db->where('approval', $appr);
            return $this->db->get('testi')->result();
        } else {
            return $this->db->get('testi')->result();
        }
    }

    function add_karir() {
        $data_karir = array(
            'title' => $this->input->post('title'),
            'deskr_karir' => $this->input->post('editor1'),
            'create_date' => date('Y-m-d')
        );
        if ($this->db->insert('karir', $data_karir)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data karir",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_karir() {
        $data_karir = array(
            'title' => $this->input->post('title'),
            'deskr_karir' => $this->input->post('editor1'),
            'modif_date' => date('Y-m-d')
        );
        $this->db->where('id_karir', $this->input->post('id_karir'));
        if ($this->db->update('karir', $data_karir)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data karir id " . $this->input->post('id_karir'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_karir() {
        return $this->db->get('karir')->result();
    }

    function get_pesan() {
        return $this->db->get('pesan')->result();
    }

    function add_pesan() {
        $data_pesan = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan'),
            'msg_date' => date('Y-m-d')
        );
        if ($this->db->insert('pesan', $data_pesan)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit($table, $kolom, $id) {
        $this->db->where($kolom, $id);
        return $this->db->get($table)->row();
    }

    function delete($table, $kolom, $id) {
        $this->db->where($kolom, $id);
        if ($this->db->delete($table)) {
            return TRUE;
        } else {
            return TRUE;
        }
    }

    function approval($approval, $id_testi) {
        $data_appr = array(
            'approval' => $approval
        );
        $this->db->where('id_testi', $id_testi);
        if ($this->db->update('testi', $data_appr)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate approval testimoni " . $id_testi,
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return TRUE;
        }
    }

    function privillege() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $auth = $this->db->get('user');
        if ($auth->num_rows() > 0) {
            return $auth->result_array();
        } else {
            return FALSE;
        }
    }

    function get_user($username = "") {
        if ($username != "") {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->join('aktifitas', 'aktifitas.username = user.username', 'left');
            $this->db->where('user.username', $username);
            return $this->db->get()->row();
        } else {
            return $this->db->get('user')->result();
        }
    }

    function add_harga() {
        $data_harga = array(
            'title' => $this->input->post('title'),
            'produk' => $this->input->post('produk'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('editor1')
        );
        if ($this->db->insert('harga', $data_harga)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data harga",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_harga($id = "") {
        return $this->db->get('harga')->result();
    }

    function edit_harga() {
        $data_harga = array(
            'title' => $this->input->post('title'),
            'produk' => $this->input->post('produk'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('editor1')
        );
        $this->db->where('id_harga', $this->input->post('id_harga'));
        if ($this->db->update('harga', $data_harga)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data harga id " . $this->input->post('id_harga'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_jaringan($id = "") {
        if ($id == "") {
            return $this->db->get('jaringan')->result();
        } else {
            $this->db->where('id_jaringan', $id);
            return $this->db->get('jaringan')->row();
        }
    }

    function add_jaringan() {
        $data_jrg = array(
            'menu' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'isi' => $this->input->post('editor1'),
            'img' => $_FILES['file']['name']
        );
        if ($this->db->insert('jaringan', $data_jrg)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data jaringan",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_jaringan() {
        if ($_FILES['file']['name'] != "") {
            $data_jrg = array(
                'menu' => $this->input->post('menu'),
                'title' => $this->input->post('title'),
                'isi' => $this->input->post('editor1'),
                'img' => $_FILES['file']['name']
            );
        } else {
            $data_jrg = array(
                'menu' => $this->input->post('menu'),
                'title' => $this->input->post('title'),
                'isi' => $this->input->post('editor1')
            );
        }
        $this->db->where('id_jaringan', $this->input->post('id_jaringan'));
        if ($this->db->update('jaringan', $data_jrg)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Mengupdate data jaringan id " . $this->input->post('id_jaringan'),
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_resume() {
        $data_resume = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'posisi' => $this->input->post('posisi'),
            'tgl_upload' => date('Y-m-d'),
            'resume' => $_FILES['file']['name']
        );
        if ($this->db->insert('resume', $data_resume)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function subscribe() {
        $subscribe = array(
            'email' => $this->input->post('email')
        );
        if ($this->db->insert('subscribe', $subscribe)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_src_event($param) {
        $query = "select * from event where title_eve like '%$param%' or lokasi like '%$param%' or isi_eve like '%$param%'";
        return $this->db->query($query)->result();
    }

    function get_src_artikel($param) {
        $query = "select a.id_artikel, a.title_art, a.isi_art, a.create_date, b.tag from artikel a join tags b on b.id_tags = a.id_tag where a.title_art like '%$param%' or a.isi_art like '%$param%' or b.tag like '%$param%'";
        return $this->db->query($query)->result();
    }

    function get_src_jaringan($param) {
        $query = "select * from jaringan where menu like '%$param%' or title like '%$param%' or isi like '%$param%'";
        return $this->db->query($query)->result();
    }

    function get_src_karir($param) {
        $query = "select * from karir where title like '%$param%' or deskr_karir like '%$param%'";
        return $this->db->query($query)->result();
    }

    function get_src_produk($param) {
        $query = "select * from produk where title like '%$param%' or deskripsi like '%$param%'";
        return $this->db->query($query)->result();
    }

    function add_user() {
        if ($_FILES['file']['name'] != "") {
            $data_user = array(
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nama'),
                'password' => md5($this->input->post('pass')),
                'ava_user' => $_FILES['file']['name']
            );
        } else {
            $data_user = array(
                'username' => $this->input->post('username'),
                'nm_user' => $this->input->post('nama'),
                'password' => md5($this->input->post('pass'))
            );
        }
        if ($this->db->insert('user', $data_user)) {
            $dt_user = array(
                'username' => $this->session->userdata('username'),
                'aktifitas' => "Menambah data user",
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->db->insert('aktifitas', $dt_user);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function edit_user() {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        if ($pass != "") {
            if ($_FILES['file']['name'] != "") {
                $data_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'password' => md5($pass),
                    'ava_user' => $_FILES['file']['name']
                );
            } else {
                $data_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'password' => md5($pass)
                );
            }
        } else {
            if ($_FILES['file']['name'] != "") {
                $data_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'ava_user' => $_FILES['file']['name']
                );
            } else {
                $data_user = array(
                    'nm_user' => $this->input->post('nama')
                );
            }
        }
        $this->db->where('username', $username);
        if ($this->db->update('user', $data_user)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
