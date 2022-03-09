<?php
/*
 * Template Name: Calc - Timber Volume
 * Description: Timber Volumne calculator
 */

get_header();

the_post();

the_content();

//set up the defaults
$length = "483";
$width = "125";
$thickness = "19";
$volume = "";

foreach($_POST as $var=>$val)
{
	if($_POST[$var]!=""){
		$$var = $val;
	}	
} 

$volume = $length*$width/1000*$thickness/1000;
 
$form_block = "
<form method  = \"post\" action = \"./\">
<div class='form-row'>
	<div class='title'>Length m:</div>
	<div class='input'><input type = \"text\" name=\"length\" value=\"$length\"  size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Width mm:</div>
	<div class='input'><input type = \"text\" name=\"width\" value=\"$width\"  size=10></div>
</div>

<div class='form-row'>
	<div class='title'>Thickness mm:</div>
	<div class='input'><input type = \"text\" name=\"thickness\" value=\"$thickness\"  size=10></div>
</div>

<p><input type=\"submit\" name=\"submit\" value=\"Calculate\"></p>
</form>
";
 


//--- START Display HTML -------//
?>
<article class="boldSection topSemiSpaced bottomSemiSpaced gutter inherit">
	<div class="port">
		<div class="boldCell">
			<div class="boldCellInner">
				<div class="boldRow">
					<div class="rowItem col-md-9 col-ms-12 btTextLeft">
<?php
// remove commas and spaces
trim($width);
trim($thickness);
trim($length);
if(!is_numeric($width)||!is_numeric($thickness)||!is_numeric($length))
{
  $width="";
  $thickness="";
  $length="";
  $msg_warn = "<h2>Numerical Values only.</h2>";
}
 
// in case no number is entered, the page refreshes
if ($width  == ""||$thickness  == ""||$length  == "") {
		echo $msg_warn; echo "<hr>";
		echo "$form_block";
} 
else{
echo "<h3>Results</h3>";
echo "<p>Volume in cubic metres:&nbsp;&nbsp; <strong>".number_format($volume,2)."m<sup>3</sup></strong></p>";
echo "<hr>";
echo "$form_block"; 
}
?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
<?php

//--- END Display HTML -------//

//get_sidebar();

get_footer(); 

?>