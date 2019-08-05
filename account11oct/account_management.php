<?php

class account_management_classes
{
//=========================== class section ===================================
	function get_class_details()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `class`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"class_id" => $row['class_id'],
				"class_name" => $row['class_name'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_fee_by_class_name($class_name,$feetype)
	{
		require("../config/config.php");
		$result = mysqli_query($db,"SHOW COLUMNS FROM `class` LIKE '$feetype'");
		$exists = (mysqli_num_rows($result))?TRUE:FALSE;
if($exists) {
   // do your stuff
	$result = mysqli_query($db, "SELECT $feetype FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->$feetype;
}
		else
			return 0;
	}

	function get_classId_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT class_id FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->class_id;
	}

	function get_tution_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT tution_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->tution_fee;
	}

	function get_computer_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT computer_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->computer_fee;
	}

	function get_hostel_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT hostel_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->hostel_fee;
	}

	function get_admission_charge_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT admission_charge FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->admission_charge;
	}

	function get_annual_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT annual_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->annual_fee;
	}

	function get_exam_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT exam_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->exam_fee;
	}

	
	function get_book_fee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT book_fee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->book_fee;
	}

	function get_monthly_testfee_by_class_name($class_name)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT monthly_testfee FROM `class` WHERE class_name='$class_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->monthly_testfee;
	}

	function get_bus_fee_rate_by_bus_id($bus_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT bus_fee_rate FROM `transportation` WHERE bus_id='$bus_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bus_fee_rate;
	}

//============================== End class section ============================
//============================== student record section =======================
	function get_fee_by_feetype_student_id($sid,$feetype)
	{
		//require("../config/config.php");
		if($feetype=='Tution Fee')
		{
			
		// $result = mysqli_query($db, "SELECT tution_discount_percent,sclass FROM `studentinfo` where sid='$student_id'");
		// $value = mysqli_fetch_object($result);
		// mysqli_close($db);
		// $tution_discount_percent = $value->tution_discount_percent;
		// $sclass = $value->sclass;
		$tution_fee = $this->get_tution_rate_by_sid($sid);
		// $new_tution_fee = $tution_fee-($tution_fee*$tution_discount_percent)/100;
		return $tution_fee;
		}

		else if($feetype=='Hostel Fee')
		{
		// $result = mysqli_query($db, "SELECT hostel_discount_percent,sclass FROM `studentinfo` where sid='$student_id'");
		// $value = mysqli_fetch_object($result);
		// mysqli_close($db);
		// $hostel_discount_percent = $value->hostel_discount_percent;
		// $sclass = $value->sclass;
		 $hostel_fee = $this->get_hostel_rate_by_sid($sid);
		// $hostel_fee = $hostel_fee-($hostel_fee*$hostel_discount_percent)/100;
		return $hostel_fee;
		}

		else if($feetype=='Bus Fee')
		{
		// $result = mysqli_query($db, "SELECT bus_discount_percent,sclass,bus_id FROM `studentinfo` where sid='$student_id'");
		// $value = mysqli_fetch_object($result);
		// mysqli_close($db);
		// $bus_discount_percent = $value->bus_discount_percent;
		// $bus_id = $value->bus_id;
		$bus_fee_rate = $this->get_bus_rate_by_sid($sid);
		// $new_bus_fee_rate = $bus_fee_rate - ($bus_fee_rate*$bus_discount_percent)/100;
		return $bus_fee_rate;
		}

		else if($feetype=='Computer Fee')
		{
		// $result = mysqli_query($db, "SELECT computer_discount_percent,sclass FROM `studentinfo` where sid='$student_id'");
		// $value = mysqli_fetch_object($result);
		// mysqli_close($db);
		// $computer_discount_percent = $value->computer_discount_percent;
		// $sclass = $value->sclass;
		 $computer_fee = $this->get_computer_fee_by_sid($sid);
		//$new_computer_fee = $computer_fee-($computer_fee*$computer_discount_percent)/100;
		return $computer_fee;
		}


		
	}


	
	function get_tution_rate_by_sid($sid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  tution_fee FROM `studentinfo` where sid='$sid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->tution_fee;
	}
	function get_bus_rate_by_sid($sid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  bus_fee FROM `studentinfo` where sid='$sid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bus_fee;
	}

	function get_hostel_rate_by_sid($sid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  hostel_fee FROM `studentinfo` where sid='$sid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->hostel_fee;
	}

	function get_computer_fee_by_sid($sid)
	{
		require ("../config/config.php");
		$result=mysqli_query($db,"SELECT computer_fee FROM `studentinfo` WHERE sid='$sid'");
		$value=mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->computer_fee;
	}


	function get_max_student_id()
		{
			require("../config/config.php");
			$result = mysqli_query($db, "SELECT max(sid) as 'sid'  FROM `studentinfo`");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return $value->sid;
		}

		function search($search_term)
		{
			require("../config/config.php");
			$response = array();
			$result = mysqli_query($db, "SELECT * FROM studentinfo WHERE sname LIKE '%$search_term%' or sadmsnno LIKE '%$search_term%' or sroll LIKE '%$search_term%' or spname LIKE '%$search_term%'or ssec LIKE '%$search_term%'or saddress LIKE '%$search_term%'");
			while($row = mysqli_fetch_assoc($result))
			{
				array_push($response,array(
					"sid" => $row['sid'],
					"sname" => $row['sname'],
					"sadmsnno" => $row['sadmsnno'],
					"dob" => $row['dob'],
					"spname" => $row['spname'],
					"spnumber" => $row['spnumber'],
					"sname" => $row['sname'],
					"sroll" => $row['sroll'],
					"saddress" => $row['saddress'],
					"sclass" => $row['sclass'],
					"ssec" => $row['ssec'],
					"tution_rate" => $row['tution_rate'],
					"bus_rate" => $row['bus_rate'],
					"hostel_rate" => $row['hostel_rate'],
					));
			}
			mysqli_close($db);
			return json_encode($response);
		}

function get_student_details()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM studentinfo LEFT JOIN parents ON studentinfo.`sparent_id`=`parents`.`parent_id` WHERE `status`=0");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"sid" => $row['sid'],
				"sname" => $row['sname'],
				"sadmsnno" => $row['sadmsnno'],
				"sadmsnno" => $row['sadmsnno'],
				"dob" => $row['dob'],
				"spname" => $row['spname'],
				"spnumber" => $row['spnumber'],
				"sname" => $row['sname'],
				"sroll" => $row['sroll'],
				"saddress" => $row['saddress'],
				"sclass" => $row['sclass'],
				"ssec" => $row['ssec'],
				"bus_id" => $row['bus_id'],
				
				"tution_fee" => $row['tution_fee'], 
				"computer_fee" => $row['computer_fee'],
				"bus_fee" => $row['bus_fee'],
				"hostel_fee" => $row['hostel_fee'],
				"payment_type"=>$row['payment_type'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_student_details_by_className($className)
	{
		$classId = $this->get_classId_by_class_name($className);
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM  studentinfo LEFT JOIN parents ON studentinfo.`sparent_id`=`parents`.`parent_id` where sclass='$classId' ");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"sid" => $row['sid'],
				"sname" => $row['sname'],
				"sadmsnno" => $row['sadmsnno'],
				"sadmsnno" => $row['sadmsnno'],
				"dob" => $row['dob'],
				"spname" => $row['spname'],
				"spnumber" => $row['spnumber'],
				"sname" => $row['sname'],
				"sroll" => $row['sroll'],
				"saddress" => $row['saddress'],
				"sclass" => $row['sclass'],
				"ssec" => $row['ssec'],
				"bus_id" => $row['bus_id'],
				
				"tution_discount_percent" => $row[0], 
				"computer_discount_percent" => $row[0],
				"bus_discount_percent" => $row[0],
				"hostel_discount_percent" => $row[0],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_student_details_by_studentId($sid)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM  studentinfo LEFT JOIN parents ON studentinfo.`sparent_id`=`parents`.`parent_id` where sid='$sid' ");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"sid" => $row['sid'],
				"sname" => $row['sname'],
				"sadmsnno" => $row['sadmsnno'],
				"sadmsnno" => $row['sadmsnno'],
				"dob" => $row['dob'],
				"spname" => $row['spname'],
				"spnumber" => $row['spnumber'],
				"sname" => $row['sname'],
				"sroll" => $row['sroll'],
				"saddress" => $row['saddress'],
				"sclass" => $row['sclass'],
				"ssec" => $row['ssec'],
				"bus_id" => $row['bus_id'],
				"payment_type"=>$row['payment_type'],
				"tution_discount_percent" => $row['tution_discount_percent'], 
				"computer_discount_percent" => $row['computer_discount_percent'],
				"bus_discount_percent" => $row['bus_discount_percent'],
				"hostel_discount_percent" => $row['hostel_discount_percent'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}


	function get_student_details_by_sid($sid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM studentinfo LEFT JOIN parents ON studentinfo.`sparent_id`=`parents`.`parent_id` where studentinfo.`sid`= '$sid' ");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);
	}

	function get_student_id_by_className($className)
	{
		require("../config/config.php");
		$className = $this->get_student_class_id_by_name($className);
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `studentinfo` where sclass='$className'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"sid" => $row['sid'],
				"sname" => $row['sname'],
			));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_bus_id_by_student_id($student_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT bus_id FROM transportation where`stid`= '$student_id' ");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bus_id;
	}	

	function get_student_name_by_student_id($student_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT sname FROM studentinfo where`sid`= '$student_id' ");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->sname;
	}	
//============================== end student record section ===================
	
//================== student bill section =======================================

	function insert_student_bill($bill_print_id,$std_id, $feetype_id, $balance, $payment, $discount, $paid, $fine, $update_date, $last_payment_date,$description,$userName, $status)
	{
		require("../config/config.php");
		$qry = "INSERT INTO `student_bill` (`bill_id`, `bill_print_id`, `std_id`, `feetype_id`, `balance`, `payment`, `discount`, `paid`, `fine`, `update_date`, `last_payment_date`, `description`, `user_name`, `status`) VALUES (null,'$bill_print_id','$std_id', '$feetype_id', '$balance', '$payment', '$discount', '$paid', '$fine', '$update_date', '$last_payment_date','$description','$userName', '$status')";
        mysqli_query($db,$qry);
        mysqli_close($db);
        $this->createlog($qry);
	}

	function insert_data_into_student_bill($std_id, $feetype_id, $balance, $payment, $discount, $paid, $fine, $update_date, $last_payment_date, $status)
	{
		require("../config/config.php");
		$qry="INSERT INTO `student_bill` (`bill_id`, `std_id`, `feetype_id`, `balance`, `payment`, `discount`, `paid`, `fine`, `update_date`, `last_payment_date`, `status`) VALUES (null,'$std_id', '$feetype_id', '$balance', '$payment', '$discount', '$paid', '$fine', '$update_date', '$last_payment_date', '$status')";
		$result = mysqli_query($db,$qry );
		mysqli_close($db);
		$this->createlog($qry);
	}

	function update_student_bill($bill_id,$bill_print_id,$payment,$discount,$paid,$fine,$last_payment_date,$description,$user_name, $status,$paidby)
	{
		require("../config/config.php");
		$qry="UPDATE `student_bill` SET `bill_print_id`='$bill_print_id',`bill_print_id`='$bill_print_id', `payment`='$payment',`discount`='$discount',`paid`= '$paid',`fine`= '$fine',`last_payment_date`='$last_payment_date',`description`='$description',`user_name`='$user_name',`status`='$status' ,`paid_by`='$paidby' WHERE bill_id='$bill_id'";
        mysqli_query($db, $qry);
        mysqli_close($db);
		$this->createlog($qry);


	}

	function update_student_bill_add_deu($bill_id,$balance,$date,$description,$status)
	{
		require("../config/config.php");
		$qry = "UPDATE `student_bill` SET balance='$balance', `description`='$description',`status`='$status'  WHERE bill_id='$bill_id'";
        mysqli_query($db, $qry);
        mysqli_close($db);
		$this->createlog($qry);

       
	}
	
	function update_balance_by_bill_id($balance,$bill_id)
	{
		global $nepaliDate;
		$current_date = $nepaliDate->full;
		require("../config/config.php");
		$qry="update `student_bill` set balance='$balance',update_date='$current_date' where bill_id='$bill_id'";
		$result = mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

		
	}

	function get_bill_details_by_bill_id_std_id($bill_print_id,$std_id)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `student_bill` where bill_print_id='$bill_print_id' and std_id='$std_id'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"update_date" => $row['update_date'],
				"last_payment_date" => $row['last_payment_date'],
				"description" => $row['description'],
				"user_name" => $row['user_name'],
				"status" => $row['status'],
				
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

//this function has been modified by karna khatri to get statement for paid list only .Pending are excluded
	function get_statement_by_student_id_single_date($student_id,$date)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `student_bill` where std_id='$student_id' and status='Paid' and last_payment_date like '%$date%'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"bill_print_id" => $row['bill_print_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"last_payment_date" => $row['last_payment_date'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	//this function has been modified by karna for getting list of paid status only 

	function get_student_statement_by_student_id_and_twodate($student_id,$first_date,$second_date)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `student_bill` where std_id='$student_id' and status='Paid' and last_payment_date>= '$first_date' and last_payment_date<='$second_date'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"bill_print_id" => $row['bill_print_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"last_payment_date" => $row['last_payment_date'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}


	function get_max_bill_id_by_feetype_id_sid($feetype_id,$sid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT max(bill_id) as 'bill_id'  FROM `student_bill` where std_id='$sid' and feetype_id='$feetype_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bill_id;
	}

	function get_update_date_by_bill_id($bill_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT update_date  FROM `student_bill` where bill_id='$bill_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		if($value->update_date=='')
		{
			return 'null';
		}
		else
		{
			return $value->update_date;
		} 
		
	}
	
	function get_student_bill_details_by_bill_id($bill_id)
		{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT balance,update_date,status  FROM `student_bill` where bill_id='$bill_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);		
		}




	function get_pending_amount_by_status_sid($status,$sid)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `student_bill` where status!='$status' and std_id='$sid'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"update_date" => $row['update_date'],
				"last_payment_date" => $row['last_payment_date'],
				"status" => $row['status'],
				
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_pending_list_by_sid($sid)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `student_bill` where status='Pending' and std_id='$sid'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"update_date" => $row['update_date'],
				"last_payment_date" => $row['last_payment_date'],
				"status" => $row['status'],
				
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_balance_by_bill_id($bill_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  balance FROM `student_bill` where bill_id='$bill_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		if($value->balance == 0)
		{
			return 0;
		}
		else
		{
			return $value->balance;
		}
	}

	function get_student_bill_deatails_by_bill_id($bill_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  * FROM `student_bill` where bill_id='$bill_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		if(empty($value))
		{
			return "null";
		}
		else
		{
			return $value;
		}
		
	}


	function get_status_by_bill_id($bill_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  status FROM `student_bill` where bill_id='$bill_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->status;
	}

	function get_stdent_bill_record_by_current_date()
	{
		require("../config/config.php");
		global $nepaliDate;
		$current_date = $nepaliDate->full;
		$response = array();
		$result = mysqli_query($db, "SELECT  * FROM `student_bill` where last_payment_date='$current_date' and status='Paid'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"bill_id" => $row['bill_id'],
				"std_id" => $row['std_id'],
				"feetype_id" => $row['feetype_id'],
				"balance" => $row['balance'],
				"payment" => $row['payment'],
				"discount" => $row['discount'],
				"paid" => $row['paid'],
				"fine" => $row['fine'],
				"update_date" => $row['update_date'],
				"last_payment_date" => $row['last_payment_date'],
				"status" => $row['status'],
				
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}
	

//================== End student bill section =======================================		
//=================== extra fee list tables ===================
	
	function insert_extra_fee_collection_tables($className,$feetype_id,$amount,$date)
	{
		require("../config/config.php");
		$className = $this->get_student_class_id_by_name($className);
		$qry="INSERT INTO `extra_fee_list` (`extra_fee_id`, `className`, `feeTypeId`, `amount`, `date`) VALUES (null,'$className','$feetype_id','$amount','$date')";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}
	
	function get_extra_fee_type_list()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * from extra_fee_list");
		while($row=mysqli_fetch_assoc($result))
		{
			array_push($response, array(
				'extra_fee_id'=>$row['extra_fee_id'],
				'className'=>$row['className'],
				'feeTypeId'=>$row['feeTypeId'],
				'amount'=>$row['amount'],
				'date'=>$row['date'],
			));
		}
		mysqli_close($db);
		return json_encode($response);
	}
//=================== end extra fee list tables ===================		
	
//================== Fee type section ================================================
	function insert_feetype($feetype)
	{
		$feetype = str_replace('_', ' ', $feetype);
		
		require("../config/config.php");
		$qry="INSERT INTO `fee_types` (`feetype_title`) VALUES ('$feetype')";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function delete_feetype($id)
	{
		require("../config/config.php");
		$qry="DELETE FROM `fee_types` WHERE feetype_id='$id'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function update_feetype($id,$feetype)
	{
		$feetype = str_replace('_', ' ', $feetype);
		require("../config/config.php");
		$qry="UPDATE `fee_types` SET `feetype_title`='$feetype' WHERE feetype_id='$id'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

	}


	function get_feetype_by_feetype_id($feetype_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  feetype_title FROM `fee_types` where feetype_id='$feetype_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->feetype_title;
	}

	function get_feetype_id_by_feetype_title($feetype_title)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  feetype_id FROM `fee_types` where feetype_title='$feetype_title'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->feetype_id;
	}	

	function get_feetype_details()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `fee_types`");
		while($row = mysqli_fetch_assoc($result))

		{
			array_push($response,array(
				"feetype_id" => $row['feetype_id'],
				"feetype_title" => $row['feetype_title'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}
//================== End Fee type section ============================================	
//================== bill print tables ===============================================
	function get_max_bill_print_id()
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT  max(bill_print_id) as 'bill_print_id' FROM `bill_tables`");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bill_print_id;
	}

	function get_max_bill_print_id_by_student_id($std_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT max(bill_print_id) as 'bill_print_id' FROM `bill_tables` WHERE  std_id='$std_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bill_print_id;
	}

	function get_bill_status_by_max_id($bill_print_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT status FROM `bill_tables` WHERE  bill_print_id='$bill_print_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->status;
	}

	function get_bill_details_by_bill_number($bill_number)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM `bill_tables` WHERE  bill_number='$bill_number'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value;
	}


	function get_bill_number_by_max_id($bill_print_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT bill_number FROM `bill_tables` WHERE  bill_print_id='$bill_print_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->bill_number;
	}

	function update_bill_print_status($bill_print_id)
	{
		require("../config/config.php");
		$qry="UPDATE `bill_tables` SET `status`='true' WHERE  bill_print_id='$bill_print_id'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

	}
	function insert_insert_bill_print_tables($std_id,$bill_number,$status,$date)
	{
		require("../config/config.php");
        
        $qry="INSERT INTO `bill_tables` (`bill_print_id`, `std_id`, `bill_number`, `status`,`date`,`number_of_copies`) VALUES (null,'$std_id','$bill_number','$status','$date',0)";
		mysqli_query($db, $qry);
        mysqli_close($db);
        $this->createlog($qry);    
	}

//================== end bill print tables ===========================================	


//================== teacher tables =================================================
	
	function get_employee_salary($tid)
         {
         	require("../config/config.php");
			$result = mysqli_query($db, "SELECT tsalary FROM `teachers` WHERE tid='$tid'");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return $value->tsalary;
        }
function get_employee_details_by_empId($empId)
        {
        	require("../config/config.php");
			$result = mysqli_query($db, "SELECT * FROM `teachers` WHERE tid='$empId'");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return json_encode($value);
        }
function get_teacher_details()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `teachers`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"tid" => $row['tid'],
				"tname" => $row['tname'],
				"temail" => $row['temail'],
				"tgetter" => $row['tgetter'],
				"taddress" => $row['taddress'],
				"tmobile" => $row['tmobile'],
				"tclass" => $row['tclass'],
				"tclass" => $row['tclass'],
				"tsec" => $row['tsec'],
				"tclock" => $row['tclock'],
				"tcount" => $row['tcount'],
				"sex" => $row['sex'],
				"dob" => $row['dob'],
				"t_father" => $row['t_father'],
				"t_mother" => $row['t_mother'],
				"timage" => $row['timage'],
				"tsalary" => $row['tsalary'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_teacher_record_by_tid($tid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM `teachers` where tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);
	}

	function get_teacher_salary_by_tid($tid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT tsalary  FROM `teachers` where tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->tsalary;
	}

	function get_teacher_name_by_teacherId($tid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT tname  FROM `teachers` where tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->tname;
	}

 

//================== end teacher tables =============================================	
//================== teacher account tables =========================================
        function get_employee_account_details_by_empId($empId)
        {
        	require("../config/config.php");
			$result = mysqli_query($db, "SELECT * FROM `teacher_account_tables` WHERE tid='$empId'");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return json_encode($value);
        }

 function update_employee_balance_by_empId($teacher_account_id,$balance,$withdrowal_balance,$last_payment_date)
        {
        	require("../config/config.php");
        	$qry="UPDATE `teacher_account_tables` SET `current_balance`='$balance',`total_withdrawal`='$withdrowal_balance',`withdrawal_date`= '$last_payment_date' WHERE teacher_account_id='$teacher_account_id'";
			$result = mysqli_query($db, $qry);
			mysqli_close($db);
		$this->createlog($qry);

			
			
		}

		
function create_teacher_account($tid, $current_balance, $total_withdrawal, $current_update_date, $withdrawal_date)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "INSERT INTO `teacher_account_tables` (`tid`, `current_balance`, `total_withdrawal`, `current_update_date`, `withdrawal_date`) VALUES ('$tid', '$current_balance', '$total_withdrawal', '$current_update_date', '$withdrawal_date')");
		mysqli_close($db);
	}

	function get_teacher_account_id_by_tid($tid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT teacher_account_id  FROM `teacher_account_tables` where tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->teacher_account_id;
	}

	function get_current_balance_by_teacher_account_id($teacher_account_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT current_balance  FROM `teacher_account_tables` where teacher_account_id='$teacher_account_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->current_balance;
	}

	function get_current_update_date_by_teacher_account_id($teacher_account_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT current_update_date  FROM `teacher_account_tables` where teacher_account_id='$teacher_account_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->current_update_date;
	}

	
	function update_teacher_balance($tid,$current_balance,$current_update_date)
	{
		require("../config/config.php");
		$qry="UPDATE `teacher_account_tables` SET `current_balance`='$current_balance',`current_update_date`='$current_update_date' WHERE tid='$tid'";
		$result = mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

		
	}

	function get_last_payment_to_employee_date($tid)
	 {
	 	require("../config/config.php");
		$result = mysqli_query($db, "SELECT withdrawal_date FROM `teacher_account_tables` WHERE tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->withdrawal_date;
	 }
	 
	function get_teacher_account_details_by_teacher_account_id($tid)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM teacher_account_tables WHERE tid='$tid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);
		
	}

	function get_last_update_date_from_teacher_account_tables()
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT current_update_date FROM teacher_account_tables");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->current_update_date;
	}

        
	//================== end teacher account tables =====================================

	//================= pay me tables ===================================================
		function get_max_id_pay_me()
        {
        	require("../config/config.php");
			$result = mysqli_query($db, "SELECT max(pme_id) as 'pme_id' FROM `pay_me`");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return $value->pme_id;
        }

        function get_pme_details_by_id($pme_id)
        {
        	require("../config/config.php");
			$result = mysqli_query($db, "SELECT * FROM `pay_me` where pme_id = '$pme_id'");
			$value = mysqli_fetch_object($result);
			mysqli_close($db);
			return json_encode($value);
        }

        
		
        

		function get_teacher_advance_by_teacher_id_status($tid)
		{
			require("../config/config.php");
			$response = array();
			$result = mysqli_query($db, "SELECT advance FROM `pay_me` where teacher_id='$tid' and status='Pending'");
			while($row = mysqli_fetch_assoc($result))
			{
				array_push($response,array(
					"advance" => $row['advance'],
				));
			}
			mysqli_close($db);
			return json_encode($response);
		}

		
	function update_advance_status($tid)
	{
		require("../config/config.php");
		$qry="UPDATE `pay_me` SET `status`='Paid' WHERE teacher_id='$tid'";
		$result = mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

		
	}

	function insert_teacher_payment($tid,$staff_id,$bonus,$advance,$deduction,$net_pay,$last_payment_date,$description,$user_name,$status)
	{
		require("../config/config.php");
		$qry="INSERT INTO pay_me (`teacher_id`, `staff_id`, `bonus`, `advance`, `deduction`, `net_pay`, `paid_date`, `description`, `user_name`, `status`)VALUES('$tid','$staff_id','$bonus','$advance','$deduction','$net_pay','$last_payment_date','$description','$user_name','$status')";
	    mysqli_query($db, $qry);
	    mysqli_close($db);
	    $this->createlog($qry);
  
	}

	function get_teacher_payment_record_by_teacher_id_date($teacher_id,$date)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `pay_me` where teacher_id='$teacher_id' and paid_date like '%$date%' ");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"pme_id" => $row['pme_id'],
				"teacher_id" => $row['teacher_id'],
				"bonus" => $row['bonus'],
				"advance" => $row['advance'],
				"deduction" => $row['deduction'],
				"net_pay" => $row['net_pay'],
				"paid_date" => $row['paid_date'],
				"description" => $row['description'],
				"user_name" => $row['user_name'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_teacher_payment_record_by_current_date()
	{
		global $nepaliDate;


		$current_date = $nepaliDate->full;
		require("../config/config.php");
		//require("nepaliDate.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `pay_me` where paid_date='$current_date' ");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"pme_id" => $row['pme_id'],
				"teacher_id" => $row['teacher_id'],
				"bonus" => $row['bonus'],
				"advance" => $row['advance'],
				"deduction" => $row['deduction'],
				"net_pay" => $row['net_pay'],
				"paid_date" => $row['paid_date'],
				"description" => $row['description'],
				"user_name" => $row['user_name'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_teacher_payment_record_by_teacher_id_two_date($teacher_id,$first_date,$second_date)
	{
		require("../config/config.php");		
		$first_date = date('Y-m-d',strtotime($first_date));
		$second_date = date('Y-m-d',strtotime($second_date));
		
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `pay_me` where teacher_id='$teacher_id' and paid_date>= '$first_date' and paid_date<='$second_date' ");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"pme_id"=>$row['pme_id'],
				"teacher_id" => $row['teacher_id'],
				"bonus" => $row['bonus'],
				"advance" => $row['advance'],
				"deduction" => $row['deduction'],
				"net_pay" => $row['net_pay'],
				"paid_date" => $row['paid_date'],
				"description" => $row['description'],
				"user_name" => $row['user_name'],
				"status" => $row['status'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}


//================= end pay me tables ===============================================

//================= expenses tables =================================================
	//============================= expenses section ==============================

	function get_expenses_category_list()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `expenses_cat`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"ecat_id" => $row['ecat_id'],
				"exp_cat" => $row['exp_cat'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	

	function insertExpensesCategory($category)
	{
		$category = str_replace('_', ' ', $category);
		require("../config/config.php");
		$qry="INSERT INTO `expenses_cat` (`exp_cat`) VALUES ('$category');";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function deleteExpensesCategory($deleteId)
	{
		require("../config/config.php");
		$qry="DELETE FROM `expenses_cat` WHERE ecat_id='$deleteId'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function updateExpensesCategory($ecat_id,$category)
	{
		$category = str_replace('_', ' ', $category);
		require("../config/config.php");
		$qry="UPDATE `expenses_cat` SET `exp_cat`='$category' WHERE ecat_id = '$ecat_id'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

		
	}

	function getExpensesCategoryById($ecat_id)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT exp_cat FROM `expenses_cat` WHERE ecat_id='$ecat_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->exp_cat;
	}


	function insertExpenses($schoolAccountId,$category,$name, $quantity, $file, $amount, $description, $date)
	{
		require("../config/config.php");
		$qry="INSERT INTO `expenses_add` (`schoolAccountId`,`ecat`,`name`, `quantity`, `expfile`, `expamount`, `expdesc`, `date`) VALUES ('$schoolAccountId','$category','$name', '$quantity', '$file', '$amount', '$description', '$date')";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
		
	}

	function getExpenses()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `expenses_add`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"exp_id" => $row['exp_id'],
				"ecat" => $row['ecat'],
				"name" => $row['name'],
				"quantity" => $row['quantity'],
				"expfile" => $row['expfile'],
				"expamount" => $row['expamount'],
				"expdesc" => $row['expdesc'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function getExpenses_by_current_date()
	{
		global $nepaliDate;

		$current_date = $nepaliDate->full;
		require("../config/config.php");
		//require("nepaliDate.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `expenses_add` where date='$current_date'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"exp_id" => $row['exp_id'],
				"ecat" => $row['ecat'],
				"name" => $row['name'],
				"quantity" => $row['quantity'],
				"expfile" => $row['expfile'],
				"expamount" => $row['expamount'],
				"expdesc" => $row['expdesc'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}


//================= end expenses tables =============================================	

//================ income tables ====================================================
	function getExtraIncome()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `incometables`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"incomeId" => $row['incomeId'],
				"schoolAccountId" => $row['schoolAccountId'],
				"incomeType" => $row['incomeType'],
				"incomeAmount" => $row['incomeAmount'],
				"incomedescription" => $row['incomedescription'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function getExtraIncome_by_current_date()
	{
		global $nepaliDate;

		$current_date = $nepaliDate->full;
		require("../config/config.php");
		//require("nepaliDate.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `incometables` where date='$current_date'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"incomeId" => $row['incomeId'],
				"schoolAccountId" => $row['schoolAccountId'],
				"incomeType" => $row['incomeType'],
				"incomeAmount" => $row['incomeAmount'],
				"incomedescription" => $row['incomedescription'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function insertIncome($schoolAccountId, $income_type, $amount, $description, $date)
	{
		require("../config/config.php");
		$qry="INSERT INTO `incometables` (`schoolAccountId`,`incomeType`, `incomeAmount`, `incomedescription`, `date`) VALUES ('$schoolAccountId','$income_type', '$amount', '$description', '$date')";
		mysqli_query($db,$qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function deleteIncome($deleteId)
	{
		require("../config/config.php");
		$qry="DELETE FROM `incometables` WHERE incomeId='$deleteId'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function getIncomeById($incomeId)
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM `incometables` where incomeId='$incomeId' ");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);
	}

	function updateIncome($incomeId, $income_type, $amount, $description, $date)
	{
		require("../config/config.php");
		$qry="UPDATE `incometables` SET `incomeType`='$income_type',`incomeAmount`='$amount',`incomedescription`='$description',`date`='$date' WHERE incomeId='$incomeId'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);

	}

//================ end income tables ================================================
//===================== school details tables ==========================
	function get_school_details_by_id()
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT * FROM `schooldetails` WHERE 1");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return json_encode($value);
		
	}
//========================== end school details tables ==========================

//========================= school account tables ===================================

	function insertSchoolAccount($incomeFrom, $expensesTo, $schoolIncome, $schoolExpenses, $date)
	{
		require("../config/config.php");
		$qry="INSERT INTO `school_account_tables`(`incomeFrom`, `expensesTo`, `schoolIncome`, `schoolExpenses`, `date`) VALUES ('$incomeFrom', '$expensesTo', '$schoolIncome', '$schoolExpenses', '$date')";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function updateSchoolAccount($schoolAccountId,$incomeFrom, $expensesTo, $schoolIncome, $schoolExpenses, $date)
	{
		require("../config/config.php");
		$qry="UPDATE `school_account_tables` SET `incomeFrom`='$incomeFrom',`expensesTo`='$expensesTo',`schoolIncome`='$schoolIncome',`schoolExpenses`='$schoolExpenses',`date`='$date' WHERE schoolAccountId='$schoolAccountId'";
		mysqli_query($db, $qry);
		mysqli_close($db);
		$this->createlog($qry);
	}

	function get_school_expenses_record()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where schoolIncome=0 and expensesTo!='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"expensesTo" => $row['expensesTo'],
				"schoolExpenses" => $row['schoolExpenses'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_school_expenses_record_by_single_date($date)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date like '%$date%' and schoolIncome=0 and expensesTo!='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"expensesTo" => $row['expensesTo'],
				"schoolExpenses" => $row['schoolExpenses'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_school_expenses_record_by_two_date($first_date,$second_date)
	{
		require("../config/config.php");
		$first_date = date('Y-m-d',strtotime($first_date));
		$second_date = date('Y-m-d',strtotime($second_date));
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date>='$first_date' and date<='$second_date' and schoolIncome=0 and expensesTo!='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"expensesTo" => $row['expensesTo'],
				"schoolExpenses" => $row['schoolExpenses'],
				"date" => $row['date'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}


	function get_school_expenses_to_teacher()
	{
		require("../config/config.php");
		$teacher_expenses = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where schoolIncome=0 and expensesTo='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			$teacher_expenses = $teacher_expenses + $row['schoolExpenses'];
			
		}
		mysqli_close($db);
		return $teacher_expenses;
	}

	function get_school_expenses_to_teacher_by_date($date)
	{
		require("../config/config.php");
		$teacher_expenses = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date like '%$date%' and schoolIncome=0 and expensesTo='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			$teacher_expenses = $teacher_expenses + $row['schoolExpenses'];
			
		}
		mysqli_close($db);
		return $teacher_expenses;
	}

	function get_school_expenses_to_teacher_by_two_date($first_date,$second_date)
	{
		require("../config/config.php");
		$first_date = date('Y-m-d',strtotime($first_date));
		$second_date = date('Y-m-d',strtotime($second_date));
		$teacher_expenses = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date>='$first_date' and date<='$second_date' and schoolIncome=0 and expensesTo='Teacher'");
		while($row = mysqli_fetch_assoc($result))
		{
			$teacher_expenses = $teacher_expenses + $row['schoolExpenses'];
			
		}
		mysqli_close($db);
		return $teacher_expenses;
	}


	function get_school_income_record()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where schoolExpenses=0 and incomeFrom !='Student'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"incomeFrom" => $row['incomeFrom'],
				"schoolIncome" => $row['schoolIncome'],
				"date" => $row['date'],
				));
			
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_school_income_record_by_date($date)
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date like '%$date%' and schoolExpenses=0 and incomeFrom !='Student'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"incomeFrom" => $row['incomeFrom'],
				"schoolIncome" => $row['schoolIncome'],
				"date" => $row['date'],
				));
			
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_school_income_record_by_two_date($first_date,$second_date)
	{
		require("../config/config.php");
		$first_date = date('Y-m-d',strtotime($first_date));
		$second_date = date('Y-m-d',strtotime($second_date));
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date>='$first_date' and date<='$second_date' and schoolExpenses=0 and incomeFrom !='Student'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"schoolAccountId" => $row['schoolAccountId'],
				"incomeFrom" => $row['incomeFrom'],
				"schoolIncome" => $row['schoolIncome'],
				"date" => $row['date'],
			));		
		}
		mysqli_close($db);
		return json_encode($response);
	}

	function get_school_income_record_from_student()
	{
		require("../config/config.php");
		$student_amount = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where schoolExpenses=0 and incomeFrom='Student' ");
		while($row = mysqli_fetch_assoc($result))
		{
			$student_amount = $student_amount + $row['schoolIncome'];
		}
		mysqli_close($db);
		return $student_amount;
	}

	function get_school_income_record_from_student_by_date($date)
	{
		require("../config/config.php");
		$student_amount = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date like '%$date%' and schoolExpenses=0 and incomeFrom='Student' ");
		while($row = mysqli_fetch_assoc($result))
		{
			$student_amount = $student_amount + $row['schoolIncome'];
		}
		mysqli_close($db);
		return $student_amount;
	}

	function get_school_income_record_from_student_by_two_date($first_date,$second_date)
	{
		require("../config/config.php");
		$first_date = date('Y-m-d',strtotime($first_date));
		$second_date = date('Y-m-d',strtotime($second_date));
		$student_amount = 0;
		$result = mysqli_query($db, "SELECT * FROM `school_account_tables` where date>='$first_date' and date<='$second_date' and schoolExpenses=0 and incomeFrom='Student' ");
		while($row = mysqli_fetch_assoc($result))
		{
			$student_amount = $student_amount + $row['schoolIncome'];
		}
		mysqli_close($db);
		return $student_amount;
	}


	function getMaxSchoolAccountId()
	{
		require("../config/config.php");
		$result = mysqli_query($db, "SELECT max(schoolAccountId) as 'schoolAccountId'  FROM `school_account_tables`");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->schoolAccountId;
	}
//now===================================
	function get_incomeType_list()
	{
		require("../config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM `incometables`");
		while($row = mysqli_fetch_assoc($result))

		{
			array_push($response,array(
				"incomeTypeId" => $row['incomeId'],
				"incomeType" => $row['incomeType'],
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}

	

	function total_income()
	{
		require("../config/config.php");
		$schoolIncome = 0;
		$result = mysqli_query($db, "SELECT schoolIncome FROM `school_account_tables`");
		while($row = mysqli_fetch_assoc($result))
		{
			$schoolIncome = $schoolIncome + $row['schoolIncome'];
		}
		mysqli_close($db);
		return $schoolIncome;
	}

	function total_expenses()
	{
		require("../config/config.php");
		$schoolExpenses = 0;
		$result = mysqli_query($db, "SELECT schoolExpenses FROM `school_account_tables`");
		while($row = mysqli_fetch_assoc($result))
		{
			$schoolExpenses = $schoolExpenses + $row['schoolExpenses'];
		}
		mysqli_close($db);
		return $schoolExpenses;
	}

	function get_total_income_current_date()
	{
		global $nepaliDate;
		
		$current_date = $nepaliDate->full;
		require("../config/config.php");
		//require("nepaliDate.php");
		$schoolIncome = 0;
		$result = mysqli_query($db, "SELECT schoolIncome FROM `school_account_tables` where date='$current_date' ");
		while($row = mysqli_fetch_assoc($result))
		{
			$schoolIncome = $schoolIncome + $row['schoolIncome'];
		}
		mysqli_close($db);
		return $schoolIncome;
	}

	function get_total_expenses_current_date()
	{
		global $nepaliDate;
		
		$current_date = $nepaliDate->full;
		require("../config/config.php");
		//require("nepaliDate.php");
		$schoolExpenses = 0;
		$result = mysqli_query($db, "SELECT schoolExpenses FROM `school_account_tables` where date='$current_date'");
		while($row = mysqli_fetch_assoc($result))
		{
			$schoolExpenses = $schoolExpenses + $row['schoolExpenses'];
		}
		mysqli_close($db);
		return $schoolExpenses;
	}
//========================== end school account tables ==========================
//========================== extra function ==========================
    function get_number_in_word($grande_total)
    {
       $number =  $grande_total;
       $no = round($number);
       $point = round($number - $no, 2) * 100;
       $hundred = null;
       $digits_1 = strlen($no);
       $i = 0;
       $str = array();
       $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
        '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
        '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninety');
       $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
       while ($i < $digits_1) 
       {
         $divider = ($i == 2) ? 10 : 100;
         $number = floor($no % $divider);
         $no = floor($no / $divider);
         $i += ($divider == 10) ? 1 : 2;
         if ($number) 
         {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                " " . $digits[$counter] . $plural . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                . $digits[$counter] . $plural . " " . $hundred;
         } else $str[] = null;
      }
      $str = array_reverse($str);
      $result = implode('', $str);
      $points = ($point) ?
        "." . $words[$point / 10] . " " . 
              $words[$point = $point % 10] : '';
     return $result . "rupees  ";         
    }

    function get_nepali_month($m)
    {
             $eMonth = false;
             switch($m){
                 case 1:
                     $eMonth = "Baishak";
                     break;
                 case 2:
                     $eMonth = "Jestha";
                     break;
                 case 3:
                     $eMonth = "Ashar";
                     break;
                 case 4:
                     $eMonth = "Shrawan";
                     break;
                 case 5:
                     $eMonth = "Bhadra";
                     break;
                 case 6:
                     $eMonth = "Ashoj";
                     break;
                 case 7:
                     $eMonth = "Kartik";
                     break;
                 case 8:
                     $eMonth = "Mangsir";
                     break;
                 case 9:
                     $eMonth = "Poush";
                     break;
                 case 10:
                     $eMonth = "Magh";
                     break;
                 case 11:
                     $eMonth = "Falgun";
                     break;
                 case 12:
                     $eMonth = "Chaitra";
             }
             return $eMonth;
         }


         public function get_nepali_month_num($month)
         {
             $n_month = false;
                 
             switch($month){
                 case "Baishak":
                     $n_month = 1;
                     break;
                         
                 case "Jestha":
                     $n_month = 2;
                     break;
                         
                 case "Ashar":
                     $n_month = 3;
                     break;
                         
                 case "Shrawan":
                     $n_month = 4;
                     break;
                         
                 case "Bhadra":
                     $n_month = 5;
                     break;

                 case "Ashoj":
                     $n_month = 6;
                     break;
 
                 case "Kartik":
                     $n_month = 7;
                     break;

                 case "Mangsir":
                     $n_month = 8;
                     break;

                 case "Poush":
                     $n_month = 9;
                     break;

                 case "Magh":
                     $n_month = 10;
                     break;

                 case "Falgun":
                     $n_month = 11;
                     break;

                 case "Chaitra":
                     $n_month = 12;
                     break;
             }
             return  $n_month;
            //return $month;
         }

//========================== end extra function ==========================	
//========================= start my function ========================	

   function get_student_class_name_by_id($sid)
   {
   	require("../config/config.php");
		$result = mysqli_query($db, "SELECT class_name FROM class WHERE class_id='$sid'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->class_name;

   }

   function get_student_class_id_by_name($sclass)
   {
   	require("../config/config.php");
		$result = mysqli_query($db, "SELECT class_id FROM class WHERE class_name='$sclass'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->class_id;

   }
   function get_section_name_by_section_id($sec_id)
   {
   	require("../config/config.php");
		$result = mysqli_query($db, "SELECT section_name FROM section WHERE section_id='$sec_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->section_name;	
   }

   function get_section_id_by_name($sec_name)
   {
   	require("../config/config.php");
		$result = mysqli_query($db, "SELECT section_id FROM section WHERE section_class='$sec_name'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value;   		
   }

   function update_student_bill_edit_deu($bill_id,$balance,$status)
	{
		require("../config/config.php");
		$qry = "UPDATE `student_bill` SET balance='$balance',`status`='$status'  WHERE bill_id='$bill_id'";
        mysqli_query($db, $qry);
        mysqli_close($db);
		$this->createlog($qry);       
	}

     function createlog($qry)
     {
     	$index=0;
     	require("../config/config.php");
     	$action = 'wertwe';
     	if(strpos(strtoupper($qry),'INSERT')>-1) {
     		$action = 'Insert';
     		//$index = strpos(strtoupper($qry),'INTO');
     		$index=2;
     	} else if(strpos(strtoupper($qry),'UPDATE')>-1) {
     		$action = 'Edit';
     		//$index = strpos(strtoupper($qry),'UPDATE');
     		$index=1;
     	} else if(strpos(strtoupper($qry),'DELETE')>-1) {
     		$action = 'Delete';
     		//$index = strpos(strtoupper($qry),'FROM');
     		$index=2;
     	} else {
     		$action = '';
     	}
     	$qry = mysqli_real_escape_string($db,$qry);
     	$tableArray = explode(' ', strtoupper($qry));
     	$table= $tableArray[$index];
     	$user = 1; //change this to currently logged in user id;
     	$result = mysqli_query($db,"INSERT INTO account_log(user_id,user_type,`table_name`,`action`,`query`) VALUES('$user','accountant','$table','$action','$qry')");
     	mysqli_close($db);
     }

    function get_fee_rate_by_class_and_feetype_title($class,$a,$student_id)
    {
        require("../config/config.php");
        //$class=$this->get_student_class_name_by_id($class);
		$result = mysqli_query($db, "SELECT $a as a FROM studentinfo WHERE sclass='$class' and sid='$student_id'");
		$value = mysqli_fetch_object($result);
		mysqli_close($db);
		return $value->a;
    }


    function get_student_discount_by_student_id($sid)
    {
		require("../config/config.php");
		$response=array();
		$result = mysqli_query($db, "SELECT tution_discount_percent,bus_discount_percent,hostel_discount_percent,computer_discount_percent FROM `studentinfo` WHERE sid='$sid'");
		
		while($row = mysqli_fetch_assoc($result))
		{	

			array_push($response,array(
				"tution_discount_percent"=>$row['tution_discount_percent'],
				"bus_discount_percent"=>$row['bus_discount_percent'],
				"hostel_discount_percent"=>$row['hostel_discount_percent'],
				"computer_discount_percent"=>$row['computer_discount_percent'],
			));
		}
		mysqli_close($db);
		return json_encode($response);
    }

    function get_student_bill_details($sclass)
		{
		$sclass=$this->get_student_class_id_by_name($sclass);
		require("../config/config.php");
		$response=array();
		$result=mysqli_query($db,"SELECT * FROM studentinfo WHERE `sclass`='$sclass' AND `status` = 0  ORDER BY `studentinfo`.`ssec`");
		while ($row=mysqli_fetch_assoc($result)) 
		{
			array_push($response,array(
				"sid"=>$row['sid'],
				"sname"=>$row['sname'],
				"ssec"=>$row['ssec'],
				"sroll"=>$row['sroll'],

			));
			
		}
		mysqli_close($db);
		return json_encode($response);

	}
	function get_student_balance($sid)
		{
		require("../config/config.php");
		$response=array();
		$result=mysqli_query($db,"SELECT `student_bill`.`balance`, `fee_types`.`feetype_title` FROM student_bill LEFT JOIN `fee_types` ON `student_bill`.`feetype_id`=`fee_types`.`feetype_id` WHERE `std_id`='$sid' and `status`='pending' ORDER BY `student_bill`.`feetype_id` ASC");
		while ($row=mysqli_fetch_assoc($result)) 
		{
			array_push($response,array(
				"balance"=>$row['balance'],
				"feetype_title"=>$row['feetype_title'],
			));
			
		}
		mysqli_close($db);
		return json_encode($response);

	}
	function get_fee_from_student_bill_with_studentinfo($sclass)
	{
		$sclass = $this->get_student_class_id_by_name($sclass);
		require("../config/config.php");
		$response=array();
		$result=mysqli_query($db,"SELECT `fee_types`.`feetype_title` FROM student_bill INNER JOIN studentinfo ON `student_bill`.`std_id` = `studentinfo`.`sid` INNER JOIN fee_types ON `student_bill`.`feetype_id`=`fee_types`.`feetype_id`  WHERE `studentinfo`.`sclass`='$sclass' AND `studentinfo`.`status` = 0 GROUP BY `student_bill`.`feetype_id` ORDER BY `student_bill`.`feetype_id` ASC");
		while ($row=mysqli_fetch_assoc($result)) 
		{
			array_push($response,array(
				"feetype_title"=>$row['feetype_title'],			

			));
			
		}
		mysqli_close($db);
		return json_encode($response);
	}
//-----------------------------------




//To find transportation charge
	// function get_transportation_fee_by_sid($sid)
	// {

	// 	require("../config/config.php");
	// 	$result = mysqli_query($db, "SELECT bus_fee_rate FROM `transportation` WHERE stid='$sid'");
	// 	$value = mysqli_fetch_object($result);
	// 	mysqli_close($db);
	// 	return $value->bus_fee_rate;

	// }

	// function get_extra_fee_by_class_name($sclass)
	// {
	// 	require("../config/config.php");
	// 	$result = mysqli_query($db, "SELECT amount FROM `transportation` WHERE classname='$sclass'");
	// 	$value = mysqli_fetch_object($result);
	// 	mysqli_close($db);
	// 	return $value->amount;		
	// }

//========================== end my function ==========================	

function english_to_nepali_date_converter($date)
{
	
}

function nepali_to_english_converter($date)
{

}

//To get school code for bill and currently use in student submit management
function get_school_code_by_student_id($sid)
{
	require("../config/config.php");
	$result=mysqli_query($db,"SELECT `school_code` FROM schooldetails");
	$value=mysqli_fetch_object($result);
	mysqli_close($db);
	return $value->school_code;
}


//to get student id from bill id for school code.Used in student submit management
function get_student_id_by_bill_id($bill_id)
{
	require("../config/config.php");
	$result=mysqli_query($db,"SELECT std_id FROM student_bill WHERE bill_id='$bill_id'");
	$value=mysqli_fetch_object($result);
	mysqli_close($db);
	return $value->std_id;
}
//this function takes all the tables from accountant database 
function get_list_of_tables_from_database()
{
	require("../config/config.php");
	$response=array();
	$result=mysqli_query($db,"SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema='accountant'");
	while ($row=mysqli_fetch_assoc($result)) {
		array_push($response,array(
				"table_name"=>$row['TABLE_NAME'],			
			));
	}
	mysqli_close($db);
	return json_encode($response);
}

//get list of all bills of a student for the invoice section in fee collectob
function get_bills_list_by_student_id($sid)
{
	require("../config/config.php");
	$response=array();
	$result=mysqli_query($db,"SELECT * FROM bill_tables WHERE std_id='$sid'");
	while ($row=mysqli_fetch_assoc($result)) {
		array_push($response,array(
			"bill_print_id"=>$row['bill_print_id'],
			"std_id"=>$row['std_id'],
			"bill_number"=>$row['bill_number'],
			"status"=>$row['status'],			
			));
	}
	mysqli_close($db);
	return json_encode($response);
}

// manish-15-may-2018

function get_list_of_table_from_database()
	{
		require("config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema='accountant'");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"table_name" => $row['TABLE_NAME']
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}
	function get_data_from_table_by_table_name($table_name)
	{
		require("config/config.php");
		$result = mysqli_query($db, "SELECT * FROM '$table_name' ");
		$value = mysqli_fetch_assoc($result);
		mysqli_close($db);
		return $value;
	}

	function get_student_bus_fee_details()
	{
		require("config/config.php");
		$response = array();
		$result = mysqli_query($db, "SELECT * FROM studentinfo  LEFT JOIN transportation ON studentinfo.`bus_id`=`transportation`.`bus_id`");
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($response,array(
				"sid" => $row['sid'],
				"sname" => $row['sname'],
				"saddress" => $row['saddress'],
				"sclass" => $row['sclass'],
				"ssec" => $row['ssec'],
				"bus_id" => $row['bus_id'],
				"bus_number" => $row['bus_number'],
				"bus_route" => $row['bus_route'],
				"bus_fee_rate" => $row['bus_fee_rate'],
				"bus_discount_percent" => $row['bus_discount_percent']
				));
		}
		mysqli_close($db);
		return json_encode($response);
	}




//end of class account management
}
?>