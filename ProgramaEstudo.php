<?php

namespace App\Controllers;
use App\Models\Auth;
use App\Models\ModelPrograma;

class ProgramaEstudo extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model;

    // Initialize Objects
    public function __construct(){
        $this->model = new ModelPrograma();
        $this->session= \Config\Services::session();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }

    //index
    public function index(){
        $this->data['page_title'] = "ProgramaEstudo";
        $this->data['t_dep'] = $this->model->orderBy('date(id_dep) Desc')->select('*')->get()->getResult();
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_programa/view_programa', $this->data);
        echo view('layout/v_footer');
    }

    // Create Form Page
    public function create(){
        $data=[
            'title' => 'Adicionar Novo',
            'validation' => \Config\Services::validation()
        ];
        $this->data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_programa/view_form', $data);
        echo view('layout/v_footer');
    }

    // Insert And Update Function
    public function save(){
        if (!$this->validate([
            'id_dep'=>[
                
                'rules'=> 'required|is_unique[t_dep.id_dep]',
                'errors' =>[
                    'required' => 'Favor Priense kodigu Programa.',
                    'is_unique'=>'kodigu Programa Nee Rejistu ona'
                ]
                ],

                'dep'=>[
                
                    'rules'=> 'required|is_unique[t_dep.dep]',
                    'errors' =>[
                        'required' => 'Favor Priense Programa.',
                        'is_unique'=>'Programa  Nee Rejistu ona'
                    ]
                    ],

                
           
        ])){
            $validation= \config\services::validation();
            // dd($validation);
            return redirect()->to('/programaestudo/create')->withInput()->with('validation', $validation);
        }

        $this->data['request'] = $this->request;
        $post = [
            'id_dep' => $this->request->getPost('id_dep'),
            'dep' => $this->request->getPost('dep'),
            
        ];
        if(!empty($this->request->getPost('id_dep')))
            $save = $this->model->where(['id_dep'=>$this->request->getPost('id_dep')])->set($post)->update();
        else
            $save = $this->model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id_dep')))
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            else
            $this->session->setFlashdata('success_message','Parabens! Ita nia Dadus Sucesu Aumenta') ;
            $id =!empty($this->request->getPost('id_dep')) ? $this->request->getPost('id_dep') : $save;
            return redirect()->to( base_url('programaestudo/index') );
        }else{
            echo view('layout/v_head', $this->data);
            echo view('layout/v_header',$this->data);
            echo view('layout/v_aside',$this->data);
            echo view('g_programa/view_programa', $this->data);
            echo view('layout/v_footer');
        }
    }

  


    
    // Edit Form Page
    public function edit($id_pg=''){
        if(empty($id_pg)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/programaestudo/index');
        }
        $this->data['page_title'] = "Altera";
        $qry= $this->model->select('*')->where(['id_dep'=>$id_pg]);
        $this->data['data'] = $qry->first();
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_programa/view_edit', $this->data);
        echo view('layout/v_footer');
    }


  
    // Delete Data
    public function delete($id_pg=''){
        if(empty($id_pg)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/programaestudo');
        }
        $delete = $this->model->delete($id_pg);
        if($delete){
            $this->session->setFlashdata('success_message','Dadus programa Estudo Sucesu Hamos.') ;
            return redirect()->to('/programaestudo/index');
        }
    }

    
    
}
