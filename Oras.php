<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelOras;
use CodeIgniter\HTTP\Request;

use App\Models\ModelLoron;

class Oras extends Controller
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
    protected $modeloras;
    public function index()
    {
        $model = new ModelOras();
        // $data['t_clase']  = $model->getTurma()->getResult();
        // $data['t_horas']  = $model->getoras()->getResult();
        // $data['t_loron']  = $model->getloron()->getResult();
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['t_materia'] = $model->getMateria()->getResult(); 
        $data ['v_oras']= $model->findAll();       
        $data['page_title'] = "Oras";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_oras/view_oras',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelOras();
        //$data['t_horas']=$model->getOras()->getResult();
        //$data['t_loron']=$model->getLoron()->getResult();
        //$data['mestre'] = $model->getMestre()->getResult();    
        //$data['t_materia'] = $model->getMateria()->getResult();
        $data ['v_oras_loron']= $model->findAll();   
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_oras/form_oras', $data);
        echo view('layout/v_footer');
    }
 
    public function save()
    {
        $model = new ModelOras();
        $data = [
            'oras'              => $this->request->getPost('oras'),
            'id_loron'                  => $this->request->getPost('id_loron'),
            // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
            
        ];
        $model->saveOras($data);
        return redirect()->to('/oras')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelOras();
        
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult(); 
        $data['t_horas'] = $model->find($id);
        $data['t_loron'] = $model->getLoron()->getResult();
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_oras/edit_oras', $data);
        echo view('layout/v_footer');
    }
 
    public function update($id)
    {
        $model = new ModelOras();
        $data['v_oras'] = $model->getOras()->getResult();
        $data = array(
            'oras'                  => $this->request->getPost('oras'),
            'loron'              => $this->request->getPost('loron'),
            
            // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
          
        );
        $model->updateOras($data, $id);
        return redirect()->to('/oras');
    }
  
    public function delete()
    {
        $model = new ModelOras();
        $id = $this->request->getPost('id_oras');
        $model->deleteOras($id);
        return redirect()->to('/oras');
    }
 
}