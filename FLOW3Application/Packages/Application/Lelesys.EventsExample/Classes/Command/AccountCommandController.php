<?php
namespace Lelesys\EventsExample\Command;

/*                                                                        *
 * This script belongs to the FLOW3 package "Lelesys.EventsExample".      *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Account command controller for the Lelesys.EventsExample package
 *
 * @FLOW3\Scope("singleton")
 */
class AccountCommandController extends \TYPO3\FLOW3\Cli\CommandController {
	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\Party\Domain\Repository\PartyRepository
	 */
	protected $partyRepository;

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Security\AccountRepository
	 */
	protected $accountRepository;

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\FLOW3\Security\AccountFactory
	 */
	protected $accountFactory;

	/**
	 * Create an admin account
	 *
	 * Creates a new account which has administrator rights.
	 *
	 * @param string $identifier Account identifier, aka "user name"
	 * @param string $password Plain text password for the new account
	 * @param string $firstName First name of the account's holder
	 * @param string $lastName Last name of the account's holder
	 * @return void
	 */
	public function createCommand($identifier, $password, $firstName, $lastName) {
		$account = $this->accountFactory->createAccountWithPassword($identifier, $password, array('Administrator'));
		$this->accountRepository->add($account);

		$personName = new \TYPO3\Party\Domain\Model\PersonName('', $firstName, '', $lastName);
		$person = new \TYPO3\Party\Domain\Model\Person();
		$person->setName($personName);
		$person->addAccount($account);
		$this->partyRepository->add($person);

		$this->outputLine('The account "%s" was created.', array($identifier));
	}

}

?>