<h3>Últimas Notícias</h3>
﻿<div class="well well-small small" style="overflow: auto;">
    <div class="noticia">
        <?php
        require_once(dirname(__FILE__) . '/../capaControladores/noticias.php');
        $noticias = Noticia::ultimasNoticias();
        if (!empty($noticias)) {
            $cantidad = 0;
            foreach ($noticias as $noticia) {
                echo '
            <div class="accordion-group">
            <div class="accordion-heading info">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse' . $noticia['idNoticias'] . '">
                    ' . $noticia['titulo'] . '
                </a>
            </div>
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