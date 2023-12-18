<?php

class TabInfo
{
    public static function get_col_names($table)
    {
        global $db;
        global $dbname;
        // Query to get columns from table
        $query = $db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table'");
        while ($row = $query->fetch()) {
            $result[] = $row;
        }
        // Array of all column names
        $columnArr = array_column($result, 'COLUMN_NAME');
        return $columnArr;
    }
}
