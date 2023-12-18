# easyDB (PHP Module)

will handle your SQL queries with in an easy way, specially created for universty and institute students in their last year project with pure PHP.

## Features

- Queryless
- Easy reusing and customizing
- clean code

## Installation

how to install the easyDB in your projects:

- download easyDB Module as ZIP file, then unzip.
- copy & paste easyDB folder to your project
- finally, in above of your every php file

```php
  include 'init.php';
```

## Documentation

how to use easyDB:

### Select Query

- fetch all data from table:

```php
  $var = DB::selectAll("table_name");
  foreach ($var as $key => $value)
  {
    echo $value['table_field'] . "<br>";
  }
```

- fetch all data with LIMIT from table:

```php
$rows = DB::limit(number)->selectAll("table_name");
foreach ($rows as $key => $value) {

    echo $value['table_field'] . "<br>";
}
```

- fetch data by unique id (Primary Key) from table:

```php
  $var = DB::selectByID("table_name","unique_id");
  foreach ($var as $key => $value)
  {
    echo $value['table_field'] . "<br>";
  }
```

### Insert Query

- insert data to table:

```php
DB::save("table_name", [
    "table_field_name" => "your value"
]);
```

### Update Query

- update record with unique id (Primary Key)

```php
$unique_id = "20";
DB::updateByID("table_name", [
 "table_field_name" => "your new value"
], $unique_id);
```

### Delete Query

- delete record with unique id (Primary Key)

```php
$unique_id = "20";
DB::deleteByID("table_name", $unique_id);
```

# Note

please dont use this module in production eviroment, happy coding my dear :)
