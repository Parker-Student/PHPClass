<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {

public function user_login($email,$pwd)
{
$this->load->database();
$this->load->library('session');

try{
                $db = new PDO($this->db->dsn, $this->db->username, $this->db->password, $this->db->options);
                $sql = $db->prepare("select memberID, memberPassword, memberKey from memberLogin where memberEmail = :Email and roleID = 2");
                $sql->bindValue(":Email",$email);
                $sql->execute();
                $row = $sql->fetch();

                if($row!=null){
                    $hashedPassword = md5($pwd.$row["memberKey"]);
                    if($hashedPassword == $row["memberPassword"]){
                    $this->session->set_userdata(array("UID"=>$row["memberID"]));

                        return true;
                } else{
                return false;
                }
                }else{
                 return false;
                }
            }catch (PDOException $e){
                return false;
            }

}

public function add_user($fullname,$email,$password){
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

$this->load->database();
$this->load->library('session');
        include '../includes/dbcon.php';

        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into memberLogin(memberName,memberEmail,memberPassword,roleID,memberKey) VALUE (:Name,:Email,:Password, :RID,:Key)");
            $sql->bindValue(":Name",$fullname);
            $sql->bindValue(":Email",$email);
            $sql->bindValue(":Password",md5($password.$key));
            $sql->bindValue(":RID", "2");
            $sql->bindValue(":Key",$key);
            $sql->execute();

        }
        catch (PDOException $e){
            $error = $e->getMessage();
            echo"Error: $error";
        }
        $fullname = "";
        $email = "";
        $password = "";
        $errmsg="Member added to database";
    }

}
