<?php

require APPPATH . 'libraries/REST_Controller.php';

require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
class Notification extends REST_Controller
{
    /**
     * constructor
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Employees');
        $this->load->model('Users');
    }

   
public function pushtoall_post()
{

$request = $this->post();
$title = $request["title"];
$body = $request["body"];
$ch = curl_init("https://fcm.googleapis.com/fcm/send");

//The device token.
$token = "/topics/all";//"device_token_here";

//Title of the Notification.
//$title = "The North Remembers";

//Body of the Notification.
//$body = "Bear island knows no king but the king in the north, whose name is stark.";

//Creating the notification array.
$notification = array('title' =>$title , 'body' => $body);

//This array contains, the token and the notification. The 'to' attribute stores the token.
$arrayToSend = array('to' => $token, 'notification' => $notification);

//Generating JSON encoded string form the above array.
$json = json_encode($arrayToSend);
$url = "https://fcm.googleapis.com/fcm/send";
//Setup headers:
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key=AAAAOEbzKiA:APA91bGp-eVITkQPGTsh2DXhSQPLzVxEgSLXquRs6Oy-zvGSWAkWZtaaIv_ZbUXHzEY016iekD0gEx3RItFdRdPwVbKMXAGHQ0S63OhAM0oH1bA-sVP4VIfAvFCSfi3n5BPUnLQHeQGF';

//Setup curl, add headers and post parameters.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

curl_setopt( $ch,CURLOPT_URL, $url);
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
$result = curl_exec($ch );
print($result);

//Send the request
//curl_exec($ch);

//Close request
curl_close($ch);
$this->PushToAllWeb($title, 'my_memos');

}




public function pushtouser_post()
{
    $request = $this->post();
    $id = $request["id"];
    $title = $request["title"];
    $body = $request["body"];
    $link = $request["link"];
    $token = $this->getUserToken($id);
    if($token !=null)
    {
        $this->pushtoToken($token, $title, $body);
    }

    //$this->PushNotification($id,$title,$link);
    
}



public function pushtoToken($token, $title, $body)
{

$ch = curl_init("https://fcm.googleapis.com/fcm/send");


//Creating the notification array.
$notification = array('title' =>$title , 'body' => $body);

//This array contains, the token and the notification. The 'to' attribute stores the token.
$arrayToSend = array('to' => $token, 'notification' => $notification);

//Generating JSON encoded string form the above array.
$json = json_encode($arrayToSend);
$url = "https://fcm.googleapis.com/fcm/send";
//Setup headers:
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: key=AAAAOEbzKiA:APA91bGp-eVITkQPGTsh2DXhSQPLzVxEgSLXquRs6Oy-zvGSWAkWZtaaIv_ZbUXHzEY016iekD0gEx3RItFdRdPwVbKMXAGHQ0S63OhAM0oH1bA-sVP4VIfAvFCSfi3n5BPUnLQHeQGF';

//Setup curl, add headers and post parameters.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       

curl_setopt( $ch,CURLOPT_URL, $url);
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
$result = curl_exec($ch );
print($result);

//Send the request
//curl_exec($ch);

//Close request
curl_close($ch);
}





public function pushtoadmin_post(){
     $request = $this->post();
    $title = $request["title"];
    $body = $request["body"];
    $link = $request["link"];  
    $tokens = $this->getAdminTokens();
   // var_dump($tokens);
    if ($tokens!= null && count($tokens)>0)
    {
        foreach($tokens as $token){
            if($token!= null && strlen(trim($token))> 0)
            {
                $this->pushtoToken($token, $title, $body);
            }
        }
    }

   $ids =  $this->getAdminIds();
   if ($ids!= null && count($ids)>0)
   {
       foreach($ids as $id){
           if($id!= null && strlen(trim($id))> 0)
           {
               $this->PushNotification($id,$title,$link);
           }
       }
   }
}




public function gettoken($id)
{
    $request = $this->post();
    $user_id = $request["user"];
    $query = $this->db->query("SELECT user_device_token FROM  user  WHERE user_id ='$id'");
    if ($query) {
        $data = $this->objectToArray($query->result());
        return $data[0]["user_device_token"];
        //$this->response($query->result(), REST_Controller::HTTP_OK);
    } else {
      return null;
    }
}


public function getAdminTokens(){

    $query = $this->db->query("SELECT u.user_device_token FROM  user u JOIN permission p ON u.user_username = p.username WHERE p.employee_management ='1'");
    if ($query) {
        $tokens=array();
        $data = $this->objectToArray($query->result());
        foreach($data as $token){
            $tokens[] = $token["user_device_token"];
            //print $token["user_device_token"];
        }
        //var_dump($tokens);
        return $tokens;
        //return $data[0]["user_device_token"];
        //$this->response($query->result(), REST_Controller::HTTP_OK);
    } else {
      return null;
    }
}



public function getAdminIds()
{
    $query = $this->db->query("SELECT e.employee_id FROM  employee e JOIN user u ON e.employee_unique_id = u.user_username JOIN permission p ON u.user_username = p.username WHERE p.employee_management ='1'");
    if ($query) {
        $ids=array();
        $data = $this->objectToArray($query->result());
        foreach($data as $id){
            $ids[] = $id["employee_id"];
            //print $token["user_device_token"];
        }
        //var_dump($tokens);
        return $ids;
        //return $data[0]["user_device_token"];
        //$this->response($query->result(), REST_Controller::HTTP_OK);
    } else {
      return null;
    }
}




public function getUserToken($id){

    /* $request = $this->post();
    $id = $request["id"]; */
    $query = $this->db->query("SELECT u.user_device_token FROM user u JOIN employee e ON u.user_username = e.employee_unique_id WHERE e.employee_id ='$id'");
    if ($query && $query->num_rows()>0) {
        $tokens=array();
        $data = $this->objectToArray($query->result());
        foreach($data as $token){
            $tokens[] = $token["user_device_token"];
        }
       //var_dump($tokens[0]);
        return$tokens[0];
    } else {
      return null;
    }
}


public function objectToArray($data)
{
    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(array($this, 'objectToArray'), $data);
    }

    return $data;
}


public function PushNotification($employee_id, $message, $link)
{
    $notification_data = array(
        'notification_employee_id'=> $employee_id,
        'notification_link'=> $link,
        'notification_type' => $message,
        'notification_status'=> 0
    );

    $this->Employees->insert_notifications($notification_data);
}

public function PushToAllWeb($message, $link)
{
    $employees = $this->Employees->view_employees();

	foreach ($employees as $employee){
	$notification_data = array(
	'notification_employee_id'=> $employee->employee_id,
	'notification_link'=>$link, //'my_memos',
	'notification_type' => $message,
	'notification_status'=> 0
    );
    
    $this->Employees->insert_notifications($notification_data);
    }			

}




}
