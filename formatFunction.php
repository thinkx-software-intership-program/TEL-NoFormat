<?php
if (isset($_POST['tel_number'])) {
    function format_telephone_number($tel_number) {
        if (ctype_digit($tel_number) ) {
            if (substr($tel_number, 0, 1) === "0") {
                $tel_number = "+256" . substr($tel_number, 1);
            } elseif (substr($tel_number, 0, 3) === "256") {
                $tel_number = "+" . $tel_number;
            }

            return $tel_number;
        } else {
            return "Invalid number";
        }
    }

    $tel_number = $_POST['tel_number'];
    $formatted_number = format_telephone_number($tel_number);

    if (isset($formatted_number)) {
        echo "Formatted telephone number: $formatted_number";
    }
}
?>
