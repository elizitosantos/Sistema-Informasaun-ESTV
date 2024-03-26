<?php

namespace App\Controllers;

use App\Models\ModelAkademik;

class TinanAkademik extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model;

    // Initialize Objects
    public function __construct(){
        $this->model = new ModelAkademik();       
         $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }

    //index
    public function index(){
       $data['page_title'] = "TinanAkademik";
        $this->data['tinan_akademik'] = $this->model->orderBy('date(id_akademik) Desc')->select('*')->get()->getResult();
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_tinanAkademik/view_akademik', $this->data);
        echo view('layout/v_footer');
    }

    // Create Form Page
    public function create(){
        $this->data['page_title'] = "Adicionar Novo";
        $this->data['request'] = $this->request;
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
       echo view('g_tinanAkademik/view_form', $this->data);
        echo view('layout/v_footer');
    }

    // Insert And Update Function
    public function save(){
        $this->data['request'] = $this->request;
        $post = [
           
            'tinan' => $this->request->getPost('tinan'),
            
            
        ];
        if(!empty($this->request->getPost('id_akademik')))
            $save = $this->model->where(['id_akademik'=>$this->request->getPost('id_akademik')])->set($post)->update();
        else
            $save = $this->model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id_akademik')))
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            else
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            $id =!empty($this->request->getPost('id_akademik')) ? $this->request->getPost('id_akademik') : $save;
            return redirect()->to( base_url('tinanakademik/index') );
        }else{
            echo view('layout/v_head', $this->data);
            echo view('layout/v_header',$this->data);
            echo view('layout/v_aside',$this->data);
            echo view('g_tinanAkademik/view_akademik', $this->data);
            echo view('layout/v_footer');
        }
    }


    
    // Edit Form Page
    public function edit($id){
        $model= new ModelAkademik();
        $data ['tinan_akademik']= $model->find($id); 	
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
       echo view('g_tinanAkademik/view_edit', $data);
        echo view('layout/v_footer');
    }

    public function update($id)
    {
        $model = new ModelAkademik();
       $data['tinan_akademik']  = $model->getAkademik()->getResult();
        $data = array(
            'tinan'                            => $this->request->getPost('tinan'),
           
          
        );
        $model->updatetinan($data, $id);
        return redirect()->to('/tinanakademik');
    }
    
  
    // Delete Data
    public function delete($id_akademik=''){
        if(empty($id_akademik)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/tinanakademik');
        }
        $delete = $this->model->delete($id_akademik);
        if($delete){
            $this->session->setFlashdata('success_message','Dadus programa Estudo Sucesu Hamos.') ;
            return redirect()->to('/tinanakademik/index');
        }
    }

    
    
}
