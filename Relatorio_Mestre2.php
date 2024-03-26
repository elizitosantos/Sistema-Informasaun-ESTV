<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelMestre2;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class Relatorio_Mestre2 extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model_mestre2;
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
        $model = new ModelMestre2();
        // $data['t_prof']  = $model->getMestre()->getResult();
        // $data['t_estatutu'] = $model->getEstatuto()->getResult();  
        $data ['v_prof_materia']= $model->findAll();      
        $data['page_title'] = "RelatorioMestre2";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_mestre/relatorio/view_relatorio_mestre1',$data);
        echo view('layout/v_footer');
    }
    

  
    
}