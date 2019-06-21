<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dc_model');

	}

	public function index()
	{
		// $data['level'] = $this->dc_model->get_all_level();

		$this->load->view("agenda/header"); 
		$this->load->view('agenda/agenda_view');
		$this->load->view("agenda/footer");
	}

	public function getDcSched()
	{
		$month = $this->input->post('month_p');
		$year = $this->input->post('year_p');
        echo json_encode( $this->dc_model->get_dc_sched($month,$year));
	}

	public function getDcMonth()
	{
        echo json_encode( $this->dc_model->get_dc());
	}

	// Membuat fungsi create
	public function newDc()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$nor = $this->input->post('nor');
		$no = $this->input->post('no');
		$rev = $this->input->post('rev');
		$item_changes = $this->input->post('item_changes');
		$carline = $this->input->post('carline');
		$start = date( 'Y-m-d H:i:s', strtotime( $this->input->post('start') ) );
		$end = $start;
		$color = "#FFFFFFF";
		$de_epl            = date( 'Y-m-d H:i:s', strtotime($this->input->post('de_epl')) );
            $de_com            = date( 'Y-m-d H:i:s', strtotime($this->input->post('de_com')) );
            $de_eng           = date( 'Y-m-d H:i:s', strtotime($this->input->post('de_eng')) );
            $pp_swct           = date( 'Y-m-d H:i:s', strtotime($this->input->post('pp_swct')) );
            $pp_matrik         = date( 'Y-m-d H:i:s', strtotime($this->input->post('pp_matrik')) );
            $qp_swct           = date( 'Y-m-d H:i:s', strtotime($this->input->post('qp_swct')) );
            $qp_dwg            = date( 'Y-m-d H:i:s', strtotime($this->input->post('qp_dwg')) );
            $qmp_trial         = date( 'Y-m-d H:i:s', strtotime($this->input->post('qmp_trial')) );
            $qmp_vld_mat       = date( 'Y-m-d H:i:s', strtotime($this->input->post('qmp_vld_mat')) );
            $qmp_vld_jig       = date( 'Y-m-d H:i:s', strtotime($this->input->post('qmp_vld_jig')) );
            $eng_sao           = date( 'Y-m-d H:i:s', strtotime($this->input->post('eng_sao')) );
            $eng_housing       = date( 'Y-m-d H:i:s', strtotime($this->input->post('eng_housing')) );
            $eng_jig           = date( 'Y-m-d H:i:s', strtotime($this->input->post('eng_jig')) );
            $eng_matrik        = date( 'Y-m-d H:i:s', strtotime($this->input->post('eng_matrik')) );
            $eng_setting       = date( 'Y-m-d H:i:s', strtotime($this->input->post('eng_setting')) );
            $nys_kb_cct        = date( 'Y-m-d H:i:s', strtotime($this->input->post('nys_kb_cct')) );
            $nys_kb_material   = date( 'Y-m-d H:i:s', strtotime($this->input->post('nys_kb_material')) );
            $nys_mcl           = date( 'Y-m-d H:i:s', strtotime($this->input->post('nys_mcl')) );
            $prod_imp           = date( 'Y-m-d H:i:s', strtotime($this->input->post('prod_imp')) );
            $prod_pengosongan  = date( 'Y-m-d H:i:s', strtotime($this->input->post('prod_pengosongan')) );
            $prod_karantina    = date( 'Y-m-d H:i:s', strtotime($this->input->post('prod_karantina')) );
            $prod_cutting      = date( 'Y-m-d H:i:s', strtotime($this->input->post('prod_cutting')) );
            $ppc_req           = date( 'Y-m-d H:i:s', strtotime($this->input->post('ppc_req')) );
            $ppc_release       = date( 'Y-m-d H:i:s', strtotime($this->input->post('ppc_release')) );

		$result = $this->dc_model->newDc($nor,$no,$rev,$item_changes,$start, $end, $color, $carline, $de_epl,$de_com,$de_eng,$pp_swct,$pp_matrik,$qp_swct,$qp_dwg,$qmp_trial,$qmp_vld_mat,$qmp_vld_jig,$eng_sao,$eng_housing,$eng_jig,$eng_matrik,$eng_setting,$nys_kb_cct,$nys_kb_material,$nys_mcl,$prod_imp,$prod_pengosongan,$prod_karantina,$prod_cutting,$ppc_req,$ppc_release);

		echo json_encode($result);
	}

	// Membuat fungsi UPDATE
	public function agendaUpdate()
	{	 
		date_default_timezone_set("Asia/Jakarta");

		$tglpost = date("Y-m-d H:i:s");//new name
		$idk = $this->input->post('id_dc');
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$tglmulai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('mulai') ) );
		$tglselesai = date( 'Y-m-d H:i:s', strtotime( $this->input->post('selesai') ) );
		$agenda = $this->input->post('level');

		$result = $this->dc_model->updateAgenda($idk,$nama,$keterangan,$tglmulai,$tglselesai,$agenda,$tglpost);
		if ($result) {
			echo json_encode("suc ");
		}else{
			echo json_encode("Gagal");
		}
		
	}

	// Membuat fungsi create
	public function deleteDc()
	{	  
		// $id = $this->input->post('deleteDcku');

		$result = $this->dc_model->deleteDc();
		echo json_encode($result);
	}

	public function getCountAgenda()
	{
		echo json_encode($this->dc_model->get_count_agenda());
	}

	public function getCountWeekAgenda()
	{
		echo json_encode($this->dc_model->get_count_week_agenda());
	}



}
