<div class="well well-small"﻿>
    <div class="accordion" id="accordion2">
        <?php
        require_once(dirname(__FILE__) . '/../capaControladores/noticias.php');
        $noticias = Noticia::getActivos();
        if (!empty($noticias)) {
            $cantidad = 0;
            foreach ($noticias as $noticia) {
                echo '
            <div class = "well well-small">
            
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse' . $noticia['idNoticias'] . '">
                    <h5>' . $noticia['titulo'] . '</h5>
                </a>
            
            <div id="collapse' . $noticia['idNoticias'] . '" class="accordion-body collapse';
                if ($cantidad == 0) {
                    echo ' in';
                }
                echo '">
                <div class="accordion-inner">
                    <div class="row-fluid">
                       '. $noticia[contenido] . '
                    </div>
                </div>
            </div>
        </div><!-- collapse para premio ' . $noticia['idNoticias'] . '-->';
                $cantidad++;
            }
        } else {
            echo '<div class="alert alert-info">No Hay premios vigentes registrados.</div>';
        }
        ?>
    </div>
</div>