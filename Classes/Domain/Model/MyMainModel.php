<?php

declare(strict_types=1);

namespace MyTestVendor\MyTestExtension\Domain\Model;


/**
 * This file is part of the "My Test Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * MyMainModel
 */
class MyMainModel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * subModels
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MyTestVendor\MyTestExtension\Domain\Model\MySubModel>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $subModels = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->subModels = $this->subModels ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Adds a MySubModel
     *
     * @param \MyTestVendor\MyTestExtension\Domain\Model\MySubModel $subModel
     * @return void
     */
    public function addSubModel(\MyTestVendor\MyTestExtension\Domain\Model\MySubModel $subModel)
    {
        $this->subModels->attach($subModel);
    }

    /**
     * Removes a MySubModel
     *
     * @param \MyTestVendor\MyTestExtension\Domain\Model\MySubModel $subModelToRemove The MySubModel to be removed
     * @return void
     */
    public function removeSubModel(\MyTestVendor\MyTestExtension\Domain\Model\MySubModel $subModelToRemove)
    {
        $this->subModels->detach($subModelToRemove);
    }

    /**
     * Returns the subModels
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MyTestVendor\MyTestExtension\Domain\Model\MySubModel>
     */
    public function getSubModels()
    {
        return $this->subModels;
    }

    /**
     * Sets the subModels
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\MyTestVendor\MyTestExtension\Domain\Model\MySubModel> $subModels
     * @return void
     */
    public function setSubModels(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subModels)
    {
        $this->subModels = $subModels;
    }
}
