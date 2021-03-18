<?php


    session_start();

    $GLOBALS["sessionName"] = "Heroes";

    function Add($item){

        $heroes = GetList();

        if(count($heroes) == 0){
            $item["id"] = 1;
        }else{

            $lastElement = getLastElement($heroes);

            $item["id"] = $lastElement["id"] + 1;
        }      

        array_push($heroes, $item);

       $_SESSION[$GLOBALS["sessionName"]] = $heroes;         
    }

    function Edit($item){      

        $heroes = GetList();
        $hero = GetById($item["id"]);

        if($hero != null && count($hero) > 0 ){
      
            $index = getIndexElement($heroes,"id",$item["id"]);
            $heroes[$index] = $item;

            $_SESSION[$GLOBALS["sessionName"]] = $heroes;    

        }           
    }


    function GetList(){

        $heroes = isset($_SESSION[$GLOBALS["sessionName"]]) ? $_SESSION[$GLOBALS["sessionName"]] : [];
        
        return $heroes;

    }

    
    function GetById($id){

        $heroes = GetList();

        $heroe = searchProperty($heroes,"id",$id);     
        
        return $heroe[0];
    }


?>



