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
 * MyMainModelController
 */
class MyMainModelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * myMainModelRepository
     *
     * @var \MyTestVendor\MyTestExtension\Domain\Repository\MyMainModelRepository
     */
    protected $myMainModelRepository = null;

    /**
     * @param \MyTestVendor\MyTestExtension\Domain\Repository\MyMainModelRepository $myMainModelRepository
     */
    public function injectMyMainModelRepository(\MyTestVendor\MyTestExtension\Domain\Repository\MyMainModelRepository $myMainModelRepository)
    {
        $this->myMainModelRepository = $myMainModelRepository;
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
        $myMainModels = $this->myMainModelRepository->findAll();
        $this->view->assign('myMainModels', $myMainModels);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \MyTestVendor\MyTestExtension\Domain\Model\MyMainModel $myMainModel
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\MyTestVendor\MyTestExtension\Domain\Model\MyMainModel $myMainModel): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('myMainModel', $myMainModel);
        return $this->htmlResponse();
    }
}
