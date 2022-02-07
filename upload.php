<?php
$foderPath = 'public/images/' . $_FILES['productPhoto']['name'];

if(is_uploaded_file($_FILES['productPhoto']['tmp_name']) && move_uploaded_file($_FILES['productPhoto']['tmp_name'], $foderPath)){
    //echo "<img src='./public/$foderPath'>";
    echo "<img src='./$foderPath'>";
    header('Location: http://localhost:82/be1_mysql/manageproducts.php');
}
else{
    echo "uploaded failed";
}