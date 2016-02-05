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
 * Test case for class Sle\Accommodation\Controller\AccommodationController.
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 */
class AccommodationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Sle\Accommodation\Controller\AccommodationController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Sle\\Accommodation\\Controller\\AccommodationController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAccommodationsFromRepositoryAndAssignsThemToView()
	{

		$allAccommodations = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$accommodationRepository = $this->getMock('Sle\\Accommodation\\Domain\\Repository\\AccommodationRepository', array('findAll'), array(), '', FALSE);
		$accommodationRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAccommodations));
		$this->inject($this->subject, 'accommodationRepository', $accommodationRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('accommodations', $allAccommodations);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAccommodationToView()
	{
		$accommodation = new \Sle\Accommodation\Domain\Model\Accommodation();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('accommodation', $accommodation);

		$this->subject->showAction($accommodation);
	}
}
