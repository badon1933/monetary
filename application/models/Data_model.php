<?php

class Data_model extends CI_model
{
    public function getAllPeserta()
    {
        return $this->db->get('peserta')->result_array();
    }

    public function getPeserta($id)
    {
        return $this->db->get_where('peserta', array('id' => $id))->row_array();
    }

    public function getJumlahPeserta()
    {
        return $this->db->count_all_results('peserta');
    }

    public function getJumlahPesertaByPaket()
    {

        $data['jenis_paket'] = $this->getAllJenisPaket();
        foreach ($data['jenis_paket'] as $jp) {
            $this->db->like('jenis_paket', $jp['id']);
            $this->db->from('peserta');
            $jml[] =  $this->db->count_all_results();
        }
        return $jml;

        /* $jumlah_paket = $this->db->count_all_results('jenis_paket');
        for ($i = 1; $i <= $jumlah_paket; $i++) {
            $this->db->like('jenis_paket', $i);
            $this->db->from('peserta');
            $jml[] =  $this->db->count_all_results();
        }
        return $jml; */
    }


    public function getAllKolektor()
    {
        return $this->db->get('kolektor')->result_array();
    }

    public function getKolektor($id)
    {
        return $this->db->get_where('kolektor', array('id' => $id))->row_array();
    }

    public function getJumlahKolektor()
    {
        return $this->db->count_all_results('kolektor');
    }

    public function getAllJenisPaket()
    {
        return $this->db->get('jenis_paket')->result_array();
    }

    public function getJenisPaket($id)
    {
        return $this->db->get_where('jenis_paket', array('id' => $id))->row_array();
    }

    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getProduk($id)
    {
        return $this->db->get('produk', array('id' => $id))->row_array();
    }

    public function getSetoran()
    {
        return $this->db->get('setoran')->result_array();
    }

    public function tambahDataPeserta()
    {
        $data = [
            'nama_peserta' => $this->input->post('nama_peserta', true),
            'kolektor' => $this->input->post('kolektor', true),
            'jenis_paket' => $this->input->post('jenis_paket', true),
            'alamat' => $this->input->post('alamat', true)
        ];

        $this->db->insert('peserta', $data);
    }

    public function hapusDataKolektor($id)
    {
        $this->db->delete('kolektor', array('id' => $id));
        $data['peserta'] = $this->db->get_where('peserta', array('kolektor' => $id))->result_array();
        foreach ($data['peserta'] as $dp) {
            $this->db->delete('setoran', array('id_peserta' => $dp['id']));
        }
        $this->db->delete('peserta', array('kolektor' => $id));
    }

    public function hapusDataPeserta($id)
    {
        $this->db->delete('peserta', array('id' => $id));
        $this->db->delete('setoran', array('id_peserta' => $id));
    }

    public function editDataKolektor($id)
    {
        $data = [
            'nama_kolektor' => $this->input->post('nama_kolektor', true),
            'alamat' => $this->input->post('alamat', true)
        ];
        $this->db->update('kolektor', $data, array('id' => $id));
    }

    public function editDataPeserta($id)
    {
        $data = [
            'nama_peserta' => $this->input->post('nama_peserta', true),
            'jenis_paket' => $this->input->post('jenis_paket', true),
            'alamat' => $this->input->post('alamat', true)
        ];
        $this->db->update('peserta', $data, array('id' => $id));
    }

    public function tambahDataSetoran($id)
    {
        $data = [
            'id_peserta' => $id,
            'setoran' => $this->input->post('setoran'),
            'total_setoran' =>  $this->input->post('total_setoran') + $this->input->post('setoran'),
            'tanggal_update' => $this->input->post('tanggal_update')
        ];
        $this->db->insert('setoran', $data, array('id' => $id));
    }

    public function editDataSetoran($p_id)
    {
        $setoran = $this->db->get_where('setoran', array('id_peserta' => $p_id))->result_array();
        $setoran_terakhir = 0;
        foreach ($setoran as $s) {
            $setoran_terakhir = $s['setoran'];
            $id_setoran = $s['id'];
        }
        $data = [
            'setoran' => $this->input->post('setoran'),
            'total_setoran' => $this->input->post('total_setoran') - $setoran_terakhir + $this->input->post('setoran'),
            'tanggal_update' => $this->input->post('tanggal_update')
        ];
        $this->db->update('setoran', $data, array('id' => $id_setoran));
    }
}
