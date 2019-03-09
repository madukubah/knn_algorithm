<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kost extends CI_Controller {

  function __construct() {

    parent::__construct();

    $this->load->model("m_kamar");

    $this->load->model("m_user");

    $this->load->model("m_kost");

    $this->load->model("m_kepemilikan");

    $this->load->helper('array');

  }

  

  public function kost( $kost_id = null  )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    // echo json_encode( $kost_id );

    $start = $this->input->get('start', TRUE);

    if( $start == null )
      $start = 0;

    if( $kost_id == null )
      echo json_encode($this->m_kost->get_all_kost( -1 , $start ) );
    else
      echo json_encode($this->m_kost->get_all_kost( $kost_id, $start ) );

  }

  public function kost_by_userid( $user_id = null  )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);

    // echo json_encode( $user_id );


    if( $user_id == null )
    {
        echo json_encode(
          array(
            "status" => 0,
            "value" => array()
        )
      ); 
    }
    else
      echo json_encode($this->m_kost->kost_by_userid( $user_id ) );

  }


  public function name( $name )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);



    // echo $name;

    // echo json_encode( $name );

    echo json_encode($this->m_kost->get_kost_by_name( $name ) );

  }

  public function address( $address )

  {

    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);


    $address = str_ireplace( "%20", " ", $address );
    // echo $name;

    // echo json_encode( $name );

    echo json_encode($this->m_kost->get_kost_by_address( $address ) );

  }

  public function search( $query )
  {
    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(200);


    $query = str_ireplace( "%20", " ", $query );

    echo json_encode($this->m_kost->search_kost( $query ) );
  }

    public function add_kost(  )
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

        $data_kost['user_id'] = json_decode(  $this->input->post('user_id') );
        $data_kost['kost_name'] = json_decode( $this->input->post('kost_name') );
        $data_kost['kost_address'] = json_decode( $this->input->post('kost_address') );
        $data_kost['kost_latitude'] = "1";
        $data_kost['kost_langitude'] = "1";
        $data_kost['kost_keterangan'] = json_decode( $this->input->post('kost_keterangan') );
        
        
        $tmp_name = $_FILES['kost_image']['tmp_name'];
        $size= $_FILES['kost_image']['size'];
        $location = './upload/kost/';
        
        $data_kost['kost_photo'] = $_FILES['kost_image']['name'];
        
        $message="terjadi kesalahan saat mengunggah gambar (gambar rusak/ terlalu besar)";
        if( ( $size  < 540001  ) )
        {
            if(move_uploaded_file($tmp_name, $location.$_FILES['kost_image']['name']))
            {
                $result = $this->m_kost->create( $data_kost );
                if( $result )
                {
                    $message = "Tambah kost berhasil";
                    echo json_encode(
                        array( 
                            "status" => 1,
                            "data" => array(
                                        $data_kost,
                                        $_FILES['kost_image']
                                        ),
                            "message" => $message,
                            )
                    );
                    return ;
                }else{
                    $message="terjadi kesalahan saat mengunggah data";
                }
            }
        }

    echo json_encode(
            array( 
                "status" => 1,
                "data" => array(
                            $data_kost,
                            $_FILES['kost_image']
                        ),
                "message" => $message,
                )
        );
    return ;
    }
    public function add_kost_and_room_test(  )
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
        $data_kost['user_id'] = (  $this->input->post('user_id') );
        $data_kost['kost_name'] = ( $this->input->post('kost_name') );
        $data_kost['kost_address'] = ( $this->input->post('kost_address') );
        $data_kost['kost_latitude'] = "1";
        $data_kost['kost_langitude'] = "1";
        $data_kost['kost_keterangan'] = ( $this->input->post('kost_keterangan') );

        $kost_location = './upload/kost/';
        $tmp_name = $_FILES['kost_image']['tmp_name'];
        $size= $_FILES['kost_image']['size'];
        $data_kost['kost_photo'] = $_FILES['kost_image']['name'];

        $message="terjadi kesalahan saat mengunggah gambar (gambar rusak/ terlalu besar)";
        if( ( $size  < 540001  ) )
        {
            if(move_uploaded_file($tmp_name, $kost_location.$_FILES['kost_image']['name']))
            {
                $result = $this->m_kost->create( $data_kost );
                if( $result )
                {

                    // data Kamar
                    $data_kamar['kamar_type'] =  (  $this->input->post('kamar_type') );
                    $data_kamar['kamar_harga'] = ( $this->input->post('kamar_harga') );
                    $data_kamar['kamar_panjang'] = ( $this->input->post('kamar_panjang') );
                    $data_kamar['kamar_lebar'] = ( $this->input->post('kamar_lebar') );
                    $data_kamar['kamar_quantity'] = ( $this->input->post('kamar_quantity') );
                    $data_kamar['kamar_facility'] = ( $this->input->post('kamar_facility') );
                    $data_kamar['kamar_facility'] = substr($data_kamar['kamar_facility'], 0, 
                                                        strlen( $data_kamar['kamar_facility'] )-1
                                                    );

                    $photo = "";
                    $photo_file_name = array();
                    $images = array(
                        $_FILES['room_image1'],
                        $_FILES['room_image2'],
                        $_FILES['kost_image']
                    );

                    $room_location = './upload/kamar/';
                    foreach( $images as $image )
                    {
                        $size= $image['size'];
                        $name = $image['name'];

                        $tmp_name = $image['tmp_name'];
                        if( ( $size  > 540001 ) )
                            continue;
                        if(move_uploaded_file($tmp_name, $room_location.$name ) )
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
                        $data_kepemilikan[ "kost_id" ] = $this->m_kost->get_kost( )[0]->kost_id;
                        $data_kepemilikan[ "kamar_id" ] =$this->m_kamar->get_kamar( )[ 0 ]->kamar_id;
                        $data_kepemilikan[ "kepemilikan_status" ] = 1 ;
                        if( $this->m_kepemilikan->create( $data_kepemilikan ) ) 
                        {
                            $message = "kost dan Kamar berhasil ditambah";
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
                    // data Kamar
                }else{
                    $message="terjadi kesalahan saat mengunggah data";
                }
            }
        }

        echo json_encode(
                array( 
                    "status" => 1,
                    "data" => array(
                                $data_kost,
                                $_FILES['kost_image']
                            ),
                    "message" => $message,
                    )
            );
        return ;

    }

    public function add_kost_and_room(  )
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
        $data_kost['user_id'] = json_decode(  $this->input->post('user_id') );
        $data_kost['kost_name'] = json_decode( $this->input->post('kost_name') );
        $data_kost['kost_address'] = json_decode( $this->input->post('kost_address') );
        $data_kost['kost_latitude'] = "1";
        $data_kost['kost_langitude'] = "1";
        $data_kost['kost_keterangan'] = json_decode( $this->input->post('kost_keterangan') );

        $kost_location = './upload/kost/';
        $tmp_name = $_FILES['kost_image']['tmp_name'];
        $size= $_FILES['kost_image']['size'];
        $data_kost['kost_photo'] = $_FILES['kost_image']['name'];

        $message="terjadi kesalahan saat mengunggah gambar (gambar rusak/ terlalu besar)";
        if( ( $size  < 540001  ) )
        {
            if(move_uploaded_file($tmp_name, $kost_location.$_FILES['kost_image']['name']))
            {
                $result = $this->m_kost->create( $data_kost );
                if( $result )
                {

                    // data Kamar
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
                        $_FILES['kost_image']
                    );

                    $room_location = './upload/kamar/';
                    foreach( $images as $image )
                    {
                        $size= $image['size'];
                        $name = $image['name'];

                        $tmp_name = $image['tmp_name'];
                        if( ( $size  > 540001 ) )
                            continue;
                        if(move_uploaded_file($tmp_name, $room_location.$name ) )
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
                        $data_kepemilikan[ "kost_id" ] = $this->m_kost->get_kost( )[0]->kost_id;
                        $data_kepemilikan[ "kamar_id" ] =$this->m_kamar->get_kamar( )[ 0 ]->kamar_id;
                        $data_kepemilikan[ "kepemilikan_status" ] = 1 ;
                        if( $this->m_kepemilikan->create( $data_kepemilikan ) ) 
                        {
                            $message = "kost dan Kamar berhasil ditambah";
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
                    // data Kamar
                }else{
                    $message="terjadi kesalahan saat mengunggah data";
                }
            }
        }

        echo json_encode(
                array( 
                    "status" => 1,
                    "data" => array(
                                $data_kost,
                                $_FILES['kost_image']
                            ),
                    "message" => $message,
                    )
            );
        return ;

    }

    public function edit_kost(  )
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

        $data_kost['kost_id'] = json_decode(  $this->input->post('kost_id') );
        $data_kost['kost_name'] = json_decode( $this->input->post('kost_name') );
        $data_kost['kost_address'] = json_decode( $this->input->post('kost_address') );
        $data_kost['kost_latitude'] = "1";
        $data_kost['kost_langitude'] = "1";
        $data_kost['kost_keterangan'] = json_decode( $this->input->post('kost_keterangan') );
        
        
        $tmp_name = $_FILES['kost_image']['tmp_name'];
        $size= $_FILES['kost_image']['size'];
        $location = './upload/kost/';
        
        $data_kost['kost_photo'] = $_FILES['kost_image']['name'];
        
        $message="terjadi kesalahan saat mengunggah gambar (gambar rusak/ terlalu besar)";
        if( ( $size  < 540001  ) )
        {
            if(move_uploaded_file($tmp_name, $location.$_FILES['kost_image']['name']))
        {
            $old_photo = json_decode(  $this->input->post('kost_old_photo') );
            @unlink($location.$old_photo );

            $result = $this->m_kost->update( $data_kost ); //UPDATE
            if( $result )
            {
                $message = "Edit kost berhasil";
                echo json_encode(
                    array( 
                        "status" => 1,
                        "data" => array(
                                    ),
                        "message" => $message,
                        )
                );
                return ;
            }else{
                $message="terjadi kesalahan saat mengunggah data";
            }
        }
        }
        echo json_encode(
            array( 
                "status" => 1,
                "data" => array(
                            $data_kost,
                            $_FILES['kost_image']
                            ),
                "message" => $message,
                )
            );
        return ;
    }

    public function delete_kost(  )
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

        $data_kost['kost_id'] = $this->input->post('kost_id') ;
        $filename =   $this->input->post('kost_image')  ;
        
        $location = './upload/kost/';
        
        $message=" terjadi kesalahan saat menghapus data";
        if( $this->m_kost->delete( $data_kost ) )
        {
            if( @unlink($location.$filename ) )
            {
                $message = "Hapus kost berhasil";
                echo json_encode(
                    array( 
                        "status" => 1,
                        "data" => array(
                                    ),
                        "message" => $message,
                        )
                );
                return ;
            }else{
                $message="terjadi kesalahan saat menghapus gambar";
            }
        }
        
        echo json_encode(
            array( 
                "status" => 1,
                "data" => array(
                            $data_kost
                            ),
                "message" => $message,
                )
            );
        return ;
    }

}

