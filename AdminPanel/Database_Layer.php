<?php

function questionDropdown() {
    $query = mysql_query("Select security_ques from ldj_security_question");
    return $query;
}


?>