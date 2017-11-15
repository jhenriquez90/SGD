<?php

require_once '../class/conexion.php';

$sql = "SELECT * FROM archivos WHERE propietario=19 and repository=' ' ";
$query_num_services=mysql_query($sql,Conectar::con());
$num_total_registros = mysql_num_rows($query_num_services);

//Si hay registros
 if ($num_total_registros > 0) {
	//numero de registros por página
    $rowsPerPage = 3;

    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if(isset($_GET['page'])) {
		sleep(1);
    	$pageNum = $_GET['page'];
	}
		
	//echo 'page'.$_GET['page'];

    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);

                    
    $query_services = mysql_query("SELECT id_docto,name_docto,oficio,num_archive,num_gabeta,num_fila,fecha,asignado,concat(repository,archive) as url,obs FROM archivos where propietario=19 and repository='' order by fecha desc limit $offset, $rowsPerPage", Conectar::con());
    while ($row_services = mysql_fetch_array($query_services)) {
                        //$service = new Service($row_services['service_id']);
		
		
        			echo '
						<div class="service_list" id="service'.$row_services['id_docto'].'" data="'.$row_services['id_docto'].'">
                         	
                            <div class="center_block">
                                <a title="'.$row_services['name_docto'].'" class="product_img_link" href="#">
                                <img width="129" height="129" alt="'.$row_services['name_docto'].'" src="../../../images/services/no-picture.jpg"></a>
                                <h3><a title="'.$row_services['name_docto'].'" href="#">'.$row_services['name_docto'].'</a></h3>
                                <p class="product_desc">'. '</p>';
                                
								
								}

                               
                                echo '<div class="rating" id="rating'.$row_services['id_docto'].'" data="'.$row_services['id_docto'].'">';
							
								
  
                                     echo '<div id="sumrating" data="<?=$sum_ratings?>" style="display:none">&nbsp;</div>
                                        <div id="numrating" data="<?=$num_ratings?>" style="display:none">&nbsp;</div>
                                        <div id="actual" data="<?=$rating?>" style="display:none;">&nbsp;</div>
                                        <div class="ok" style="display:none;">&nbsp;</div>
                                    </div>
                           	
                            </div>

                        </div>';
	}
	
	 if ($total_paginas > 1) {
                        echo '<nav aria-label="Page navigation">';
                        echo '<ul class="pagination">';
                            if ($pageNum != 1)
                                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
                            	for ($i=1;$i<=$total_paginas;$i++) {
                                    if ($pageNum == $i)
                                            //si muestro el índice de la página actual, no coloco enlace
                                            echo '<li class="active"><a>'.$i.'</a></li>';
                                    else
                                            //si el índice no corresponde con la página mostrada actualmente,
                                            //coloco el enlace para ir a esa página
                                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            }
                            if ($pageNum != $total_paginas)
                                    echo '<li><a data="'.($pageNum+1).'">Siguiente</a></li>';
                       echo '</ul>';
                       echo '</div>';
                    }
	

?>