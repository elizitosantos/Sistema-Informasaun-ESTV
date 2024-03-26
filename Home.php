<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ModelGrafik;
use App\Models\Auth;

class Home extends BaseController
{
    
    public function __construct()
       {
        // $this->db = \Config\Database::connect();(funsaun ne connect manual la extend Basecontroll)
         
        $this->grafik=new ModelGrafik();
        
//usuario request
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->data = ['session' => $this->session];
       }
    public function index()
    {
        $data['page_title'] = "Home";
         $data =[
            //'t_obs1' =>$this->grafik->dep(),
            'sexo'  =>$this->grafik->sexo(),
            'sexProf' =>$this->grafik->sexProf(),
            //'sexo'  =>$this->grafik->sexodata(),
           // 'clase'  =>$this->grafik->clase(),
            //   'tinan_akademik'  =>$this->grafik->tinan_akademik(),
                
         ];
        
        $this->data['page_title']="Home";
        $this->data['page_info']="Ita Boot nudar gerente Ba Sistema Informasaun ESTV-LIKISA";
       // $data['count'] = $this->db->table($this->table)->countAllResults();//(nia halo count ba tabela)
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('v_home',$data);         
        echo view('layout/v_footer'); 
    }
    
    public function users(){
        if($this->session->login_type != 1){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $this->data['page_title']="Usuario";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->auth_model->where("id != '{$this->session->login_id}'")->countAllResults();
        $this->data['users'] = $this->auth_model->where("id != '{$this->session->login_id}'")->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['users'])? count($this->data['users']) : 0;
        $this->data['pager'] = $this->auth_model->pager;
       
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('pages/users/list', $this->data);
        echo view('layout/v_footer'); 
    }

    public function user_edit($id=''){
        if($this->session->login_type != 1){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(empty($id))
        return redirect()->to('Home/users');
        if($this->request->getMethod() == 'post'){
            extract($this->request->getPost());
            if($password !== $cpassword){
                $this->session->setFlashdata('error',"Password la hanesan, (favor Konfirma fali password).");
            }else{
                $udata= [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                $udata['type'] = $type;
                $udata['status'] = $status;
                if(!empty($password))
                $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $update = $this->auth_model->where('id',$id)->set($udata)->update();
                if($update){
                    $this->session->setFlashdata('success',"User Details has been updated successfully.");
                    return redirect()->to('Home/user_edit/'.$id);
                }else{
                    $this->session->setFlashdata('error',"User Details has failed to update.");
                }
            }
        }

        $this->data['page_title']="Users";
        $this->data['user'] = $this->auth_model->where("id ='{$id}'")->first();
       
      
        echo view('layout/v_head', $this->data);
        echo view('layout/v_header',$this->data);
        echo view('layout/v_aside',$this->data);
        echo view('pages/users/edit', $this->data);
        echo view('layout/v_footer'); 
    }
    
    public function user_delete($id=''){
        if($this->session->login_type != 1){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        if(empty($id)){
                $this->session->setFlashdata('main_error',"user Deletion failed due to unknown ID.");
                return redirect()->to('Home/users');
        }
        $delete = $this->auth_model->where('id', $id)->delete();
        if($delete){
            $this->session->setFlashdata('main_success',"Usuariu nee susesu Apaga.");
        }else{
            $this->session->setFlashdata('main_error',"Erru apaga usuariu tamba la rekoinese ID refere.");
        }
        return redirect()->to('Home/users');
    }


    


}