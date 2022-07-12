<?php

declare(strict_types=1);

namespace MyTestVendor\MyTestExtension\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class MyMainModelControllerTest extends UnitTestCase
{
    /**
     * @var \MyTestVendor\MyTestExtension\Controller\MyMainModelController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\MyTestVendor\MyTestExtension\Controller\MyMainModelController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllMyMainModelsFromRepositoryAndAssignsThemToView(): void
    {
        $allMyMainModels = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $myMainModelRepository = $this->getMockBuilder(\MyTestVendor\MyTestExtension\Domain\Repository\MyMainModelRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $myMainModelRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMyMainModels));
        $this->subject->_set('myMainModelRepository', $myMainModelRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('myMainModels', $allMyMainModels);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMyMainModelToView(): void
    {
        $myMainModel = new \MyTestVendor\MyTestExtension\Domain\Model\MyMainModel();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('myMainModel', $myMainModel);

        $this->subject->showAction($myMainModel);
    }
}
