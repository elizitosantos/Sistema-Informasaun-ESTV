<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelTurma;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Turma extends Controller
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
    protected $modelturma;
    public function index()
    {
        $model = new ModelTurma();
        $data['t_clase']  = $model->getClasse()->getResult();
        $data['t_turma']  = $model->getTurma()->getResult();
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "Turma";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_turma/view_turma',$data);
        echo view('layout/v_footer');
    }
    

    public function create()
    { 
        $model = new ModelTurma();
            $data['t_turma']=$model->getTurma()->getResult();
            $data['t_clase'] = $model->getClasse()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult(); 
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_turma/form_turma', $data);
        echo view('layout/v_footer');
    }
 
    public function save()
    {
        $model = new ModelTurma();
        $data = [
            't_clase'              => $this->request->getPost('clase'),
            't_turma'                  => $this->request->getPost('turma'),
            // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
           
        ];
        $model->saveTurma($data);
        return redirect()->to('/classe')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelTurma();
        
        // $data['mestre'] = $model->getMestre()->getResult();    
        // $data['materia'] = $model->getMateria()->getResult(); 
        $data['t_turma'] = $model->find($id);
        $data['t_clase'] = $model->getClasse()->getResult();
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
        $model = new ModelTurma();
        $data['t_turma'] = $model->getTurma()->getResult();
        $data = array(
            'turma'                  => $this->request->getPost('turma'),
            'clase'              => $this->request->getPost('clase'),
                        // 'materia_id'                  => $this->request->getPost('materia_id'),
            // 'mestre_id'                  => $this->request->getPost('mestre_id'),
          
        );
        $model->updateTurma($data, $id);
        return redirect()->to('/turma');
    }
    

    
   
    public function delete()
    {
        $model = new ModelTurma();
        $id = $this->request->getPost('id_turma');
        $model->deleteTurma($id);
        return redirect()->to('/turma');
    }
 
}