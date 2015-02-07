<?php

include "database_operation.php";

if(getCurrentSentence() == $_GET['cur'])
    echo "true";
else
    echo "false";

?>