<?php namespace App\Controllers;
use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelOras;
use App\Models\ModelLoron;
use CodeIgniter\HTTP\Request;

// use App\Models\ModelPrograma;

class ProsesuOras extends Controller
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
    protected $modeloras;
    public function index()
    {
        $model = new ModelOras();
       // $data['t_horas']  = $model->getOras()->getResult();
        //$data['t_loron']  = $model->getLoron()->getResult();
        $data ['v_oras']= $model->findAll(); 
           
        $data['page_title'] = "Oras";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data, $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_oras/prosesu/view_prosesu_oras',$data);
        echo view('layout/v_footer');
    }
    
    
 
}