<?php
class Database
{
    public $pdo, $sql, $cursor;

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=laravel_2", "root", "");
        $this->pdo->query("SET NAMES utf8");
    }

    // method to set the value of the sql property
    public function setQuery($sql)
    {
        $this->sql = $sql;
    }

    // method to execute a prepared PDO statement
    public function execute($option = array())
    {
        // prepare the PDO statement using the sql property as the query
        $this->cursor = $this->pdo->prepare($this->sql);

        // bind any values in the $option array to placeholders in the query
        if ($option) {
            for ($i = 0; $i < count($option); $i++) {
                $this->cursor->bindParam($i + 1, $option[$i]);
            }
        }

        // execute the prepared statement
        $this->cursor->execute();

        // return the PDO statement object
        return $this->cursor;
    }

    // method to fetch all rows from a result set as objects
    public function loadAllRow($option = array())
    {
        // if the $option array is provided, call the execute method with it
        // and return false if the execute method returns false
        if ($option) {
            if (!$result = $this->execute($option)) {
                return false;
            }
        }
        // if the $option array is not provided, call the execute method without arguments
        // and return false if the execute method returns false
        else {
            if (!$result = $this->execute()) {
                return false;
            }
        }

        // fetch all rows from the result set as objects and return them
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    // This function is used to load a single row of data from a database table.
    // The $option parameter is an optional array of options that can be used to specify a particular query to execute.
    function loadRow($option = array())
    {

        // If the $option parameter was passed, try to execute the query using the execute() method
        // and pass $option as an argument. If $option was not passed, try to execute the query without any arguments.
        if ($option) {
            if (!$result = $this->execute($option)) {
                return false;
            }
        } else {
            if (!$result = $this->execute()) {
                return false;
            }
        }

        // If the execute() method returned a result, use the fetch() method of the result object
        // to retrieve a single row of data as an object, using the PDO::FETCH_OBJ constant to specify
        // that the row should be returned as an object. Return the row of data.
        return $result->fetch(PDO::FETCH_OBJ);
    }


    // This method is used to retrieve the ID of the last inserted row in a database table.
    function getLastId()
    {
        // Return the ID of the last inserted row by accessing the lastInsertId() method of the $pdo property,
        // which is an instance of the PDO class.
        return $this->pdo->lastInsertId();
    }

    // This method is used to close the database connection.
    function disconect()
    {
        // Set the value of the $pdo property to null, which will close the connection to the database
        // if the PDO instance is using a persistent connection.
        $this->pdo = null;
    }
}
