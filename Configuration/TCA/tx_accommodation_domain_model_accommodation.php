<?php
return array(
    'ctrl'      => array(
        'title'                  => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation',
        'label'                  => 'name',
        'tstamp'                 => 'tstamp',
        'crdate'                 => 'crdate',
        'cruser_id'              => 'cruser_id',
        'dividers2tabs'          => true,
        'sortby'                 => 'sorting',
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
        'searchFields'             => 'name,teaser,description,occupancy,price,currency,unit,price_information,main_image,images,facilities,reservations,',
        'iconfile'                 => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('accommodation') . 'Resources/Public/Icons/tx_accommodation_domain_model_accommodation.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, teaser, description, occupancy, price, currency, unit, price_information, main_image, images, facilities, reservations',
    ),
    'types'     => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, teaser, description;;;richtext:rte_transform[mode=ts_links], occupancy, price, currency, unit, price_information, main_image, images, facilities, reservations, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
                'foreign_table'       => 'tx_accommodation_domain_model_accommodation',
                'foreign_table_where' => 'AND tx_accommodation_domain_model_accommodation.pid=###CURRENT_PID### AND tx_accommodation_domain_model_accommodation.sys_language_uid IN (-1,0)',
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

        'name'              => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.name',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'teaser'            => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.teaser',
            'config'  => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim,required'
            )
        ),
        'description'       => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.description',
            'config'  => array(
                'type'    => 'text',
                'cols'    => 40,
                'rows'    => 15,
                'eval'    => 'trim,required',
                'wizards' => array(
                    'RTE' => array(
                        'icon'          => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly'       => 1,
                        'module'        => array(
                            'name'          => 'wizard_rich_text_editor',
                            'urlParameters' => array(
                                'mode' => 'wizard',
                                'act'  => 'wizard_rte.php'
                            )
                        ),
                        'title'         => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type'          => 'script'
                    )
                )
            ),
        ),
        'occupancy'         => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.occupancy',
            'config'  => array(
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            )
        ),
        'price'             => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.price',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            )
        ),
        'currency'          => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.currency',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'unit'              => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.unit',
            'config'  => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'price_information' => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.price_information',
            'config'  => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            )
        ),
        'main_image'        => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.main_image',
            'config'  => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'main_image',
                array(
                    'appearance'    => array(
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ),
                    'foreign_types' => array(
                        '0'                                                 => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT        => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        )
                    ),
                    'maxitems'      => 1
                ),
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ),
        'images'            => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.images',
            'config'  => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                array(
                    'appearance'    => array(
                        'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                    ),
                    'foreign_types' => array(
                        '0'                                                 => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT        => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO       => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        ),
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                            'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                        )
                    ),
                    'maxitems'      => 1
                ),
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ),
        'facilities'        => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.facilities',
            'config'  => array(
                'type'          => 'select',
                'renderType'    => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_accommodation_domain_model_facility',
                'MM'            => 'tx_accommodation_accommodation_facility_mm',
                'size'          => 10,
                'autoSizeMax'   => 30,
                'maxitems'      => 9999,
                'multiple'      => 0,
                'wizards'       => array(
                    '_PADDING'  => 1,
                    '_VERTICAL' => 1,
                    'edit'      => array(
                        'module'                   => array(
                            'name' => 'wizard_edit',
                        ),
                        'type'                     => 'popup',
                        'title'                    => 'Edit',
                        'icon'                     => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams'             => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                    ),
                    'add'       => Array(
                        'module' => array(
                            'name' => 'wizard_add',
                        ),
                        'type'   => 'script',
                        'title'  => 'Create new',
                        'icon'   => 'add.gif',
                        'params' => array(
                            'table'    => 'tx_accommodation_domain_model_facility',
                            'pid'      => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ),
                    ),
                ),
            ),
        ),
        'reservations'      => array(
            'exclude' => 0,
            'label'   => 'LLL:EXT:accommodation/Resources/Private/Language/locallang_db.xlf:tx_accommodation_domain_model_accommodation.reservations',
            'config'  => array(
                'type'          => 'inline',
                'foreign_table' => 'tx_accommodation_domain_model_reservation',
                'foreign_field' => 'accommodation',
                'maxitems'      => 9999,
                'appearance'    => array(
                    'collapseAll'                     => 0,
                    'levelLinksPosition'              => 'top',
                    'showSynchronizationLink'         => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink'         => 1
                ),
            ),

        ),

    ),
);