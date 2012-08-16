<?php
namespace Lelesys\EventsExample\Domain\Service;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use \Lelesys\EventsExample\Domain\Model\Event;

/**
 * A domain service for Events
 *
 * @FLOW3\Scope("singleton")
 */
class EventService {
	/**
	 * @FLOW3\Inject
	 * @var \Lelesys\EventsExample\Domain\Repository\EventRepository
	 */
	protected $eventRepository;

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Security\Context
	 */
	protected $securityContext;

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * Inject settings
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Returns all events in the database
	 *
	 * @return \TYPO3\FLOW3\Persistence\QueryResultInterface
	 */
	public function findAll() {
		return $this->eventRepository->findAll();
	}

	/**
	 * Creates a new event in the database
	 *
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param string $startTime Start date and time
	 * @param string $endTime End date and time
	 * @return \Lelesys\EventsExample\Domain\Model\Event
	 */
	public function create($title, $description, $place, $startTime, $endTime) {
		$newEvent = new Event($title, $description, $place, $this->getDateTime($startTime), $this->getDateTime($endTime));
		if ($this->securityContext->isInitialized() && FLOW3_SAPITYPE === 'Web') {
			$account = $this->securityContext->getAccount();
			if ($account !== NULL) {
				$newEvent->setCreatedBy($account);
			}
		}
		$this->eventRepository->add($newEvent);
		return $newEvent;
	}

	/**
	 * Updates existing event in the database
	 *
	 * @param \Lelesys\EventsExample\Domain\Model\Event $event Event to be updated
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param string $startTime Start date and time
	 * @param string $endTime End date and time
	 * @return \Lelesys\EventsExample\Domain\Model\Event
	 */
	public function update(Event $event, $title, $description, $place, $startTime, $endTime) {
		$event->update($title, $description, $place, $this->getDateTime($startTime), $this->getDateTime($endTime));
		$this->eventRepository->update($event);
		return $event;
	}

	/**
	 * Deletes a event from the database
	 *
	 * @param \Lelesys\EventsExample\Domain\Model\Event $event Event to be deleted
	 */
	public function delete(Event $event) {
		$this->eventRepository->remove($event);
	}

	/**
	 * Returns a DateTime object parsed from a format
	 *
	 * @param $rawDateTime
	 * @return \DateTime
	 */
	protected function getDateTime($rawDateTime) {
		return \DateTime::createFromFormat($this->settings['event']['dateTimeFormat'], $rawDateTime);
	}
}
?>