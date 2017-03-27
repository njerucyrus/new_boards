<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:40 PM
 */

namespace Controller;

use AppInterface\CrudInterface;
use Doctrine\DBAL\Driver\PDOException;
use Entity\Board;

/**
 * Class BoardController
 * @package Controller
 */
class BoardController implements CrudInterface
{
    /**
     * @var Board
     */
    private $board;

    /**
     * BoardController constructor.
     * @param $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        global $conn;
        $boardCode = $this->board->getBoardCode();
        $width = $this->board->getWidth();
        $height = $this->board->getHeight();
        $lat = $this->board->getLat();
        $lgn = $this->board->getLgn();
        $town = $this->board->getTown();
        $location = $this->board->getLocation();
        $boardType = $this->board->getBoardType();
        $price = $this->board->getPrice();
        $ownedBy = $this->board->getOwnedBy();
        $image = $this->board->getImage();
        $seenBy = $this->board->getSeenBy();
        $weeklyImpressions = $this->board->getWeeklyImpression();

        try {
            $stmt = $conn->prepare("INSERT INTO boards(
                                                    board_code,
                                                    width,
                                                    height,
                                                    lat,
                                                    lgn,
                                                    town,
                                                    location, 
                                                    seen_by,
                                                    board_type,
                                                    price,
                                                    owned_by,
                                                    image,
                                                    weekly_impressions
                                                  )
                                            VALUES(
                                                    :board_code,
                                                    :width,
                                                    :height,
                                                    :lat,
                                                    :lgn,
                                                    :town,
                                                    :location,
                                                    :seen_by,
                                                    :board_type,
                                                    :price,
                                                    :owned_by,
                                                    :image,
                                                    :weekly_impressions
                                                    )
                                            ");

            $stmt->bindParam(":board_code", $boardCode);
            $stmt->bindParam(":width", $width);
            $stmt->bindParam(":height", $height);
            $stmt->bindParam(":lat", $lat);
            $stmt->bindParam(":lgn", $lgn);
            $stmt->bindParam(":town", $town);
            $stmt->bindParam(":board_type", $boardType);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":owned_by", $ownedBy);
            $stmt->bindParam(":weekly_impressions", $weeklyImpressions);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":seen_by", $seenBy);

            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            return false;
        }


    }

    /**
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        global $conn;

        $boardCode = $this->board->getBoardCode();
        $width = $this->board->getWidth();
        $height = $this->board->getHeight();
        $lat = $this->board->getLat();
        $lgn = $this->board->getLgn();
        $town = $this->board->getTown();
        $location = $this->board->getLocation();
        $boardType = $this->board->getBoardType();
        $price = $this->board->getPrice();
        $ownedBy = $this->board->getOwnedBy();
        $image = $this->board->getImage();
        $seenBy = $this->board->getSeenBy();
        $weeklyImpressions = $this->board->getWeeklyImpression();

        try {
            $stmt = $conn->prepare("UPDATE boards SET
                                                board_code=:board_code,
                                                width=:width,
                                                height=:height,
                                                lat=:lat,
                                                lgn=:lgn,
                                                town=:town,
                                                board_type=:board_type,
                                                price=:price,
                                                owned_by=:owned_by,
                                                image=:image,
                                                weekly_impressions=:weekly_impressions, 
                                                location=:location,
                                                seen_by=:seen_by
                                                WHERE 
                                                id=:id");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":board_code", $boardCode);
            $stmt->bindParam(":width", $width);
            $stmt->bindParam(":height", $height);
            $stmt->bindParam(":lat", $lat);
            $stmt->bindParam(":lgn", $lgn);
            $stmt->bindParam(":town", $town);
            $stmt->bindParam(":board_type", $boardType);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":image", $image);
            $stmt->bindParam(":owned_by", $ownedBy);
            $stmt->bindParam(":weekly_impressions", $weeklyImpressions);
            $stmt->bindParam(":location", $location);
            $stmt->bindParam(":seen_by", $seenBy);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        global $conn;

        try{

            $stmt = $conn->prepare("DELETE FROM boards WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;

        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * @return mixed
     */
    public static function destroy()
    {
        global $conn;

        try{

            $stmt = $conn->prepare("DELETE FROM boards");
            $stmt->execute();
            return true;

        } catch (\PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getId($id)
    {
        global $conn;
        try {

            $stmt = $conn->prepare("SELECT * FROM boards WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $board = $stmt->rowCount() > 0 ? $stmt->fetch(\PDO::FETCH_ASSOC) : [];
            return $board;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    /**
     * @return mixed
     */
    public static function all()
    {
        global $conn;

        try {

            $stmt = $conn->prepare("SELECT * FROM boards WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $boards = array();
                while ($board = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    if (!empty($boards)) {
                        $boards[] = $board;
                    }
                }
                return $boards;
            } else {
                return [];
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

}