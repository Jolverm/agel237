 <!-- Menu Recepcion -->


<nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="<?=base_url(); ?>index.php/principal/index/acceso">NOTARIA 237 D.F. </a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="right">
      <li class="divider"></li>
      <li class="active"><a href="<?=base_url(); ?>index.php/recepcion/index"> Visitantes</a></li>
      <li class="divider"></li>
      <li><a href="<?=base_url(); ?>index.php/recepcion/index/primera">1° Vez</a></li>
      <li class="divider"></li>
      <li class="has-dropdown"><a>Consultar</a>
        <ul class="dropdown">
          <li><a href="<?=base_url(); ?>index.php/recepcion/index/consulta_visitantes">Visitas</a></li>
          <li><a href="<?=base_url(); ?>index.php/recepcion/index/consulta_visitantes">1° Vez</a></li>
        </ul>
      </li>
      <li class="divider"></li>
    </ul>


</nav>

  <!-- End Nav -->