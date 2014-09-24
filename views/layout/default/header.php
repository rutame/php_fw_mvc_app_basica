<!doctype html>
<html>
    <head>
        <title><?php echo $this->titulo;?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $_layoutParams['ruta_css'];?>main.css">
    </head>
    <body>
        <div class="bordito"></div>
        <div id="main">
            <nav>
                <!-- El Menú de navegación -->
                <ul class="menu">
                    <li class="izq"><a href=""></a></li> <!---->
                    <?php if(isset($_layoutParams['menu'])): ?>
                    <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                    <?php 
                        if($_layoutParams['menu'][$i]['id'] == $item):
                            $_item_style = 'class ="actual"';
                        else:
                            $_item_style = "";
                        endif;
                    ?>
                    <li <?php echo $_item_style;?>>
                        <a href="<?php echo $_layoutParams['menu'][$i]['enlace'];?>">
                            <?php echo $_layoutParams['menu'][$i]['titulo'];?>   
                        </a>
                    </li>
                    <?php endfor;?>
                    <?php endif;?>
                   <li class="der"><a href=""></a></li> <!-- -->
                </ul>
                <!-- El Menú de navegación -->
            </nav>
            <header>
                <h1><?php echo APP_NAME; ?></h1>
                <h3 class="titulo"><?php echo APP_SLOGAN; ?></h3>
                
            </header>
            
            
            <div id="contenido">


