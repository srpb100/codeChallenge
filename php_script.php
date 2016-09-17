<?php 

	$people = 	'{
					"data":[
						{
							"first_name":"jake",
							"last_name":"bennett",
							"age":31,
							"email":"jake@bennett.com",
							"secret":"VXNlIHRoaXMgc2VjcmV0IHBocmFzZSBzb21ld2hlcmUgaW4geW91ciBjb2RlJ3MgY29tbWVudHM="
						},
						{
							"first_name":"jordon",
							"last_name":"brill",
							"age":85,
							"email": "jordon@brill.com",
							"secret":"YWxidXF1ZXJxdWUuIHNub3JrZWwu"
						}
					]
				}';

	// decoding the json string array
	$people = json_decode($people, true);

	// array to store the age values for sorting
	$age = array();
	// Iterating through the array to retrieve each record
	foreach ($people['data'] as $key => $value) {
    	$age[$key]  = $value['age'];
	}

	// Sorting the array in descending order
	array_multisort($age, SORT_DESC, $people['data']);

	$count = 0;
	// array to store the emails id's
	$email_list = array();
	$fullname = '';

	//Iterate through the array and retrieve each record
	foreach ($people as $key => $value) {
	    $count += count($value);

	    for ($i = 0; $i < $count; $i++) {
	        //place all the emails into an array
	        $email_list[] = $value[$i]['email'];
	        //Variable name to hold the fullname of each person
	        $fullname = $value[$i]['first_name'] . " " . $value[$i]['last_name'];
	        //create a new field in each array called name and assign the fullname value to it
	        $people['data'][$i]['name'] = $fullname;
	    }
	}
	//Implode the email list array using a comma
	echo '<b>Email Addresses:</b> '.'<br />' . implode(', ', $email_list).'<br /><br />';

	echo '<b> Original Data with \'name\' field added: </b>';
	echo "<pre>";
	//print out the new array after adding the new "name" field
	print_r($people);
	echo "</pre>";

?>
