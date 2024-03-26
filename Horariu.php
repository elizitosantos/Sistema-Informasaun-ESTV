<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelHorariu;
use App\Models\ModelLoron;
use App\Models\ModelOras;
use App\Models\ModelMestre;
use App\Models\ModelObs2;
use App\Models\ModelObs1;
use App\Models\ModelClasse;
use App\Models\ModelTurma;
use App\Models\Auth;
use App\Models\ModelMateria;
use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\This;

class Horariu extends Controller
{
    protected $session;
     
    protected $data;
     
    protected $modelhorariu;
    public function __construct()
    {
        $this->model=new ModelHorariu();
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $data['validation'] = $this->validator;
        $model = new ModelHorariu();
        $data['t_obs2']  = $model->getObs2()->getResult();
        $data['t_orariu']  = $model->getHorariu()->getResult();
        $data['t_materia'] = $model->getMateria()->getResult();
        $data['t_prof'] = $model->getMestre()->getResult();
        $data['t_loron'] = $model->getLoron()->getResult();
        $data['t_horas'] = $model->getOras()->getResult();
        $data['t_obs1'] = $model->getLoron()->getResult();
        $data = $model->findAll(); 
        $data['page_title'] = "Horariu";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_horariu/lista_horariu',$data);
        echo view('layout/v_footer');
    }

    


    // public function form_horariu()
    // { 
    //      session();
    //     $data=[
    //         'title' => 'Adicionar Horariu',
    //         'validation' => \Config\Services::validation()
    //     ];
    //     $model = new ModelHorariu();
    //     $data['t_horas'] = $model->getOras()->getResult();
    //     $data['t_obs2']  = $model->getObs2()->getResult();
    //     $data['t_materia'] = $model->getMateria()->getResult();
    //     $data['t_orariu']  = $model->getHorariu()->getResult();
    //     $data['t_prof'] = $model->getMestre()->getResult();
    //     $data['t_loron'] = $model->getLoron()->getResult();
    //     $data['t_obs1'] = $model->getLoron()->getResult();
       
        
    //     $data['request'] = $this->request;
    //     echo view('layout/v_head', $data);
    //     echo view('layout/v_header',$this->data);
    //     echo view('layout/v_aside',$this->data);
    //     echo view('g_horariu/form_horariu', $data);
    //     echo view('layout/v_footer');
    // }
 
    public function save()
    {
        if (!$this->validate([
            'orariu'=>[
                
                'rules'=> 'required|is_unique[Horariu.id_orariu]|min_length[6]',
                'errors' =>[
                    'required' => 'Favor Priense Númeru Emis.',
                    'is_unique'=>'Númeru Emis Nee Rejistu ona',
                    'min_length'=>'numeru emis iha dijit 6'
                ]
                ],
                'loron' => [
                    'rules'  => 'loron',
                   'rules'  => 'required',
                   'errors' => [
                            'required' => 'Favor priense Naran Materia'
                        ]
                        ],
                 'materia' => [
                 'rules'  => 'materia',
                'rules'  => 'required',
                'errors' => [
                         'required' => 'Favor priense Naran Materia'
                     ]
                     ],

                                           
                'oras' => [
                       
                    'rules'  => 'required',
                   'errors' => [
                     'required' => 'Favor priense oras'
                      ]
                ],
                'naran' => [
                       
                    'rules'  => 'required',
                   'errors' => [
                     'required' => 'Favor priense naran'
                      ]
                ],
                   


           
        ])){
            $validation= \config\services::validation();
            //dd($validation);
            return redirect()->to('/horariu/form_horariu')->withInput()->with('validation', $validation);
        }
        $model = new ModelHorariu();
        // $file = $this->request->getFile('image');
        // if($file->isValid() && ! $file->hasMoved())
        // {
        //     $imageName = $file->getRandomName();
        //     $file->move('assets/foto_estudante', $imageName);
        // }
        $data = [
            'loron'               => $this->request->getPost('loron'),
            'oras'         => $this->request->getPost('oras'),
            'materia'              => $this->request->getPost('materia'),
            'naran'          => $this->request->getPost('naran'),
          
              
        ];
        $model->saveHorariu($data);
        return redirect()->to('/horariu')->with('status','dadus susesu rai');
    } 

    public function edit($id)
    {
        $model = new ModelHorariu();
        $data['t_obs2']  = $model->getObs2()->getResult();
        $data['t_obs1']  = $model->getObs1()->getResult();
        $data['v_obs1']  = $model->findAll(); 
        $data['t_orariu']  = $model->getHorariu()->getResult();
        $data['t_horas']  = $model->getOras()->getResult();
        $data['t_loron']  = $model->getOras()->getResult();
        $data['t_materia']  = $model->getMateria()->getResult();
        $data['t_loron'] = $model->getLoron()->getResult();
        $data['t_prof']  = $model->getMestre()->getResult();
        $data['v_orariu']  = $model->find($id); 
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_horariu/edit_horariu', $data);
        echo view('layout/v_footer');
    }




    public function detail($id)
    {
        
        $model = new ModelHorariu();
        $data['t_obs2']  = $model->getObs2()->getResult();
        $data['t_orariu']  = $model->getHorariu()->getResult();
        $data['t_horas']  = $model->getOras()->getResult();
        $data['t_materia']  = $model->getMateria()->getResult();
        $data['t_loron'] = $model->getLoron()->getResult();
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_horariu/edit_horariu', $data);
        echo view('layout/v_footer');
    }

 
    public function update($id)
    {
        $model = new ModelEstudante();
        // $estu_item= $model->find($id);
        // $old_img_name =$estu_item['image'];
        //  echo $estu_item['image'];
        // $file =$this->request->getFile('image');
        // if($file->isValid() && !$file->hasMoved())
        // {
           
            // if(file_exists("assets/foto_estudante/".$old_img_name)){
                // unlink("assets/foto_estudante/".$old_img_name);
                
            // }
            // $imageName =$file->getRandomName();
            // $file->move('assets/foto_estudante', $imageName);
        // }else{
            // $imageName = $old_img_name;
        // }

        $data = [
            'loron'               => $this->request->getPost('loron'),
            'materia'              => $this->request->getPost('materia'),
            'oras'         => $this->request->getPost('oras'),
            'naran'          => $this->request->getPost('naran'),
          
              
        ];
        $model->updateHorariu($data, $id);
        return redirect()->to('/horariu');
    }
    

   public function delete($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Horariu');
        }
        $delete = $this->model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Dadus programa Estudo Sucesu Hamos.') ;
            return redirect()->to('/Horariu/index');
        }
    }
   

 
}