<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Frontend extends ExhibitionController {
// show หน้าหลัก
	public function show_frontend()
	{
		$this->output('Frontend/index');
	}
//  show ปีสอง
	public function show_list_second() {
		$_SESSION["sidebar"] = 'SecondYear';
		$this->output_frontend('Frontend/v_second_year');
	}
	// show ปีสาม
	public function show_list_third() {
		$_SESSION["sidebar"] = 'ThirdYear';
		$this->output_frontend('Frontend/v_third_year');
	}
	// show ปีสี่
	public function show_list_fourth() {
		$_SESSION["sidebar"] = 'FourthYear';
		$this->output_frontend('Frontend/v_fourth_year');
	}
	// show รายละเอียดปีสี่
	public function show_details_fourth() {
		$this->output_frontend('Frontend/v_fourth_details');
	}
}