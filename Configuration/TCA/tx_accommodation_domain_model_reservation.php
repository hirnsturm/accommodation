<?php
return array(
    'ctrl'      => array(
        'title'                  => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation',
        'label'                  => 'surname',
        'label_alt'              => 'name, salutation',
        'label_alt_force'        => true,
        'tstamp'                 => 'tstamp',
        'crdate'                 => 'crdate',
        'cruser_id'              => 'cruser_id',
        'dividers2tabs'          => true,
        'versioningWS'           => 2,
        'versioning_followPages' => true,

        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete'                   => 'deleted',
        'enablecolumns'            => array(
            'disabled'  => 'hidden',
            'starttime' => 'starttime',
            'endtime'   => 'endtime',
        ),
        'searchFields'             => 'status,salutation,name,surname,email,phone,arrival,departure,number_of_people,message,privacy_confirmation,internal_note,accommodation,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('accommodation') . 'Resources/Public/Icons/tx_accommodation_domain_model_reservation.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, status, salutation, name, surname, email, phone, arrival, departure, number_of_people, message, privacy_confirmation, internal_note, accommodation',
    ),
    'types'     => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, status, salutation, name, surname, email, phone, arrival, departure, number_of_people, message, privacy_confirmation, internal_note, accommodation, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
    ),
    'palettes'  => array(
        '1' => array('showitem' => ''),
    ),
    'columns'   => array(

        'sys_language_uid' => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config'  => array(
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'foreign_table'       => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items'               => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent'      => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude'     => 1,
            'label'       => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config'      => array(
                'type'                => 'select',
                'renderType'          => 'selectSingle',
                'items'               => array(
                    array('', 0),
                ),
                'foreign_table'       => 'tx_accommodation_domain_model_reservation',
                'foreign_table_where' => 'AND tx_accommodation_domain_model_reservation.pid=###CURRENT_PID### AND tx_accommodation_domain_model_reservation.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource'  => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),

        't3ver_label' => array(
            'label'  => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max'  => 255,
            )
        ),

        'hidden'    => array(
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config'  => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime'   => array(
            'exclude'   => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label'     => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config'    => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),

        'name'                 => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.name',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'surname'              => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.surname',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'email'                => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.email',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'phone'                => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.phone',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'arrival'              => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.arrival',
            'config'  => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'departure'            => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.departure',
            'config'  => array(
                'type'     => 'input',
                'size'     => 13,
                'max'      => 20,
                'eval'     => 'datetime',
                'checkbox' => 0,
                'default'  => 0,
                'range'    => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'number_of_people'     => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.number_of_people',
            'config'  => array(
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            )
        ),
        'message'              => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.message',
            'config'  => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            )
        ),
        'internal_note'        => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.internal_note',
            'config'  => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            )
        ),
        'privacy_confirmation' => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.privacy_confirmation',
            'config'  => array(
                'type'    => 'check',
                'default' => 0
            )
        ),
        'salutation'           => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.salutation',
            'config'  => array(
                'type'          => 'select',
                'renderType'    => 'selectSingle',
                'foreign_table' => 'tx_accommodation_domain_model_salutation',
                'minitems'      => 0,
                'maxitems'      => 1,
            ),
        ),
        'status'           => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.status',
            'config'  => array(
                'type'          => 'select',
                'renderType'    => 'selectSingle',
                'foreign_table' => 'tx_accommodation_domain_model_status',
                'minitems'      => 0,
                'maxitems'      => 1,
            ),
        ),
        'accommodation'        => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_reservation.accommodation',
            'config'  => array(
                'type'          => 'select',
                'renderType'    => 'selectSingle',
                'foreign_table' => 'tx_accommodation_domain_model_accommodation',
                'minitems'      => 0,
                'maxitems'      => 1,
            ),
        ),

        'accommodation' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
    ),
);