<?php

declare(strict_types=1);

namespace MyTestVendor\MyTestExtension\Controller;


/**
 * This file is part of the "My Test Extension" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * MySubModelController
 */
class MySubModelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * mySubModelRepository
     *
     * @var \MyTestVendor\MyTestExtension\Domain\Repository\MySubModelRepository
     */
    protected $mySubModelRepository = null;

    /**
     * @param \MyTestVendor\MyTestExtension\Domain\Repository\MySubModelRepository $mySubModelRepository
     */
    public function injectMySubModelRepository(\MyTestVendor\MyTestExtension\Domain\Repository\MySubModelRepository $mySubModelRepository)
    {
        $this->mySubModelRepository = $mySubModelRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $mySubModels = $this->mySubModelRepository->findAll();
        $this->view->assign('mySubModels', $mySubModels);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \MyTestVendor\MyTestExtension\Domain\Model\MySubModel $mySubModel
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\MyTestVendor\MyTestExtension\Domain\Model\MySubModel $mySubModel): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('mySubModel', $mySubModel);
        return $this->htmlResponse();
    }
}
