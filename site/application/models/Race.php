<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends CI_Model {

public function get_races()
{
$this->load->database();

try{
    $query = $this->db->get('race');
    return $query->result_array();

            }catch (PDOException $e){

            }

}


public function add_race($name,$location,$description,$date)
 {
 $this->load->database();


 try{

     $data=array('raceName'=>$name,'raceLocation'=>$location,'raceDescription'=>$description,'raceDateTime'=>$date);
     $this->db->insert('race',$data);


             }catch (PDOException $e){

             }

 }
public function get_race($id)
{
$this->load->database();

try{
    $data = array('raceID'=>$id);
    $query = $this->db->get_where('race',$data);
    return $query->result_array();

            }catch (PDOException $e){

            }

}

public function delete_race($id){
$this->load->database();

try{
    $data = array('raceID'=>$id);
  $this->db->delete('race',$data);

            }catch (PDOException $e){

            }


}

public function update_race($name,$location,$description,$date,$id)
 {
 $this->load->database();


 try{

     $data=array('raceName'=>$name,'raceLocation'=>$location,'raceDescription'=>$description,'raceDateTime'=>$date);
        $this->db->where('raceID',$id);
     $this->db->update('race',$data);


             }catch (PDOException $e){

             }

 }



  }


