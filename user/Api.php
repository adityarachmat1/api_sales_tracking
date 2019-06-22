<?php 
 
 require_once 'DbConnect.php';
 
 $response = array();
 
 if(isset($_GET['apicall'])){
 
 switch($_GET['apicall']){
 
 case 'register':
 if(isTheseParametersAvailable(array('cabang','email','password','jenis_kelamin','type_account','nama','alamat','tgl_lahir','nomor_hanphone'))){
 $cabang = $_POST['cabang']; 
 $email = $_POST['email']; 
 $password = md5($_POST['password']);
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $type_account = $_POST['type_account']; 
 $nama = $_POST['nama']; 
 $alamat = $_POST['alamat'];
 $tgl_lahir = $_POST['tgl_lahir']; 
 $nomor_hanphone = $_POST['nomor_hanphone']; 
 
 $stmt = $conn->prepare("SELECT id FROM users WHERE nama = ? OR email = ? OR type_account = ?");
 $stmt->bind_param("sss", $nama, $email, $type_account);
 $stmt->execute();
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 $response['status'] = 3;
 $response['message'] = 'User already registered';
 $stmt->close();
 }else{
 $stmt = $conn->prepare("INSERT INTO users (cabang, email, password, jenis_kelamin, type_account, nama, alamat, tgl_lahir, nomor_hanphone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("sssssssss", $cabang, $email, $password, $jenis_kelamin, $type_account, $nama, $alamat, $tgl_lahir, $nomor_hanphone);
 
 if($stmt->execute()){
 $stmt = $conn->prepare("SELECT id, id, cabang, email, jenis_kelamin, type_account, nama, alamat, tgl_lahir, nomor_hanphone FROM users WHERE nama = ?"); 
 $stmt->bind_param("s",$cabang);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $cabang, $email, $jenis_kelamin, $type_account, $nama, $alamat, $tgl_lahir, $nomor_hanphone);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'cabang'=>$nama_anak, 
 'email'=>$email,
 'jenis_kelamin'=>$jenis_kelamin,
 'type_account'=>$type_account, 
 'nama'=>$nama, 
 'alamat'=>$alamat,
 'tgl_lahir'=>$tgl_lahir,
 'nomor_hanphone'=>$nomor_hanphone
 );
 
 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'User registered successfully'; 
 $response['user'] = $user; 
 }
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'login':
 
 if(isTheseParametersAvailable(array('email', 'password'))){
 
 $email = $_POST['email'];
 //$password = md5($_POST['password']); 
 $password = $_POST['password'];
 
 $stmt = $conn->prepare("SELECT id, cabang, email, jenis_kelamin, type_account, nama, alamat, tgl_lahir, nomor_hanphone FROM users WHERE email = ? AND password = ?");
 $stmt->bind_param("ss",$email, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($id, $cabang, $email, $jenis_kelamin, $type_account, $nama, $alamat, $tgl_lahir, $nomor_hanphone);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'cabang'=>$cabang, 
 'email'=>$email,
 'jenis_kelamin'=>$jenis_kelamin,
 'type_account'=>$type_account, 
 'nama'=>$nama, 
 'alamat'=>$alamat,
 'tgl_lahir'=>$tgl_lahir,
 'nomor_hanphone'=>$nomor_hanphone
 );
 
 $response['status'] = 0; 
 $response['message'] = 'Login successfull'; 
 $response['user'] = $user; 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'Email salah atau Password salah';
 }
 }
 break; 
 
 case 'edit_donatur':
 if(isTheseParametersAvailable(array('email','jenis_kelamin','nama','alamat','tgl_lahir','nomor_hanphone','id'))){
 $id_donatur = $_POST['id']; 
 $email = $_POST['email']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $nama = $_POST['nama']; 
 $alamat = $_POST['alamat'];
 $tgl_lahir = $_POST['tgl_lahir']; 
 $nomor_hanphone = $_POST['nomor_hanphone']; 
 
 $sql = "UPDATE users SET email='$email',jenis_kelamin='$jenis_kelamin',nama='$nama',alamat='$alamat',tgl_lahir='$tgl_lahir',nomor_hanphone='$nomor_hanphone' where id='$id_donatur'";
 $stmt = $conn->prepare($sql);
 
 if($stmt->execute()){

 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Edit successfully';
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'create_donatur':
 if(isTheseParametersAvailable(array('email','jenis_kelamin','nama','alamat','tgl_lahir','nomor_hanphone','id'))){
 $id_donatur = $_POST['id']; 
 $email = $_POST['email']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $nama = $_POST['nama']; 
 $alamat = $_POST['alamat'];
 $tgl_lahir = $_POST['tgl_lahir']; 
 $nomor_hanphone = $_POST['nomor_hanphone'];
    
 $stmt = $conn->prepare("INSERT INTO users (email, jenis_kelamin, type_account, nama, alamat, tgl_lahir, nomor_hanphone, type) VALUES (?, ?, '2', ?, ?, ?, ?, 'Donatur')");
 $stmt->bind_param("ssssss", $email, $jenis_kelamin, $nama, $alamat, $tgl_lahir, $nomor_hanphone);
 
 if($stmt->execute()){

 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Create Donatur successfully';
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'create_akun':
 if(isTheseParametersAvailable(array('email','jenis_kelamin','nama','alamat','tgl_lahir','nomor_hanphone','id','cabang','password','type','type_desc'))){
 $id_donatur = $_POST['id']; 
 $email = $_POST['email']; 
 $cabang = $_POST['cabang']; 
 $password = $_POST['password']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $nama = $_POST['nama']; 
 $alamat = $_POST['alamat'];
 $tgl_lahir = $_POST['tgl_lahir']; 
 $nomor_hanphone = $_POST['nomor_hanphone'];
 $type = $_POST['type'];
 $type_desc = $_POST['type_desc'];
    
 $stmt = $conn->prepare("INSERT INTO users (email, jenis_kelamin, type_account, nama, alamat, tgl_lahir, nomor_hanphone, type, password, cabang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("ssssssssss", $email, $jenis_kelamin, $type, $nama, $alamat, $tgl_lahir, $nomor_hanphone, $type_desc, $password, $cabang);
 
 if($stmt->execute()){

 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Create Account successfully';
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'check_status':
 
 if(isTheseParametersAvailable(array('id','status'))){
 
 $id = $_POST['id'];
 $status = $_POST['status'];
 
 $stmt = $conn->prepare("SELECT id, status FROM users WHERE id = ? AND status = ?");
 $stmt->bind_param("ss",$id,$status);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($id, $status);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'status_closing'=>$status
 );
 
 $response['status'] = 0; 
 $response['user'] = $user; 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'Donatur sudah di closing';
 }
 }
 break; 
 
 case 'update_status_donatur':
 if(isTheseParametersAvailable(array('id','status'))){
 $id_donatur = $_POST['id']; 
 $status = $_POST['status'];
 
 $sql = "UPDATE users SET status='$status' where id='$id_donatur'";
 $stmt = $conn->prepare($sql);
 
 if($stmt->execute()){

 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Closing successfully';
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 default: 
 $response['status'] = 2; 
 $response['message'] = 'Invalid Operation Called';
 }
 
 }else{
 $response['status'] = 3; 
 $response['message'] = 'Invalid API Call';
 }
 
 echo json_encode($response);
 
 function isTheseParametersAvailable($params){
 
 foreach($params as $param){
 if(!isset($_POST[$param])){
 return false; 
 }
 }
 return true; 
 }