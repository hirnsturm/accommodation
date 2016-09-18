<?php
namespace Sle\Accommodation\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

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
 * BaseController
 */
class BaseController extends ActionController
{

    /**
     * cObject
     *
     * @var object
     */
    protected $cObject = null;

    /**
     * The uid of the current content element
     * @var int
     */
    protected $uid = null;

    /**
     *
     */
    public function initializeAction()
    {
        $this->cObject = $this->configurationManager->getContentObject();
        $this->uid = $this->cObject->data['uid'];
    }

    /**
     *
     */
    public function initializeView(ViewInterface $view)
    {
        $this->view->assignMultiple(
            array(
                'cObject' => $this->cObject,
                'uid'     => $this->uid,
            )
        );
    }

}
