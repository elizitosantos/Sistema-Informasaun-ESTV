<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelHorariu;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class RelatorioHorario extends Controller
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
    protected $modelhorariu;
    public function index()
    {
        $model = new ModelHorariu();
        // $data['t_clase']  = $model->getClasse()->getResult();
        $data ['v_orariu']= $model->findAll();    
        // $data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "RelatorioHorario";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_horariu/relatorio/view_relatorio_horariu',$data);
        echo view('layout/v_footer');
    }
    
    
 
}