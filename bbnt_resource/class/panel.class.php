<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/*
* @name         Worts.class.php
* @author       Wortit Developers
* @Programed    Andy Gómez (andyg)
*/

class tsDinero {
    function datesql($useras){
        global $babanta;
        $queryll = mysql_query("SELECT c_coment, c_type, c_user_id, cid, c_network FROM u_cobros WHERE (c_type='2.5' OR c_type='1') AND c_user_id='".$useras."' AND c_network='".$babanta->settings['net_id']."'' ORDER BY cid DESC LIMIT 1");
        $numll = mysql_num_rows($queryll);
        $ultimopago = mysql_fetch_assoc($queryll);
        //
        $meses = ($numll>=1) ? $ultimopago['c_coment'] : time('01-'.date('m-Y').'');
        $primer = $meses;
        $hoy = time();
        //
        return array(
            'primer' => $primer,
            'hoy' => $hoy,
            'num' => $numll,
            'date' => $ultimopago['c_coment']);
    }

     function cal($clics, $impresiones, $conversiones = 0.4, $coste = 0.12){
        // COSTE
        $coste = $coste/$conversiones;
        // CPM
        $cpm = '0.80';
        // CTR
        $ctr = ($clics*$impresiones);
        // CPC
        $varv1 = ($coste*$clcis);
        $varv2 = ($cpm/1000)*$ctr;
        $varv = ($coste/$clics)*100/100;
        $cpc = $varv;
        // CPV
        $varc = ($clics/$impresiones); // /($conversiones*$impresiones)/$cpc
        $cpvk = number_format(round($varc), 2, ',', ' ');
        $cpv = '0.29'; //(($cpvk <= '0,02') && $varc > '0,00') ? $varc : '0,02'
        // CPA
        $vara = ($cpv/$conversiones);
        $cpa = $vara;

        $data['cpv'] = $cpv;
        $data['cpc'] = '0.11'; //number_format(round($cpc), 2, ',', ' ')
        $data['cpa'] = '0.17'; // number_format(round($cpa), 2, ',', ' ')
        $data['cpm'] = $cpm; // number_format(round($cpa), 2, ',', ' ')
        return $data;
    }

    function impremes($useras){
    	global $babanta, $wuser, $mysqli;
        $useraskeke = ($useras) ? " AND vis_con='$useras'" : "";
        $datesqlpago = $this->datesql($useras);
        $primer = $datesqlpago['primer'];
        $hoy = $datesqlpago['hoy'];
        $num = $datesqlpago['num'];
        $date = $datesqlpago['date'];
        //
        $queryimpresiones = mysql_query("SELECT type, vis_con, v_hace, vw_valida, u_v FROM visitas WHERE type='58'".$useraskeke."".($num>=1 && $date ? " AND v_hace >= $primer" : "")." AND vw_valida='1' AND vw_network='".$babanta->settings['net_id']."'"); // GROUP BY u_v (v_hace BETWEEN '1/".$n."/".$y."' AND '".$mesdias."/".$nd."/".$y."')
        return $queryimpresiones;
    }

    function calcular($useree){
    	global $babanta, $wuser, $mysqli;
        $useree = ($useree) ? $useree : $wuser->uid;
        $thisimpressoket = $this->impremes($useree);
        $num_rows = mysql_num_rows($thisimpressoket);
    	$queryimpresiones = ($num_rows) ? $num_rows : 0;
    	// CLICS
    	$clics = 2;  //$queryimpesriones/500
    	// IMPRESIONES
    	$impresiones = $queryimpresiones;
    	// CONVERSIONES
    	$conversiones = 0.4;
    	$data = $this->cal($clics, $impresiones, $conversiones, $coste);
        // COSTE
        $knlwekmlkpasadoelmes = $mysqli->query("SELECT * FROM u_pagos WHERE p_type='3' AND p_user_id='".$useree."' AND p_network='".$babanta->settings['net_id']."' ORDER BY pid DESC LIMIT 1"); 
        $queryelmespasado = $knlwekmlkpasadoelmes->fetch_assoc();
        $totalusergnanacias = $queryimpresiones/1000*$data['cpm'];
        $costemulti1 = $queryelmespasado['p_up']-$totalusergnanacias;
        $costetotal = number_format($costemulti1*$totalusergnanacias*100, 2, '.', ' ');
        $coste = $costetotal.'%';

    	$data['impresiones'] = number_format($queryimpresiones);
    	$data['clics'] = number_format($clics, 2, ',', ' ');
    	$data['conversiones'] = number_format($conversiones, 2, ',', ' ');
        $datacolorcoste = ($costetotal <= 0) ? 'red' : 'green';
        $m = date('m')-1; $y = date('o');
        $mes = mktime( 0, 0, 0, $m, 1, $y);
        $elmes = date("F Y",$mes);
        $mesdias = date("t",$mes);
        $fecha = $mesdias.'/'.$m.'/'.$y;
    	$data['coste'] = '<span style="color:'.$datacolorcoste.';">'.$coste.'</span>'; //
    	return $data;
    }

    // OBTENER LOS INGRESOS DE ESTE MES
    function ingresos($useree){
    	global $babanta, $wuser;
        $ingresossqlquery = $this->impremes($useree);
        $num_rows = mysql_num_rows($ingresossqlquery);
    	$impresiones = ($num_rows) ? $num_rows : 0;
        $datesqlpago = $this->datesql($useree);
        //setlocale(LC_MONETARY, 'en_US');
        $dolares = $impresiones*$babanta->settings['pago_mil']/1000; // 0.80
        $data['usd'] = number_format($dolares,3,".",","); //number_format($dolares, 2, ",", ".") // number_format(, 2, '.', '') - $datos['cpm']*$impresiones/382
    	$data['impresiones'] = $impresiones;
        $data['date'] = $datesqlpago['date'];
        return $data;
    }

    function ingresoskoko($userko, $estadisticas, $global){
        global $mysqli, $babanta;
        $ingresossqlquery = $this->impremes($userko);
        $num_rows = mysql_num_rows($ingresossqlquery);
        $impresiones = ($num_rows) ? $num_rows : 0;
        $query = $mysqli->query("SELECT * FROM u_cobros WHERE c_type='3' AND c_network='".$babanta->settings['net_id']."' AND c_user_id='".$userko."'");
        $datainfo = $query->fetch_assoc();
        $data['wrts'] = 0; // /$datos['cpa']/$datos['cpc']
        $daoskeke = $this->ingresos($userko);
        $data['usd'] = ($global) ? $daoskeke['usd'] : $datainfo['c_dinero'];
        $data['impresiones'] = $impresiones;
        $data['estadisticas'] = "";
        $dataisdlf = $this->listardias($userko);
        $i = 0; foreach($dataisdlf AS $row){
        $data['estadisticas'] .= '{
            d: "'.$row['fecha'].'",
            visits: '.$row['visitas'].'
        },';
        $i++; }
        return $data;
    }

    function acmlcnalsguntms($userkop){
        global $wuser, $babanta, $ip, $mysqli;
        $acmlqueryok = $mysqli->query("SELECT * FROM u_cobros WHERE c_user_id='".$userkop."' AND c_type='3' ORDER BY cid DESC LIMIT 1");
        $ultimopg = $acmlqueryok->fetch_assoc();
        if($ultimopg['c_dinero'] < 2 && $ultimopg['c_dinero'] != 2){
        //$mysqli->query("UPDATE visitas WHERE type='5'");
        }
        return $data;
    }

    // MANTENER ACTUALIZADO EL COBRO DEL MES :)
    function cobrosmnsls(){
        global $babanta, $wuser, $ip, $mysqli;
        $querytusers = mysql_query("SELECT * FROM babanta_usuarios WHERE buser_id='".$wuser->uid."'");
        $rowus = mysql_fetch_assoc($querytusers);
        $cobroquerynosekowllk = mysql_query("SELECT * FROM u_cobros WHERE c_type='3' AND c_user_id='".$wuser->uid."' AND c_network='".$babanta->settings['net_id']."'");
        $cobrodeluserxstt = mysql_num_rows($cobroquerynosekowllk);
        if($cobrodeluserxstt == 1){
        $infocobrequerysql = mysql_query("SELECT * FROM u_cobros WHERE c_type='3' AND c_user_id='".$wuser->uid."' AND c_network='".$babanta->settings['net_id']."'");
        $infocobrose = mysql_fetch_assoc($infocobrequerysql);
        $ingreosinsert = $this->ingresos($wuser->uid);
        $usdpagos = $ingreosinsert['usd'];
        if($usdpagos >= $infocobrose['c_dinero']) mysql_query("UPDATE u_cobros SET c_dinero='".$usdpagos."' WHERE c_type='3' AND c_user_id='".$wuser->uid."' AND c_network='".$babanta->settings['net_id']."'");
        return true;
        }elseif($cobrodeluserxstt >= 2){
        mysql_query("DELETE FROM u_cobros WHERE c_user_id='".$rowus['buser_id']."' AND c_pais='0.1' AND c_type='3' AND c_network='".$babanta->settings['net_id']."'");
        return true;
        }else{
        mysql_query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip,c_network) VALUES('".$wuser->uid."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."','".$babanta->settings['net_id']."')");
       return true;
        } 
    }

    function pagos_status($user){
    global $babanta, $wuser, $ip, $mysqli;
    $query = $mysqli->query("SELECT c.*, p.* FROM u_cobros AS c LEFT JOIN u_pagos AS p ON c.c_pais = p.pid WHERE c.c_user_id='".$user."'");
    $data = mysqli_array($query);
    return $data;
    }

    // PAGAR CUANDO EL ADMINISTRADOR DE ESTA SECCIÓN LO HAGA
    function pagar($userreemit, $cidpost, $tipo = '2.5'){
    global $babanta, $wuser, $ip, $mysqli;
    $mes = date('m'); $anio = date('Y');
    $userreemitquery = ($userreemit) ? " WHERE buser_id='".$userreemit."' AND user_partner='1'" : ' WHERE user_partner=\'1\'';
    $querytusers = result_array(mysql_query("SELECT * FROM babanta_usuarios".$userreemitquery));
    $o = 1; foreach($querytusers AS $rowu){
    $ingreosinsert = $this->ingresos($rowu['buser_id']);
    // ON FOREACH TODOS LO USUARIOS
    $mysqli->query("SELECT * FROM u_cobros WHERE c_type='3' AND c_pais='0.1' AND c_user_id='".$rowu['buser_id']."'");
    $darpuntosqlquer = $mysqli->query("SELECT * FROM u_cobros WHERE c_type='3' AND c_pais='0.1' AND c_user_id='".$rowu['buser_id']."'");
    $queryr = $darpuntosqlquer->fetch_assoc();
    $facturaid = ($cidpost) ? $cidpost : $queryr['cid'];
    // PAGO OFICIALMENTE
    $pagooficial = $mysqli->query("INSERT INTO u_pagos(
        p_user_id,
        p_dinero,
        p_secret,
        p_date,
        p_autor_ip,
        p_type) VALUES(
        '".$rowu['buser_id']."',
        '".$ingreosinsert['usd']."',
        '".substr(md5(time().'KNWKE_BWRTSPGS_PG15S1W2'.time().'KOKOROKO_PGEFTTAD0_1558WE8'), 17.8)."',
        '".time()."',
        '".$ip."',
        '3')");
    if($pagooficial){
    $insertidkok = $mysqli->insert_id; 
    if($facturaid){
    // DESACTIVO EL COBRO HECHO
        $tipo = !empty($tipo) ?  $tipo : '2.5';
    if($mysqli->query("UPDATE u_cobros SET c_type='".$tipo."', c_pais='".$insertidkok."', c_pagostatus='2.5', c_coment='".time()."' WHERE cid='".$facturaid."'")){ // cid='".$queryr['cid']."'
    $mysqli->query("UPDATE u_cobros SET c_coment='".time()."' WHERE cid='".$facturaid."'");
    // INSERTO UN NUEVO COBRO DEL MES, c_email = ultimo pago que se hizo, c_coment=el dia que se pago, c_pais = id del pago
    $nuevocobro = $mysqli->query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip,c_network) VALUES('".$rowu['buser_id']."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."','".$babanta->settings['net_id']."')");
    $numerodecpaisenceroquery = $mysqli->query("SELECT * FROM u_cobros WHERE c_pais='0.1' AND c_type='3' AND c_user_id='".$rowu['buser_id']."'"); 
    $numerodecpaisencero = $numerodecpaisenceroquery->num_rows;
    if($numerodecpaisencero){
    if($nuevocobro){
    if($numerodecpaisencero == 1){ 
    $n .= '<div><b>'.$o.';'.$nuevocobro->insert_id.'</b>: <u>Generada</u> para; '.$rowu['usuario_nombre'].'</div><br>';
    }else{
        $ELEM = $numerodecpaisencero-1;
    $mysqli->query("DELETE FROM u_cobros WHERE c_pais='0.1' AND c_type='3' AND c_user_id='".$rowu['buser_id']."' LIMIT ".$ELEM);
        $this->pagar($rowu['buser_id']);
        $n .= $o.' Keee';
    }
    }else{ $n .= $o.'Error #3'; }
      }else{ $n .= $o.' ERROR - NO COBRO NUEVO INSERT'; }
    }else{ $n .= $o.'Error #2'; } 
     }else{ $n .= $o.' ERROR - NO INSERT ID PAGO ::'.$queryr['cid'].' => '.$rowu['buser_id']; }
    }else{ $n .= $o.'Error #1'; }
    // END FOREACH TODOS USUARIOS
    $o++; }
    return 'Facturas generadas correctamente: '.$n;
    }

    /* ESTADISTICAS */

    function build_sorter($clave) {
    return function ($a, $b) use ($clave) {
        return strnatcmp($a[$clave], $b[$clave]);
    };
    }

    function listardias($useras){
        global $w, $babanta;
        $listado = $this->impremes($useras);
        $data = result_array($listado);
        $numeros = array(); $total = array();
        $i = 0; foreach($data AS $n => $row){
            //
            $total[$mes] = $total[$mes]+1;
            $meses[$mes] = array('visitas' => $total[$mes]);
            //
        $dia = date('j', $row['v_hace']); $mes = date('n', $row['v_hace']);
        $total[$mes.'-'.$dia] = $total[$mes.'-'.$dia]+1;
        $numeros[$mes] = array('fecha' => $dia.':'.$fecha, 'mes' => $mes);
        $valores[$mes][$dia] = array('visitas' => $total[$mes.'-'.$dia],'dia' => $dia);
        $i++; }
        usort($numeros, $this->build_sorter('mes'));
        $ultimo = array_pop($numeros);
        $primero = array_values($numeros)[0];
        //
        $ultimod = array_pop($valores);
        $primerod = array_values($valores)[0];
        $primeromes = ($primero['mes']) ? $primero['mes'] : '1';
        $ultimomes = ($ultimo['mes']) ? $ultimo['mes'] : '12';
        // $ultimo['mes']+1
           for($l=$primeromes;$l<$ultimomes;$l++){ if($l>=1){
           $visitas = $meses[$l]['visitas']+1;
           $datos[$l] = array('fecha' => date('Y').'-'.$l, 'visitas' => $visitas, 'pago' => $visitas*$babanta->settings['pago_mil']/1000);
           if($l == date('n')){
            usort($valores[$l]['dias'], $this->build_sorter('dia'));
            $tt = 1; foreach($valores[$l]['dias'] AS $rowee){
                $datos[$l.'-'.$tt] = array('fecha' => date('Y').'-'.$l.'-'.$tt, 'visitas' => $rowee['visitas'], 'pago' => $rowee['visitas']*$babanta->settings['pago_mil']/1000);
            $tt++; } // foreach por dias
           } // end else
       /* for($k=$primerod['dia'];$k<$ultimod['dia']+1;$k++){
            $visitas = ($total[$l.'-'.$k]) ? $total[$l.'-'.$k] : 0;
            $datos[$k] = array('fecha' => date('Y').'-'.$l.'-'.$k, 'visitas' => $visitas, 'pago' => $visitas/1000*1);
        } */
         }
          }
        return $datos;
    }

    function list_estadisticas($useras){
        global $w;
        /*$m = date('m');  // MES
        $y = date('Y'); // AÑO
        $n = date('n'); // MES N
        $mes = mktime( 0, 0, 0, $m, 1, $y);
        $elmes = date("F Y",$mes);
        $mesdias = date("t",$mes);*/
        $datesqlpago = $this->datesql($useras);
        $primer = $datesqlpago['primer'];
        $hoy = $datesqlpago['hoy'];
        //
        $useraskeke = ($useras) ? " AND vis_con='$useras'" : "";
        $query = mysql_query("SELECT COUNT(*) AS total, vw_date, vw_valida, type, v_hace, u_v, vis_con, CAST(v_hace AS DATE) as fecha FROM visitas WHERE type='58'$useraskeke AND v_hace >= $primer AND vw_valida='1' GROUP BY CAST(v_hace AS DATE), u_v");
        $i = 0; while($row = mysql_fetch_assoc($query)){
            $dia = date('d', $row['v_hace']); 
            $anio = date('Y', $row['v_hace']);
            $mes = date('m', $row['v_hace']);
            $array[$i]['v_hace'] = $row['v_hace'];
            $array[$i]['u_v'] = $row['v_u'];
            $array[$i]['type'] = $row['type'];
            $array[$i]['timestamp'] = $row['v_hace'];
            $array[$i]['title'] = $w->setHace($row['v_hace']);
            $array[$i]['date'] = $row['fecha']; 
            $array[$i]['total'] = $row['total'];
        $i++; }

        return $array;
    }

    function getadminfacturas(){
        global $babanta;
        $query = mysql_query("SELECT c.*, u.* FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id=u.buser_id WHERE c.c_type='3' AND c.c_network='".$babanta->settings['net_id']."' GROUP BY u.buser_id");
        $data = result_array($query);
        return $data;
    }
    
    function url_dominio($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
    }

    function limpiar_visitas($userke, $nameis){
        global $w, $wuser;
        $userke = ($userke) ? $userke : $_REQUEST['u'];
        $nameiser = ($nameis) ? $wuser->loadUserID($userke) : $userke;
        if($nameis && $wuser->uid == $nameiser || !$nameis && $wuser->admod){
        $extra = ($userke) ? " WHERE vis_con='".$nameiser."' AND type='58'" : " WHERE type='58'";
        $visitas = mysql_query("SELECT id, vis_con, u_v, vw_ref FROM visitas".$extra."");
        $data = result_array($visitas);
        $rk = 0; foreach($data AS $roke){
            //$dominio = $this->url_dominio($roke['vw_ref']);
            if((strpos($roke['vw_ref'],'facebook.com') || strpos($roke['vw_ref'],'m.facebook.com')) && $roke['vw_ref']){ // (strpos($dominio,'facebook.com') || strpos($dominio,'m.facebook.com'))
            if(mysql_query("UPDATE visitas SET vw_valida='1' WHERE id=".$roke['id'])){
                $validas[$rk] = $roke['id'];
            }else{ $validasdoerror[$rk] = $roke['id']; }
            }else{
                if(mysql_query("UPDATE visitas SET vw_valida='".$dominio."' WHERE id=".$roke['id'])){
                $limpiado[$rk] = $roke['id'];
                }else{ $limpiadoerror[$rk] = $roke['id']; }
            }
        $rk++; }
        $datos = array(
            //'Invalidas' => count($limpiado),
            //'error_al_limpiar' => count($limpiadoerror),
            'Validas' => array( 'Visitas' => count($validas), 'Generado' => '$'.count($validas)/1000*2 ),
            'Calculo' => 'Para calcular haz el siguiente calculo: <b>tusvisitas</b>/1000*2'
            //'error_validos' => count($validasdoerror)
            );
        }else{
            $datos = array(
                'Aviso' => '¿Por que quieres ver las ganancias que no son tuyas? mejor <a href="'.$w->settings['url'].'/ajax/postix-datos.php?u='.$wuser->nick.'">mira las tuyas</a>'
                );
        }
        return $datos;
    }

/* FINALIZACIÓN DE LA CLASE */
}

