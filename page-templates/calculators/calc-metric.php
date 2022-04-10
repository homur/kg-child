<?php

// array of key (what to convert) and value (description of it)
//$convert_array[cmin] = "centimeters to inches";
$convert_array[incm] = "inches to centimeters";
$convert_array[cmme] = "centimeters to meters";
//$convert_array[mefe] = "meters to feet";
$convert_array[feme] = "feet to meters";
//$convert_array[kmmi] = "kilometers to miles";
//$convert_array[mikm] = "miles to kilometers";
//$convert_array[kglb] = "kilograms to pounds";
$convert_array[lbkg] = "pounds to kilograms";

foreach($_POST as $var=>$val)
{
	$$var = $val;
} 
 if($_POST['submit']){
 	$process = 1;
 }
$form_block = "
<form method=\"post\" action = \"./\">
<div class='form-row'>
	<div class='title'>Enter a value:</div>
	<div class='input'><input type = \"text\" name=\"value1\" value=\"$value1\" size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Change that number from...</div>
	<div class='input'>
<select name =\"convert\">";
 
if(!($convert)) {
  $con_sel = "cmin";
  }
  else{
  $con_sel = $convert;
  }
// build the menu
foreach($convert_array as $key=>$desc)
{
  if($key=="$con_sel") {
  $selected = " selected";
  }
  else{
  $selected = "";
  }
$form_block .= "<option value=\""
            . $key
            . "\""
            . $selected
            . ">$desc</option>";
} // end of for each
 
$form_block .= "</select></div>
</div>

<input type=\"submit\" name=\"submit\" class=\"btn btn-primary button\" value=\"Calculate\">
</form>
";

trim($value1);
$valuetemp = str_replace(",", "", $value1);
$value = str_replace(" ", "", $valuetemp);

if(!(is_numeric($value))&&$process=="1")
{
  $value="";
  $msg_warn = "<h2>Please enter a Number.</h2>";
}
 
// get the first character in the value to  later check  that it's not a letter
//$check = substr($value, 0, 1);
$check = floatval($value);

// in case no number is entered, the page refreshes
if ($value  == "") {
        
		echo $msg_warn;
		echo "<hr>";
		echo "$form_block";
} 
/*else if (($check != "0") && ($check != "1") && ($check != "2") && ($check != "3")  && ($check != "4") && ($check != "5") && ($check != "6") && ($check != "7") && ($check != "8") && ($check != "9") && ($check != ".") && ($check != "-")) {
// oddly the quotes were needed above around 0 etc for absolute values otherwise letters parsed through
        echo "<ul>This does a variety of conversions, such as centimeters to inches as so on.<br>";
        echo "First, put a number in the box, then choose a calculation, then press the button at the bottom.<br>";
        echo "Use a period . for decimal points. <strong>It can't start with a letter.</strong></ul>";
        echo "<hr>";
        echo "$form_block";
 
}*/ else {
        {
                if ($value == 1) {
                        $plural = "";
                        } else
                $plural = "s";
         }
 
   switch($convert)
   {
   case "cmme":
        $result = $value / 100;
        $unit1 = "centimeter";
        $unit1 .= $plural;
        $unit2 = "meters";
   break;
   case "cmin":
        $result = $value * 0.393701;
        $unit1 = "centimeter";
        $unit1 .= $plural;
        $unit2 = "inches";
   break;
   case "incm":
        $result = $value * 2.54;
        $unit1 = "inch";
        if ($plural == "s") {
                $plural = "es";
                }
        $unit1 .= $plural;
        $unit2 = "centimeters";
   break;
   case "mefe":
        $result = $value * 3.28084;
        $unit1 = "meter";
        $unit1 .= $plural;
        $unit2 = "feet";
   break;
   case "feme":
        $result = $value * 0.3048;
        if ($plural != "s") {
                $unit1 = "foot";
                } else {
                $unit1 = "feet";
                }
        $unit2 = "meters";
   break;
   case "kmmi":
        $result = $value * 0.621371;
        $unit1 = "kilometer";
        $unit1 .= $plural;
        $unit1 .= "&nbsp;(km)";
        $unit2 = "miles (mi)";
  break;
  case "mikm":
        $result = $value * 1.60934;
        $unit1 = "mile";
        $unit1 .= $plural;
        $unit1 .= "&nbsp;(mi)";
        $unit2 = "kilometers (km)";
  break;
  case "kglb":
        $result = $value * 2.20462;
        $unit1 = "kilogram";
        $unit1 .= $plural;
        $unit1 .= "&nbsp;(kg)";
        $unit2 = "pounds (lb)";
  break;
  case "lbkg":
        $result = $value * 0.453592;
        $unit1 = "pound";
        $unit1 .= $plural;
        $unit1 .= "&nbsp;(lb)";
        $unit2 = "kilograms (kg)";
  break;
}



echo "<h2><strong>Result of your conversion:</strong></h2>";
echo "<h3><strong>$value</strong> $unit1 is equal to <strong>";
// format the result (number value, decimal places, decimal separator, thousands separator)

echo number_format($result, "2", ".", ",");
echo "</strong> $unit2.</h3>";
echo "<hr>";
echo "$form_block"; 
} 

?>
 
