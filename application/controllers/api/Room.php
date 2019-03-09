<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

  function __construct() {

    parent::__construct();

    $this->load->model("m_kamar");

    $this->load->model("m_user");

    $this->load->model("m_kost");

    $this->load->model("m_kepemilikan");

    $this->load->helper('array');

  }

  

  public function index(  )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);



    echo json_encode($this->m_kamar->get_all_kamar() );

  }



  public function kost_id( $kost_id )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);



    echo json_encode($this->m_kamar->get_kamar_by_kost_id( $kost_id ) );

  }

  public function detail( $kamar_id )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);



    echo json_encode($this->m_kamar->get_kamar_detail( $kamar_id ) );

  }



  public function available( $order = -1 )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    $start = $this->input->get('start', TRUE);

    if( $start == null )
      $start = 0;

    echo json_encode($this->m_kamar->get_kamar_available( $order, $start ) );
    

  }

  public function hit( $kamar_id )
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo json_encode($this->m_kamar->hit_kamar( $kamar_id ) );
  }

  public function get_facility(  )
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo json_encode( 
      array(
        "value" => $this->m_kost->get_facility(  ) 
      )
    );
  }

  public function add_room(  )
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $message = "";
    if( ! $_POST )
    {
        $message = "";
        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }

    $data_kamar['kamar_type'] =  json_decode(  $this->input->post('kamar_type') );
    $data_kamar['kamar_harga'] = json_decode( $this->input->post('kamar_harga') );
    $data_kamar['kamar_panjang'] = json_decode( $this->input->post('kamar_panjang') );
    $data_kamar['kamar_lebar'] = json_decode( $this->input->post('kamar_lebar') );
    $data_kamar['kamar_quantity'] = json_decode( $this->input->post('kamar_quantity') );
    $data_kamar['kamar_facility'] = json_decode( $this->input->post('kamar_facility') );
    $data_kamar['kamar_facility'] = substr($data_kamar['kamar_facility'], 0, 
        strlen( $data_kamar['kamar_facility'] )-1
    );

    $photo = "";
    $photo_file_name = array();
    $images = array(
        $_FILES['room_image1'],
        $_FILES['room_image2'],
        $_FILES['room_image3']
    );

    $location = './upload/kamar/';
    foreach( $images as $image )
    {
        $size= $image['size'];
        $name = $image['name'];

        $tmp_name = $image['tmp_name'];
        if( ( $size  > 540001 ) )
            continue;
        if(move_uploaded_file($tmp_name, $location.$name ))
        {
            array_push($photo_file_name, $name );
        }
    }
    $photo = implode( ";", $photo_file_name );
    $data_kamar['kamar_foto']  = $photo;

    $message = "terjadi kesalahan saat mengirim data";

    $result = $this->m_kamar->create( $data_kamar );
    if( $result )
    {
        $data_kepemilikan[ "kost_id" ] = json_decode( $this->input->post('kost_id') );
        $data_kepemilikan[ "kamar_id" ] =$this->m_kamar->get_kamar( )[ 0 ]->kamar_id;
        $data_kepemilikan[ "kepemilikan_status" ] = 1 ;
         if( $this->m_kepemilikan->create( $data_kepemilikan ) ) 
         {
              $message = "Kamar berhasil ditambah";
              echo json_encode(
                  array( 
                      "status" => 1,
                      "data" => array($data_kepemilikan,$data_kamar),
                      "message" => $message,
                      )
              );
            return ;
         }else{
            $message = "terjadi kesalahan saat mengirim data kepemilikan";
         }
    }
    echo json_encode(
        array( 
            "status" => 0,
            "data" => array(),
            "message" => $message,
            )
    );
    return ;
  }

  public function edit_room(  )
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $message = "";
    if( ! $_POST )
    {
        $message = "";
        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }

    $data_kamar['kamar_id'] =  json_decode(  $this->input->post('kamar_id') );
    $data_kamar['kamar_type'] =  json_decode(  $this->input->post('kamar_type') );
    $data_kamar['kamar_harga'] = json_decode( $this->input->post('kamar_harga') );
    $data_kamar['kamar_panjang'] = json_decode( $this->input->post('kamar_panjang') );
    $data_kamar['kamar_lebar'] = json_decode( $this->input->post('kamar_lebar') );
    $data_kamar['kamar_quantity'] = json_decode( $this->input->post('kamar_quantity') );
    $data_kamar['kamar_facility'] = json_decode( $this->input->post('kamar_facility') );
    $data_kamar['kamar_facility'] = substr($data_kamar['kamar_facility'], 0, 
                                          strlen( $data_kamar['kamar_facility'] )-1
                                      );
    $filename =  json_decode( $this->input->post('kamar_foto') ); 
    $filename = explode(";", $filename );

    $photo = "";
    $photo_file_name = array();
    $images = array(
        $_FILES['room_image1'],
        $_FILES['room_image2'],
        $_FILES['room_image3']
    );

    $location = './upload/kamar/';
    foreach( $images as $image )
    {
        $size= $image['size'];
        $name = $image['name'];

        $tmp_name = $image['tmp_name'];
        if( ( $size  > 540001 ) )
            continue;
        if(move_uploaded_file($tmp_name, $location.$name ))
        {
            array_push($photo_file_name, $name );
        }
    }
    $photo = implode( ";", $photo_file_name );
    $data_kamar['kamar_foto']  = $photo;

    $message = "terjadi kesalahan saat mengubah data";

    $result = $this->m_kamar->update( $data_kamar );
    if( $result )
    {
        $message = "Kamar berhasil di ubah";
        foreach( $filename as $image )
        {
            @unlink($location.$image);
        }
          echo json_encode(
              array( 
                  "status" => 1,
                  "data" => array($data_kamar),
                  "message" => $message,
                  )
          );
        return ;
    }
    echo json_encode(
        array( 
            "status" => 0,
            "data" => array(),
            "message" => $message,
            )
    );
    return ;
  }

  public function delete_room(  )
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $message = "";
    if( ! $_POST )
    {
        $message = "";
        echo json_encode(
            array( 
                "status" => 0,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }

    $location = './upload/kamar/';

    $filename =  $this->input->post('kamar_foto');
    $filename = explode(";", $filename );

    $data_kamar['kamar_id'] = $this->input->post('kamar_id');
    $data_kepemilikan['kost_id'] = $this->input->post('kost_id');
    $data_kepemilikan['kepemilikan_id'] = $this->input->post('kepemilikan_id');

    $result = $this->m_kamar->delete($data_kamar, $data_kepemilikan);
    $message ="Hapus Kamar Gagal";
    if( $result )
    {
        $message ="Hapus Kamar Berhasil";
        foreach( $filename as $image )
        {
            @unlink($location.$image);
        }
        echo json_encode(
            array( 
                "status" => 1,
                "data" => array(),
                "message" => $message,
                )
        );
        return ;
    }
   
    echo json_encode(
        array( 
            "status" => 0,
            "data" => array(),
            "message" => $message,
            )
    );
    return ;
  }

}