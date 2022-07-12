<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'MyTestExtension',
        'Mytestplugin',
        [
            \MyTestVendor\MyTestExtension\Controller\MyMainModelController::class => 'index, list, show',
            \MyTestVendor\MyTestExtension\Controller\MySubModelController::class => 'index, list, show'
        ],
        // non-cacheable actions
        [
            \MyTestVendor\MyTestExtension\Controller\MyMainModelController::class => '',
            \MyTestVendor\MyTestExtension\Controller\MySubModelController::class => ''
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    mytestplugin {
                        iconIdentifier = my_test_extension-plugin-mytestplugin
                        title = LLL:EXT:my_test_extension/Resources/Private/Language/locallang_db.xlf:tx_my_test_extension_mytestplugin.name
                        description = LLL:EXT:my_test_extension/Resources/Private/Language/locallang_db.xlf:tx_my_test_extension_mytestplugin.description
                        tt_content_defValues {
                            CType = list
                            list_type = mytestextension_mytestplugin
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
