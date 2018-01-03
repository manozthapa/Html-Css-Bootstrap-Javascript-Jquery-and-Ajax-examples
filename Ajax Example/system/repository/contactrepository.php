<?php

class ContactRepository{

	public function insert($params){
		$db=new mysqli("localhost","root","","mypasal");
		$sql="INSERT INTO tbl_contacts(contact_name,contact_email,subject,department,message)VALUES(?,?,?,?,?)";

		$stmt=$db->prepare($sql);
		
		$name=$params['name'];
		$email=$params['email'];
		$subject=$params['subject'];
		$message=$params['message'];
		$department=$params['department'];
		
		
		$stmt->bind_param('sssss',$name,$email,$subject,$department,$message);
		
		$result=$stmt->execute();

		$db->close();

		return $result;

	}

	public function getAll(){
		$contacts=array(); 
		$db=new mysqli("localhost","root","","mypasal");
		$sql="SELECT * FROM tbl_contacts order by contact_id desc";
		$result=$db->query($sql);
		while($row=$result->fetch_assoc()){
			$contacts[]=$row;
		}
		$db->close();
		return $contacts;
	}

	public function delete($id){
		$db=new mysqli("localhost","root","","mypasal");
		$sql="DELETE FROM tbl_contacts where contact_id=?";

		$stmt=$db->prepare($sql);
		

		
		$stmt->bind_param('i',$id);
		
		$result=$stmt->execute();

		$db->close();

		return $result;
	}
}