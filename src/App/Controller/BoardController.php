<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/27/17
 * Time: 10:40 PM
 */
namespace App\Controller;

use App\AppInterface\CrudInterface;
use App\DBManager\ComplexQuery;
use App\Entity\Board;


/**
 * Class BoardController
 * @package Controller
 */
class BoardController extends ComplexQuery implements CrudInterface
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
        global $db, $conn;
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
        $boardStatus = $this->board->getBoardStatus();

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
                                                    weekly_impressions,
                                                    board_status
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
                                                    :weekly_impressions,
                                                    :board_status
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
            $stmt->bindParam(":board_status", $boardStatus);
            $stmt->execute();
            $db->closeConnection();
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
        global $db, $conn;

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
        $boardStatus = $this->board->getBoardStatus();


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
                                                seen_by=:seen_by,
                                                board_status=:board_status     
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
            $stmt->bindParam(":board_status", $boardStatus);

            $stmt->execute();
            $db->closeConnection();
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public static function delete($id)
    {
        global $db, $conn;

        try {

            $stmt = $conn->prepare("DELETE FROM boards WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $db->closeConnection();
            return true;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    /**
     * @return mixed
     */
    public static function destroy()
    {
        global $db, $conn;

        try {

            $stmt = $conn->prepare("DELETE FROM boards");
            $stmt->execute();

            $db->closeConnection();
            return true;

        } catch (\PDOException $e) {
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
        global $conn, $db;
        try {

            $stmt = $conn->prepare("SELECT * FROM boards WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $board = array();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);
                $board = array(
                    "id" => $row['id'],
                    "board_code" => $row['board_code'],
                    "width" => $row['width'],
                    "height" => $row['height'],
                    "lat" => $row['lat'],
                    "lgn" => $row['lgn'],
                    "town" => $row['town'],
                    "location" => $row['location'],
                    "board_type" => $row['board_type'],
                    "price" => $row['price'],
                    "owned_by" => $row['owned_by'],
                    "seen_by" => $row['seen_by'],
                    "weekly_impressions" => $row['weekly_impressions'],
                    "image" => $row['image'],
                    "board_status" => $row['board_status']
                );

            }
            $db->closeConnection();
            return $board;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    /**
     * @return mixed
     */
    public static function all()
    {
        global $db, $conn;


        try {

            $stmt = $conn->prepare("SELECT * FROM boards WHERE 1");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $boards = array();
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    if (!empty($row)) {
                        $board = array(
                            "id" => $row['id'],
                            "board_code" => $row['board_code'],
                            "width" => $row['width'],
                            "height" => $row['height'],
                            "lat" => $row['lat'],
                            "lgn" => $row['lgn'],
                            "town" => $row['town'],
                            "location" => $row['location'],
                            "board_type" => $row['board_type'],
                            "price" => $row['price'],
                            "owned_by" => $row['owned_by'],
                            "seen_by" => $row['seen_by'],
                            "weekly_impressions" => $row['weekly_impressions'],
                            "image" => $row['image'],
                            "board_status" => $row['board_status']
                        );
                        $boards[] = $board;
                    }
                }
                $db->closeConnection();
                return $boards;


            } else {
                return [];
            }


        } catch (\PDOException $e) {
            echo $e->getMessage();
            return [];
        }

    }

    public function getBoardObject($id)
    {
        global $conn, $db;
        try {

            $stmt = $conn->prepare("SELECT * FROM boards WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {

                $row = $stmt->fetch(\PDO::FETCH_ASSOC);

                $this->board->setId($row['id']);
                $this->board->setBoardCode($row['board_code']);
                $this->board->setWidth($row['width']);
                $this->board->setHeight($row['height']);
                $this->board->setLat($row['lat']);
                $this->board->setLgn($row['lgn']);
                $this->board->setTown($row['town']);
                $this->board->setLocation($row['location']);
                $this->board->setBoardType($row['board_type']);
                $this->board->setPrice($row['price']);
                $this->board->setOwnedBy($row['owned_by']);
                $this->board->setSeenBy($row['seen_by']);
                $this->board->setWeeklyImpression($row['weekly_impressions']);
                $this->board->setImage($row['image']);
                $this->board->setBoardStatus($row['board_status']);
            }
            $db->closeConnection();
            return $this->board;

        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


}