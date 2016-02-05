<?php
namespace Sle\Accommodation\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Steve Lenz <kontakt@steve-lenz.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * AccommodationController
 */
class AccommodationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * accommodationRepository
     *
     * @var \Sle\Accommodation\Domain\Repository\AccommodationRepository
     * @inject
     */
    protected $accommodationRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $accommodations = $this->accommodationRepository->findAll();
        $this->view->assign('accommodations', $accommodations);
    }
    
    /**
     * action show
     *
     * @param \Sle\Accommodation\Domain\Model\Accommodation $accommodation
     * @return void
     */
    public function showAction(\Sle\Accommodation\Domain\Model\Accommodation $accommodation)
    {
        $this->view->assign('accommodation', $accommodation);
    }

}