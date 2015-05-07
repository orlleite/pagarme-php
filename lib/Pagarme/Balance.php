<?php
class PagarMe_Balance extends PagarMe_Model
{
	public function __construct()
	{
		parent::__construct( array() );			
		
		try
		{
			$request = new PagarMe_Request( '/balance', 'GET' );
			$response = $request->run();
			$this->refresh( $response );
			
			$this->waiting_funds = $response['waiting_funds'];
			$this->available = $response['available'];
			$this->transferred = $response['transferred'];
		}
		catch( Exception $e )
		{
			throw new PagarMe_Exception( $e->getMessage() );
		}
	}
}

?>
