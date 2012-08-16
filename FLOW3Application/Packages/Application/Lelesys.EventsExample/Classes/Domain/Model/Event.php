<?php
namespace Lelesys\EventsExample\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Event
 *
 * @FLOW3\Entity
 */
class Event {

	/**
	 * The title
	 * @var string
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $title;

	/**
	 * The description
	 * @var string
	 * @ORM\Column(type="text")
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $description;

	/**
	 * The place
	 * @var string
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $place;

	/**
	 * The start time
	 * @var \DateTime
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $startTime;

	/**
	 * The end time
	 * @var \DateTime
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $endTime;

	/**
	 * The time created
	 * @var \DateTime
	 * @FLOW3\Validate(type="NotEmpty")
	 */
	protected $timeCreated;

	/**
	 * The created by
	 * @var \TYPO3\FLOW3\Security\Account
	 * @ORM\ManyToOne
	 */
	protected $createdBy;

	/**
	 * Constructs a new event
	 *
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param \DateTime $startTime Start date and time
	 * @param \DateTime $endTime End date and time
	 */
	public function __construct($title, $description, $place, \DateTime $startTime, \DateTime $endTime) {
		$this->update($title, $description, $place, $startTime, $endTime);
		$this->timeCreated = new \DateTime();
	}

	/**
	 * Updates current event's properties
	 *
	 * @param string $title Title
	 * @param string $description Description
	 * @param string $place Place
	 * @param \DateTime $startTime Start date and time
	 * @param \DateTime $endTime End date and time
	 */
	public function update($title, $description, $place, \DateTime $startTime, \DateTime $endTime) {
		$this->title = $title;
		$this->description = $description;
		$this->place = $place;
		$this->startTime = $startTime;
		$this->endTime = $endTime;
	}

	/**
	 * Get the Event's title
	 *
	 * @return string The Event's title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets this Event's title
	 *
	 * @param string $title The Event's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Get the Event's description
	 *
	 * @return string The Event's description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets this Event's description
	 *
	 * @param string $description The Event's description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Get the Event's place
	 *
	 * @return string The Event's place
	 */
	public function getPlace() {
		return $this->place;
	}

	/**
	 * Sets this Event's place
	 *
	 * @param string $place The Event's place
	 * @return void
	 */
	public function setPlace($place) {
		$this->place = $place;
	}

	/**
	 * Get the Event's start time
	 *
	 * @return \DateTime The Event's start time
	 */
	public function getStartTime() {
		return $this->startTime;
	}

	/**
	 * Sets this Event's start time
	 *
	 * @param \DateTime $startTime The Event's start time
	 * @return void
	 */
	public function setStartTime(\DateTime $startTime) {
		$this->startTime = $startTime;
	}

	/**
	 * Get the Event's end time
	 *
	 * @return \DateTime The Event's end time
	 */
	public function getEndTime() {
		return $this->endTime;
	}

	/**
	 * Sets this Event's end time
	 *
	 * @param \DateTime $endTime The Event's end time
	 * @return void
	 */
	public function setEndTime(\DateTime $endTime) {
		$this->endTime = $endTime;
	}

	/**
	 * Get the Event's time created
	 *
	 * @return \DateTime The Event's time created
	 */
	public function getTimeCreated() {
		return $this->timeCreated;
	}

	/**
	 * Sets this Event's time created
	 *
	 * @param \DateTime $timeCreated The Event's time created
	 * @return void
	 */
	public function setTimeCreated(\DateTime $timeCreated) {
		$this->timeCreated = $timeCreated;
	}

	/**
	 * Get the Event's created by
	 *
	 * @return \TYPO3\FLOW3\Security\Account The Event's created by
	 */
	public function getCreatedBy() {
		return $this->createdBy;
	}

	/**
	 * Sets this Event's created by
	 *
	 * @param \TYPO3\FLOW3\Security\Account $createdBy The Event's created by
	 * @return void
	 */
	public function setCreatedBy(\TYPO3\FLOW3\Security\Account $createdBy) {
		$this->createdBy = $createdBy;
	}

}
?>