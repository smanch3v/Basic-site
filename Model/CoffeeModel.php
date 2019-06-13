<?php
require("Entities/CoffeeEntity.php");

class CoffeeModel {

    //Get all coffee types from the database and return them in an array.
    function GetCoffeeTypes() {
        require 'Credentials.php';

        //Open connection and Select database.   
        $con = mysqli_connect($host, $user, $password) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM coffee") or die(mysqli_error($con));
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($con);
        return $types;
    }

    //Get coffeeEntity objects from the database and return them in an array.
    function GetCoffeeByType($type) {
        require 'Credentials.php';

        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $password) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM coffee WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $coffeeArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity(-1, $name, $type, $price, $roast, $country, $image, $review);
            array_push($coffeeArray, $coffee);
        }
        //Close connection and return result
        mysqli_close($con);
        return $coffeeArray;
    }

    function GetCoffeeById($id)
    {
        require 'Credentials.php';

        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $password) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM coffee WHERE type id = $id";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity($id, $name, $type, $price, $roast, $country, $image, $review);
        }
        //Close connection and return result
        mysqli_close($con);
        return $coffee;
    }

    function InsertCoffee(CoffeeEntity $coffee)
    {
        $query = sprintf("INSERT INTO coffee
                    (name,type,price,roast,country,image,review)
                    VALUES
                    ('%s','%s','%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($coffee->name),
        mysqli_real_escape_string($coffee->type),
        mysqli_real_escape_string($coffee->price),
        mysqli_real_escape_string($coffee->roast),
        mysqli_real_escape_string($coffee->country),
        mysqli_real_escape_string("images/Coffee/" . $coffee->image),
        mysqli_real_escape_string($coffee->review));
        $this->PerformQuery($query);
    }

    function UpdateCoffee($id, CoffeeEntity $coffee)
    {
        $query = spinf("UPDATE coffee
                            SET name = '%s',type='%s', price = '%s', roast = '%s',
                            country = '%s', image = '%s', review = '%s'
                            WHERE id = $id",
                 mysqli_real_escape_string($coffee->name),
                 mysqli_real_escape_string($coffee->type),
                 mysqli_real_escape_string($coffee->price),
                 mysqli_real_escape_string($coffee->roast),
                 mysqli_real_escape_string($coffee->country),
                 mysqli_real_escape_string("images/Coffee/" . $coffee->image),
                 mysqli_real_escape_string($coffee->review));
        $this->PerformQuery($query);
    }

    function DeleteCoffee($id)
    {
        $query = "DELETE FROM coffee WHERE id = $id";
        $this->PerformQuery($query);
    }

    function PerformQuery($query)
    {
        //Open connection and select database.
        require './Credentials.php';
        $con = mysqli_connect($host, $user, $password) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        //Execute query and close connection
        mysql_query($query) or die (mysqli_error($con));
        mysqli_close($con);
    }
}

?>