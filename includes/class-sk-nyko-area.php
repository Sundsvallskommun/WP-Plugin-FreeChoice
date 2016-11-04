<?php

class SK_Nyko_Area {
	
	private $m_code;
	private $m_name;

	public function __construct($code, $name) {
		$this->m_code = $code;
		$this->m_name = $name;
	}


	public function get_code() {
		return $this->m_code;
	}

	public function set_code($code) {
		$this->m_code = $code;
	}

	public function get_name() {
		return $this->m_name;
	}

	public function set_name($name) {
		$this->m_name = $name;
	}
}