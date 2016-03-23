<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NinjaGold extends CI_Controller {

	public function index()
	{	//userdata is a built in
		if(!$this->session->userdata('goldCount')) {
			//Built in set_userdata store the gold count
			$this->session->set_userdata('goldCount', 0);

		}

		if(!$this->session->userdata('activityLog')) {
			//Built in set_userdata store the activity log
			$this->session->set_userdata('activityLog', array());

		}

		$gold = $this->session->userdata('goldCount');

		$log =  $this->session->userdata('activityLog');

		$this->load->view('index', array('gold' => $gold, "log" => $log));
	}

	public function process_money() {
		//Generate a random amount based on which building the user clicked
		$building = $this->input->post('building');

		$min = 0;

		$max = 0;

		// echo $building;

		if($building == "farm") {
			$min = 10;
			$max = 20;
		}

		elseif($building == "cave") {
			$min = 5;
			$max = 10;
		}

		elseif($building == "house") {
			$min = 2;
			$max = 5;
		}

		elseif($building == "casino") {
			$min = -50;
			$max = 50;
		}

		$foundGold = rand($min, $max);
		
		//Will cause errors if you redirect and echo
		// echo $foundGold;
		//Add the new amount to our gold count


		//DOES NOT WORK: This is not a variable but a Codeignitor function
		//$this->session->userdata('goldCount') += $foundGold;

		//First we check out the old value of the gold count;
		$oldGold = $this->session->userdata('goldCount');

		//After we add them we check the new gold value back

		$newGold = $oldGold + $foundGold;


		$this->session->set_userdata('goldCount', $newGold);


		//Generate an activity message

		$message = "You entered a {$building} and earned {$foundGold} golds! " . date('F j, Y, g:i a');

		//GEt the old messages array

		$messages = $this->session->userdata('activityLog');

		//Change the local copy of session array
		array_unshift($messages, $message);

		//Put it back in the session

		$this->session->set_userdata('activityLog', $messages);

		//Creates error because its being redirected
		// echo $message;

		redirect(base_url());
	}
}























