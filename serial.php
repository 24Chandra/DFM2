<?php
	if ($_POST['data-state']) {
		
		$_site_id = $_POST['site-id'];
		$_start_id = $_POST['start-id'];
		$_end_id = $_POST['end-id'];
		$_ticket_no = $_POST['ticket-no'];
		$_start = $_POST['start'];
		$_finish = $_POST['finish'];
		$_start_count = $_POST['start-count'];
		$_start_count_uom = $_POST['start-count-uom'];
		$_end_count = $_POST['end-count'];
		$_end_count_uom = $_POST['end-count-uom'];
		$_gross_deliver = $_POST['gross-deliver'];
		$_gross_deliver_uom = $_POST['gross-deliver-uom'];
		$_avg_flow_rate = $_POST['avg-flow-rate'];
		$_avg_flow_rate_uom = $_POST['avg-flow-rate-uom'];
		$_after_avg_flow_rate = $_POST['after-avg-flow-rate'];
		$_sale_number = $_POST['sale-number'];
		$_meter_number = $_POST['meter-number'];
		$_unit_id = $_POST['unit-id'];
		$_duplicate = $_POST['duplicate'];
		$_other_one = $_POST['other-one'];
		$_other_two = $_POST['other-two'];
		$_other_three = $_POST['other-three'];
		$_other_four = $_POST['other-four'];
		$_other_five = $_POST['other-five'];
		$_data_state = $_POST['data-state'];
		
		$servername = "localhost";
		$username = "root";
		$password = "V1m@n@l0gy123!";
		$dbname = "postenergy";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO `serial_data_results` "
                        . "(`uploaded`, `site_id`, `ID_start`, `ID_end`, `ticket_no`, `start`, `finish`, `start_count`, `start_count_uom`, `end_count`, "
                        . "`end_count_uom`, `gross_deliver`, `gross_deliver_uom`, `avg_flow_rate`, `avg_flow_rate_uom`, `after_avg_flow_rate`, `sale_number`, `meter_number`, "
                        . "`unit_id`, `duplicate`, `other_one`, `other_two`, `other_three`, `other_four`, `other_five`, `data_state`) "
                        . "VALUES "
                        . "(0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
						
		$stmt->bind_param("sddssssssssssssssssssssss", $site_id, $id_start, $id_end, $ticket_no, $start, $finish, $start_count, $start_count_uom, $end_count, 
							$end_count_uom, $gross_deliver, $gross_deliver_uom, $avg_flow_rate, $avg_flow_rate_uom, $after_avg_flow_rate, $sale_number, 
							$meter_number, $unit_id, $duplicate, $other_one, $other_two, $other_three, $other_four, $other_five, $data_state);

		// set parameters and execute
		$site_id = $_site_id;
		$id_start = $_start_id;
		$id_end = $_end_id;
		$ticket_no = $_ticket_no;
		$start = $_start;
		$finish = $_finish;
		$start_count = $_start_count;
		$start_count_uom = $_start_count_uom;
		$end_count = $_end_count;
		$end_count_uom = $_end_count_uom;
		$gross_deliver = $_gross_deliver;
		$gross_deliver_uom = $_gross_deliver_uom;
		$avg_flow_rate = $_avg_flow_rate;
		$avg_flow_rate_uom = $_avg_flow_rate_uom;
		$after_avg_flow_rate = $_after_avg_flow_rate;
		$sale_number = $_sale_number;
		$meter_number = $_meter_number;
		$unit_id = $_unit_id;
		$duplicate = $_duplicate;
		$other_one = $_other_one;
		$other_two = $_other_two;
		$other_three = $_other_three;
		$other_four = $_other_four;
		$other_five = $_other_five;
		$data_state = $_data_state;
		$stmt->execute();

		echo "SERIAL SUCCESS\r\n";

		$stmt->close();
		$conn->close();
		
		
	} else {
		echo "SERIAL FAILED\r\n";
	}
	
