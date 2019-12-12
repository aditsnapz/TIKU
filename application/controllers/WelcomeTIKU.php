<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeTIKU extends CI_Controller {

	public function index()
	{

        $data = ['data' => $this->MyModel->Get('film')];
		$this->load->view('home', $data);
    }
    
    public function pesan(){
        $id_film = $_POST['id_film'];

        $data['film'] = $this->MyModel->GetWhere('film', array('id_film' => $id_film));

        $judul = $data['film'][0]['judul'];

        $this->session->set_userdata('judul', $judul);
        $this->session->set_userdata('id_film', $id_film);

        $data['jadwal'] = $this->MyModel->Get('jadwal');

        $data = array('data' => $data);
        $this->load->view('pesan', $data);
    }

    public function pesan_kursi ()
    {
        
        //terima tanggal nonton dari view 'pesan'
        $tanggal_nonton = $_POST['tanggal_nonton'];
        //terima jadwal dari view pesan
        $id_jadwal = $_POST['jadwal'];

        //set session dengan data tanggal nonton dan id jadwal
        $this->session->set_userdata('tanggal_nonton',$tanggal_nonton);
        $this->session->set_userdata('id_jadwal',$id_jadwal);

        //ambil semua data jadwal berdasarkan id jadwal dari view 'pesan'
        $data['jadwal'] = $this->MyModel->GetWhere('jadwal', array('id_jadwal' => $id_jadwal));

        //set session dengan data jadwal
        $jadwal = $data['jadwal'][0]['jadwal'];
        $this->session->set_userdata('jadwal',$jadwal);

        //ambil semua data kursi
        $data['kursi'] = $this->MyModel->Get('kursi');

        //masukan ke var id_film dengan session data id_film
        $id_film = $this->session->userdata('id_film');

        // //ambil data nokur dari tabel pesanan yang
        $query_kursi_booked = $this->db->query('SELECT nokur    FROM pesanan where
        id_film = "'.$id_film.'" and 
        id_jadwal = "'.$id_jadwal.'" and 
        tanggal_nonton = "'.$tanggal_nonton.'"');

        //masukan ke var arrat data['kursi_booked'] dengan data hasil query time 75
        $data['kursi_booked'] = $query_kursi_booked->result_array();

        //simpan semua data ke dalam variable array 'data' lalu masukan ke view 'pesan_kursi'
        $data = array('data' => $data);
        $this->load->view('pesan_kursi', $data);
    }   

    public function pesanan()
    {
        //jika memilih kursi, maka isi $data['kursi']
        if (!empty($_POST['pilihKursi'])) {
            $kursi = $_POST['pilihKursi'];
            $this->session->set_userdata('kursi', $kursi);
            $this->session->set_userdata('nama', $_POST['nama']);
            $this->session->set_userdata('no_ktp', $_POST['no_ktp']);
            $this->session->set_userdata('umur', $_POST['umur']);
            $data['kursi'] = $kursi;
        }

        //jika tidak memilih kursi, maka $data['kursi'] kosong
        else {
            $data['kursi'] = [];
            redirect('WelcomeTIKU');
        }
        
        //simpan semua data kedalam variabel array 'data' lalu masukan ke view 'pesanan'
        $data = array('data' => $data);
        $this->load->view('pesanan', $data);
    }

    public function hapusKursi($no)
    {
        //masukan ke var listkursi dengan session kursi
        $listkursi = $this->session->userdata('kursi');

        //hapus salah satu index dari array dengan spesifik variable no
        unset($listkursi[$no]);

        //masukan ke var array data kursi dari variable aray listkursi
        $data['kursi'] = array_values($listkursi);

        //mengurutkan index
        $kursi = $data['kursi'];

        //set session dengan data kursi
        $this->session->set_userdata('kursi', $kursi);

        //simpan semua data kedalam variable array 'data' lalu masukan ke view 'pesanan'
        $data = array('data' => $data);
        $this->load->view('pesanan',$data);
    }
    
    public function edit()
    {
        //masukan ke var listkuri dengan session kursi, lalu jadikan array le variable kursi
        $listkursi = $this->session->userdata('kursi');
        $kursi = array_values($listkursi);

        //masukan ke masing masing var dengan sessionya
        $id_film = $this->session->userdata('id_film');
        $id_jadwal = $this->session->userdata('id_jadwal');
        $tanggal_nonton = $this->session->userdata('tanggal_nonton');

        //ambil semua data film berdasarkan id film dari session id_film
        $data['film'] = $this->MyModel->GetWhere('film', array('id_film' => $id_film));

        //ambil semua data kursi
        $data['kursi'] = $this->MyModel->Get('kursi');

        //ambil data kursi untuk kursi yang sudah dipilih sebelumnya
        $data['kursi_checked'] = $kursi;

        //ambil kursi terbooking dan masukan ke var array
        $query_kursi_booked = $this->db->query('SELECT nokur FROM pesanan where id_film = "'.$id_film.'" and id_jadwal = "'.$id_jadwal.'" and tanggal_nonton = "'.$tanggal_nonton.'"');
        $data['kursi_booked'] = $query_kursi_booked->result_array();

        //simpan semua data kedalam variable array 'data' lalu masukan ke view 'edit'
        $data = array('data' => $data);
        $this->load->view('edit', $data);

    }

    public function bayar()
    {
        //mauskan ke var listkursi dengan session kursi, lalu jadikan array ke variable kursi
        $listkursi = $this->session->userdata('kursi');
        $data_pembeli = [
            
            'nama' => $this->session->userdata('nama'),
            'no_ktp' => $this->session->userdata('no_ktp'),
            'umur' => $this->session->userdata('umur')
        ];

        $data['kursi'] = array_values($listkursi);

        //hitung isi data kursi
        $jum_kursi = count($data['kursi']);
        $j=0;
        $this->MyModel->insert('pembeli', $data_pembeli);
        $id_pembeli = $this->db->insert_id();
        //insert data kursi ke databse sesui jumlahmya
        foreach($data['kursi'] as $k){
            $data_insert = array(
                'id_pembeli' => $id_pembeli,
                'id_film' => $this->session->userdata('id_film'),
                'tanggal_nonton' => $this->session->userdata('tanggal_nonton'),
                'id_jadwal' => $this->session->userdata('id_jadwal'),
                'nokur' => $k
            );
            $this->MyModel->insert('pesanan', $data_insert);
        }
        //simpan semua data kedalam variable array 'data' lalu masukan ke view 'edit'
        $data = array('data' => $data);
        $this->load->view('tiket', $data);
    }

    public function tentang_kami()
    {
        $this->load->view('about');
    }
}
?>