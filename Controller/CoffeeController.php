<?php
require("Model/CoffeeModel.php");

class CoffeeController
{
    function CreateCoffeeeDropdownList()
    {
        $coffeeModel = new CoffeeModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type:
                    <select name = 'types'>
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($coffeeModel->GetCoffeeTypes()).
                    "</select>
                        <input type = 'submit' value = 'Search' />
                        </form>";

        return $result;
    }


    function CreateOptionValues(array $valueArray)
    {
        $result = "";
        foreach($valueArray as $value)
        {
            $result = $result . "<option value='$value'>$value</option>";
        }
        return $result;
    }

    function CreateCoffeeTables($types)
    {
        $coffeeModel = new CoffeeModel();
        $coffeeArray = $coffeeModel->getCoffeeByType($types);
        $result = "";

        //Generate a coffeetable for each coffeeeEntity in array
        foreach($coffeeArray as $key => $coffee)
        {
            $result = $result .
                "<table class = 'coffeeTable'>
                    <tr>
                        <th rowspan='6' width='150px'><img runat = 'server' src = '$coffee->image' height='255px' width ='255px'/></th>
                        <th width = '75px' >Name: </th>
                        <td>$coffee->name</td>
                    </tr>
                    
                    <tr>
                        <th>Type: </th>
                        <td>$coffee->type</td>
                    </tr>
                    
                    <tr>
                        <th>Price: </th>
                        <td>$coffee->price</td>
                    </tr>
                    
                    <tr>
                        <th>Roast: </th>
                        <td>$coffee->roast</td>
                    </tr>
                    
                    <tr>
                        <th>Origin: </th>
                        <td>$coffee->country</td>
                    </tr>
                    
                    <tr>
                        <td colspan='2'>$coffee->review</td>
                    </tr>
                </table>";           
        }
        return $result;
    }

    
}