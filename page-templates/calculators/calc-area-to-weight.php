<?php

//set up the defaults
$area = "100.00";
$gauge = "0.050";
$material = 0;
$material_type = array();


//Material Type
$query = "SELECT material_type, density FROM " . $wpdb->prefix . "material 
			LEFT JOIN ".$wpdb->prefix."calculator_type ON ".$wpdb->prefix."calculator_type.m_id = ".$wpdb->prefix."material.m_id
 			LEFT JOIN ".$wpdb->prefix."calculator ON ".$wpdb->prefix."calculator.c_id = ".$wpdb->prefix."calculator_type.c_id
			WHERE ".$wpdb->prefix."calculator.c_id = 2
			ORDER BY material_type";
			
$result = $wpdb->get_results($query, 'ARRAY_A');

foreach($result as $row)
{
	$material_type[] = array('material'=>$row['material_type'],'density'=>$row['density']);
}

foreach($_POST as $var=>$val)
{
	if($_POST[$var]!=""){
		$$var = $val;
	}	
} 

$density = $material_type[$material]['density'];
$weight  = $area*$gauge*$density/1000000;
 
$form_block = "
<form method  = \"post\" action = \"./\">
<h3>Choose Material Type:</h3>
<div class='form-row'>
	<div class='input clear'>
<select name =\"material\">";
 
// build the menu
foreach($material_type as $key=>$desc)
{
  if($key==$material) {
  	$selected = " selected";
  }
  else{
  	$selected = "";
  }
$form_block .= "<option value=\""
            . $key
            . "\""
            . $selected
            . ">".$desc['material']."</option>";
} // end of for each
 
$form_block .= "</select>
</div>
</div>

<div class='form-row'>
	<div class='title'>Area mm:</div>
	<div class='input'><input type = \"text\" name=\"area\" value=\"$area\"  size=10></div>
</div>
<div class='form-row'>
	<div class='title'>Gauge mm:</div>
	<div class='input'><input type = \"text\" name=\"gauge\" value=\"$gauge\"  size=10></div>
</div>

<p><input type=\"submit\" name=\"submit\" class=\"btn btn-primary button\" value=\"Calculate\"></p>
</form>
";
 
// remove commas and spaces
trim($area);
trim($gauge);

if(!is_numeric($area)||!is_numeric($gauge))
{
$area="";
$gauge="";
$msg_warn = "<h2>Please enter a Number.</h2>";
}

// in case no number is entered, the page refreshes
if ($area  == ""||$gauge  == "") {
        echo $msg_warn; 
        echo "<hr>";
        echo "$form_block";
} 
else{
    echo "<p>Density tonnes/m<sup>3</sup> metres:&nbsp;&nbsp; <strong>". number_format($density,2)."</strong></p>";
    echo "<p>Weight kilos:&nbsp;&nbsp; <strong>". number_format($weight,2) ."</strong></p>";
    echo "<hr>";echo "$form_block"; 
}

?>
