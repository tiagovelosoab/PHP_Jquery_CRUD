<?php
    $conexao=mysqli_connect("localhost","root","","crud");
    if(mysqli_errno($conexao)){
        echo mysqli_error($conexao);
    }
    ?>