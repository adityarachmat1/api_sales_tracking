<?php 
 
 require_once 'DbConnect.php';
 
 $response = array();
 
 if(isset($_GET['api'])){
 
 switch($_GET['api']){
 
 case 'call':
 if(isTheseParametersAvailable(array('aktivitas','hasil_aktivitas','nama','email','alamat','jenis_kelamin','no_hp','catatan','type_aktivitas','date_record','assign_by','status'))){
 $aktivitas = $_POST['aktivitas']; 
 $hasil_aktivitas = $_POST['hasil_aktivitas']; 
 $nama = $_POST['nama'];
 $email = $_POST['email']; 
 $alamat = $_POST['alamat']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $no_hp = $_POST['no_hp'];
 $catatan = $_POST['catatan']; 
 $type_aktivitas = $_POST['type_aktivitas'];
 $date_record = $_POST['date_record']; 
 $assign_by = $_POST['assign_by'];
 $status = $_POST['status']; 

 $stmt = $conn->prepare("INSERT INTO data_aktivitas (aktivitas, hasil_aktivitas, nama, email, alamat, jenis_kelamin, no_hp, catatan, type_aktivitas, date_record, assign_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("ssssssssssss", $aktivitas, $hasil_aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $catatan, $type_aktivitas, $date_record, $assign_by, $status);
 
 if($stmt->execute()){
 $stmt = $conn->prepare("SELECT id, id, aktivitas, hasil_aktivitas, nama, email, alamat, jenis_kelamin, no_hp, catatan, type_aktivitas, date_record, assign_by, status FROM data_aktivitas WHERE aktivitas = ?"); 
 $stmt->bind_param("s",$aktivitas);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $aktivitas, $hasil_aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $catatan, $type_aktivitas, $date_record, $assign_by, $status);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'aktivitas'=>$aktivitas, 
 'nama'=>$nama, 
 'email'=>$email,
 'jenis_kelamin'=>$jenis_kelamin,
 'hasil_aktivitas'=>$hasil_aktivitas, 
 'catatan'=>$catatan, 
 'alamat'=>$alamat,
 'type_aktivitas'=>$type_aktivitas,
 'date_record'=>$date_record,
 'assign_by'=>$assign_by,
 'no_hp'=>$no_hp,
 'status'=>$status
 );
 
 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Save successfully'; 
 $response['user'] = $user; 
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'visit':
 if(isTheseParametersAvailable(array('aktivitas','hasil_aktivitas','nama','email','alamat','jenis_kelamin','no_hp','catatan','type_aktivitas','date_record','assign_by','status'))){
 $aktivitas = $_POST['aktivitas']; 
 $hasil_aktivitas = $_POST['hasil_aktivitas']; 
 $nama = $_POST['nama'];
 $email = $_POST['email']; 
 $alamat = $_POST['alamat']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $no_hp = $_POST['no_hp'];
 $catatan = $_POST['catatan']; 
 $type_aktivitas = $_POST['type_aktivitas'];
 $date_record = $_POST['date_record']; 
 $assign_by = $_POST['assign_by'];
 $status = $_POST['status']; 

 $stmt = $conn->prepare("INSERT INTO data_aktivitas (aktivitas, hasil_aktivitas, nama, email, alamat, jenis_kelamin, no_hp, catatan, type_aktivitas, date_record, assign_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("ssssssssssss", $aktivitas, $hasil_aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $catatan, $type_aktivitas, $date_record, $assign_by, $status);
 
 if($stmt->execute()){
 $stmt = $conn->prepare("SELECT id, id, aktivitas, hasil_aktivitas, nama, email, alamat, jenis_kelamin, no_hp, catatan, type_aktivitas, date_record, assign_by, status FROM data_aktivitas WHERE aktivitas = ?"); 
 $stmt->bind_param("s",$aktivitas);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $aktivitas, $hasil_aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $catatan, $type_aktivitas, $date_record, $assign_by, $status);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'aktivitas'=>$aktivitas, 
 'nama'=>$nama, 
 'email'=>$email,
 'jenis_kelamin'=>$jenis_kelamin,
 'hasil_aktivitas'=>$hasil_aktivitas, 
 'catatan'=>$catatan, 
 'alamat'=>$alamat,
 'type_aktivitas'=>$type_aktivitas,
 'date_record'=>$date_record,
 'assign_by'=>$assign_by,
 'no_hp'=>$no_hp,
 'status'=>$status
 );
 
 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Save successfully'; 
 $response['user'] = $user; 
 }
 
 }else{
 $response['status'] = 1; 
 $response['message'] = 'required parameters are not available'; 
 }
 
 break; 
 
 case 'closing':
 if(isTheseParametersAvailable(array('aktivitas','nama','email','alamat','jenis_kelamin','no_hp','type_aktivitas','date_record','assign_by','status','type_transfer','akun_bank','nominal', 'tanggal_transfer'))){
 $aktivitas = $_POST['aktivitas']; 
 $nama = $_POST['nama'];
 $email = $_POST['email']; 
 $alamat = $_POST['alamat']; 
 $jenis_kelamin = $_POST['jenis_kelamin']; 
 $no_hp = $_POST['no_hp'];
 $type_aktivitas = $_POST['type_aktivitas'];
 $date_record = $_POST['date_record']; 
 $assign_by = $_POST['assign_by'];
 $status = $_POST['status']; 
 $type_transfer = $_POST['type_transfer'];
 $akun_bank = $_POST['akun_bank']; 
 $nominal = $_POST['nominal'];
 $tanggal_transfer = $_POST['tanggal_transfer']; 

 $stmt = $conn->prepare("INSERT INTO data_aktivitas (aktivitas, nama, email, alamat, jenis_kelamin, no_hp, type_aktivitas, date_record, assign_by, status, type_transfer, akun_bank, nominal, tanggal_transfer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("ssssssssssssss", $aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $type_aktivitas, $date_record, $assign_by, $status, $type_transfer, $akun_bank, $nominal, $tanggal_transfer);
 
 
 if($stmt->execute()){
 $stmt = $conn->prepare("SELECT id, id, aktivitas, nama, email, alamat, jenis_kelamin, no_hp, type_aktivitas, date_record, assign_by, status, type_transfer, akun_bank, nominal, tanggal_transfer FROM data_aktivitas WHERE aktivitas = ?"); 
 $stmt->bind_param("s",$aktivitas);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $aktivitas, $nama, $email, $alamat, $jenis_kelamin, $no_hp, $type_aktivitas, $date_record, $assign_by, $status, $type_transfer, $akun_bank, $nominal, $tanggal_transfer);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'aktivitas'=>$aktivitas, 
 'nama'=>$nama, 
 'email'=>$email,
 'jenis_kelamin'=>$jenis_kelamin,
 'alamat'=>$alamat,
 'type_aktivitas'=>$type_aktivitas,
 'date_record'=>$date_record,
 'assign_by'=>$assign_by,
 'no_hp'=>$no_hp,
 'status'=>$status,
 'type_transfer'=>$type_transfer,
 'akun_bank'=>$akun_bank,
 'nominal'=>$nominal,
 'tanggal_transfer'=>$tanggal_transfer
 );
 
 $stmt->close();
 
 $response['status'] = 0; 
 $response['message'] = 'Save successfully'; 
 $response['user'] = $user; 
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