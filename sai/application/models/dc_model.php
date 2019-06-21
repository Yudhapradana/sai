<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dc_Model extends CI_Model {

    function __construct()
    {
    	parent::__construct();
    }

    public function newDc($nor,$no,$rev,$item_changes,$start,$end,$color,$carline,$de_epl,$de_com,$de_eng,$pp_swct,$pp_matrik,$qp_swct,$qp_dwg,$qmp_trial,$qmp_vld_mat,$qmp_vld_jig,$eng_sao,$eng_housing,$eng_jig,$eng_matrik,$eng_setting,$nys_kb_cct,$nys_kb_material,$nys_mcl,$prod_imp,$prod_pengosongan,$prod_karantina,$prod_cutting,$ppc_req,$ppc_release)
    {
        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'rev'               =>$rev,
            'item_changes'      =>$item_changes,
            'start'             =>$start,
            'end'               =>$end,
            'color'             =>$color,
            'carline'           =>$carline,
            'de_epl'            =>$de_epl,
            'de_com'            =>$de_com,
            'de_eng'            =>$de_eng,
            'pp_swct'           =>$pp_swct,
            'pp_matrik'         =>$pp_matrik,
            'qp_swct'           =>$qp_swct,
            'qp_dwg'            =>$qp_dwg,
            'qmp_trial'         =>$qmp_trial,
            'qmp_vld_mat'       =>$qmp_vld_mat,
            'qmp_vld_jig'       =>$qmp_vld_jig,
            'eng_sao'           =>$eng_sao,
            'eng_housing'       =>$eng_housing,
            'eng_jig'           =>$eng_jig,
            'eng_matrik'        =>$eng_matrik,
            'eng_setting'       =>$eng_setting,
            'nys_kb_cct'        =>$nys_kb_cct,
            'nys_kb_material'   =>$nys_kb_material,
            'nys_mcl'           =>$nys_mcl,
            'prod_imp'           =>$prod_imp,
            'prod_pengosongan'  =>$prod_pengosongan,
            'prod_karantina'    =>$prod_karantina,
            'prod_cutting'      =>$prod_cutting,
            'ppc_req'           =>$ppc_req,
            'ppc_release'       =>$ppc_release
        );

        return $this->db->insert('implementasi', $data);
    }


    public function updateAgenda($id,$nor,$no,$rev,$item_changes,$start,$end,$color,$carline,$de_epl,$de_com,$de_eng,$pp_swct,$pp_matrik,$qp_swct,$qp_dwg,$qmp_trial,$qmp_vld_mat,$qmp_vld_jig,$eng_sao,$eng_housing,$eng_jig,$eng_matrik,$eng_setting,$nys_kb_cct,$nys_kb_material,$nys_mcl,$prod_imp,$prod_pengosongan,$prod_karantina,$prod_cutting,$ppc_req,$ppc_release)
    {
        $data = array(
            'nor'               =>$nor,
            'no'                =>$no,
            'rev'               =>$rev,
            'item_changes'      =>$item_changes,
            'start'             =>$start,
            'end'               =>$end,
            'color'             =>$color,
            'carline'           =>$carline,
            'de_epl'            =>$de_epl,
            'de_com'            =>$de_com,
            'de_eng'            =>$de_eng,
            'pp_swct'           =>$pp_swct,
            'pp_matrik'         =>$pp_matrik,
            'qp_swct'           =>$qp_swct,
            'qp_dwg'            =>$qp_dwg,
            'qmp_trial'         =>$qmp_trial,
            'qmp_vld_mat'       =>$qmp_vld_mat,
            'qmp_vld_jig'       =>$qmp_vld_jig,
            'eng_sao'           =>$eng_sao,
            'eng_housing'       =>$eng_housing,
            'eng_jig'           =>$eng_jig,
            'eng_matrik'        =>$eng_matrik,
            'eng_setting'       =>$eng_setting,
            'nys_kb_cct'        =>$nys_kb_cct,
            'nys_kb_material'   =>$nys_kb_material,
            'nys_mcl'           =>$nys_mcl,
            'pro_imp'           =>$pro_imp,
            'prod_pengosongan'  =>$prod_pengosongan,
            'prod_karantina'    =>$prod_karantina,
            'prod_cutting'      =>$prod_cutting,
            'ppc_req'           =>$ppc_req,
            'ppc_release'       =>$ppc_release
        );

        $this->db->where('id_dc', $id);
        return $this->db->update('implementasi', $data);
    }


    public function deleteDc()
    {
        $id = $this->input->post('id_dc');
        $this->db->where('id_dc', $id);
        $result = $this->db->delete('implementasi');
        return $result;
    }


    public function generate_dropdown()
    {
        $this->db->select('level.id, level.nama');
        $this->db->order_by('nama');

        $result = $this->db->get('level');

        $dropdown[''] = 'Pilih Agenda';

        if($result->num_row()>0){
            foreach ($$result->result_array() as $row) {
                $dropdown[$row['id']] = $row['nama'];
            }
        }
        return $dropdown;
    }

    public function get_all_level()
    {
        $query = $this->db->get('level');
        return $query->result();
    }

    public function get_level_by_id($id)
    {
        $query = $this->db->get_where('level', array('id' => $id));
        return $query->row();
    }

    public function get_dc()
    {
        $query = $this->db->query("SELECT * FROM implementasi WHERE month(start)=month(curdate()) and year(start)=year(curdate()) order by start ASC");
        return $query->result();
    }

    public function get_dc_sched($month,$years)
    {
        $query = $this->db->query("SELECT * FROM implementasi WHERE month(start)=".$month." AND year(start)=".$years." order by start ASC");
        return $query->result();
    }

}