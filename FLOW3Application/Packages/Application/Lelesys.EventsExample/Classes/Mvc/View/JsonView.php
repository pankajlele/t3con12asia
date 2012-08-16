<?php
namespace Lelesys\EventsExample\Mvc\View;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Extended JsonView for the Lelesys.EventsExample package
 *
 * @FLOW3\Scope("singleton")
 */
class JsonView extends \TYPO3\FLOW3\Mvc\View\JsonView {
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
	 * Overrides method to change date format according to the settings
	 *
	 * Traverses the given object structure in order to transform it into an
	 * array structure.
	 *
	 * @param object $object Object to traverse
	 * @param mixed $configuration Configuration for transforming the given object or NULL
	 * @return array Object structure as an aray
	 */
	protected function transformObject($object, $configuration) {
		if ($object instanceof \DateTime) {
			return $object->format($this->settings['event']['dateTimeFormat']);
		}
		return parent::transformObject($object, $configuration);
	}
}

?>