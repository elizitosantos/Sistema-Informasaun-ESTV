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
            return redirect()->to('/valor')->withInput()->with('validation', $validation);
        }
        $model = new ModelEstudante();
        $data ['v_valor']= $model->findAll();
        // $file = $this->request->getFile('image');
        // if($file->isValid() && ! $file->hasMoved())
        // {
        //     $imageName = $file->getRandomName();
        //     $file->move('assets/foto_estudante', $imageName);
        // }
        $data = [
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
        $model->saveEstudante($data);
        return redirect()->to('/estudante')->with('status','dadus susesu rai');
    } 