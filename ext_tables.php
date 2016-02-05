<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Sle.' . $_EXTKEY,
	'List',
	'Accommodation List'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Sle.' . $_EXTKEY,
	'Show',
	'Accommodation Details'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Sle.' . $_EXTKEY,
	'Reservation',
	'Accommodation Reservation'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Accommodation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_accommodation_domain_model_accommodation', 'EXT:accommodation/Resources/Private/Language/locallang_csh_tx_accommodation_domain_model_accommodation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_accommodation_domain_model_accommodation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_accommodation_domain_model_facility', 'EXT:accommodation/Resources/Private/Language/locallang_csh_tx_accommodation_domain_model_facility.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_accommodation_domain_model_facility');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_accommodation_domain_model_reservation', 'EXT:accommodation/Resources/Private/Language/locallang_csh_tx_accommodation_domain_model_reservation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_accommodation_domain_model_reservation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_accommodation_domain_model_salutation', 'EXT:accommodation/Resources/Private/Language/locallang_csh_tx_accommodation_domain_model_salutation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_accommodation_domain_model_salutation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_accommodation_domain_model_accommodation'
);
