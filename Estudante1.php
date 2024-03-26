<?php 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\ModelEstudante1;
use App\Models\ModelClasse;
use App\Models\ModelAkademik;
use App\Models\ModelTurma;
use App\Models\Auth;
use App\Models\ModelPrograma;
use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\This;

class Estudante1 extends Controller
{
    protected $session;
     
    protected $data;
     
    protected $model_estudante1;
    public function __construct()
    {
        $this->model=new ModelEstudante1();
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $data['validation'] = $this->validator;
        $model = new ModelEstudante1();
        //  $data['t_obs1']  = $model->getObs1()->getResult();
        // $data['estudante']  = $model->getEstudante1()->getResult();
        //  $data['t_clase'] = $model->getClasse()->getResult();
        //  $data['t_turma'] = $model->getTurma()->getResult();
        // $data['tinan_akademik'] = $model->getAkademik()->getResult();
        // $data['t_dep'] = $model->getDep()->getResult();
        $data ['v_estudante']= $model->findAll(); 
       
        $data['page_title'] = "Estudante1";
        echo view('layout/v_head', $data);
        echo view('layout/v_header', $this->data);
        echo view('layout/v_aside', $this->data);
        echo view('g_estudante1/lista_estudante1',$data);
        echo view('layout/v_footer');
    }

    public function form_estudante1()
    { 
         session();
        $data=[
            'title' => 'Adicionar Estudante',
            'validation' => \Config\Services::validation()
        ];
        $model = new ModelEstudante1();
         $data['t_obs1']  = $model->getObs1()->getResult();
         $data['estudante']  = $model->getEstudante()->getResult();
        $data['t_turma'] = $model->getTurma()->getResult();
        $data['t_clase'] = $model->getClasse()->getResult();
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
        $data['t_dep'] = $model->getDep()->getResult();
       // $data ['v_estudante1']= $model->findAll();
        
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante1/form_estudante1', $data);
        echo view('layout/v_footer');
    }
 
    public function save()
    {
        if (!$this->validate([
            'emis'=>[
                
                'rules'=> 'required|is_unique[Estudante.emis]|min_length[6]',
                'errors' =>[
                    'required' => 'Favor Priense Númeru Emis.',
                    'is_unique'=>'Númeru Emis Nee Rejistu ona',
                    'min_length'=>'numeru emis iha dijit 6'
                ]
                ],

                 'naran' => [
                 'rules'  => 'naran',
                'rules'  => 'required',
                'errors' => [
                         'required' => 'Favor priense Naran Estudante'
                     ]
                     ],

                                           
                'moris_fatin' => [
                       
                    'rules'  => 'required',
                   'errors' => [
                     'required' => 'Favor priense fatin moris'
                      ]
                ],
                  'data_moris' => [
                           
                             'rules'  => 'required',
                             'errors' => [
                                 'required' => 'Favor escolha data moris'
                             ]
                             ],
                   'sexo' => [
                                'rules'  => 'sexo',
                               'rules'  => 'required',
                               'errors' => [
                                   'required' => 'Favor hili Sexo'
                               ]
                               ],
                 'pai' => [
                               
                        'rules'  => 'required',
                         'errors' => [
                           'required' => 'Favor escolha hili tinan akademiku'
                                  ]
                                 ],
                      'mae' => [
                              
                               'rules'  => 'required',
                                'errors' => [
                                 'required' => 'Favor prinse mãe nia naran'
                                      ]
                                     ],
                                              

                     'clase' => [
                       
                         'rules'  => 'required',
                          'errors' => [
                           'required' => 'Favor escolha classe'
                           ]
                      ],  

                         'dep' => [
                           
                             'rules'  => 'required',
                              'errors' => [
                               'required' => 'Favor escolha programa estudo'
                               ]
                              ],
                             
                            

                              'turma' => [
                               
                                 'rules'  => 'required',
                                  'errors' => [
                                   'required' => 'Favor  prinse turma'
                                   ]
                                  ],
                             
                              'tinan' => [
                               
                                 'rules'  => 'required',
                                  'errors' => [
                                   'required' => 'Favor escolha hili tinan akademiku'
                                   ]
                                  ],
                                  


           
        ])){
            $validation= \config\services::validation();
            //dd($validation);
            return redirect()->to('/estudante1/form_estudante1')->withInput()->with('validation', $validation);
            $data ['v_estudante1']= $model->findAll();
        }
        $model = new ModelEstudante1();
        // $file = $this->request->getFile('image');
        // if($file->isValid() && ! $file->hasMoved())
        // {
        //     $imageName = $file->getRandomName();
        //     $file->move('assets/foto_estudante', $imageName);
        // }
        $data = [
            'id_obs1'               => $this->request->getPost('id_obs1'),
            'emis'               => $this->request->getPost('emis'),
            'naran'              => $this->request->getPost('naran'),
            'moris_fatin'         => $this->request->getPost('moris_fatin'),
            'data_moris'          => $this->request->getPost('data_moris'),
            'sexo'                 => $this->request->getPost('sexo'),
            'pai'                 => $this->request->getPost('pai'),
            'mae'                 => $this->request->getPost('mae'), 
            'id_clase'          => $this->request->getPost('id_clase'),
            'id_turma'             => $this->request->getPost('id_turma'),
            'id_dep'            => $this->request->getPost('id_dep'),
            'id_akademik'       => $this->request->getPost('id_akademik'),
            
              
        ];
        $model->saveEstudante1($data);
        return redirect()->to('/estudante1')->with('status','dadus susesu rai');
        $data ['v_estudante1']= $model->findAll();
    } 

    public function edit($id)
    {
        $model = new ModelEstudante1();
         $data['t_obs1']  = $model->getObs1()->getResult();
         $data['t_dep']  = $model->getDep()->getResult();
        $data['t_clase']  = $model->getClasse()->getResult();
        $data['t_turma']  = $model->getTurma()->getResult();
        $data['tinan_akademik'] = $model->getAkademik()->getResult();
         $data['estudante'] = $model->find($id);
         $data['page_title'] = "Altera";
         $data['request'] = $this->request;
       // $data ['v-estudante']= $model->findAll();
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante1/edit_estudante1', $data);
        echo view('layout/v_footer');
    }




    public function detail($id)
    {
        
        $model = new ModelEstudante1();
        
        $data['estudante'] = $model->find($id);
        $data['page_title'] = "Detail Estudante";
        $data['request'] = $this->request;
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_estudante/detail_estudante', $data);
        echo view('layout/v_footer');
    }

 
    public function update($id)
    {
        $model = new ModelEstudante1();
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

        $data = array(
            'emis'               => $this->request->getPost('emis'),
            'naran'              => $this->request->getPost('naran'),
            'id_clase'            => $this->request->getPost('id_clase'),
            'id_turma'          => $this->request->getPost('id_turma'),
            'id_dep'             => $this->request->getPost('id_dep'),
            'id_akademik'       => $this->request->getPost('id_akademik'),
           
            
  
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