<?php
class NumberFormat {
    public $tel_number;

    public function __construct() {
    }

    public function format_telephone_number() {
        if (isset($_POST['tel_number'])) {
            $tel_number = $_POST['tel_number'];

            
            //$tel_number = preg_replace("/[^0-9]/", "", $tel_number);

            
            if (substr($tel_number, 0, 3) === "+256" && strlen($tel_number) == 13 ) {
                echo" it is  an international number of  $tel_number";
                echo"<br>";
                    $tel_number = "0" . substr($tel_number, 4); 
                    echo "Formatted telephone number: $tel_number (local number)";
                    echo"<br>";
                    $this->check_operator($tel_number);
                
            }

            elseif (substr($tel_number, 0, 3) === "256"&& strlen($tel_number) == 12) {
                echo "it is national  of number  $tel_number ";
                echo"<br>";
                $tel_number = "0" . substr($tel_number, 3); 
                    echo "Formatted telephone number: $tel_number (local number)";
                    echo"<br>";
                    $this->check_operator($tel_number);
            }

            elseif (substr($tel_number, 0, 1) === "0" && strlen($tel_number) == 10) {
                echo "it is local number   $tel_number ";
                $this->check_operator($tel_number);
                echo "<br>";
                $tel_number = "+256" . substr($tel_number, 1); 
                echo "Formatted telephone number: $tel_number (International)";
                
            }
            
           
            else {
                echo "Invalid";
            }
        }
    }

    public function check_operator($tel_number) {
        $mtn_prefixes = ["077", "076", "078"];
        $airtel_prefixes = ["075", "074", "070"];

        $prefix = substr($tel_number,0, 3); 

        if (in_array($prefix, $mtn_prefixes)) {
            echo " (MTN)";
        } elseif (in_array($prefix, $airtel_prefixes)) {
            echo " (Airtel)";
        } else {
            echo " (Unknown Operator)";
        }
    }
}

$newNumberFormat = new NumberFormat();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newNumberFormat->format_telephone_number();
}
?>
