<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelClasse_10Cont;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Classe_10Cont extends Controller
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
    protected $modelclasse_10cont;
    public function index()
    {
        $model = new ModelClasse_10Cont();
        // $data['t_clase']  = $model->getClasse()->getResult();
        $data ['v_clase10ano_dep_contabilidade']= $model->findAll();
             
        $data['page_title'] = "Classe_10Cont";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/view_classe_10_cont',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelClasse_10Cont();
        
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
        $model = new ModelClasse_10();
        $data = [
            'clase'              => $this->request->getPost('clase'),


           
        ];
        $model->saveClasse($data);
        return redirect()->to('/classe')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelClasse_10();
     
        $data['t_clase'] = $model->find($id);       
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/edit_clase', $data);
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