<?php namespace App\Controllers;
use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelValor;
use App\Models\ModelEstudante;
use App\Models\ModelMateria;
use App\Models\ModelPrograma;
use App\Models\ModelPeriode;
use App\Models\ModelAkademik;
use CodeIgniter\HTTP\Request;


class ProsesuValor extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $modelvalor;
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
        $model = new ModelValor();
        $data['t_dep'] = $model->getDep()->getResult();
        $data['t_materia'] = $model->getMateria()->getResult();
        $data['estudante'] = $model->getEstudante()->getResult();
        $data['t_periode'] = $model->getPeriode()->getResult();
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data ['tb_valor']= $model->getValorData()->getResultArray();
        $data['page_title'] = "ProsesuValor";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_valor/view_valor',$data);
        echo view('layout/v_footer');
    }
    public function create()
    { 
         session();
        $data=[
            'title' => 'Adicionar Valor',
            'validation' => \Config\Services::validation()
        ];
        $model = new ModelValor();
        $data['tb_valor']  = $model->getValorData()->getResult();
        $data['t_materia']  = $model->getMateria()->getResult();  
        $data['estudante']  = $model->getEstudante()->getResult();      
        $data['t_dep'] = $model->getDep()->getResult();
        $data['t_periode'] = $model->getPeriode()->getResult();        
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_valor/form_valor', $data);
        echo view('layout/v_footer');
    }

    public function save()
    {
        $model = new ModelValor();
        $data = [
            'naran'                  => $this->request->getPost('naran'),
            'dep'                  => $this->request->getPost('dep'),
            'materia'                  => $this->request->getPost('materia'),
            'periode'                  => $this->request->getPost('periode'),
            'valor'                  => $this->request->getPost('valor'),
            'tinan'                  => $this->request->getPost('tinan'),
          
            
            
        ];
        $model->saveValor($data);
        return redirect()->to('prosesuvalor')->with('status','dadus susesu rai');
        var_dump($model);
    } 

    public function edit($id)
    {
        $model = new ModelValor();
        
        $data['v_obs1']  = $model->getObs1()->getResult();
        $data['v_obs2']  = $model->getObs2()->getResult();
        $data['t_obs2']  = $model->getObs2()->getResult();
       // $data['estudante']  = $model->getEstudante()->getResult();
        $data['t_turma'] = $model->getTurma()->getResult();
         $data['t_clase'] = $model->getClasse()->getResult();
         $data['t_horas'] = $model->getOras()->getResult();
         $data['t_loron'] = $model->getLoron()->getResult();
         $data['page_title'] = "Altera";
        $data['request'] = $this->request;
       
        $data ['v_orariu']= $model->find($id);
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_horariu/edit_horariu', $data);
        echo view('layout/v_footer');
        
    }
    public function update($id)
    {
        $model = new ModelHorariu();

        $data = array(
           
            'id_valor'              => $this->request->getPost('id_valor'),
            'emis'         => $this->request->getPost('emis'),
            'id_materia'               => $this->request->getPost('id_obs1'),
            'id_dep'                 => $this->request->getPost('id_dep'),
            'id_periode'                 => $this->request->getPost('id_periode'),
            'id_akademik'                 => $this->request->getPost('id_akademik'),
         
           
        );
        $model->updateValor($data, $id);
        return redirect()->to('/prosesuvalor');
    }
   
 
}