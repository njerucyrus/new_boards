<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:27 PM
 */

namespace App\Entity;


class Board
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $boardCode;
    /**
     * @var float
     */
    private $width;
    /**
     * @var float
     */
    private $height;
    /**
     * @var float
     */
    private $lat;
    /**
     * @var float
     */
    private $lgn;
    /**
     * @var string
     */
    private $town;
    /**
     * @var string
     */
    private $location;
    /**
     * @var string
     */
    private $boardType;
    /**
     * @var float
     */
    private $price;
    /**
     * @var
     */
    private $ownedBy;
    /**
     * @var int
     */
    private $seenBy;
    /**
     * @var string
     */
    private  $image;
    /**
     * @var int
     */
    private $weeklyImpression;

    /**
     * @var string
     */
    private $boardStatus;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBoardCode()
    {
        return $this->boardCode;
    }

    /**
     * @param string $boardCode
     */
    public function setBoardCode($boardCode)
    {
        $this->boardCode = $boardCode;
    }

    /**
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param float $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLgn()
    {
        return $this->lgn;
    }

    /**
     * @param float $lgn
     */
    public function setLgn($lgn)
    {
        $this->lgn = $lgn;
    }

    /**
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param string $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getBoardType()
    {
        return $this->boardType;
    }

    /**
     * @param string $boardType
     */
    public function setBoardType($boardType)
    {
        $this->boardType = $boardType;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * @param mixed $ownedBy
     */
    public function setOwnedBy($ownedBy)
    {
        $this->ownedBy = $ownedBy;
    }

    /**
     * @return int
     */
    public function getSeenBy()
    {
        return $this->seenBy;
    }

    /**
     * @param int $seenBy
     */
    public function setSeenBy($seenBy)
    {
        $this->seenBy = $seenBy;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getWeeklyImpression()
    {
        return $this->weeklyImpression;
    }

    /**
     * @param int $weeklyImpression
     */
    public function setWeeklyImpression($weeklyImpression)
    {
        $this->weeklyImpression = $weeklyImpression;
    }

    /**
     * @return string
     */
    public function getBoardStatus()
    {
        return $this->boardStatus;
    }

    /**
     * @param string $boardStatus
     */
    public function setBoardStatus($boardStatus)
    {
        $this->boardStatus = $boardStatus;
    }

}