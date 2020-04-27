<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Results </title>
</head>
<body>
    <div class="main">
        <header>
            <h1> Task 5 </h1>
        </header>
    </div>
   <?php
   function getResults($mark){
       $result = "";
       if($mark<40){
           $result = "<h2>Fail </h2>";
       }
       else if ($mark>=40 && $mark<50) {
           $result = "<h2> Supplementary exam </h2>";
       }
       else if ($mark >=50 && $mark <75) {
           $result = "<h2> Pass </h2>";
       }
       elseif($mark >=75){
           $result = "<h2> Distinction </h2>";
       }

       echo $result;
   }
getResults(25);
getResults(40);
getResults(45);
getResults(50);
getResults(74);
 getResults(95);

   ?> 
</body>
</html>