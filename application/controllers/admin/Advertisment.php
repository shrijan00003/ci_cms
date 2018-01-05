<?php 

class Advertisment extends Admin_Controller
{
    
    private $table = 'advertisement';
    function __construct()
    {
        parent::__construct();
        $this->load->model('ads_m');
        
    }
    //============================Managing articles=========================================
    public function index(){
       
       $entry_date = date('Y-m-d');
       $days = "+365 days";
        dump($entry_date);
        dump(date('Y-m-d', strtotime($days)));
    }

    public function viewads(){

        $this->data['advertisments']=$this->ads_m->getAdvertisment_AdminPanal();

        //calculating fund collected and to be collected
        $this->data['collected_from'] = $this->ads_m->count($this->table,'payment');
        $this->data['to_be_collected_from'] = $this->ads_m->tobecollectedFrom();


        $this->data['subview']='admin/advertisment/view_ads';
        $this->load->view('admin/_layout_main',$this->data);

    }


    public function positions(){
        
        //loading data from position table


        $this->data['positions']=$this->ads_m->getPositions();


        //load the view
        $this->data['subview']='admin/advertisment/position';
        $this->load->view('admin/_layout_main',$this->data);

        
    }
   
   public function close_ads($p_id,$id){

        $this->ads_m->closeAd($p_id,$id);
        redirect('admin/advertisment/viewads');
    }

    public function makePayment($id){

        $this->ads_m->make_payment($id);
        redirect('admin/advertisment/viewads');
    }

    public function edit(){
        // editing the positions prices of ads

        //receives data from ajax from position view
       $datas = array(
                    'p_id'=> $this->input->post('id'),
                    'position'=> $this->input->post('position'),
                    'price_per_day'=> $this->input->post('price_per_day'),
                    'size'=> $this->input->post('size'),
                    'available'=> $this->input->post('available'),
                    
                );

      //dump($data);
       $id = $datas['p_id']; //id set 
       //echo "hello";
       $this->ads_m->update($datas,$id); //function call from ads_m model

       // $this->data['subview']='admin/dashboard';
        //$this->load->view('admin/_layout_main',$this->data);

    }


    public function add_ads(){

        //inserting the data into advertisment table

        $files = $_FILES;
        $id_ads = $_POST['id_ads'];
        $price_per_day_ads = $_POST['price_per_day_ads'];
        $duration = $_POST['duration'];
        $customer = $_POST['customer'];
        $phone = $_POST['phone'];

        //dump($id_ads);

        if(!empty($_FILES)){



                    $_FILES['image']['name']= $files['image']['name'];
                    $_FILES['image']['type']= $files['image']['type'];
                    $_FILES['image']['tmp_name']= $files['image']['tmp_name'];
                    $_FILES['image']['error']= $files['image']['error'];
                    $_FILES['image']['size']= $files['image']['size']; 

                    $config['upload_path'] = './images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 1024 * 8;
                    $config['encrypt_name'] = TRUE;
     
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('image')){

                         $msg = $this->upload->display_errors('', '');   
                    
                    }else{
                        $data = $this->upload->data();        

                        $entry_date = date('Y-m-d');
                        $price = $this->input->post('duration') * $this->input->post('price_per_day_ads');

                        $days = "+".$this->input->post('duration')." days";
                        $expiry_date =date('Y-m-d', strtotime($days));

                       

                        $datas['img'] = $data['file_name'];
                        $datas['position'] = $id_ads;
                        $datas['entry_date'] = $entry_date;
                        $datas['duration'] = $duration;
                        $datas['expiry_date'] = $expiry_date;
                        $datas['price'] = $price;
                        $datas['status'] = 1;
                        $datas['customer'] = $customer;
                        $datas['phone'] = $phone;
                        $datas['payment'] = 0;


                        $this->ads_m->addAdvertisment($datas,$id_ads);
                        //$this->ads_m->decreaseAvail($id_ads);
                         //function call from ads_m model
                    }

            
        }
       

    }
   
        
}
