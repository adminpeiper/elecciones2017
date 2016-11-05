<?php 
$crearProducto = false;
$administrarProducto = false;
$administrarFormula = false;
$turnos = false;
$flagCP = false;
$flagCR = false;
?>
<div class="navbar-content">
    <div class="main-navigation navbar-collapse collapse">
        <div class="navigation-toggler">     
            <i class="clip-chevron-left"></i>
            <i class="clip-chevron-right"></i>
        </div>
        <?php
            $permisos = ModeloUsuarios::model()->getUserPermisosSW(Yii::app()->user->name);
            $user = Yii::app()->user;
            
            $menu = array();
        ?>
        <ul class="main-navigation-menu">
            <li>
                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/index"?>><i class="clip-home-3"></i>
                        <span class="title"> Inicio </span><span class="selected"></span>
                </a>
            </li>
<!--            <li>
                <a href="javascript:void(0);"><i class="clip-settings"></i>
                        <span class="title"> Producción </span><i class="icon-arrow"></i>
                        <span class="selected"></span>
                       
                </a>
                <ul class="sub-menu">-->
        <?php   
            Yii::app()->cache->set('permisos',  json_encode($permisos));
            foreach ($permisos as $permiso)
            {
                if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_FICHA_TECNICA)
                {
        ?>
                    <li>
                        <a href="javascript:void(0)"> <i class="clip-file-3"></i>
                                <span class="title"> Ficha Técnica </span> <i class="icon-arrow"></i>
                                <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php foreach ($permisos as $FDI)
                            {
                                if(trim($FDI['menu']) == EnumPermisos::PERMISO_FDI_CREAR || trim($FDI['menu']) == EnumPermisos::PERMISO_FDI_ADMINISTRAR || trim($FDI['menu']) == EnumPermisos::PERMISO_FDI_CONSULTAR)
                                {
                            ?>
                                    <li>
                                        <a href="javascript:;">
                                                Ficha de impresión <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">
                                        <?php foreach ($permisos as $FDIS)
                                        {
                                        ?>
                                           
                                            <?php if(trim($FDIS['menu']) == EnumPermisos::PERMISO_FDI_CREAR)
                                            {
                                            ?>
                                            <li>
                                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=fichaDeImpresion/create"?>>
                                                        <span class="title"> Crear Ficha de impresión </span><span class="selected"></span>
                                                </a>
                                            </li> 
                                            <?php }?>
                                            <?php if(trim($FDIS['menu']) == EnumPermisos::PERMISO_FDI_ADMINISTRAR || trim($FDI['menu']) == EnumPermisos::PERMISO_FDI_CONSULTAR)
                                            {
                                            ?>
                                            <li>
                                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=fichaDeImpresion/admin"?>>
                                                        <span class="title"> Administrar Fichas de Impresión </span><span class="selected"></span>
                                                </a>
                                            </li>
                                            <?php }?>                                        
                                        <?php } ?>
                                        </ul>
                                    </li>
                            <?php  break;}                   
                            }?>
                            <?php foreach ($permisos as $FT)
                            {
                                if(trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_CABECERA_SE || trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_CABECERA_PT || trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_MP || trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_ACC || trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_DETALLE_SE || trim($FT['menu']) == EnumPermisos::PERMISO_FT_EDITAR_DETALLE_PT || trim($FT['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_SE || trim($FT['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_PT || $FT['menu'] == EnumPermisos::PERMISO_FT_CONSULTAR_MP || $FT['menu'] == EnumPermisos::PERMISO_FT_CONSULTAR_ACC)
                                {
                            ?>    
                            <li>
                                <a href="javascript:;"> <i class="clip-copy"></i>
                                        Productos <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">   
                                <?php foreach ($permisos as $FTS)
                                {
                                ?>    
                                    <?php if(!$crearProducto && (trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_CABECERA_SE || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_CABECERA_PT || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_MP || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_ACC))
                                    { $crearProducto = true;
                                    ?>
                                    <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=fichaTecnica/create"?>>
                                                    Crear Producto 
                                            </a>
                                    </li>   
                                    <?php }
                                    ?>
                                    <?php if(!$administrarProducto && (trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_DETALLE_SE || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_EDITAR_DETALLE_PT || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_SE || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_PT || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_MP || trim($FTS['menu']) == EnumPermisos::PERMISO_FT_CONSULTAR_ACC))
                                    { $administrarProducto = true;
                                    ?>
                                    <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=fichaTecnica/admin"?>>
                                                    Administración de Productos                                                   
                                            </a>
                                    </li>
                                    <?php }?>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php  break;}  
                            } ?>
                            <?php foreach ($permisos as $FO)
                            {
                                if(trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_ADMINISTRAR || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_CREAR || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_COSTEAR || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_VER_COSTOS || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_CONSULTAR) 
                                {
                            ?>
                            <li>
                                <a href="javascript:;"> <i class="clip-eyedropper"></i>
                                        Fórmulas <i class="icon-arrow"></i>                                    
                                </a>
                                <ul class="sub-menu">     
                                <?php foreach ($permisos as $FOS)
                                {
                                ?> 
                                    <?php if(trim($FOS['menu']) == EnumPermisos::PERMISO_FORMULAS_CREAR)
                                    {
                                    ?>
                                    <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=gestionFormula/create"?>>
                                                    Crear Fórmula
                                            </a>
                                    </li> 
                                    <?php } ?>
                                    <?php if(!$administrarFormula && (trim($FOS['menu']) == EnumPermisos::PERMISO_FORMULAS_ADMINISTRAR || trim($FOS['menu']) == EnumPermisos::PERMISO_FORMULAS_COSTEAR || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_VER_COSTOS || trim($FO['menu']) == EnumPermisos::PERMISO_FORMULAS_CONSULTAR))
                                    { $administrarFormula = true;
                                    ?>
                                    <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=gestionFormula/admin"?>>
                                                    Administración de Formulas                                                   
                                            </a>
                                    </li>
                                    <?php } ?>
                                <?php } 
                                ?>
                                </ul>
                            </li>
                            <?php  break;}                   
                            }?>
                        </ul>
                     </li>                                  
       <?php
                }                
                
                if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_MANTENIMIENTOS)
                {
       ?>
                    <li>
                            <a href="javascript:void(0)"><i class="clip-clip"></i>
                                    <span class="title"> Mantenimientos </span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                            <?php foreach ($permisos as $MANT)
                            {
                                if(trim($MANT['menu']) == EnumPermisos::PERMISO_MANTENIMIENTOS)
                                {
                            ?>
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Grupos <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoGrupo/create"?>>
                                                            <span class="title"> Crear Grupo </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoGrupo/admin"?>>
                                                            <span class="title"> Administración de Grupos </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>  
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Familia <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoFamilia/create"?>>
                                                            <span class="title"> Crear Familia </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoFamilia/admin"?>>
                                                            <span class="title"> Administración de Familias </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Linea <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoLinea/create"?>>
                                                            <span class="title"> Crear Linea </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoLinea/admin"?>>
                                                            <span class="title"> Administración de Linea </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Tipo <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoTipo/create"?>>
                                                            <span class="title"> Crear Tipo </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoTipo/admin"?>>
                                                            <span class="title"> Administración de Tipo </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Campos <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoCampos/create"?>>
                                                            <span class="title"> Crear Campo </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoCampos/admin"?>>
                                                            <span class="title"> Administración de Campos </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;"><i class="clip-stack-2"></i>
                                                Especificaciones <i class="icon-arrow"></i>
                                        </a>
                                        <ul class="sub-menu">                                                     
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=caracteristicasFichaTecnica/create"?>>
                                                            <span class="title"> Crear Especificaciones </span>
                                                    </a>
                                            </li>        
                                            <li>
                                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=caracteristicasFichaTecnica/admin"?>>
                                                            <span class="title"> Administración de Especificaciones </span>                                                    
                                                    </a>
                                            </li>
                                        </ul>
                                    </li>
                            <?php break;}
                            }?>
                            </ul>
                    </li>                     
        <?php
                }
                
                if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_COSTOS)
                {
        ?>  
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-dollar"></i>
                                    <span class="title"> Costos </span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">  
                        <?php foreach ($permisos as $DDC)
                        {
                            if(trim($DDC['menu']) == EnumPermisos::PERMISO_COSTOS_DC)
                            {
                        ?>
                            <li>
                                <a href="javascript:;">
                                        Distribución de Costos <i class="icon-arrow"></i>
                                </a>                                
                                <ul class="sub-menu">  
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=distribucionGastos/create"?>>
                                                <span class="title"> Crear Distribución de Costos </span><span class="selected"></span>
                                        </a>
                                    </li>                                       
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=distribucionGastos/admin"?>>
                                                <span class="title"> Administrar Distribución de Costos </span><span class="selected"></span>
                                        </a>
                                    </li>                                    
                                </ul>
                            </li>
                        <?php break;}
                        }?>
                        <?php foreach ($permisos as $COP)
                        {
                            if(trim($COP['menu']) == EnumPermisos::PERMISO_COSTOS_PC_APROBRAR || trim($COP['menu']) == EnumPermisos::PERMISO_COSTOS_PC_CREAR)
                            {
                        ?>
                            <li>
                                <a href="javascript:;">
                                        Costo Presupuestado <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">   
                                <?php foreach ($permisos as $COPS)
                                {
                                ?> 
                                    <?php if(trim($COPS['menu']) == EnumPermisos::PERMISO_COSTOS_PC_CREAR)
                                    {
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=costoPresupuestado/create"?>>
                                                <span class="title"> Crear Costo Presupuestado </span><span class="selected"></span>
                                        </a>
                                    </li>   
                                    <?php } ?>
                                    <?php if(!$flagCP && (trim($COPS['menu']) == EnumPermisos::PERMISO_COSTOS_PC_APROBRAR || trim($COPS['menu']) == EnumPermisos::PERMISO_COSTOS_PC_CREAR))
                                    { $flagCP = true;
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=costoPresupuestado/admin"?>>
                                                <span class="title"> Administrar de Costos Presupuestados </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </li>
                        <?php break;}
                        }?>
                        <?php foreach ($permisos as $COR)
                        {
                            if(trim($COR['menu']) == EnumPermisos::PERMISO_COSTOS_RC_CREAR || trim($COR['menu']) == EnumPermisos::PERMISO_COSTOS_RC_CONSULTAR)
                            {
                        ?>
                            <li>
                                <a href="javascript:;">
                                        Costo Real <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu"> 
                                <?php foreach ($permisos as $CORS)
                                {
                                ?> 
                                    <?php if(trim($CORS['menu']) == EnumPermisos::PERMISO_COSTOS_RC_CREAR)
                                    {
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=costoReal/create"?>>
                                                <span class="title"> Crear Costo Real </span><span class="selected"></span>
                                        </a>
                                    </li>   
                                    <?php } ?>
                                    <?php if(!$flagCR && (trim($CORS['menu']) == EnumPermisos::PERMISO_COSTOS_RC_CONSULTAR || trim($CORS['menu']) == EnumPermisos::PERMISO_COSTOS_RC_CREAR))
                                    { $flagCR = true;
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=costoReal/admin"?>>
                                                <span class="title"> Administrar de Costos Reales </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </li>
                        <?php break;}
                        }?>
                        </ul>
                    </li>
        <?php
                }
                
                if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_PRODUCCION)
                {
        ?>  
                    <li>
                        <a href="javascript:void(0)"><i class="clip-cog-2"></i>
                                    <span class="title">Producción</span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">   
                            <?php foreach ($permisos as $LOD)
                            {
                                if(trim($LOD['menu']) == EnumPermisos::PERMISO_PRODUCCION_LOD_CONSULTAR || trim($LOD['menu']) == EnumPermisos::PERMISO_PRODUCCION_LOD_PLANIFICAR || trim($LOD['menu']) == EnumPermisos::PERMISO_PRODUCCION_EXT_ADMINISTRAR || trim($LOD['menu']) == EnumPermisos::PERMISO_PRODUCCION_CYS_ADMINISTRAR || trim($LOD['menu']) == EnumPermisos::PERMISO_PRODUCCION_RF_ADMINISTRAR)
                                {
                            ?>
                                <li>
                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=listaOrdenesPedido/index"?>><i class="fa fa-book"></i>
                                            <span class="title"> Lista de Ordenes de Pedido </span><span class="selected"></span>
                                    </a>
                                </li> 
                            <?php break;}
                            }?>
                            <?php foreach ($permisos as $IEL)
                            {
                                if(trim($IEL['menu']) == EnumPermisos::PERMISO_PRODUCCION_IEL_ADMINISTRAR)
                                {
                            ?>    
                                <li>
                                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=impresionEnLinea/create"?>><i class="fa fa-file-text-o"></i>
                                            <span class="title"> Impresión en linea </span><span class="selected"></span>
                                    </a>
                                </li>
                            <?php break;}
                            }?>
                            <?php /*foreach ($permisos as $COS)
                            {
                                if(trim($COS['menu']) == EnumPermisos::PERMISO_PRODUCCION_CYS_ADMINISTRAR)
                                {
                            ?>    
                            <li>
                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=reporteCorteYSello/create"?>><i class="fa fa-cut"></i>
                                        <span class="title"> Corte y sello </span>
                                        <span class="selected"></span> 
                                </a>
                            </li>
                            <?php break;}
                            }*/?>
                            <?php foreach ($permisos as $FLE)
                            {
                                if(trim($FLE['menu']) == EnumPermisos::PERMISO_PRODUCCION_MZ_ADMINISTRAR || trim($FLE['menu']) == EnumPermisos::PERMISO_PRODUCCION_RF_ADMINISTRAR)
                                {
                            ?>  
                            <li>
                                <a href="javascript:void(0)"><i class="fa fa-print"></i>
                                            <span class="title"> Flexografía </span><i class="icon-arrow"></i>
                                            <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">    
                                <?php foreach ($permisos as $FLEX)
                                {
                                ?> 
                                    <?php if(trim($FLEX['menu']) == EnumPermisos::PERMISO_PRODUCCION_MZ_ADMINISTRAR)
                                    {
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mezclaTinta/create"?>>
                                                <span class="title"> Mezcla de Tinta </span><span class="selected"></span>
                                        </a>                                        
                                    </li>
                                    <?php } ?>
                                    <?php /*if(trim($FLEX['menu']) == EnumPermisos::PERMISO_PRODUCCION_RF_ADMINISTRAR)
                                    { 
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=reporteFlexografia/create"?>>
                                                <span class="title"> Impresión </span><span class="selected"></span>
                                        </a>                                        
                                    </li>
                                    <?php }*/ ?>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php break;}
                            }?>
                            <?php foreach ($permisos as $REB)
                            {
                                if(trim($REB['menu']) == EnumPermisos::PERMISO_PRODUCCION_REB_ADMINISTRAR)
                                {
                            ?> 
                            <li>
                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=rebobinado/create"?>><i class="clip-refresh"></i> 
                                        <span class="title"> Rebobinado </span><span class="selected"></span>
                                </a>
                            </li>
                            <?php break;}
                            }?>
                            <?php foreach ($permisos as $CNP)
                            {
                                if(trim($CNP['menu']) == EnumPermisos::PERMISO_PRODUCCION_CDP_ACTUALIZAR || trim($CNP['menu']) == EnumPermisos::PERMISO_PRODUCCION_CDP_CONSULTAR || trim($CNP['menu']) == EnumPermisos::PERMISO_PRODUCCION_CDP_TRANSFERENCIAS)
                                {
                            ?> 
                            <li>
                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=consultaProduccion/adminGeneral"?>><i class="fa fa-archive"></i>
                                        <span class="title"> Consultas </span><span class="selected"></span>
                                </a>
                            </li>
                            <?php break;}
                            }?>
                            <?php foreach ($permisos as $TUR)
                            {
                                if(trim($TUR['menu']) == EnumPermisos::PERMISO_PRODUCCION_TUR_ADMINISTRAR || trim($TUR['menu']) == EnumPermisos::PERMISO_PRODUCCION_TUR_CONSULTAR)
                                {
                            ?>
                                <li>
                                    <a href="javascript:;"><i class="fa fa-calendar"></i>
                                            Turnos <i class="icon-arrow"></i>
                                    </a>
                                    <ul class="sub-menu">     
                                     <?php foreach ($permisos as $TURN)
                                    {
                                    ?> 
                                        <?php if(trim($TURN['menu']) == EnumPermisos::PERMISO_PRODUCCION_TUR_ADMINISTRAR)
                                        {
                                        ?>
                                        <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=turno/create"?>>
                                                    <span class="title"> Turnos </span><span class="selected"></span>
                                            </a>
                                        </li> 
                                        <?php } ?>
                                        <?php if(!$turnos && (trim($TURN['menu']) == EnumPermisos::PERMISO_PRODUCCION_TUR_ADMINISTRAR || trim($TURN['menu']) == EnumPermisos::PERMISO_PRODUCCION_TUR_CONSULTAR))
                                        { $turnos = true;
                                        ?>
                                        <li>
                                            <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=turno/admin"?>>
                                                    <span class="title"> Administración de Turnos </span><span class="selected"></span>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    <?php } ?>
                                    </ul>
                                </li> 
                            <?php break;}
                            }?>
                        </ul>
                    </li>
        <?php
                }
                
                if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_ADMINISTRACION)
                {
        ?>  
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-desktop"></i>
                                    <span class="title"> Administración </span><i class="icon-arrow"></i>
                                    <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">       
                        <?php foreach ($permisos as $USU)
                        {
                            if(trim($USU['menu']) == EnumPermisos::PERMISO_ADMINISTRACION_USUARIO_CREAR || trim($USU['menu']) == EnumPermisos::PERMISO_ADMINISTRACION_USUARIO_ADMINISTRAR)
                            {
                        ?>
                            <li>
                                <a href="javascript:;"><i class="clip-user-2"></i>
                                        Usuarios <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">      
                                <?php foreach ($permisos as $USUS)
                                {
                                ?> 
                                    <?php if(trim($USUS['menu']) == EnumPermisos::PERMISO_ADMINISTRACION_USUARIO_CREAR)
                                    {
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=CoUsuarios/create"?>>
                                                <span class="title"> Crear Usuario </span><span class="selected"></span>
                                        </a>
                                    </li> 
                                    <?php } ?>
                                    <?php if(trim($USUS['menu']) == EnumPermisos::PERMISO_ADMINISTRACION_USUARIO_ADMINISTRAR)
                                    { 
                                    ?>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=CoUsuarios/admin"?>>
                                                <span class="title"> Administración de Usuarios </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                                
                            </li> 
                        <?php break;}
                        }?>
                        <?php foreach ($permisos as $DDR)
                        {
                            if(trim($DDR['menu']) == EnumPermisos::PERMISO_ADMINISTRACION_DDR)
                            {
                        ?>
                            <li>
                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=DistribuccionDeRollos/create"?>><i class="clip-grid-5"></i>
                                        <span class="title"> Distribución de Rollos </span><span class="selected"></span>
                                </a>                                
                            </li>
                        <?php break;}
                        }?>
                        </ul>
                    </li>
        <?php
                }
        ?>    
<!--                </ul>
            </li>-->
        <?php
            }
        ?>
        
        <?php foreach($permisos as $permiso)
        {        
            if(trim($permiso['menu']) == EnumPermisos::PERMISO_MENU_MENSAJERIA)
            {                    
        ?>  
                    <li>
                        <a href="javascript:void(0);"><i class="clip-truck"></i>
                                <span class="title"> MRPe </span><i class="icon-arrow"></i>
                                <span class="selected"></span>
                        </a>
                        
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:;"><i class="clip-file-3"></i>
                                        Tipo de Actividad <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoTipoActividad/create"?>>
                                                <span class="title"> Creación de Tipo de Actividad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoTipoActividad/admin"?>>
                                                <span class="title"> Administración de Tipo de Actividad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>                            
                            <li>
                                <a href="javascript:;"><i class="clip-file-3"></i>
                                        Prioridad <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoPrioridad/create"?>>
                                                <span class="title"> Creación de Prioridad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=mantenimientoPrioridad/admin"?>>
                                                <span class="title"> Administración de Tipo de Prioridad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;"><i class="clip-pencil"></i>
                                        Actividad <i class="icon-arrow"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=actividadPlanificada/create"?>>
                                                <span class="title"> Creación de Actividad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=actividadPlanificada/admin"?>>
                                                <span class="title"> Administración de Actividad </span><span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
        <?php
                }        
        }       
        ?>
                    
        <?php
            if(Yii::app()->user->isGuest)
            {
        ?>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/login"?>><i class="clip-home-3"></i>
                            <span class="title"> Ingresar </span><span class="selected"></span>
                    </a>
                </li>                
       <?php
            }
            
            /*if(!Yii::app()->user->isGuest)
            {
       ?>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/logout"?>><i class="clip-home-3"></i>
                            <span class="title"> Cerrar Sesion (<?php echo Yii::app()->user->name?>) </span><span class="selected"></span>
                    </a>
                </li>
       <?php
            }*/            
        ?>    
        </ul>
       
    </div>
</div>