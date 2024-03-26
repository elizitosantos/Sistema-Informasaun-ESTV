<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelMateria;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Materia extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model_materia;

    protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $model = new ModelMateria();
        $data['t_materia']  = $model->getMateria()->getResult();
        //$data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "Materia";
        // $data ['t_materia']= $model->findAll(); 
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_materia/view_materia',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelMateria();
       
        $data['t_materia'] = $model->getMateria()->getResult();
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_materia/form_materia', $data);
        echo view('layout/v_footer');
    }
 
    public function save()
    {
        $model = new ModelMateria();
        $data = [
            'id_materia'                            => $this->request->getPost('id_materia'),
            'materia'                  => $this->request->getPost('materia'),
           
        ];
        $model->saveMateria($data);
        return redirect()->to('/materia')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelMateria();
        
        $data['id_materia'] = $model->getMateria()->getResult();
        $data['t_materia'] = $model->find($id);
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_materia/view_edit', $data);
        echo view('layout/v_footer');
    }
 
    public function update($id)
    {
        $model = new ModelMateria();
        $data['t_materia'] = $model->getMateria()->getResult();
        $data = array(
            'materia'                            => $this->request->getPost('materia'),
           
          
        );
        $model->updateMateria($data, $id);
        return redirect()->to('/materia');
    }
    

    
    public function delete($id_materia=''){
        
        if(empty($id_materia)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/materia');
        }
        
        $delete = $this->model_materia->delete($id_materia);
        if($delete){
            $this->session->setFlashdata('success_message','Ita Susesu Hamos Dadus Professor Nee!.') ;
            return redirect()->to('/materia/index');
        }
    }
 
}