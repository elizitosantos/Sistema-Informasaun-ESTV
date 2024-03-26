<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelPeriode;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Periode extends Controller
{
     protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    protected $session;
    // Data
    protected $data;
    // Model
    protected $modelperiode;
    public function index()
    {
        $model = new ModelPeriode();
        $data['t_clase']  = $model->getPeriode()->getResult();
             
        $data['page_title'] = "Periode";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/view_classe',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelPeriode();
        
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/form_classe', $data);
        echo view('layout/v_footer');
    }
  
 
    public function save()
    {
        $model = new ModelClasse();
        $data = [
            'periode'              => $this->request->getPost('periode'),


           
        ];
        $model->saveClasse($data);
        return redirect()->to('/classe')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelClasse();
     
        $data['t_clase'] = $model->find($id);       
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/edit_classe', $data);
        echo view('layout/v_footer');
    }
 
    public function update($id)
    {
        $model = new ModelClasse();
        $data['t_clase'] = $model->getClasse()->getResult();
        $data = array(
            'clase'              => $this->request->getPost('clase'),
                      
          
        );
        $model->updateClasse($data, $id);
        return redirect()->to('/classe');
    }
    

    
   
    public function delete()
    {
        $model = new ModelClasse();
        $id = $this->request->getPost('id_clase');
        $model->deleteClasse($id);
        return redirect()->to('/classe');
    }
 
}