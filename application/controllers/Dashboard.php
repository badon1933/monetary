<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        $data['jumlah_peserta'] = $this->Data_model->getJumlahPeserta();
        $data['jumlah_kolektor'] = $this->Data_model->getJumlahKolektor();
        $data['peserta'] = $this->Data_model->getAllPeserta();
        $data['setoran'] = $this->Data_model->getSetoran();
        $data['jenis_paket'] = $this->Data_model->getAllJenisPaket();


        $data['title'] = 'Dashboard';
        $this->load->view('templates/dash_header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/dash_footer');
    }

    public function paket()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['jenis_paket'] = $this->Data_model->getAllJenisPaket();
        $data['jumlah_peserta'] = $this->Data_model->getJumlahPesertaByPaket();

        $data['title'] = 'Data Paket';
        $this->load->view('templates/dash_header', $data);
        $this->load->view('dashboard/paket', $data);
        $this->load->view('templates/dash_footer');
    }

    public function kolektor()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['kolektor'] = $this->db->get('kolektor')->result_array();

        $data['title'] = 'Data Kolektor';

        $this->form_validation->set_rules('nama_kolektor', 'Nama Kolektor', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/kolektor');
            $this->load->view('templates/dash_footer');
        } else {
            $this->db->insert('kolektor', [
                'nama_kolektor' => $this->input->post('nama_kolektor'),
                'alamat' => $this->input->post('alamat')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil ditambahkan!</div>');
            redirect('dashboard/kolektor');
        }
    }

    public function peserta()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['jenis_paket'] = $this->Data_model->getAllJenisPaket();
        $data['kolektor'] = $this->Data_model->getAllKolektor();
        $data['peserta'] = $this->Data_model->getAllPeserta();
        $data['setoran'] = $this->Data_model->getSetoran();

        $data['title'] = 'Data Peserta';

        $this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required');
        $this->form_validation->set_rules('kolektor', 'Kolektor', 'required');
        $this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/peserta', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->tambahDataPeserta();
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil ditambahkan!</div>');
            redirect('dashboard/peserta');
        }
    }

    public function hapus($id)
    {
        $this->Data_model->hapusDataKolektor($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil dihapus!</div>');
        redirect('dashboard/kolektor');
    }

    public function hapusPeserta($id)
    {
        $this->Data_model->hapusDataPeserta($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil dihapus!</div>');
        redirect('dashboard/peserta');
    }

    public function lihat($id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['kolektor'] = $this->Data_model->getKolektor($id);
        $data['peserta'] = $this->Data_model->getAllPeserta();
        $data['jenis_paket'] = $this->Data_model->getAllJenisPaket();
        $data['setoran'] = $this->Data_model->getSetoran();

        $data['title'] = 'Peserta ' . $data['kolektor']['nama_kolektor'];

        $this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required');
        $this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/lihat', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->tambahDataPeserta();
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil ditambahkan!</div>');
            redirect('dashboard/lihat' . '/' . $id);
        }
    }

    public function rincian($k_id, $p_id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['kolektor'] = $this->Data_model->getKolektor($k_id);
        $data['peserta'] = $this->Data_model->getPeserta($p_id);
        $data['setoran'] = $this->Data_model->getSetoran();

        $data['title'] = 'Rincian ' . $data['peserta']['nama_peserta'];

        $this->load->view('templates/dash_header', $data);
        $this->load->view('dashboard/rincian', $data);
        $this->load->view('templates/dash_footer');
    }

    public function produk($id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['jenis_paket'] = $this->Data_model->getJenisPaket($id);
        $data['produk'] = $this->Data_model->getAllProduk();

        $data['title'] = $data['jenis_paket']['jenis_paket'];

        $this->load->view('templates/dash_header', $data);
        $this->load->view('dashboard/produk', $data);
        $this->load->view('templates/dash_footer');
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['kolektor'] = $this->Data_model->getKolektor($id);

        $data['title'] = 'Peserta ' . $data['kolektor']['nama_kolektor'];

        $this->form_validation->set_rules('nama_kolektor', 'Nama Kolektor', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/kolektor', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->editDataKolektor($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah!</div>');
            redirect('dashboard/kolektor');
        }
    }

    public function editPeserta($id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['peserta'] = $this->Data_model->getPeserta($id);

        $data['title'] = 'Data Peserta';

        $this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required');
        $this->form_validation->set_rules('jenis_paket', 'Jenis Paket', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/peserta', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->editDataPeserta($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah!</div>');
            redirect('dashboard/peserta');
        }
    }

    public function setoran($k_id, $p_id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('setoran', 'Setoran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/lihat', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->tambahDataSetoran($p_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Setoran berhasil ditambahkan!</div>');
            redirect('dashboard/lihat' . '/' . $k_id);
        }
    }

    public function editSetoran($k_id, $p_id)
    {
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('setoran', 'Setoran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/dash_header', $data);
            $this->load->view('dashboard/lihat', $data);
            $this->load->view('templates/dash_footer');
        } else {
            $this->Data_model->editDataSetoran($p_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Setoran berhasil diubah!</div>');
            redirect('dashboard/lihat' . '/' . $k_id);
        }
    }
}
