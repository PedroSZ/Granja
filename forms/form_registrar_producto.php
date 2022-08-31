
<form method="post" style="width: 500px; height:auto;"  action="modulos/mdl_registrarProducto.php" id="frm_regEmbalaje" >
  <table border="0" style="color:#FFFFFF; font-weight: 600; font-size: 17px;">
  
  <tr>
    <td style="text-align: right;">
      <p><label>Nombre del Producto:</label></p>
    </td>
    <td>
      <p><input name="nombre" type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Ingresar Nombre" id ="nombre" required></p>
    </td>
  </tr>
  <tr>
    <td style="text-align: right;">
      <p><label>Codigo:</label></p>
    </td>
    <td>
      <p><input name="codigo" type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" placeholder="Ingresar codigo" id ="codigo" required></p>
    </td>
  
  <tr>
    <td colspan="2" style="text-align: center;">
      <BR>
      <input type="submit" value="Registrar">
      <input type="button" value="Cancelar" onclick="limpiar()">
      <input type="button" onclick="location='index.php'" value="Regresar" />
    </td>
  </tr>
  </table>
</form>
