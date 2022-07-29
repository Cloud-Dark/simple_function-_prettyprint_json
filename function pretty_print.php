<?php
function pretty_print($json_data) {
    //Initialize variable for adding space
    $space = 0;
    $flag = false;
    //Using <pre> tag to format alignment and font
    echo "<pre>";
    //loop for iterating the full json data
    for ($counter = 0;$counter < strlen($json_data);$counter++) {
        //Checking ending second and third brackets
        if ($json_data[$counter] == '}' || $json_data[$counter] == ']') {
            $space--;
            echo "\n";
            echo str_repeat(' ', ($space * 2));
        }
        //Checking for double quote(“) and comma (,)
        if ($json_data[$counter] == '"' && ($json_data[$counter - 1] == ',' || $json_data[$counter - 2] == ',')) {
            echo "\n";
            echo str_repeat(' ', ($space * 2));
        }
        if ($json_data[$counter] == '"' && !$flag) {
            if ($json_data[$counter - 1] == ':' || $json_data[$counter - 2] == ':')
            //Add formatting for question and answer
            echo '<span style="color:white;font-weight:bold">';
            else
            //Add formatting for answer options
            echo '<span style="color:#C3E88D;">';
        }
        echo $json_data[$counter];
        //Checking conditions for adding closing span tag
        if ($json_data[$counter] == '"' && $flag) echo '</span>';
        if ($json_data[$counter] == '"') $flag = !$flag;
        //Checking starting second and third brackets
        if ($json_data[$counter] == '{' || $json_data[$counter] == '[') {
            $space++;
            echo "\n";
            echo str_repeat(' ', ($space * 2));
        }
    }
    echo "</pre>";
}
?>
