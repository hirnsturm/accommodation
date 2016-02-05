<?php
namespace Sle\Accommodation\Tests\Unit\Controller;
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
 * Test case for class Sle\Accommodation\Controller\ReservationController.
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class ReservationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Sle\Accommodation\Controller\ReservationController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Sle\\Accommodation\\Controller\\ReservationController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenReservationToReservationRepository()
	{
		$reservation = new \Sle\Accommodation\Domain\Model\Reservation();

		$reservationRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$reservationRepository->expects($this->once())->method('add')->with($reservation);
		$this->inject($this->subject, 'reservationRepository', $reservationRepository);

		$this->subject->createAction($reservation);
	}
}
