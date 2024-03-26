<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelClasse;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class ProsesuClasse extends Controller
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
    protected $modelclasse;
    public function index()
    {
        $model = new ModelClasse();
        $data['t_clase']  = $model->getClasse()->getResult();
           
        $data['page_title'] = "Classe";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_classe/prosesu/view_prosesu_classe',$data);
        echo view('layout/v_footer');
    }
    
    
 
}