<?php

class SK_Nyko_Data_Updater {
	
	const SK_FREE_CHOICE_DATA = 'sk-free-choice-nyko-list';

	private function __construct() {

	}


	/**
	 * 
	 * fetches the data for the auto completer and stores it in database
	 */
	public static function update_auto_complete_data() {
		
		require_once 'class-sk-smex-client-wrapper.php';

		$client = new SK_Smex_Client_Wrapper();

		try {	

			$params = array('searchstring' => '');
			$webservice_response = $client->send_request('AddressSearchAsYouType', $params);

			$nykoObjects = $webservice_response->AddressSearchAsYouTypeResult->AddressSAYTData;
			$data = json_encode($nykoObjects);

			update_option(self::SK_FREE_CHOICE_DATA, $data);
		}
		catch(SoapFault $e) {	
			error_log('Something whent wrong when trying to update nyko data ' . $e->getMessage());
		}
	}

}