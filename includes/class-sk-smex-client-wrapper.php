<?php
/**
 *
 * Wrapper for the smex endpoint. This wrapper can be used to call 
 * any method in the smex webservice
 *
 * Do not forget to wrap the send_request call in a try catch statement
 * 
 */
class SK_Smex_Client_Wrapper {
		
	private $m_soap_client = null;

	const ENDPOINT = 'aHR0cDovL3NhZGIwMjcucGVyc29uYWwuc3VuZHN2YWxsLnNlOjgwODAvU01FWFdDRi5zdmM=';

	/**
	 *
	 * Executes a SOAP request specified by $webServiceMethod against provided binding
	 * 
	 * @param  string $webServiceMethod name of the method
	 * @param  array  $params, parameters to send with the request - defaults to empty array
	 * @param  string $binding the binding to use in the webservice - defaults to '/basic'
	 * 
	 * @return @see SoapClient::__soapCall()
	 * 
	 * @throws SoapFault
	 */
	public function send_request($webServiceMethod, $params = array(), $binding = '/basic') {
		
		$this->init_client();
		
		//Set the location aka binding.
		$this->m_soap_client->__setLocation(base64_decode(self::ENDPOINT) . $binding);

		$response = $this->m_soap_client->__soapCall($webServiceMethod, array('parameters' => $params));

		return $response;
	}

	/**
	 * 
	 * Initializes a new SoapClient or uses the existing instance if already initialized
	 */
	protected function init_client() {

		if ($this->m_soap_client !== null) {
			return;
		}

		$endpoint_description = base64_decode(self::ENDPOINT) . '?wsdl';

		$this->m_soap_client = new SoapClient($endpoint_description, $this->fetch_soap_options());
	}

	/**
	 * 
	 * Sets options for SoapClient and returns them
	 *
	 * @return array, associative array with SoapClient options
	 */
	protected function fetch_soap_options() {

		$options = array(
			"trace" => 1,
			"soap_version" => SOAP_1_1,
			"cache_wsdl" => WSDL_CACHE_MEMORY,
			"keep_alive" => false,
		);

		return $options;
	}
}