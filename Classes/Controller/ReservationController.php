<?php

namespace Sle\Accommodation\Controller;

use Sle\Accommodation\Service\SendMail;
use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use Sle\Accommodation\Domain\Model\Reservation;

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
 * ReservationController
 */
class ReservationController extends BaseController
{

    /**
     * reservationRepository
     *
     * @var \Sle\Accommodation\Domain\Repository\ReservationRepository
     * @inject
     */
    protected $reservationRepository = null;

    /**
     * accommodationRepository
     *
     * @var \Sle\Accommodation\Domain\Repository\AccommodationRepository
     * @inject
     */
    protected $accommodationRepository = null;

    /**
     * salutationRepository
     *
     * @var \Sle\Accommodation\Domain\Repository\SalutationRepository
     * @inject
     */
    protected $salutationRepository = null;

    /**
     * statusRepository
     *
     * @var \Sle\Accommodation\Domain\Repository\StatusRepository
     * @inject
     */
    protected $statusRepository = null;

    /**
     * Overwrites ActionController::getErrorFlashMessage
     *
     * @see TYPO3\CMS\Extbase\Mvc\Controller\ActionController::getErrorFlashMessage()
     */
    protected function getErrorFlashMessage()
    {
        $this->addFlashMessage(
            LocalizationUtility::translate('flashMessage.formular.invalid', $this->extensionName),
            '',
            AbstractMessage::ERROR
        );

        return false;
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $date = new \DateTime();

        /** @var $newReservation \Sle\Accommodation\Domain\Model\Reservation */
        $newReservation = $this->objectManager->get('Sle\\Accommodation\\Domain\\Model\\Reservation');
        $date->modify('+1 Day');
        $newReservation->setArrival($date->getTimestamp());
        $date->modify('+2 Day');
        $newReservation->setDeparture($date->getTimestamp());

        $accommodation = $this->accommodationRepository->findByUid($this->settings['ff']['accommodation']);
        if ($accommodation) {
            $newReservation->setAccommodation($accommodation);
        }

        $this->view->assignMultiple(array(
            'newReservation' => $newReservation,
            'salutations'    => $this->salutationRepository->findAll(),
        ));
    }

    /**
     * initialize create action
     *
     * @param void
     */
    public function initializeCreateAction()
    {
        $dateProperties = array('arrival', 'departure');

        foreach ($dateProperties as $property) {
            $this->arguments->getArgument('newReservation')
                ->getPropertyMappingConfiguration()->forProperty($property)
                ->setTypeConverterOption(
                    'TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                    DateTimeConverter::CONFIGURATION_DATE_FORMAT,
                    LocalizationUtility::translate('date_format', $this->extensionName)
                );
        }
    }

    /**
     * action create
     *
     * @param \Sle\Accommodation\Domain\Model\Reservation $newReservation
     * @return void
     */
    public function createAction(Reservation $newReservation)
    {
        $this->addFlashMessage(
            LocalizationUtility::translate(
                'flashMessage.reservation.created',
                $this->extensionName
            ),
            '',
            AbstractMessage::OK
        );

        $accommodation = $this->accommodationRepository->findByUid($this->settings['ff']['accommodation']);
        if ($accommodation) {
            $newReservation->setAccommodation($accommodation);
        }

        /**
         * @todo: Staus über die FlexFrom auswählbar machen
         */
        $status = $this->statusRepository->findByUid(1);
        if ($status) {
            $newReservation->setStatus($status);
        }

        $this->reservationRepository->add($newReservation);
        $this->sendNotificationMail($newReservation);
        $this->redirect('success');
    }

    /**
     * action success
     */
    public function successAction()
    {

    }

    /**
     * @param \Sle\Accommodation\Domain\Model\Reservation $newReservation
     * @return bool|null
     */
    private function sendNotificationMail(Reservation $newReservation)
    {
        $status = null;

        if (isset($this->settings['mail']['reservation']['enableSendMail']) &&
            1 == $this->settings['mail']['reservation']['enableSendMail']
        ) {
            $mailSettings = $this->settings['mail']['reservation'];

            if (!empty($mailSettings['to'])) {
                $sendMail = new SendMail();
                $status =$sendMail->sendTemplateEmail(
                    $sendMail->getExplodedEmailAddresses((array) $mailSettings['to']),
                    $sendMail->getExplodedEmailAddresses((array) $mailSettings['from']),
                    LocalizationUtility::translate(
                        $mailSettings['subject'],
                        $this->extensionName,
                        array($newReservation->getAccommodation()->getName())
                    ),
                    GeneralUtility::getFileAbsFileName($mailSettings['mailTemplate']),
                    array(
                        'newReservation' => $newReservation,
                    ),
                    $sendMail->getExplodedEmailAddresses((array) $mailSettings['cc']),
                    $sendMail->getExplodedEmailAddresses((array) $mailSettings['bcc'])
                );
            }
        }

        return $status;
    }

}
