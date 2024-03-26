<?php namespace App\Controllers;
use App\Models\Auth;
use App\Models\ModelAkademik;
use CodeIgniter\Controller;
use App\Models\ModelEstudante;
use App\Models\ModelClasse;
use App\Models\ModelTurma;
use App\Models\ModelObs1;
use App\Models\ModelDep;
use CodeIgniter\HTTP\Request;

// class ProsesuEstudante extends Controller
// {
//     protected $helper =['custom'];
//     public function __construct()
//     {
            
//         helper(['form', 'url']);
//         $this->request = \Config\Services::request();
//         $this->session = session();
//         $this->auth_model = new Auth;
//         $this->data = ['session' => $this->session];
//     }
//     protected $session;
     
//     protected $data;
     
//     protected $model_estudante;
class ProsesuEstudante extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model_estudante;
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
        
        $model = new ModelEstudante();
        // $data['t_obs1']=$model->getObs1()->getResult();
         $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_clase'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        //$data ['v_estudante']= $model->findAll();
         
       
        $data['page_title'] = "ProsesuEstudante";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estudante/v_prosesu/view_prosesu_estudante',$data);
        echo view('layout/v_footer');
    }

    public function detail($id)
    {
        $model = new ModelEstudante();
        $data['estudante'] = $model->find($id); 
        $data['t_dep']  = $model->getDep()->getResult();
        $data['t_clase']  = $model->getClasse()->getResult();
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['t_turma'] = $model->getTurma()->getResult();
        $data['page_title'] = "Profile Detalhos";	
        $data ['v_estudante']= $model->findAll();	
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/detail_estudante', $data);
        echo view('layout/v_footer');
    }
   
 
}