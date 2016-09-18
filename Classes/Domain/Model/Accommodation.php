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
 * Accommodation
 */
class Accommodation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';
    
    /**
     * teaser
     *
     * @var string
     * @validate NotEmpty
     */
    protected $teaser = '';
    
    /**
     * description
     *
     * @var string
     * @validate NotEmpty
     */
    protected $description = '';
    
    /**
     * occupancy
     *
     * @var int
     * @validate NotEmpty
     */
    protected $occupancy = 0;
    
    /**
     * price
     *
     * @var float
     * @validate NotEmpty
     */
    protected $price = 0.0;
    
    /**
     * currency
     *
     * @var string
     * @validate NotEmpty
     */
    protected $currency = '';

    /**
     * unit
     *
     * @var string
     * @validate NotEmpty
     */
    protected $unit = '';
    
    /**
     * priceInformation
     *
     * @var string
     */
    protected $priceInformation = '';
    
    /**
     * mainImage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $mainImage = null;
    
    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $images = null;
    
    /**
     * facilities
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Facility>
     * @lazy
     */
    protected $facilities = null;
    
    /**
     * reservations
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Reservation>
     * @cascade remove
     * @lazy
     */
    protected $reservations = null;
    
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
     * Returns the teaser
     *
     * @return string $teaser
     */
    public function getTeaser()
    {
        return $this->teaser;
    }
    
    /**
     * Sets the teaser
     *
     * @param string $teaser
     * @return void
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the occupancy
     *
     * @return int $occupancy
     */
    public function getOccupancy()
    {
        return $this->occupancy;
    }
    
    /**
     * Sets the occupancy
     *
     * @param int $occupancy
     * @return void
     */
    public function setOccupancy($occupancy)
    {
        $this->occupancy = $occupancy;
    }
    
    /**
     * Returns the price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Sets the price
     *
     * @param float $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    
    /**
     * Returns the priceInformation
     *
     * @return string $priceInformation
     */
    public function getPriceInformation()
    {
        return $this->priceInformation;
    }
    
    /**
     * Sets the priceInformation
     *
     * @param string $priceInformation
     * @return void
     */
    public function setPriceInformation($priceInformation)
    {
        $this->priceInformation = $priceInformation;
    }
    
    /**
     * Returns the mainImage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage
     */
    public function getMainImage()
    {
        return $this->mainImage;
    }
    
    /**
     * Sets the mainImage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage
     * @return void
     */
    public function setMainImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $mainImage)
    {
        $this->mainImage = $mainImage;
    }
    
    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images)
    {
        $this->images = $images;
    }
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->facilities = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->reservations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Facility
     *
     * @param \Sle\Accommodation\Domain\Model\Facility $facility
     * @return void
     */
    public function addFacility(\Sle\Accommodation\Domain\Model\Facility $facility)
    {
        $this->facilities->attach($facility);
    }
    
    /**
     * Removes a Facility
     *
     * @param \Sle\Accommodation\Domain\Model\Facility $facilityToRemove The Facility to be removed
     * @return void
     */
    public function removeFacility(\Sle\Accommodation\Domain\Model\Facility $facilityToRemove)
    {
        $this->facilities->detach($facilityToRemove);
    }
    
    /**
     * Returns the facilities
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Facility> $facilities
     */
    public function getFacilities()
    {
        return $this->facilities;
    }
    
    /**
     * Sets the facilities
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Facility> $facilities
     * @return void
     */
    public function setFacilities(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $facilities)
    {
        $this->facilities = $facilities;
    }
    
    /**
     * Adds a Reservation
     *
     * @param \Sle\Accommodation\Domain\Model\Reservation $reservation
     * @return void
     */
    public function addReservation(\Sle\Accommodation\Domain\Model\Reservation $reservation)
    {
        $this->reservations->attach($reservation);
    }
    
    /**
     * Removes a Reservation
     *
     * @param \Sle\Accommodation\Domain\Model\Reservation $reservationToRemove The Reservation to be removed
     * @return void
     */
    public function removeReservation(\Sle\Accommodation\Domain\Model\Reservation $reservationToRemove)
    {
        $this->reservations->detach($reservationToRemove);
    }
    
    /**
     * Returns the reservations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Reservation> $reservations
     */
    public function getReservations()
    {
        return $this->reservations;
    }
    
    /**
     * Sets the reservations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sle\Accommodation\Domain\Model\Reservation> $reservations
     * @return void
     */
    public function setReservations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $reservations)
    {
        $this->reservations = $reservations;
    }
    
    /**
     * Returns the unit
     *
     * @return string $unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Sets the unit
     *
     * @param string $unit
     * @return void
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

}