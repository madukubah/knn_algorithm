<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends Admin_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("m_login");
    $this->load->model("m_store");
    $this->load->model("m_user");  
    $this->load->model("m_admin");
    $this->load->model("m_category_relation");
    $this->load->model("m_item");
    $this->load->model("m_store_item");
    $this->load->helper('array');
    $this->load->library('upload');
    $this->load->model("m_log");
    $this->load->library('form_validation'); 
    
  }
  public function index(  ) {
    $data['page_title'] = "Tambah item";
    $config = array(
        array(
               'field' => 'item_name',
                'rules' =>  'trim|required',
                'errors' => array(
                        'required' => 'Nama item harus di isi'
                ),
        ),
        array(
                'field' => 'item_price',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Harga harus di isi',
                ),
        ),
        array(
                'field' => 'item_description',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Keterangan harus di isi',
                ),
        ),
       array(
                'field' => 'category_id',
                'rules' => 'required',
                'errors' => array(
                        'required' => 'Kategori harus di isi',
                ),
        )
        
     );
     $this->form_validation->set_rules($config);   

     if ($this->form_validation->run() == true) 
     {
        if( empty($this->input->post('store_id')) ){
        $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'isi Toko terlebih dahulu!!'
        ));
                redirect(site_url('/item'));
                return;
        }

        $data_item['item_name'] =$this->input->post('item_name');
        $data_item['item_price'] = $this->input->post('item_price');
        $data_item['item_description'] = $this->input->post('item_description');
        // $data_item['item_facility'] = implode( ";", $this->input->post('kamar_facility[]') );

        $data_item['category_id'] = $this->input->post('category_id');
        if( $data_item['category_id'] != 3 || empty( $this->input->post('kamar_facility[]')  ) )
                $data_item['item_facility'] = "";
        else
                $data_item['item_facility'] = implode( ";", $this->input->post('kamar_facility[]') );
        $data_item['store_id'] = $this->input->post('store_id');
        // echo var_dump( $data_item );
        $location = './upload/item/';
        $photo = "";
        $photo_file_name = array();
        for( $i = 0 ; $i < count( $_FILES['document_file']['name'] ) ; $i++ )
          {
              $name0 =  $_FILES['document_file']['name'][ $i ];
              $name= time()."-item-".$i."-".substr($name0, strpos($name0, '.') );
              $size= $_FILES['document_file']['size'][ $i ];
              $type= $_FILES['document_file']['type'][ $i ];
              $type= strtolower(substr($type, 0, strpos($type, '/')));
              // echo $size;
              // echo "<br>";
              $tmp_name = $_FILES['document_file']['tmp_name'][ $i ];
              if( ( $size  > 540001 ) || ( $type != "image" ) )
                  continue;
              if(move_uploaded_file($tmp_name, $location.$name ))
              {
                  array_push($photo_file_name, $name );
              }
          }
          $photo = implode( ";", $photo_file_name );

          $data_item['item_images'] = $photo;
          $result = $this->m_item->create( $data_item );
            if( $result )
            {
                $data_store_item[ "store_id" ] = $this->input->post('store_id');
                $data_store_item[ "item_id" ] =$this->m_item->get_last( )[ 0 ]->item_id;
                
                $this->m_store_item->create( $data_store_item );
                $this->session->set_flashdata('info', array(
                  'from' => 1,
                  'message' =>  'item berhasil ditambah'
                ));
                // redirect(site_url('kost/detail_kost/').$this->input->post('kost_id') );
                redirect(site_url('/item'));
            }else{
                $this->session->set_flashdata('info', array(
                  'from' => 0,
                  'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect(site_url('/item'));
            }
     }else{
        $data['facilities'] = $this->m_admin->get_facility();
        $data[ "stores" ] = $this->m_store->read( $this->session->userdata('user_id') );
        $data[ "relation_trees" ] = $this->m_category_relation->get_relation_tree(  );
        $this->load->view("_template/header");
        $this->load->view("_template/sidebar_menu");
            $this->load->view("item/View_add_item",$data);
        $this->load->view("_template/footer"); 
     }
  }

  public function edit_item(  ) {
        if( !($_POST) ) redirect(site_url(''));  
        
        $data['page_title'] = "Edit item";
        $config = array(
            array(
                   'field' => 'item_name',
                    'rules' =>  'trim|required',
                    'errors' => array(
                            'required' => 'Nama harus di isi'
                    ),
            ),
            array(
                    'field' => 'item_price',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'Harga harus di isi',
                    ),
            ),
            array(
                    'field' => 'item_description',
                    'rules' => 'required',
                    'errors' => array(
                            'required' => 'Keterangan harus di isi',
                    ),
            )
            
         );
         $this->form_validation->set_rules($config);   
    
         if ($this->form_validation->run() == true) 
         {
            if( empty($this->input->post('store_id')) ){
            $this->session->set_flashdata('info', array(
                    'from' => 0,
                    'message' =>  'isi Toko terlebih dahulu!!'
            ));
                    redirect(site_url('/item'));
                    return;
            }
    
            $data_item['item_name'] =$this->input->post('item_name');
            $data_item['item_price'] = $this->input->post('item_price');
            $data_item['item_description'] = $this->input->post('item_description');
            
                if( empty( $this->input->post('kamar_facility[]')  ) )
                        $data_item['item_facility'] = "";
                else
                        $data_item['item_facility'] = implode( ";", $this->input->post('kamar_facility[]') );
    
        //     $data_item['category_id'] = $this->input->post('category_id');
            $data_item['store_id'] = $this->input->post('store_id');
            // echo var_dump( $data_item );


        //     $location = './upload/item/';
        //     $photo = "";
        //     $photo_file_name = array();
        //     for( $i = 0 ; $i < count( $_FILES['document_file']['name'] ) ; $i++ )
        //       {
        //           $name0 =  $_FILES['document_file']['name'][ $i ];
        //           $name= time()."-item-".$i."-".substr($name0, strpos($name0, '.') );
        //           $size= $_FILES['document_file']['size'][ $i ];
        //           $type= $_FILES['document_file']['type'][ $i ];
        //           $type= strtolower(substr($type, 0, strpos($type, '/')));
        //           // echo $size;
        //           // echo "<br>";
        //           $tmp_name = $_FILES['document_file']['tmp_name'][ $i ];
        //           if( ( $size  > 540001 ) || ( $type != "image" ) )
        //               continue;
        //           if(move_uploaded_file($tmp_name, $location.$name ))
        //           {
        //               array_push($photo_file_name, $name );
        //           }
        //       }
        //       $photo = implode( ";", $photo_file_name );
    
        //       $data_item['item_images'] = $photo;

                $data_item_param['item_id'] = $this->input->post('item_id');
                $result = $this->m_item->update( $data_item, $data_item_param );
                if( $result )
                {
                    $this->session->set_flashdata('info', array(
                      'from' => 1,
                      'message' =>  'item berhasil diubah'
                    ));
                    
                    redirect( site_url('home/detail_store/').$this->input->post('store_id') );
                }else{
                    $this->session->set_flashdata('info', array(
                      'from' => 0,
                      'message' =>  'terjadi kesalahan saat mengirim data'
                    ));
                    redirect( site_url('home/detail_store/').$this->input->post('store_id') );
                }
         }else{
                $this->session->set_flashdata('info', array(
                'from' => 0,
                'message' =>  'terjadi kesalahan saat mengirim data'
                ));
                redirect( site_url('home/detail_store/').$this->input->post('store_id') );
         }
      }

        public function delete_item()
        {
                if( !($_POST) ) redirect(site_url(''));  

                $location = './upload/item/';

                $filename =  $this->input->post('item_images');
                $filename = explode(";", $filename );
                $data_item['item_id'] = $this->input->post('item_id');
                $data_store_item['store_id'] = $this->input->post('store_id');
                $data_store_item['store_item_id'] = $this->input->post('store_item_id');

                $result = $this->m_item->delete($data_item, $data_store_item);
                if( $result )
                {
                        $this->session->set_flashdata('info', array(
                        'from' => 1,
                        'message' =>  'item berhasil dihapus'
                        ));
                        foreach( $filename as $image )
                        {
                        @unlink($location.$image);
                        }
                        redirect( site_url('home/detail_store/').$this->input->post('store_id') );
                }else{
                        $this->session->set_flashdata('info', array(
                        'from' => 0,
                        'message' =>  'terjadi kesalahan saat menghapus data'
                        ));
                        redirect( site_url('home/detail_store/').$this->input->post('store_id') );
                }
        }
}
