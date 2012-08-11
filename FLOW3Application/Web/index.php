<?php

/*                                                                        *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

$rootPath = isset($_SERVER['FLOW3_ROOTPATH']) ? $_SERVER['FLOW3_ROOTPATH'] : FALSE;
if ($rootPath === FALSE && isset($_SERVER['REDIRECT_FLOW3_ROOTPATH'])) {
	$rootPath = $_SERVER['REDIRECT_FLOW3_ROOTPATH'];
}
if ($rootPath === FALSE) {
	$rootPath = dirname(__FILE__) . '/../';
} elseif (substr($rootPath, -1) !== '/') {
	$rootPath .= '/';
}

require($rootPath . 'Packages/Framework/TYPO3.FLOW3/Classes/Core/Bootstrap.php');

$context = getenv('FLOW3_CONTEXT') ?: (getenv('REDIRECT_FLOW3_CONTEXT') ?: 'Development');
$bootstrap = new \TYPO3\FLOW3\Core\Bootstrap($context);
$bootstrap->run();

?>