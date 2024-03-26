<?php namespace App\Controllers;
use App\Models\Auth;
use App\Models\ModelAkademik;
use CodeIgniter\Controller;
use App\Models\ModelEstudante2;
use CodeIgniter\HTTP\Request;

class Relatorio_Estudante1 extends Controller
{
    protected $helper =['custom'];
    public function __construct()
    {            
         helper(['form', 'url']);
          
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    protected $session;
     
    protected $data;
     
    protected $model_estudante2;
    public function index()
    {
        
        $model = new ModelEstudante2();
        // $data['estudante']=$model->getEstudante()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        // $data['t_classe'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['v_totaldadus_kadatinan_kada_dep']= $model->findAll(); 
        $data['page_title'] = "RelatorioEstudante1";
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/v_relatorio/view_relatorio_estudante1.php',$data);
        echo view('layout/v_footer');
    }

    
}