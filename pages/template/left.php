
<?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) { ?>

    <aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="index.php">
                <i class="fa-regular fa-circle-play"></i>
                    Página inicial
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?p=loja_cursos">
                <i class="fa-solid fa-suitcase"></i>
                    loja de cursos
                </a>
            </li>
            
            <li class="nav-item">
                <a href="index.php?p=meus_cursos">
                <i class="fa-solid fa-user"></i>
                    Meus Cursos
                </a>
            </li>
            
            <li class="nav-item">
                <a href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </a>
            </li>
           
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            
            </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            
        </div>
    </div>
</aside>

<?php }else{  ?>
<aside class="sidebar">
    <nav class="menu mt-3">
        <ul class="nav-list">
            <li class="nav-item">
                <a href="index.php">
                <i class="fa-regular fa-circle-play"></i>
                    Página inicial
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?p=gerenciar_cursos">
                <i class="fa-solid fa-suitcase"></i>
                    Gerenciar cursos
                </a>
            </li>
            
            <li class="nav-item">
                <a href="index.php?p=gerenciar_usuarios">
                <i class="fa-solid fa-user"></i>
                    Gerenciar usuários
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?p=relatorio">
                    <i class="fa-solid fa-file"></i>
                    Relátorio
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                    Sair
                </a>
            </li>
           
        </ul>
    </nav>
    <div class="sidebar-widgets">
        <div class="sidebar-widget">
            
            </div>
        </div>
        <div class="division my-3"></div>
        <div class="sidebar-widget">
            
        </div>
    </div>
</aside>
<?php } ?>