<?php
class PagarMe_Transfer extends PagarMe_Model
{
	public function create() 
	{
		try
		{
			$request = new PagarMe_Request( '/transfers', 'POST' );
			$parameters = $this->__toArray( true );
			$request->setParameters( $parameters );
			$response = $request->run();
			$this->id = $response->id;
			$this->funding_estimated_date = $response->funding_estimated_date;
			return $this->refresh( $response );
		}
		catch( Exception $e )
		{
			if( $e->getCode() == 0 )
			{
				$this->id = NULL;
				$this->error = 'Saldo insuficiente.';
			}
			else
				throw new PagarMe_Exception( $e->getMessage() );
		}
		
	}
}

?>
