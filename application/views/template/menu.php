
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
 
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item" style="padding-left: 120px;">
        <a class="nav-link" href="./usuario/">Inicio</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="">Relatório</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estoque
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>estoque">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>estoque/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>estoque/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Empréstimo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>emprestimo">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>emprestimo/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>emprestimo/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Equipamento
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>equipamento">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>equipamento/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>equipamento/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fabricante
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>fabricante">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>fabricante/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>fabricante/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Setor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>setor">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>setor/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>setor/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Local
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>local">Cadastrar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>local/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>local/buscar">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuário - <?php echo $this->session->userdata('nome_usuario'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <a class="dropdown-item" href="/codeigniter/usuario/">Cadastrar</a> -->
          <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/listar">Listar</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>usuario/logout">Deslogar</a>
          
          
        </div>

        
      </li>
      

   
      
    </ul>
  </div>
</nav>


