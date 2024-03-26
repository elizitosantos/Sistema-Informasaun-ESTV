<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelEstudante;
use App\Models\ModelClasse;
use App\Models\ModelAkademik;
use App\Models\ModelTurma;
use App\Models\Auth;
use App\Models\ModelPrograma;
use App\Models\ModelValor;
use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\This;

class Estudante extends Controller
{
    protected $session;
     
    protected $data;
     
    protected $model_estudante;
    public function __construct()
    {
        $this->model=new ModelEstudante();
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $data['validation'] = $this->validator;
        $model = new ModelEstudante();
        // $data['t_obs1']  = $model->getObs1()->getResult();
        $data['estudante']  = $model->getEstudante()->getResult();
        // $data['t_clase'] = $model->getClasse()->getResult();
        // $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        //$data ['v_estudante']= $model->findAll(); 
       
        $data['page_title'] = "Estudante";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estudante/lista_estudante',$data);
        echo view('layout/v_footer');
    }

    public function form_estudante()
    { 
         session();
        $data=[
            'title' => 'Adicionar Estudante',
            'validation' => \Config\Services::validation()
        ];
        $model = new ModelEstudante();
        $data['t_obs1']  = $model->getObs1()->getResult();
     //   $data['estudante']  = $model->getEstudante()->getResult();
        $data['t_turma'] = $model->getTurma()->getResult();
        $data['t_clase'] = $model->getClasse()->getResult();
        $data ['t_clase']= $model->findAll();
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['t_dep'] = $model->getDep()->getResult();
        $data ['estudante']= $model->findAll();
        
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/form_estudante', $data);
        echo view('layout/v_footer');
    }
 

    public function save()
    {
        $model = new ModelEstudante();
        $data = [
            'emis'               => $this->request->getPost('emis'),
            'naran'              => $this->request->getPost('naran'),
            'moris_fatin'         => $this->request->getPost('moris_fatin'),
            'data_moris'          => $this->request->getPost('data_moris'),
            'sexo'                 => $this->request->getPost('sexo'),
            'pai'                 => $this->request->getPost('pai'),
            'mae'                 => $this->request->getPost('mae'), 
            
        ];
        $model->saveEstudante($data);
        return redirect()->to('/estudante')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelEstudante();
        // $data['t_obs1']  = $model->getObs1()->getResult();
        // $data['t_dep']  = $model->getDep()->getResult();
        // $data['t_clase']  = $model->getClasse()->getResult();
        // $data['t_turma']  = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['estudante'] = $model->find($id);
        $data['t_clase'] = $model->getClasse()->getResult();
        // $data['page_title'] = "Altera";
        // $data['request'] = $this->request;
       // $data ['v_estudante']= $model->findAll();
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/edit_estudante', $data);
        echo view('layout/v_footer');
    }





    public function detail($id)
    {
        
        $model = new ModelEstudante();
        $model1 = new ModelValor();
       
        // $data ['v_estudante']= $model->findAll(); 
        // $data['v_estudante'] = $model->find($id);
      
        // $data ['v_valor_obs2']= $model1->findAll();
        
        $data['page_title'] = "Detail Estudante";
//------------------------------------------------------------

        $model1 = new ModelPrograma();
        
        $model = new ModelEstudante();
        $model2 = new ModelAkademik();
        $model3 = new ModelTurma();
        $model4 = new ModelClasse();
        $data['page_title'] = "Adicionar Novo";

        $data ['t_dep']= $model1->findAll();
        $data['estudante'] = $model->find($id);
        $data ['tinan_akademik']= $model2->findAll();
        $data ['t_turma']= $model3->findAll(); 
        $data ['t_clase']= $model4->findAll(); 
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/detail_estudante', $data);
        echo view('layout/v_footer');
    }


    public function form_ficha_estudante($id)
    { 
        
        $model1 = new ModelPrograma();
        
        $model = new ModelEstudante();
        $model2 = new ModelAkademik();
        $model3 = new ModelTurma();
        $data['page_title'] = "Adicionar Novo";

        $data ['t_dep']= $model1->findAll();
        $data['estudante'] = $model->find($id);
        $data ['tinan_akademik']= $model2->findAll();
        $data ['t_turma']= $model3->findAll(); 
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estudante/formulario_ficha_estudante', $data);
        echo view('layout/v_footer');
    }
   

    public function saveFicha()
    {
        $model = new ModelEstudante();
        $data = [
            'emis'                  => $this->request->getPost('emis'),
            'id_turma'                  => $this->request->getPost('id_turma'),
            'id_dep'                  => $this->request->getPost('id_dep'),
            'id_akademik'                  => $this->request->getPost('id_akademik'),
            'id_clase'                  => $this->request->getPost('id_clase'),
            
            
        ];
        $model->saveFicha($data);
        return redirect()->to('estudante')->with('status','dadus susesu rai');
    } 

 
    public function update($id)
    {
        $model = new ModelEstudante();

        $data = array(
            'emis'               => $this->request->getPost('emis'),
            'naran'              => $this->request->getPost('naran'),
            'moris_fatin'         => $this->request->getPost('moris_fatin'),
            'data_moris'          => $this->request->getPost('data_moris'),
            'sexo'                 => $this->request->getPost('sexo'),
            'pai'                   => $this->request->getPost('pai'),
            'mae'                   => $this->request->getPost('mae'),
           
        );
        $model->updateEstudante($data, $id);
        return redirect()->to('/estudante');
    }
    

   public function delete($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Estudante');
        }
        $delete = $this->model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Dadus programa Estudo Sucesu Hamos.') ;
            return redirect()->to('/Estudante/index');
        }
    }
   

 
}