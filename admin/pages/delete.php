<?php
    $id = $_GET["id"];
    $show = getSliderById($id);
    @unlink("uploads/".$show["img"]);

    if(deleteSlider($id))
    showAlert("Uqurlu", "Melumtlar uqurla silindi", "success");
    else
    showAlert("Xeta", "Melumtlar silinerken xeta", "error");  

?>