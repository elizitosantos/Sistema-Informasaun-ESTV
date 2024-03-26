<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelTotalData1;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class TotalData extends Controller
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
    protected $modeltotaldata1;
    public function index()
    {
        $model = new ModelTotalData1();
        // $data['t_clase']  = $model->getClasse()->getResult();
        $data ['v_totaldadus_kadatinan_kada_dep']= $model->findAll();    
        // $data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "Total Data";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_total/relatorio/view_total',$data);
        echo view('layout/v_footer');
    }
    
    
 
}