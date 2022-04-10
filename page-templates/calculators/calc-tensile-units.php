<?php
//set up the defaults
$unit= "n";
$value = "1200";
$unit_array = array();

$unit_array = array(
	array('value'=>"Kgf / Square mm", 'key'=>"kgf"),
	array('value'=>"KSI (=PSI / 1000)", 'key'=>"ksi"),
	array('value'=>"Lbs / Square  inch (PSI)", 'key'=>"lbs"),
	array('value'=>"N / Square mm (MPa)", 'key'=>"n"),
	array('value'=>"Tonsf / Square inch", 'key'=>"tonsf"),
	array('value'=>"VPN Approx Hardness", 'key'=>"vpn")
);
if($_POST){
	foreach($_POST as $var=>$val)
	{
		if($_POST[$var]!=""){
			$$var = $val;
		}	
	}
}
$data = array(
	"n_kgf"=>"0.10197162130",
	"kgf_n"=>"9.80655000000",
	"n_lbf"=>"145.03774000000",
	"lbf_n"=>"0.00689475700",
	"tonf_n"=>"15.44425568000",
	"n_tonsf"=>"0.06474899281",
	"lbf_kgf"=>"0.00070307671",
	"lbf_tonsf"=>"0.00044642857",
	"tonf_lbf"=>"2240.00",
	"kgf_vpn"=>"3.0287000000"
);

switch($unit){
	case 'kgf':
		$initial = $value;
		$kgf =  $initial;
		$ksi = ($initial*$data["kgf_n"])/($data["lbf_n"]*1000);
		$psi = $initial*$data["kgf_n"]/$data["lbf_n"];
		$n 	= $initial*$data["kgf_n"];
		$tonsf = ($initial*$data["kgf_n"])/($data["lbf_n"]*$data['tonf_lbf']);
		$vpn = $initial*$data["kgf_vpn"];
	break;
	case 'ksi':
		$initial = $value;
		$kgf = $initial*$data["lbf_n"]*1000/$data["kgf_n"];
		$ksi = $initial;
		$psi = $initial*1000;
		$n 	= $initial*$data["lbf_n"]*1000;
		$tonsf = $initial*1000/$data["tonf_lbf"];
		$vpn = $initial*$data["lbf_n"]*$data["kgf_vpn"]*1000/$data["kgf_n"];
	break;
	case 'lbs':
		$initial = $value;
		$kgf =  $initial*$data["lbf_n"]/$data["kgf_n"];
		$ksi = $initial/1000;
		$psi = $initial;
		$n 	= $initial*$data["lbf_n"];
		$tonsf = $initial/$data["tonf_lbf"];
		$vpn = $initial*$data["lbf_n"]*$data["kgf_vpn"]/$data["kgf_n"];
	break;
	case 'n':
		$initial = $value;
		$kgf =  $initial/$data["kgf_n"];
		$ksi = $initial/($data["lbf_n"]*1000);
		$psi = $initial/$data["lbf_n"];
		$n 	= $initial;
		$tonsf = $initial/($data["lbf_n"]*$data["tonf_lbf"]);
		$vpn = $initial*$data["kgf_vpn"]/$data["kgf_n"];
	break;	
	case 'tonsf':
		$initial = $value;
		$kgf =  $initial*$data["tonf_lbf"]*$data["lbf_n"]/$data["kgf_n"];
		$ksi = $initial*$data["tonf_lbf"]/1000;
		$psi = $initial*$data["tonf_lbf"];
		$n 	= $initial*$data["tonf_lbf"]*$data["lbf_n"];
		$tonsf = $initial;
		$vpn = $kgf*$data["kgf_vpn"];
	break;	
	case 'vpn':
		$initial = $value;
		$kgf =  $initial/$data["kgf_vpn"];
		$ksi = $initial*$data["kgf_n"]/($data["lbf_n"]*$data["kgf_vpn"]*1000);
		$psi = $initial*$data["kgf_n"]/($data["lbf_n"]*$data["kgf_vpn"]);
		$n 	= $initial*$data["kgf_n"]/$data["kgf_vpn"];
		$tonsf = $initial*$data["kgf_n"]/($data["lbf_n"]*$data["kgf_vpn"]*$data["tonf_lbf"]);
		$vpn = $initial;
	break;	
	
}
 
$form_block = "
<form method  = \"post\" action = \"./\">
<h3>Select the known units:</h3>
<div class='form-row'>
	<div class='input clear'>
<select name =\"unit\">";
 
// build the menu
foreach($unit_array as $val)
{
//print_r($val);
  if($val['key']==$unit) {
  	$selected = " selected";
  }
  else{
  	$selected = "";
  }
$form_block .= "<option value=\""
            . $val['key']
            . "\""
            . $selected
            . ">".$val['value']."</option>";
} // end of for each
 
$form_block .= "</select>
</div>
</div>

<div class='form-row'>
	<div class='title'>Known Value:</div>
	<div class='input'><input type = \"text\" name=\"value\" value=\"$value\"  size=10></div>
</div>
<p><input type=\"submit\" name=\"submit\" class=\"btn btn-primary button\" value=\"Calculate\"></p>
</form>
";
 
// remove commas and spaces
trim($value);


if(!is_numeric($value))
{
  $area="";
  $gauge="";
  $msg_warn = "<h2>Please enter a Number.</h2>";
}
 
// in case no number is entered, the page refreshes
if ($value  == "") {
        echo $msg_warn; 
		echo "<hr>";
		echo "$form_block";
} 
else{
	//echo "<p>Known Unit was <strong>$unit</strong></p>";
	echo "<p>N / Square mm (MPa):&nbsp;&nbsp; <strong>". number_format($n,0)."</strong></p>";
	echo "<p>Kgf / Square mm:&nbsp;&nbsp; <strong>". number_format($kgf,0)."</strong></p>";
	echo "<p>Lbsf / Square  inch (PSI):&nbsp;&nbsp; <strong>". number_format($psi,0)."</strong></p>";
	echo "<p>KSI (=PSI / 1000):&nbsp;&nbsp; <strong>". number_format($ksi,0)."</strong></p>";
	echo "<p>Tonsf / Square inch:&nbsp;&nbsp; <strong>". number_format($tonsf,0)."</strong></p>";
	echo "<p>Approx. Hardness VPN:&nbsp;&nbsp; <strong>". number_format($vpn,0)."</strong></p>";
	echo "<hr>";echo "$form_block"; 
}

?>