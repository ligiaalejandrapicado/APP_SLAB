<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php  $usuarioEnviado = $_GET['usuario'];
$passwordEnviado = $_GET['password'];

define("dbName","enguiapl_slab");
define("dbUser","enguiapl_slab"); 
define("dbHost","localhost"); 
define("dbPassw","divinoniño1234app");
$DB = mysql_connect(dbHost, dbUser, dbPassw) or die(mysql_error());
mysql_select_db(dbName);
?>
<link href="style.css" rel="stylesheet" type="text/css">
<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>  <td align="center" valign="top"><table width="530" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#00FF00" class="css12">
<?php $id=$_GET['id']; if($id){ ?>
<?php  $rese = mysql_query("SELECT * FROM orden_ingreso WHERE ci_cte='$id'  ORDER BY cod_oin DESC ;", $DB); 
$rowe = mysql_num_rows($rese);  ?> 
<tr>
  <td height="15" align="left"><img src="http://www.enguiaplus.com/app_moviles/imagenes/Banner.jpg" width="700" height="200" /></td>
</tr>
<tr><td height="15" align="right"></td></tr>
<tr><td align="center">
<?php 
while ($rege = mysql_fetch_array($rese)){
if(!$rege){ ?><SCRIPT LANGUAGE="javascript">location.href = "?seccion=lisfac";</SCRIPT><?php  } 
$rese3 = mysql_query("SELECT * FROM cliente WHERE ci_clie='$rege[1]' ORDER BY ci_clie DESC ;", $DB); 
$rowe3 = mysql_num_rows($rese3);
$rege3 = mysql_fetch_array($rese3);	
	echo "	
<table width='530' border='0' align='center' cellpadding='0' cellspacing='0'>
<tr><td align='center' valign='top'><table width='520' border='0' align='center' cellpadding='0' cellspacing='0' class='css10'>
<tr><td width='114' align='right' class='css10n'>Orden Nº :&nbsp;&nbsp;</td>
    <td width='134' align='left' class='css10'>$rege[0]</td>
    <td width='73' align='right' class='css10n'>Fecha:&nbsp;</td>
    <td width='93' align='left' class='css10'>$rege[2]</td>
</tr>
<tr><td height='3' colspan='4'></td></tr>
<tr><td height='1' colspan='4' align='right' bgcolor='#FFCC00'></td></tr>
<tr><td height='8' colspan='4'></td></tr>
</table>
<table width='520' border='0' align='center' cellpadding='0' cellspacing='0' class='css10'>
<tr><td width='71' align='right' class='css10n'>Cliente:&nbsp;</td>
    <td width='256' align='left' class='css10'>$rege3[2]</td>
    <td width='50' align='right' class='css10n'>CI/Rif:&nbsp;</td>
    <td width='133' align='left' class='css10'>$rege3[1]</td>
</tr>
<tr><td height='3' colspan='4'></td></tr>
<tr><td height='1' colspan='4' align='right' bgcolor='#FFCC00'></td></tr>
<tr><td height='8' colspan='4'></td></tr>
</table>
<table width='520' border='0' align='center' cellpadding='0' cellspacing='0' class='css10'>
<tr><td width='70' align='right' class='css10n'>Dirección:&nbsp;</td>
    <td width='215' align='left' class='css10'>$rege3[4]</td>
    <td width='68' align='right' class='css10n'>"; if($rege[4]!="")echo "Fecha de Credito:";echo "&nbsp;</td>
    <td width='157' align='left' class='css10'>$rege[4]</td>
</tr>
<tr><td height='3' colspan='4'></td></tr>
<tr><td height='1' colspan='4' align='right' bgcolor='#FFCC00'></td></tr>
<tr><td height='20' colspan='4'></td></tr>
</table>
  </td></tr></table>" ;		
	
echo "
<table width='500' border='0' align='center' cellpadding='0' cellspacing='0' class='css10'>
<tr ><td colspan='5' align='right' class='css10n'></td>  </tr>
<tr bgcolor='#FFCC00'>
<td width='60' align='center' class='css10n'>Código</td>
<td width='196' align='left' class='css10n'>&nbsp;&nbsp;Descripción</td>
<td width='55' align='center' class='css10n'></td>
<td width='85' align='right' class='css10n'>Cant. Sol.</td>
<td width='90' align='right' class='css10n'>Resultado</td>
<td width='90' align='right' class='css10n'> Valores Normales</td>
  </tr></table>" ;	?>	
<?php  
$rese2 = mysql_query("SELECT * FROM det_orden WHERE cod_oin='$rege[0]' ORDER BY cod_oin DESC ;", $DB); 
$rowe2 = mysql_num_rows($rese2); 
while($rege2 = mysql_fetch_array($rese2)){
$rese4 = mysql_query("SELECT * FROM examen WHERE cod_exa='$rege2[2]' ORDER BY cod_exa DESC ;", $DB); 
$rowe4 = mysql_num_rows($rese4);
$rege4 = mysql_fetch_array($rese4);
echo "
<table width='500' border='0' align='center' cellpadding='0' cellspacing='0' class='css10'>
<tr><td height='2' colspan='5' align='right' class='css10n'></td></tr>
<tr><td width='60' align='center' class='css10'>$rege2[0]</td>
    <td width='196' align='left' class='css10'>&nbsp;&nbsp;&nbsp;$rege4[1]</td>
    <td width='55' align='center' class='css10'></td>
    <td width='85' align='right' class='css10'>$rege2[3]</td>
    <td width='90' align='right' class='css10'>"; if($rege2[4]==''){ echo " -- ";} else {echo $rege2[4];} echo "</td>
	<td width='90' align='right' class='css10'>$rege4[5] - $rege4[6]</td>
  </tr>
<tr><td height='3' colspan='5'></td></tr>
<tr><td height='1' colspan='5' align='right' bgcolor='#FFCC00'></td></tr>
<tr><td height='3' colspan='5'></td>
</tr>
</table>" ;	
}

 ?> </td></tr>
 
 <tr>
  <td height="5" align="left">Observaciones:<?=$rege[5] ?> <br /> Estado: <?=$rege[6] ?></td></tr> 
 
 
<tr><td height="30" align="center"></td></tr>
<tr><td align="center">
<table width="380" border="0" align="right" cellpadding="0" cellspacing="0">
<tr><td width="244" align="right" class="css10n">&nbsp;</td>
    <td width="4"></td>
    <td width="111" align="right" class="css10">&nbsp;</td>
    <td width="9" align="right" class="css10"></td></tr>
<tr><td height="3" colspan="4"></td>
</tr>
<tr><td width="244" align="right" class="css10n">&nbsp;</td>
        <td width="4"></td>
        <td width="111" align="right" class="css10">&nbsp;</td>
        <td width="9" align="right" class="css10"></td></tr>
<tr><td height="3" colspan="4"></td>
</tr>
<tr><td width="244" align="right" class="css10n">&nbsp;</td>
    <td width="4"></td>
    <td width="111" align="right" class="css10">&nbsp;</td>
    <td width="9" align="right" class="css10"></td>
</tr>
<tr><td height="3" colspan="4"></td></tr>
  </table></td>
</tr>

<?php if($rowe<=0) echo "<table width='500' border='0' cellspacing='0' cellpadding='0' align='center'><tr><td>
<table width='500' border='0' cellspacing='0' cellpadding='0' class='css10'>
<tr><td width='500' height='10'></td></tr>
<tr><td height='10' align='center'>Nº Orden &nbsp;&nbsp;<b>\"$id\"</b> &nbsp;&nbsp; no corresponde a ninguno de nuestras ordenes</td></tr>
<tr><td height='10'></td></tr>
</table></td></tr></table> "; 
?> 
<?php } }
 else { ?> <script language="Javascript">
function cerrar() { window.close();}
cerrar();
</script>  <?php     }?>
   
</table> 
<!--  END FORM -->
</td>
</tr></table>
