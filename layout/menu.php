<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #7952b3;">
    <a class="navbar-brand" href="#" style="color: white;">Northwind</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="home.php" style="color: rgba(255,255,255,.8);">Página Principal</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgba(255,255,255,.8);">Cadastros Gerais</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="cadastrar_regiao.php">Região</a> 
                    <a class="dropdown-item" href="cadastrar_territorio.php">Território</a>     
                    <a class="dropdown-item" href="cadastrar_transportadora.php">Transportadora</a>
                    <a class="dropdown-item" href="cadastrar_categoria.php">Categoria</a>  
                </div>
            </li>
     
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgba(255,255,255,.8);">Consultas</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                     
                    <a class="dropdown-item" href="regiao.php">Regiões</a>   
                    <a class="dropdown-item" href="territorio.php">Territórios</a>    
                    <a class="dropdown-item" href="transportadora.php">Transportadoras</a> 
                    <a class="dropdown-item" href="categoria.php">Categorias</a>     
                    <a class="dropdown-item" href="cliente.php">Clientes</a>            
                </div>
            </li>          
        </ul>
    </div>
    <div class="float-right" style="color: rgba(255,255,255,.8);">
        <a class="btn btn-primary" href="index.php?acao=sair">
            Sair
        </a>
    </div>        
</nav>
