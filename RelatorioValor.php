<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelValor2;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class RelatorioValor extends Controller
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
    protected $modelvalor2;
    public function index()
    {
        $model = new ModelValor2();
        // $data['t_clase']  = $model->getClasse()->getResult();
        $data ['v_valor_liulaliu1']= $model->findAll();    
        // $data['materia'] = $model->getMateria()->getResult();       
        $data['page_title'] = "RelatorioValor";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_valor/relatorio/view_relatorio_valor',$data);
        echo view('layout/v_footer');
    }
    
    
 
}