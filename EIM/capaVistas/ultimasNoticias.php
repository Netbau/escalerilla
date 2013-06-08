<h3>Últimas Notícias</h3>
﻿<div style="overflow: auto;">
    <div class="noticia">
        <?php
        require_once(dirname(__FILE__) . '/../capaControladores/noticias.php');
        $noticias = Noticia::ultimasNoticias();
        
		if (!empty($noticias)) {
            $cantidad = 0;
            foreach ($noticias as $noticia) {
                echo '
            <div class="well"><div>
                <h3>' . $noticia['titulo'] . '
                </h3>
            </div>
            <div  id="' . $noticia['idNoticias'] . '" style="overflow: auto;';
                if ($cantidad == 0) {
                    echo ' in';
                }
                echo '">
                
                    <div class="row-fluid">
					
                       '. $noticia[contenido] . '
					   
                    </div>
                
            </div>
        <!--  ' . $noticia['idNoticias'] . '--></div>';
                $cantidad++;
            }
        }

		else {
            echo '<div class="alert alert-info">No Hay noticias registradas.</div>';
        }
        ?>
</div>