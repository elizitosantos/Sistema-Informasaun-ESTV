<?php namespace App\Controllers;
use App\Models\Auth;
use App\Models\ModelOras;
use CodeIgniter\Controller;
use App\Models\ModelHorariu;
use App\Models\ModelMestre;
use App\Models\ModelLoron;
use App\Models\ModelMateria;
use App\Models\ModelObs2;
use App\Models\ModelObs1;
use App\Models\ModelClasse;
use App\Models\ModelTurma;
use CodeIgniter\HTTP\Request;


class ProsesuHorariu extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $modelhorariu;
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
        $model = new ModelHorariu();

        $data ['v_orariu']= $model->findAll();     
        $data['page_title'] = "ProsesuHorariu";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_horariu/prosesu/view_prosesu_horariu',$data);
        echo view('layout/v_footer');
    }
    public function create()
    { 
         session();
        $data=[
            'title' => 'Adicionar Estudante',
            'validation' => \Config\Services::validation()
        ];
        $model = new ModelHorariu();
        // $data['t_obs1']  = $model->getObs1()->getResult();
        $data['v_obs1']  = $model->getObs1()->getResult();
        $data['v_obs2']  = $model->getObs2()->getResult();
       // $data['estudante']  = $model->getEstudante()->getResult();
        $data['t_turma'] = $model->getTurma()->getResult();
         $data['t_clase'] = $model->getClasse()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['t_dep'] = $model->getDep()->getResult();
        $data['t_materia'] = $model->getMateria()->getResult();
        $data ['t_valor']= $model->getValor()->getResult();
        $data ['t_horas']= $model->getOras()->getResult();
        $data ['t_prof']= $model->getMestre()->getResult();
        $data ['t_loron']= $model->getLoron()->getResult();
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_horariu/form_horariu', $data);
        echo view('layout/v_footer');
    }

    public function save()
    {
        $model = new ModelHorariu();
        $data = [
            'id_oras'                  => $this->request->getPost('id_oras'),
            'id_loron'                  => $this->request->getPost('id_loron'),
            'id_obs1'                  => $this->request->getPost('id_obs1'),
            'id_obs2'                  => $this->request->getPost('id_obs2'),
          
            
            
        ];
        $model->saveHorariu($data);
        return redirect()->to('prosesuhorariu')->with('status','dadus susesu rai');
        var_dump($model);
    } 

    public function edit($id)
    {
        $model = new ModelHorariu();
        
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
           
            'id_oras'              => $this->request->getPost('id_oras'),
            'id_loron'         => $this->request->getPost('id_loron'),
            'id_obs1'               => $this->request->getPost('id_obs1'),
            'id_obs2'                 => $this->request->getPost('id_obs2'),
         
           
        );
        $model->updateHorariu($data, $id);
        return redirect()->to('/prosesuhorariu');
    }
   
 
}