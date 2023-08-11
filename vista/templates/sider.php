<div class="wrapper fixed-left">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><i class="fas fa-user"> </i>
        <?="<i>".(strtoupper($_SESSION['usuario'])) . "</i>"?></h3>
        
        
      </div>
   
      <?php
        $tipo = $_SESSION['tipo'];
        if ( $tipo == 'ADMINISTRADOR') {
         ?>
        <ul class="list-unstyled components">
      
        <li>
          <a href="../vista/view_inicio.php"><i class="fas fa-clipboard"></i>Dashboard</a>
        </li>
        <li>
          <a href="../vista/view_movimientos.php"><i class="fa-solid fa-cart-shopping"></i>Movimientos</a>
        </li>

        <li>
          <a href="../vista/view_cuentas.php"><i class="fa-solid fa-desktop"></i>Cuentas</a>
        </li>
        <li>
          <a href="../vista/view_clientes.php"><i class="fa-solid fa-users"></i>Clientes</a>
        </li>

        <li>
          <a href="../vista/view_servicios.php"><i class="fa-solid fa-server"></i>Servicios</a>
        </li>
        
      </ul>
      <?php }else{
?>
     <ul class="list-unstyled components">
      
      <li>
        <a href="../vista/view_inicio.php"><i class="fas fa-clipboard"></i>Dashboard</a>
      </li>
      <li>
        <a href="../vista/view_movimientos.php"><i class="fa-solid fa-cart-shopping"></i>Movimientos</a>
      </li>

     
      <li>
        <a href="../vista/view_clientes.php"><i class="fa-solid fa-users"></i>Clientes</a>
      </li>

     
      
    </ul>
  <?php    } ?>
    </nav>


