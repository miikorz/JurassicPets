<?php
session_start();
if(isset($_SESSION['usuario'])){
    if($_SESSION['role'] == 'administrador'){
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>JurassicPets - Mantenimiento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.ico">

        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="css/flick/jquery-ui-custom.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="jqgrid/css/ui.jqgrid.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery.min.js.descarga"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/myjqgrid.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js.descarga"></script>



    </head>
    <body>
        <nav class="navbar z-depth-2 primary-color">
            <a href="index.php"><img height="60" width="300" src="img/logo-pag.gif" /></a>
        </nav>
        <div class="container">
            <div class="col-md-3">
                <div id="linksCrud" class="collection">
                    <a id="btnCategoria" href="javascript:void(0)" class="collection-item">Categorías</a>
                    <a id="btnArticulo" href="javascript:void(0)" class="collection-item">Artículos</a>
                    <a id="btn_ped" href="javascript:void(0)" class="collection-item">Pedidos</a>
                    <a id="btn_usr" href="javascript:void(0)" class="collection-item">Usuarios</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="capaJqgrid">

                </div>
            </div>
        </div>

        <!-- Modal CATEGORÍA -->
        <div id="modalCategoria" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Categoría</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form id="formCategoria" class="col-md-12">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input id="inpIdCategoria" name="id" type="hidden">
                                        <input id="inpNombreCategoria" name="nombre" placeholder="Introduce un nombre" type="text">
                                        <label class="active">Nombre</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button id="btnAceptarCategoria" type="button" class="btn btn-default" data-dismiss="modal" >Aceptar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ARTÍCULO -->
        <div id="modalArticulo" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Artículo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form id="formArticulo" class="col-md-12">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input id="inpIdArticulo" name="id" type="hidden">
                                        <input id="inpNombreArticulo" name="nombre" placeholder="Introduce un nombre" type="text">
                                        <label class="active">Nombre</label>
                                    </div>
                                    <div class="input-field col-md-12">
                                        <input id="inpDescripcionArticulo" name="descripcion" placeholder="Introduce una descripción" type="text">
                                        <label class="active">Descripción</label>
                                    </div>
                                    <div class="input-field col-md-12">
                                        <input id="inpImagenArticulo" name="imagen" placeholder="Introduce una ruta de imagen" type="text">
                                        <label class="active">Ruta imagen</label>
                                    </div>
                                    <div class="input-field col-md-12">
                                        <input id="inpPrecioArticulo" name="precio" placeholder="Introduce un precio" type="number">
                                        <label class="active">Precio</label>
                                    </div>
                                    <div class="input-field col-md-12">
                                        <input id="inpCategoriaArticulo" name="categoria" placeholder="Introduce un id de categoría" type="number">
                                        <label class="active">Categoría</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button id="btnAceptarArticulo" type="button" class="btn btn-default" data-dismiss="modal" >Aceptar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal USUARIO-->
        <div class="modal fade" id="modalUsuario" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal-title">Ventana Modal</h4>
                    </div>
                    <div class="modal-body" id="modalCarritoBody">
                        <div class="row">
                            <form class="col-md-12" id="usuarioForm">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input placeholder="Introduce un nombre" id="inpNombreUsr" type="text">
                                        <label class="active">Nombre</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input  placeholder="Introduce un password" id="inpPassword" type="text">
                                        <label class="active">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input  placeholder="Introduce un email" id="inpEmail" type="email" required>
                                        <label class="active">email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input  placeholder="Introduce un rol" id="inpRole" type="text">
                                        <label class="active">Rol</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-default" id="btn_aceptarUsuario" data-dismiss="modal" >Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal PEDIDOS (fixear duplicados usando este modal para pedidos)-->
        <div class="modal fade" id="modalPedido" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal-title">Ventana Modal</h4>
                    </div>
                    <div class="modal-body" id="modalCarritoBody">
                        <div class="row">
                            <form class="col-md-12" id="pedidoForm">
                                <div class="row">
                                    <div class="input-field col-md-12">
                                        <input placeholder="Introduce una fecha" id="inpFecha" type="text">
                                        <label class="active">Fecha</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-default" id="btn_aceptarPedido" data-dismiss="modal" >Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ERROR -->
        <div id="modalError" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div id="card-alert" class="modal-content card orange">
                    <div class="card-content white-text">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p><i class="fa fa-warning"></i> Por favor, selecciona una fila...</p>
                    </div>
                </div>
            </div>
        </div>  
    </body>

</html>
<?php
    }else{
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
?>