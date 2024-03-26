<?php namespace App\Controllers;
 use App\Models\Auth;
use CodeIgniter\Controller;
use App\Models\ModelMestre;
use CodeIgniter\HTTP\Request;

 use App\Models\ModelEstatuto;

class Mestre extends Controller
{
    protected $session;
    // Data
    protected $data;
    // Model
    protected $model_mestre;

    protected $request;

    public function __construct()
    {
        $this->model_mestre=new ModelMestre();
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
    }
    public function index()
    {
        $model = new ModelMestre();
        $data ['v_prof']= $model->findAll();	
         $data['t_prof']  = $model->getMestre()->getResult();
        $data['t_estatutu'] = $model->getEstatuto()->getResult();       
        $data['page_title'] = "Professores";
       // $data ['t_prof']= $model->findAll(); 
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/view_mestre',$data);
        echo view('layout/v_footer');
    }
    

    public function form_mestre()
    { 
        $data=[
            //'title' => 'Adicionar Novo',
            'validation' => \Config\Services::validation()
        ];
        $model = new ModelMestre();
       
        // $data['t_estatutu'] = $model->getEstatuto()->getResult();
        $data['page_title'] = "Adicionar Novo";
        $data['request'] = $this->request;
        $data ['t_prof']= $model->findAll(); 
        $data ['t_estatutu']= $model->getEstatuto()->getResult(); 
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/form_mestre', $data);
        echo view('layout/v_footer');
    }
    public function detail($id)
    {
        $model = new ModelMestre();
        // $data['t_prof'] = $model->find($id); 
        // $data['t_estatutu'] = $model->getEstatuto()->getResult();  
        $data ['v_prof']= $model->findAll();	
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/detailmestre', $data);
        echo view('layout/v_footer');
    }
    public function save()
    {
        $model = new ModelMestre();
        $data = [
            'pmis'               => $this->request->getPost('pmis'),
            'naran'              => $this->request->getPost('naran'),
            'fatin_moris'         => $this->request->getPost('fatin_moris'),
            'data_moris'          => $this->request->getPost('data_moris'),
            'sexo'                 => $this->request->getPost('sexo'),
            'habilitasaun_literaria'                 => $this->request->getPost('habilitasaun_literaria'),
            'id_payrol'                 => $this->request->getPost('id_payrol'),
            'area_espesialidade'                 => $this->request->getPost('area_espesialidade'),
            'id_estatutu'                 => $this->request->getPost('id_estatutu'),   
           
            
        ];
        $model->saveMestre($data);
        return redirect()->to('/mestre')->with('status','dadus susesu rai');
    } 
    public function edit($id)
    {
        $model = new ModelMestre();        
         $data['t_estatutu'] = $model->getEstatuto()->getResult();
        // $data['t_prof'] = $model->find($id);
        $data['page_title'] = "Altera";
        $data['request'] = $this->request;
        $data ['v_prof']= $model->find($id); 
        echo view('layout/v_head', $data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('g_mestre/edit_mestre', $data);
        echo view('layout/v_footer');
    }
 
    public function update($id)
    {
        $model = new ModelMestre();
       $data['t_prof']  = $model->getEstatuto()->getResult();
        $data = array(
            'pmis'                            => $this->request->getPost('pmis'),
            'naran'                           => $this->request->getPost('naran'),
            'sexo'                            => $this->request->getPost('sexo'),
            'fatin_moris'                     => $this->request->getPost('fatin_moris'),
            'data_moris'                      => $this->request->getPost('data_moris'),
            // 'habilitasaun_literaria'          => $this->request->getPost('habilitasaun_literaria'),
            'id_payrol '                      => $this->request->getPost('id_payrol'),
            // 'area_espesialidade'              => $this->request->getPost('especialidade'),
            'id_estatutu'                     => $this->request->getPost('id_estatutu'),
          
        );
        $model->updateMestre($data, $id);
        return redirect()->to('/mestre');
    }
    

   
   // Delete Data
    public function delete($pmis=''){
        
        if(empty($pmis)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/Mestre');
        }
        
        $delete = $this->model_mestre->delete($pmis);
        if($delete){
            $this->session->setFlashdata('success_message','Ita Susesu Hamos Dadus Professor Nee!.') ;
            return redirect()->to('/Mestre/index');
        }
    }
 
}