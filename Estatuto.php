<?php

namespace App\Controllers;
use App\Models\Auth;
use App\Models\ModelEstatuto;

class Estatuto extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model;

    // Initialize Objects
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->model = new ModelEstatuto();
        $this->auth_model = new Auth;
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    //index
    public function index(){
        $this->data['page_title'] = "Estatuto";
        $this->data['t_estatutu'] = $this->model->orderBy('date(id_estatutu) Desc')->select('*')->get()->getResult();
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estatuto/view_estatuto', $this->data);
        echo view('layout/v_footer');
    }
    public function create()
    { 
        $model = new ModelEstatuto();
        
        $data['page_title'] = "";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estatuto/form_estatuto', $data);
        echo view('layout/v_footer');
    }
    // Create Form Page
    public function form_estatuto(){
        $this->data['page_title'] = "Inserir";
        $this->data['request'] = $this->request;
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estatuto/form_estatuto', $this->data);
        echo view('layout/v_footer');
    }

    // Insert And Update Function
    public function save(){
        $this->data['request'] = $this->request;
        $post = [
            'id_estatutu' => $this->request->getPost('id_estatutu'),
            'estatuto_funcional' => $this->request->getPost('estatuto_funcional'),
            
        ];
        if(!empty($this->request->getPost('id_estatutu')))
            $save = $this->model->where(['id_estatutu'=>$this->request->getPost('id_estatutu')])->set($post)->update();
        else
            $save = $this->model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id_estatutu')))
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            else
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            $id =!empty($this->request->getPost('id_estatutu')) ? $this->request->getPost('id_estatutu') : $save;
            return redirect()->to( base_url('estatuto/index') );
        }else{
            echo view('layout/v_head', $this->data);
            echo view('layout/v_header', $this->data);
            echo view('layout/v_aside', $this->data);
            echo view('g_estatuto/view_estatuto', $this->data);
            echo view('layout/v_footer');
        }
    }

   

    // Edit Form Page
    public function edit($id_estatutu=''){
        if(empty($id_estatutu)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/estatuto/index');
        }
        $this->data['page_title'] = "Altera";
        $qry= $this->model->select('*')->where(['es_estatutu'=>$id_estatutu]);
        $this->data['data'] = $qry->first();
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estatuto/view_edit_estatuto', $this->data);
        echo view('layout/v_footer');
    }


    function updatedata()
    {
        if ($this->request->isAJAX()) {
            $id_estatutu = $this->request->getVar('id_estatutu');
            $estatuto_funcional = $this->request->getVar('estatuto_funcional');

            $this->kategori->update($id_estatutu, [
                'estatuto_funcional' => $estatutu
            ]);

            $msg = [
                'sukses' =>  'Dadus Estatuto susesu Altera'
            ];
            echo json_encode($msg);
        }
    }

    // Delete Data
    public function delete($id_estatutu=''){
        if(empty($id_estatutu)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/estatuto');
        }
        $delete = $this->model->delete($id_estatutu);
        if($delete){
            $this->session->setFlashdata('success_messages','Dadus Sucesu Hamos.') ;
            return redirect()->to('/estatuto/index');
        }
    }

    
    
}
