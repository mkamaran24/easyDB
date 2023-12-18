<?php

///////////////////////////////////////////////
///                                         ///
///      Author => Mohammed K. Haider       ///
///                                         ///         
///////////////////////////////////////////////

class DB
{ // start of DB Class

    public static int $limit_number = 0;
    public static array $order_by = [];

    // chainers ////////////////////////////////

    public static function limit(int $number)
    {
        static::$limit_number = $number;
        return new static;
    }

    public static function orderBy(array $order)
    {
        static::$order_by = $order;
        return new static;
    }

    // end of chainers function /////////////////

    ////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////

    // Create Model ////////////////////////////////////////////////
    public static function save(string $table, array $args)
    { // Start of save func
        global $db;
        $columns = array_keys($args);
        $values = array_values($args);
        $sql = $db->prepare("INSERT INTO $table (" . implode(',', $columns) . ")
        VALUES ('" . implode("', '", $values) . "' )");
        $sql->execute();
    } // end of save func
    //////////////////////////////////////////////////////////////////

    // Read Model////////////////////////////////////////////////////
    public static function selectAll(string $table)
    { // start of SelectAll func
        global $db;
        if (static::$limit_number != 0) {
            $limit_num = static::$limit_number;
            $stmt = $db->prepare("SELECT * FROM $table LIMIT $limit_num");
        }
        if (static::$order_by != "") {
            $order_field = array_keys(static::$order_by)[0];
            $order_keyword = array_values(static::$order_by)[0];
            $stmt = $db->prepare("SELECT * FROM $table ORDER BY $order_field $order_keyword");
        }
        if (!(static::$limit_number != 0 || static::$order_by != "")) {
            $stmt = $db->prepare("SELECT * FROM $table");
        }
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    } // end of SelectAll func


    public static function selectByID(string $table, string $id)
    { // start of selectByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        $stmt = $db->prepare("SELECT * FROM $table WHERE $Col_Names[0]=$id");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    } // start of selectByID func
    ///////////////////////////////////////////////////////////////////////////////////

    // Delete Model ///////////////////////////////////////////////////////////////////
    public static function deleteByID(string $table, string $id)
    { // start of deleByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        $stmt = $db->prepare("DELETE FROM $table WHERE $Col_Names[0] = :zid");
        $stmt->bindParam('zid', $id);
        $stmt->execute();
    } // end of deleByID func
    //////////////////////////////////////////////////////////////////////////////////////

    // Update Model //////////////////////////////////////////////////////////////////////
    public static function updateByID(string $table, array $args, string $id)
    { // start of updateByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        $columns = array_keys($args);
        $values = array_values($args);
        $result = '';

        for ($i = 0; $i < count($columns); $i++) {
            $result .= $columns[$i] . '=' . "'$values[$i]'";

            // Add a comma and space if it's not the last element
            if ($i < count($columns) - 1) {
                $result .= ', ';
            }
        }
        echo $result;
        $stmt = $db->prepare("UPDATE $table SET $result WHERE $Col_Names[0] = $id");
        $stmt->execute();
    } // end of updateByID func
}// end of DB Class
