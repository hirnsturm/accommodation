<?php
namespace Sle\Accommodation\Domain\Model;

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
 * Reservation
 */
class Reservation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @validate
     */
    protected $name = null;

    /**
     * surname
     *
     * @var string
     * @validate NotEmpty, StringLength(minimum=3, maximum=255)
     */
    protected $surname = null;

    /**
     * email
     *
     * @var string
     * @validate NotEmpty, EmailAddress
     */
    protected $email = null;

    /**
     * phone
     *
     * @var string
     * @validate NotEmpty, String
     */
    protected $phone = null;

    /**
     * arrival
     *
     * @var \DateTime
     * @validate NotEmpty, DateTime
     */
    protected $arrival = null;

    /**
     * arrival
     *
     * @var \DateTime
     * @validate NotEmpty, DateTime
     */
    protected $departure = null;

    /**
     * numberOfPeople
     *
     * @var int
     * @validate NotEmpty, Integer, NumberRange(minimum="1", maximum="4")
     */
    protected $numberOfPeople = 2;

    /**
     * message
     *
     * @var string
     * @validate String
     */
    protected $message = null;

    /**
     * internalNote
     *
     * @var string
     * @validate String
     */
    protected $internalNote = null;

    /**
     * privacyConfirmation
     *
     * @var bool
     * @validate RegularExpression(regularExpression=/1/)
     */
    protected $privacyConfirmation = false;

    /**
     * salutation
     *
     * @var \Sle\Accommodation\Domain\Model\Salutation
     */
    protected $salutation = null;

    /**
     * accommodation
     *
     * @var \Sle\Accommodation\Domain\Model\Accommodation
     */
    protected $accommodation = null;

    /**
     * status
     *
     * @var \Sle\Accommodation\Domain\Model\Status
     */
    protected $status = null;

    /**
     * @var string
     * @validate \SJBR\SrFreecap\Validation\Validator\CaptchaValidator
     */
    protected $captcha;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the surname
     *
     * @return string $surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Sets the surname
     *
     * @param string $surname
     * @return void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the arrival
     *
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * Sets the arrival
     *
     * @param string $arrival
     * @return void
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
    }

    /**
     * Returns the departure
     *
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * Sets the departure
     *
     * @param string $departure
     * @return void
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
    }

    /**
     * Returns the salutation
     *
     * @return \Sle\Accommodation\Domain\Model\Salutation $salutation
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Sets the salutation
     *
     * @param \Sle\Accommodation\Domain\Model\Salutation $salutation
     * @return void
     */
    public function setSalutation(\Sle\Accommodation\Domain\Model\Salutation $salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * Returns the numberOfPeople
     *
     * @return int $numberOfPeople
     */
    public function getNumberOfPeople()
    {
        return $this->numberOfPeople;
    }

    /**
     * Sets the numberOfPeople
     *
     * @param int $numberOfPeople
     * @return void
     */
    public function setNumberOfPeople($numberOfPeople)
    {
        $this->numberOfPeople = $numberOfPeople;
    }

    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the privacyConfirmation
     *
     * @return bool $privacyConfirmation
     */
    public function getPrivacyConfirmation()
    {
        return $this->privacyConfirmation;
    }

    /**
     * Sets the privacyConfirmation
     *
     * @param bool $privacyConfirmation
     * @return void
     */
    public function setPrivacyConfirmation($privacyConfirmation)
    {
        $this->privacyConfirmation = $privacyConfirmation;
    }

    /**
     * Returns the boolean state of privacyConfirmation
     *
     * @return bool
     */
    public function isPrivacyConfirmation()
    {
        return $this->privacyConfirmation;
    }

    /**
     * Returns the accommodation
     *
     * @return \Sle\Accommodation\Domain\Model\Accommodation $accommodation
     */
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * Sets the accommodation
     *
     * @param \Sle\Accommodation\Domain\Model\Accommodation $accommodation
     * @return void
     */
    public function setAccommodation(\Sle\Accommodation\Domain\Model\Accommodation $accommodation)
    {
        $this->accommodation = $accommodation;
    }

    /**
     * @return status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \Sle\Accommodation\Domain\Model\Status $status
     */
    public function setStatus(\Sle\Accommodation\Domain\Model\Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getInternalNote()
    {
        return $this->internalNote;
    }

    /**
     * @param string $internalNote
     */
    public function setInternalNote($internalNote)
    {
        $this->internalNote = $internalNote;
    }

    /**
     * @return string
     */
    public function getCaptcha()
    {
        return $this->captcha;
    }

    /**
     * @param $captcha
     * @return $this
     */
    public function setCaptcha($captcha)
    {
        $this->captcha = $captcha;

        return $this;
    }

}