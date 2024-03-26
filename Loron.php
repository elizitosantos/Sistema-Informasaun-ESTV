<?php namespace App\Controllers;
use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelLoron;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Loron extends Controller
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
    protected $modelloron;
    public function index()
    {
        $model = new ModelLoron();
        $data['t_loron']  = $model->getLoron()->getResult();
        // $data['t_turma']  = $model->getTurma()->getResult();
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "Loron";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_loron/view_loron',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelLoron();
         $data['t_loron']=$model->getLoron()->getResult();
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult(); 
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_loron/form_loron', $data);
        echo view('layout/v_footer');
    }
 
    public function save()
    {
        $model = new ModelLoron();
        $data = [
            't_loron'              => $this->request->getPost('id_loron'),
            't_loron'              => $this->request->getPost('loron'),
            // 't_turma'                  => $this->request->getPost('turma'),
            // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
           
        ];
        $model->saveLoron($data);
        return redirect()->to('/loron')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelLoron();
        
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult(); 
        $data['t_loron'] = $model->find($id);
        // $data['t_turma'] = $model->getTurma()->getResult();
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_loron/edit_loron', $data);
        echo view('layout/v_footer');
    }
 
    public function update($id)
    {
        $model = new ModelClasse();
        $data['t_loron'] = $model->getLoron()->getResult();
        $data = array(
            'loron'              => $this->request->getPost('loron'),
            // 'turma'                  => $this->request->getPost('turma'),
            // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
          
        );
        $model->updateLoron($data, $id);
        return redirect()->to('/loron');
    }
    

    
   
    public function delete()
    {
        $model = new ModelLoron();
        $id = $this->request->getPost('id_loron');
        $model->deleteLoron($id);
        return redirect()->to('/loron');
    }
 
}