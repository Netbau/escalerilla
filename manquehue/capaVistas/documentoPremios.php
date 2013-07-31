<div class="well well-small"﻿>
    <div class="accordion" id="accordion2">
        <?php
        require_once(dirname(__FILE__) . '/../capaControladores/premios.php');
        $premios = Premio::getActivos();
        if (!empty($premios)) {
            $cantidad = 0;
            foreach ($premios as $premio) {
                echo '
            <div class="accordion-group">
            <div class="accordion-heading info">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse' . $premio['idPremios'] . '">
                    ' . $premio['titulo'] . '
                </a>
            </div>
            <div id="collapse' . $premio['idPremios'] . '" class="accordion-body collapse';
                if ($cantidad == 0) {
                    echo ' in';
                }
                echo '">
                <div class="accordion-inner">
                    <div class="row-fluid">
                        <object type="application/pdf" data="' . $premio['urlpdf'] . '" width="100%" height="550px">
                            <a href="' . $premio['urlpdf'] . '" alt="Link al pdf"></a>
                        </object>
                    </div>
                </div>
            </div>
        </div><!-- collapse para premio ' . $premio['idPremios'] . '-->';
                $cantidad++;
            }
        } else {
            echo '<div class="alert alert-info">No Hay premios vigentes registrados.</div>';
        }
        ?>
    </div>
</div>