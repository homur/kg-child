<?php

//set up the defaults
$msg_warn = "";
$width = "305.00";
$gauge = "0.500";
$length = 0;
$material = 0;
$od = "" ;
$id = "" ;
$material_type = array();
$pWeight = 0;

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
$density = $material_type[$material]['density'];

if($pWeight>0){
	
	$lenMet = $pWeight/(($width*$gauge*$density)*0.001);
	
	//=SUM(E15/((E9*E11*N13)*0.001))
	$weightPmm =(
					(
						(
							(
								pow(($od/2),2)*pi()
							)
							-
							(
								pow(($id/2),2)*pi()
							)
						)*0.01*$density
					)*0.001
				)/10;
}elseif($length>0){
	
	$weight = ($density*$gauge*$length*$width)/1000;
}elseif($od>0&&$id>0){ 
	//(((((D4/2)^2*PI())-((D6/2)^2*PI()))*0.01*K15)*0.001)/10

	$weightPmm =(
					(
						(
							(
								pow(($od/2),2)*pi()
							)
							-
							(
								pow(($id/2),2)*pi()
							)
						)*0.01*$density
					)*0.001
				)/10;
	//$weightPmm =((pi() * $width * (($od*$od)*0.5))-( pi() * $width * (($id*$id)*0.5))) * ($density*0.001) * 0.001;
	$weight = ($width*0.1)*$weightPmm*10;
	
	$lenFeet = $weight*2.20462/($gauge*0.03937*12*$width*0.03937*$density/27.699);
	$lenMet = $lenFeet * 0.3048; 
}

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
<div class='clear'>&nbsp;</div>
<h3>Required:</h3>

<div class='form-row'>
	<div class='title clear'>Width mm:</div>
	<div class='input'><input type = \"text\" name=\"width\" value=\"$width\"  size=10></div>
</div>
<div class='form-row'>
	<div class='title'>Gauge mm:</div>
	<div class='input'><input type = \"text\" name=\"gauge\" value=\"$gauge\"  size=10></div>
</div>


	<h3>Either:</h3>
	<div class='form-row'>
		<div class='title'>Ouside Diameter:</div>
		<div class='input'><input type = \"text\" name=\"od\" value=\"\"  size=10></div>
	</div>
	<div class='form-row'>
		<div class='title'>Inside Diameter:</div>
		<div class='input'><input type = \"text\" name=\"id\" value=\"\"  size=10></div>	
	</div>
	<h3>Or:</h3>
	<div class='form-row'>
		<div class='title'>Length m:</div>
		<div class='input'><input type = \"text\" name=\"length\" value=\"\"  size=10></div>
	</div>
	<h3>Or:</h3>
	<div class='form-row'>	
		<div class='title'>Weight kilo:</div>
		<div class='input'><input type = \"text\" name=\"pWeight\" value=\"\"  size=10></div>	
	</div>
<p><input type=\"submit\" name=\"submit\" class=\"btn btn-primary button\" value=\"Calculate\"></p>
</form>
";
 
// remove commas and spaces
trim($width);
trim($gauge);
trim($length);

if(!is_numeric($gauge)||!is_numeric($width)||!is_numeric($length)||!is_numeric($pWeight))
{
	//die("Not Numeric ".$msg_warn);
  $width="";
  $gauge="";
  $length="";
  $pWeight="";
  $msg_warn = "<h2>Numerical Values only.</h2>";
}else{
	//print("All numeric".$length);
}
 
// in case no number is entered, the page refreshes
//||$length  == ""
if ($width  == ""||$gauge  == "") {
		$msg_warn = "<h2>Width and Gauge are required Fields.</h2>";
        
		echo $msg_warn; 
		echo "<hr>";
		echo "$form_block";
}elseif($length<=0&&$id<=0&&$od<=0&&$pWeight<=0){
		/*echo "Length ".$length."<br>";
		echo "Inside ".$id."<br>";
		echo "Outside ".$od."<br>";
		echo "pWeight ".$pWeight."<br>";*/
		$msg_warn = "<h2>At least one of the other fields are required.</h2>";
		echo $msg_warn; 
		echo "<hr>";
		echo "$form_block";

}elseif($_POST['submit']){
	echo "<h3>Calculated using </h3>";
	echo "<p>Width: $width<br>
	Gauge: $gauge<br>";
	if($_POST['id']&&$_POST['od']||$od&&$id){
		echo "Ouside Diameter: $od<br>";
		echo "Inside Diameter: $id<br>";
		$_POST['length'] = "";
		$_POST['pWeight'] = "";
	}
	if($_POST['length']){
		echo "Length m: $length<br>";
		$_POST['pWeight'] = "";
		$_POST['id'] = "";
		$_POST['od'] = "";
	}
	if($_POST['pWeight']){
		echo "Weight Kilos: $pWeight";
		$_POST['length'] = "";
		$_POST['od'] = "";
		$_POST['id'] = "";
	}
	echo "</p>";
	echo "<h3>Results</h3>";
	echo "<p>Density tonnes/m<sup>3</sup> metres:&nbsp;&nbsp; <strong>$density</strong></p>";
	echo ($weight>0)?"<p>Weight kilos:&nbsp;&nbsp; <strong>".number_format($weight,2)."</strong></p>":"";
	echo "<p>Kilograms per mm width:&nbsp;&nbsp; <strong>".number_format($weightPmm,2)."</strong></p>";
	if($lenMet>0)echo "<p>Length metres:&nbsp;&nbsp; <strong>".number_format($lenMet,2)."</strong></p>"; 
	echo "<hr>";
	echo "$form_block"; 
}else{
	echo "$form_block"; 
}

?>