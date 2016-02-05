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
     * @validate NotEmpty
     */
    protected $name = '';
    
    /**
     * surname
     *
     * @var string
     * @validate NotEmpty
     */
    protected $surname = '';
    
    /**
     * email
     *
     * @var string
     * @validate NotEmpty
     */
    protected $email = '';
    
    /**
     * phone
     *
     * @var string
     * @validate NotEmpty
     */
    protected $phone = '';
    
    /**
     * numberOfPeople
     *
     * @var int
     * @validate NotEmpty
     */
    protected $numberOfPeople = 0;
    
    /**
     * message
     *
     * @var string
     */
    protected $message = '';
    
    /**
     * privacyConfirmation
     *
     * @var bool
     * @validate NotEmpty
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

}