<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('company');
    }

    public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$this->load->view('admin/customer');
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
	    $data['company'] = $this->company->get_company();
		$this->load->view('admin/company',$data);
	}
	public function companyTambah($id = false){
        if($id){
            $data['company'] = $this->company->get_company($id);
            $this->load->view('admin/companyForm', $data);
        }else{
            $data['company'] = false;
            $this->load->view('admin/companyForm', $data);
        }
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}

	public function submit($id = false){
        if($id){
            $this->company->update_company($id);
            $this->company();
        }else{
            $this->company->set_company();
            $this->company();
        }
    }

    public function companyHapus($id){
        $this->company->delete_company($id);
        $this->company();
    }
}
