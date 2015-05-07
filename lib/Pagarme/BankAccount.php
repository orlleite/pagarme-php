<?php
class PagarMe_BankAccount extends PagarMe_Model
{
	public function save() 
	{
		try
		{
			$request = new PagarMe_Request( '/bank_accounts', 'POST' );
			$parameters = $this->__toArray( true );
			$request->setParameters( $parameters );
			$response = $request->run();
			return $this->refresh( $response );
		}
		catch( Exception $e )
		{
			throw new PagarMe_Exception( $e->getMessage() );
		}
		
	}
}

?>
