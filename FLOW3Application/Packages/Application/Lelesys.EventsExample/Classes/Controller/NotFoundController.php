<?php
namespace Lelesys\EventsExample\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * A Special Case of a Controller: If no controller could be resolved this
 * controller is chosen.
 *
 * @FLOW3\Scope("singleton")
 * @api
 */
class NotFoundController extends \TYPO3\FLOW3\Mvc\Controller\AbstractController implements \TYPO3\FLOW3\Mvc\Controller\NotFoundControllerInterface {

	/**
	 * @var \TYPO3\FLOW3\Mvc\View\JsonView
	 * @FLOW3\Inject
	 */
	protected $jsonView;

	/**
	 * @var \TYPO3\FLOW3\Mvc\Controller\Exception
	 */
	protected $exception;

	/**
	 * Sets the controller exception
	 *
	 * @param \TYPO3\FLOW3\Mvc\Controller\Exception $exception
	 * @return void
	 */
	public function setException(\TYPO3\FLOW3\Mvc\Controller\Exception $exception) {
		$this->exception = $exception;
	}

	/**
	 * Processes a generic request and fills the response with the default view
	 *
	 * @param \TYPO3\FLOW3\Mvc\RequestInterface $request The request object
	 * @param \TYPO3\FLOW3\Mvc\ResponseInterface $response The response, modified by this handler
	 * @return void
	 * @api
	 */
	public function processRequest(\TYPO3\FLOW3\Mvc\RequestInterface $request, \TYPO3\FLOW3\Mvc\ResponseInterface $response) {
		$this->initializeController($request, $response);
		$this->jsonView->setControllerContext($this->controllerContext);
		if ($this->exception !== NULL) {
			$this->jsonView->assign('value', array(
				'success' => FALSE,
				'errorCode' => $this->exception->getCode(),
				'message' => $this->exception->getMessage()
			));
		}

		$response->setStatus(404);
		$response->setContent($this->jsonView->render());
	}
}

?>