<?php

declare(strict_types=1);

namespace MyTestVendor\MyTestExtension\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class MyMainModelTest extends UnitTestCase
{
    /**
     * @var \MyTestVendor\MyTestExtension\Domain\Model\MyMainModel|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \MyTestVendor\MyTestExtension\Domain\Model\MyMainModel::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getSubModelsReturnsInitialValueForMySubModel(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSubModels()
        );
    }

    /**
     * @test
     */
    public function setSubModelsForObjectStorageContainingMySubModelSetsSubModels(): void
    {
        $subModel = new \MyTestVendor\MyTestExtension\Domain\Model\MySubModel();
        $objectStorageHoldingExactlyOneSubModels = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSubModels->attach($subModel);
        $this->subject->setSubModels($objectStorageHoldingExactlyOneSubModels);

        self::assertEquals($objectStorageHoldingExactlyOneSubModels, $this->subject->_get('subModels'));
    }

    /**
     * @test
     */
    public function addSubModelToObjectStorageHoldingSubModels(): void
    {
        $subModel = new \MyTestVendor\MyTestExtension\Domain\Model\MySubModel();
        $subModelsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $subModelsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($subModel));
        $this->subject->_set('subModels', $subModelsObjectStorageMock);

        $this->subject->addSubModel($subModel);
    }

    /**
     * @test
     */
    public function removeSubModelFromObjectStorageHoldingSubModels(): void
    {
        $subModel = new \MyTestVendor\MyTestExtension\Domain\Model\MySubModel();
        $subModelsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $subModelsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($subModel));
        $this->subject->_set('subModels', $subModelsObjectStorageMock);

        $this->subject->removeSubModel($subModel);
    }
}
