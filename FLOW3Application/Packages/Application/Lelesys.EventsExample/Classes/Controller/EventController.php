<?php
namespace Lelesys\EventsExample\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

use TYPO3\FLOW3\Mvc\Controller\RestController;
use \Lelesys\EventsExample\Domain\Model\Event;

/**
 * Event controller for the Lelesys.EventsExample package
 *
 * @FLOW3\Scope("singleton")
 */
class EventController extends RestController {
	/**
	 * @FLOW3\Inject
	 * @var \Lelesys\EventsExample\Domain\Service\EventService
	 */
	protected $eventService;
	/**
	 * @var string
	 */
	protected $resourceArgumentName = 'event';

	/**
	 * @var array
	 */
	protected $viewFormatToObjectNameMap = array('json' => 'Lelesys\EventsExample\Mvc\View\JsonView');

	/**
	 * Initializes the view before invoking an action method.
	 *
	 * Override this method to solve assign variables common for all actions
	 * or prepare the view in another way before the action is called.
	 *
	 * @param \TYPO3\FLOW3\Mvc\View\ViewInterface $view The view to be initialized
	 * @return void
	 */
	protected function initializeView(\TYPO3\FLOW3\Mvc\View\ViewInterface $view) {
		if ($view instanceof \TYPO3\FLOW3\Mvc\View\JsonView) {
			$view->setVariablesToRender(array(
				'success',
				'message',
				'data'
			));
			if ($this->request->getControllerActionName() === 'list') {
				$view->setConfiguration(array(
					'data' => array(
						'_descendAll' => array(
							'_exposeObjectIdentifier' => TRUE,
							'_descend' => array(
								'startTime' => array(),
								'endTime' => array()
							)
						)
					)
				));
			} else {
				$view->setConfiguration(array(
					'data' => array(
						'_exposeObjectIdentifier' => TRUE,
						'_descend' => array(
							'startTime' => array(),
							'endTime' => array()
						)
					)
				));
			}
		}
	}

	/**
	 * Shows a list of events
	 *
	 * @return void
	 */
	public function listAction() {
		$this->view->assignMultiple(array('success' => TRUE, 'message' => 'Events loaded', 'data' => $this->eventService->findAll()));
	}

	/**
	 * Shows a single event object
	 *
	 * @param \Lelesys\EventsExample\Domain\Model\Event $event The event to show
	 * @return void
	 */
	public function showAction(Event $event) {
		$this->view->assignMultiple(array('success' => TRUE, 'message' => 'Event loaded', 'data' => $event));
	}

	/**
	 * Creates new event object from arguments
	 *
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param string $startTime Start date and time in format Y-m-d H:i:s
	 * @param string $endTime End date and time in format Y-m-d H:i:s
	 * @return void
	 */
	public function createAction($title, $description, $place, $startTime, $endTime) {
		$newEvent = $this->eventService->create($title, $description, $place, $startTime, $endTime);
		$this->view->assignMultiple(array('success' => TRUE, 'message' => 'Event created', 'data' => $newEvent));
	}

	/**
	 * Updates the given event object
	 *
	 * @param \Lelesys\EventsExample\Domain\Model\Event $event The event to update
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param string $startTime Start date and time in format Y-m-d H:i:s
	 * @param string $endTime End date and time in format Y-m-d H:i:s
	 * @return void
	 */
	public function updateAction(Event $event, $title, $description, $place, $startTime, $endTime) {
		$updatedEvent = $this->eventService->update($event, $title, $description, $place, $startTime, $endTime);
		$this->view->assignMultiple(array('success' => TRUE, 'message' => 'Event updated', 'data' => $updatedEvent));
	}

	/**
	 * Removes the given event object from the event repository
	 *
	 * @param \Lelesys\EventsExample\Domain\Model\Event $event The event to delete
	 * @return void
	 */
	public function deleteAction(Event $event) {
		$this->eventService->delete($event);
		$this->view->assignMultiple(array('success' => TRUE, 'message' => 'Event deleted'));
	}

	/**
	 * Overrides error handler to send error in JSON response
	 * @return string
	 */
	protected function errorAction() {
		$message = 'An error occurred while trying to call ' . get_class($this) . '->' . $this->actionMethodName . '().' . PHP_EOL;
		foreach ($this->arguments->getValidationResults()->getFlattenedErrors() as $propertyPath => $errors) {
			foreach ($errors as $error) {
				$message .= 'Error for ' . $propertyPath . ':  ' . $error->render() . PHP_EOL;
			}
		}
		$this->view->assignMultiple(array('success' => FALSE, 'message' => $message));
		return NULL;
	}
}

?>