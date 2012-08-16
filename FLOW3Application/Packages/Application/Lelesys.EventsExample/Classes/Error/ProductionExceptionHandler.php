<?php
namespace Lelesys\EventsExample\Error;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A quite exception handler which catches but ignores any exception.
 *
 * This exception handler prints the error message in JSON format required to silently
 * report errors to the REST API client.
 *
 * @FLOW3\Scope("singleton")
 */
class ProductionExceptionHandler extends \TYPO3\FLOW3\Error\AbstractExceptionHandler {

	/**
	 * Constructs this exception handler - registers itself as the default exception handler.
	 *
	 */
	public function __construct() {
		set_exception_handler(array($this, 'handleException'));
	}

	/**
	 * Echoes an exception for the web.
	 *
	 * @param \Exception $exception The exception
	 * @return void
	 */
	protected function echoExceptionWeb(\Exception $exception) {
		if (!headers_sent()) {
			header('Content-Type: application/json');
		}

		if ($exception instanceof \TYPO3\FLOW3\Exception) {
			$errorCode = $exception->getCode();
			$message = $exception->getMessage();
		} else {
			$errorCode = 0;
			$message = 'No further message';
		}
		echo json_encode(array(
			'success' => FALSE,
			'errorCode' => $errorCode,
			'message' => $message
		));
	}

	/**
	 * Echoes an exception for the command line.
	 *
	 * @param \Exception $exception The exception
	 * @return void
	 */
	protected function echoExceptionCli(\Exception $exception) {
		exit(1);
	}
}
?>