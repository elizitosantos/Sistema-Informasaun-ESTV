<?php namespace App\Controllers;
use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelTurma;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class ProsesuTurma extends Controller
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
        $data['t_turma']  = $model->getTurma()->getResult();
        $data['t_clase']  = $model->getClasse()->getResult();
           
        $data['page_title'] = "Turma";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_turma/prosesu/view_prosesu_turma',$data);
        echo view('layout/v_footer');
    }
    
    
 
}