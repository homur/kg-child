<?php

//set up the defaults
$weight ="1000.00";
$width = "18.00";
$gauge = "4.00";
$blank_length = "406.00";
$material = 23;
$material_type = array();

//Material Type
$query = "SELECT material_type, density FROM " . $wpdb->prefix . "material 
			LEFT JOIN ".$wpdb->prefix."calculator_type ON ".$wpdb->prefix."calculator_type.m_id = ".$wpdb->prefix."material.m_id
 			LEFT JOIN ".$wpdb->prefix."calculator ON ".$wpdb->prefix."calculator.c_id = ".$wpdb->prefix."calculator_type.c_id
			WHERE ".$wpdb->prefix."calculator.c_id = 1
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
 
$form_block = "
<form method  = \"post\" action = \"./\">

<h3>Choose Material Type</h3><p>
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
 
$form_block .= "</select></p>
<div class='form-row'>
	<div class='title'>Weight Kilos:</div>
	<div class='input'><input type = \"text\" name=\"weight\" value=\"$weight\"  size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Width m:</div>
	<div class='input'><input type = \"text\" name=\"width\" value=\"$width\"  size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Gauge mm:</div>
	<div class='input'><input type = \"text\" name=\"gauge\" value=\"$gauge\"  size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Blank Length mm:</div>
	<div class='input'><input type = \"text\" name=\"blank_length\" value=\"$blank_length\"  size=10></div>
</div>

<p><input type=\"submit\" name=\"submit\" class=\"btn btn-primary button\" value=\"Calculate\"></p>
</form>
";
 
// remove commas and spaces
trim($weight);
trim($width);
trim($gauge);
trim($blank_length);

if(!is_numeric($weight)||!is_numeric($width)||!is_numeric($gauge)||!is_numeric($blank_length))
{
  $width="";
  $gauge="";
  $length="";
  $msg_warn = "<h2>Numerical Values only.</h2>";
  
}else{
	$density = $material_type[$material]['density'];
	if($weight>0&&$width>0&&$gauge>0&&$density>0&&$blank_length>0){
		$length = $weight/$width/$gauge/$density*1000;
		$blank = $length*1000/$blank_length;
		
	}else{
		$msg_warn = "<h2>Please enter a value higher then 0</h2>";
	}
}

// in case no number is entered, the page refreshes
if ($width  == "" || $gauge  == ""|| $length  == "") {
	echo $msg_warn; 
	echo "<hr>";echo "$form_block";
} 
else{
	echo "<h3>Results</h3>";
	echo "<p>Density tonnes /m<sup>3</sup> metres:&nbsp;&nbsp; <strong>$density</strong></p>";
	echo "<p>Length metres:&nbsp;&nbsp; <strong>".intval($length)."</strong></p>";
	echo "<p>Blank Count:&nbsp;&nbsp; <strong>".intval($blank)."</strong></p>";
	echo "<hr>";
	echo "$form_block"; 
}

?>