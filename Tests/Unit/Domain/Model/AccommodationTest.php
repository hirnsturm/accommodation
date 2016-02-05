<?php

namespace Sle\Accommodation\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Steve Lenz <kontakt@steve-lenz.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Sle\Accommodation\Domain\Model\Accommodation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class AccommodationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Sle\Accommodation\Domain\Model\Accommodation
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Sle\Accommodation\Domain\Model\Accommodation();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeaserReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserForStringSetsTeaser()
	{
		$this->subject->setTeaser('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'teaser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOccupancyReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setOccupancyForIntSetsOccupancy()
	{	}

	/**
	 * @test
	 */
	public function getPriceReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getPrice()
		);
	}

	/**
	 * @test
	 */
	public function setPriceForFloatSetsPrice()
	{
		$this->subject->setPrice(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'price',
			$this->subject,
			'',
			0.000000001
		);
	}

	/**
	 * @test
	 */
	public function getUnitReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getUnit()
		);
	}

	/**
	 * @test
	 */
	public function setUnitForStringSetsUnit()
	{
		$this->subject->setUnit('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'unit',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPriceInformationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPriceInformation()
		);
	}

	/**
	 * @test
	 */
	public function setPriceInformationForStringSetsPriceInformation()
	{
		$this->subject->setPriceInformation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'priceInformation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMainImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getMainImage()
		);
	}

	/**
	 * @test
	 */
	public function setMainImageForFileReferenceSetsMainImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setMainImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'mainImage',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForFileReferenceSetsImages()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImages($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'images',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFacilitiesReturnsInitialValueForFacility()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getFacilities()
		);
	}

	/**
	 * @test
	 */
	public function setFacilitiesForObjectStorageContainingFacilitySetsFacilities()
	{
		$facility = new \Sle\Accommodation\Domain\Model\Facility();
		$objectStorageHoldingExactlyOneFacilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneFacilities->attach($facility);
		$this->subject->setFacilities($objectStorageHoldingExactlyOneFacilities);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneFacilities,
			'facilities',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addFacilityToObjectStorageHoldingFacilities()
	{
		$facility = new \Sle\Accommodation\Domain\Model\Facility();
		$facilitiesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$facilitiesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($facility));
		$this->inject($this->subject, 'facilities', $facilitiesObjectStorageMock);

		$this->subject->addFacility($facility);
	}

	/**
	 * @test
	 */
	public function removeFacilityFromObjectStorageHoldingFacilities()
	{
		$facility = new \Sle\Accommodation\Domain\Model\Facility();
		$facilitiesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$facilitiesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($facility));
		$this->inject($this->subject, 'facilities', $facilitiesObjectStorageMock);

		$this->subject->removeFacility($facility);

	}

	/**
	 * @test
	 */
	public function getReservationsReturnsInitialValueForReservation()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getReservations()
		);
	}

	/**
	 * @test
	 */
	public function setReservationsForObjectStorageContainingReservationSetsReservations()
	{
		$reservation = new \Sle\Accommodation\Domain\Model\Reservation();
		$objectStorageHoldingExactlyOneReservations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneReservations->attach($reservation);
		$this->subject->setReservations($objectStorageHoldingExactlyOneReservations);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneReservations,
			'reservations',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addReservationToObjectStorageHoldingReservations()
	{
		$reservation = new \Sle\Accommodation\Domain\Model\Reservation();
		$reservationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$reservationsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($reservation));
		$this->inject($this->subject, 'reservations', $reservationsObjectStorageMock);

		$this->subject->addReservation($reservation);
	}

	/**
	 * @test
	 */
	public function removeReservationFromObjectStorageHoldingReservations()
	{
		$reservation = new \Sle\Accommodation\Domain\Model\Reservation();
		$reservationsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$reservationsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($reservation));
		$this->inject($this->subject, 'reservations', $reservationsObjectStorageMock);

		$this->subject->removeReservation($reservation);

	}
}
