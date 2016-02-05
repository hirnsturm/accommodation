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
 * Test case for class \Sle\Accommodation\Domain\Model\Reservation.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class ReservationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Sle\Accommodation\Domain\Model\Reservation
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Sle\Accommodation\Domain\Model\Reservation();
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
	public function getSurnameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSurname()
		);
	}

	/**
	 * @test
	 */
	public function setSurnameForStringSetsSurname()
	{
		$this->subject->setSurname('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'surname',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPhoneReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPhone()
		);
	}

	/**
	 * @test
	 */
	public function setPhoneForStringSetsPhone()
	{
		$this->subject->setPhone('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'phone',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNumberOfPeopleReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setNumberOfPeopleForIntSetsNumberOfPeople()
	{	}

	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMessage()
		);
	}

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage()
	{
		$this->subject->setMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'message',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPrivacyConfirmationReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getPrivacyConfirmation()
		);
	}

	/**
	 * @test
	 */
	public function setPrivacyConfirmationForBoolSetsPrivacyConfirmation()
	{
		$this->subject->setPrivacyConfirmation(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'privacyConfirmation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSalutationReturnsInitialValueForSalutation()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getSalutation()
		);
	}

	/**
	 * @test
	 */
	public function setSalutationForSalutationSetsSalutation()
	{
		$salutationFixture = new \Sle\Accommodation\Domain\Model\Salutation();
		$this->subject->setSalutation($salutationFixture);

		$this->assertAttributeEquals(
			$salutationFixture,
			'salutation',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAccommodationReturnsInitialValueForAccommodation()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getAccommodation()
		);
	}

	/**
	 * @test
	 */
	public function setAccommodationForAccommodationSetsAccommodation()
	{
		$accommodationFixture = new \Sle\Accommodation\Domain\Model\Accommodation();
		$this->subject->setAccommodation($accommodationFixture);

		$this->assertAttributeEquals(
			$accommodationFixture,
			'accommodation',
			$this->subject
		);
	}
}
