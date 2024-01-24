<?php

/*
this is an EXAMPLE file,
you can copy codes here, and paste it in your codes,
then use it as you like :)
*/

// test 
// test 2
// test3

// Config File ////////////////
include 'init.php';
// End of Config File ////////

// // INSERT Query //////////////////////////
// DB::save("users", [
//     "ID " => 1,
//     "USERNAME" => "Hi@app.com",
//     "PASSWORD" => "123123"
// ]);
// // End of INSERT Query ///////////////////

// // SELECT Query //////////////////////////

// // selectAll without limit
// $rows = DB::selectAll("users");
// foreach ($rows as $key => $value) {

//     echo $value['USERNAME'] . "<br>";
// }

// // selectAll with limit
// $rows = DB::limit(1)->selectAll("users");
// foreach ($rows as $key => $value) {

//     echo $value['USERNAME'] . "<br>";
// }

// // select by ID
// DB::selectByID("users", "1");
// foreach ($rows as $key => $value) {

//     echo $value['USERNAME'] . "<br>";
//     echo $value['EMPLOYEE_ID'] . "<br>";
// }

// // End of SELECT Query ///////////////////

// // UPDATE Query //////////////////////////

// $unique_id = "20";
// DB::updateByID("users", [
//     "EMPLOYEE_ID " => 1,
//     "USERNAME" => "Hi@app.net",
//     "PASSWORD" => "123123"
// ], $unique_id);

// // End of UPDATE Query ///////////////////

// // DELETE Query /////////////////////////

// DB::deleteByID("users", "9");

// // End of DELETE Query ///////////////////


// $rows = DB::orderBy(["USERNAME" => "DESC"])->limit(2)->selectAll("users");
// foreach ($rows as $key => $value) {

//     echo $value['USERNAME'] . "<br>";
// }
