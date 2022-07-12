<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mytestextension_domain_model_mymainmodel', 'EXT:my_test_extension/Resources/Private/Language/locallang_csh_tx_mytestextension_domain_model_mymainmodel.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mytestextension_domain_model_mymainmodel');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mytestextension_domain_model_mysubmodel', 'EXT:my_test_extension/Resources/Private/Language/locallang_csh_tx_mytestextension_domain_model_mysubmodel.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mytestextension_domain_model_mysubmodel');
})();
