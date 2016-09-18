<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sle.' . $_EXTKEY,
	'List',
	array(
		'Accommodation' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Accommodation' => '',
		'Reservation' => 'create',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sle.' . $_EXTKEY,
	'Show',
	array(
		'Accommodation' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Accommodation' => '',
		'Reservation' => 'create',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sle.' . $_EXTKEY,
	'Reservation',
	array(
		'Reservation' => 'new, create, success',
		
	),
	// non-cacheable actions
	array(
		'Accommodation' => '',
		'Reservation' => 'create, success',
		
	)
);
