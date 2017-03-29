<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 3/28/17
 * Time: 12:03 PM
 */

namespace App\Factory;

class FormGenerator
{
    private $table;
    private $fields = [];

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function getMeta(){
        global $db, $conn;
        $table = $this->table;
        try{

            $stmt = $conn->prepare("DESCRIBE $table");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $meta = array();
                while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                    $meta[] = $row;
                }
                $db->closeConnection();
                return $meta;
            }

        } catch (\PDOException $e){
            echo $e->getMessage();
            return [];
        }
        return [];
    }

    /**
     * @return array
     */
    public function getFields()
    {
        $table_meta = $this->getMeta();
        foreach ($table_meta as $meta){
            if ($meta['Extra'] !='auto_increment'){
                $required = "required";
                if($meta['Null'] == 'Yes'){
                    $required = "";
                }
                $form_attr = array(
                    "name" => $meta['Field'],
                    "required"=>$required
                );
                array_push($this->fields, $form_attr);
            }

        }

      return $this->fields;
    }

    public function makeForm(){
        $fields = $this->getFields();
        $html_form = '';
        $form_begin = '<form>';
        $form_end = '</form>';
        $html_form .= $form_begin;
        foreach ($fields as $field){

            $html_form .='<lable>'.$field['name'].'</lable>:<input type="text" '.$field['required'].'><br><br>';
        }
        $html_form .=$form_end;
        return $html_form;
    }

}

$form = new FormGenerator('orders');
echo $form->makeForm();

