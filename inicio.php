<html>
    

  
<tbody>
<tr class="header">
  <th scope="col" style="padding:5px">Card Information</th>
  <th scope="col">Preview</th>
</tr>
<tr style="width:50%">
  <td style="padding:0px;text-align:left;vertical-align:top;">

  <form  action="realiza.php" method="post" enctype="multipart/form-data" >
  <table border="0" cellspacing="0" cellpadding="2" style="width:50%;">


<tr class="row1">

</tr>

<tr class="row2">
  <td>Card Type:</td>
  <td>
    <select name="cardtype" >
        <option value="Normal">Monster Normal</option>
		<option value="Effect">Monster Effect</option>
        <option value="Ritual">Monster Ritual</option>
        <option value="Fusion">Monster Fusion</option>
        <option value="Synchro">Monster Synchro</option>
        <option value="Xyz">Monster Xyz</option>
		<option value="Pendulum_Normal">Monster Pendulum Normal</option>
		<option value="Pendulum_Effect">Monster Pendulum Effect</option>
		<option value="Token">Token</option>
		<option value="Spell">Spell</option>
        <option value="Trap">Trap</option>
    </select>
    
  </td>
</tr>

<tr class="row1">
  <td>Attribute:</td>
  <td>
    <select name="attribute" id="attribute">
        <option value="Light1">Light</option>
        <option value="Dark1">Dark</option>
        <option value="Fire1">Fire</option>
        <option value="Water1">Water</option>
        <option value="Wind1">Wind</option>
        <option value="Earth1">Earth</option>
        <option value="Divine1">Divine</option>
    </select>
  </td>
</tr>

<tr class="row2">
  <td>Level/Rank:</td>
  <td>
    <select name="level">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="0">0</option>
    </select>
  </td>
</tr>




<tr class="row2">
  <td>ATK / DEF:</td>
  <td>
    <input type="text" class="input_text" name="atk" id="atk" size="4" maxlength="4"> /
    <input type="text" class="input_text" name="def" id="def" size="4" maxlength="4">
  </td>
</tr>

<tr class="row2">
  <td>Pendulum Scale:</td>
  <td> <img src="imagenes/Left_Pendulum_Scale.png"  width="28" height="21" alt="Tamaño original"/>
	<select name="Der">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
       </select> |
	<img src="imagenes/Rigth_Pendulum_Scale.jpg" width="28" height="21" alt="Tamaño original"/>
	<select name="Izq">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
       </select>
    
  </td>
</tr>

<tr class="row1">
  <td>Picture URL:</td>
  <td>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
	<input type="file" name="imagen" id="imagen" />
	</td>
</tr>

</tbody>

</table>

  <input type="submit" value="generate" style="font-size:16px;min-width:0px">

 </form>


</td>

//////<br>

////<br>
<?php

// Esto evaluará a TRUE así que el texto se imprimirá.
	if (isset( $_POST['cardtype'])) {
	   include 'realiza.php';
	    echo "Esta variable está definida, así que se imprimirá";
		
	}else{
	  
	  echo '<th rowspan="2" style="padding:2px;text-align:right;vertical-align:top;width:333px;" class="row2">
			<a><img style="width:333px" id="card" src="plantillas/typecard/Normal.jpg" alt="Yu-Gi-Oh Card" ></a>

			 <div id="isurl"></div>
		    </th>';
	  
	}

// En los siguientes ejemplo usaremos var_dump para imprimir
// el valor devuelto por isset().


?>


</tbody>


    
</html>

<?php

?>
