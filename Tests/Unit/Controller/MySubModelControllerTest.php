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
class MySubModelControllerTest extends UnitTestCase
{
    /**
     * @var \MyTestVendor\MyTestExtension\Controller\MySubModelController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\MyTestVendor\MyTestExtension\Controller\MySubModelController::class))
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
    public function listActionFetchesAllMySubModelsFromRepositoryAndAssignsThemToView(): void
    {
        $allMySubModels = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mySubModelRepository = $this->getMockBuilder(\MyTestVendor\MyTestExtension\Domain\Repository\MySubModelRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $mySubModelRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMySubModels));
        $this->subject->_set('mySubModelRepository', $mySubModelRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('mySubModels', $allMySubModels);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMySubModelToView(): void
    {
        $mySubModel = new \MyTestVendor\MyTestExtension\Domain\Model\MySubModel();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('mySubModel', $mySubModel);

        $this->subject->showAction($mySubModel);
    }
}
