<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/*
* @name         Worts.class.php
* @author       Wortit Developers
* @Programed    Andy Gómez (andyg)
*/

class tsDinero {

    function datesql($useras){
     $queryll = mysql_query("SELECT c_coment, c_type, c_user_id, cid FROM u_cobros WHERE (c_type='2.5' OR c_type='1') AND c_user_id='".$useras."' ORDER BY cid DESC LIMIT 1");
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

    function impremes($useras, $estadisticas){
    	global $babanta, $wuser, $mysqli;
/*$file_to_bann=$_SERVER["DOCUMENT_ROOT"]."/sub_server/data_visitas.txt";
$read_file_ban = fopen($file_to_bann, "r");
$services_lists=fread($read_file_ban,filesize($file_to_bann));
$data_json = json_decode($services_lists, true);
        return $data_json;*/
        return true;
    }

    function valoringresos($array,$user){
        global $babanta,$mysqli,$wuser;
        $user = ($user) ? $user : $wuser->uid;
        /*$impresiones = 0;
        $ingresos = 0;
        //$array = $this->searchForId($user, $array);
        //usort($array, build_sorter('user_post'));
        foreach($array AS $row){
            if($row['data']['user_post'] == $user){
            $name = $row['data']['ip'].'-'.$row['data']['viscon'];
            $total[$name] = $total[$name]+1;
            $viscon[$name] = array(
                'id' => $row['data']['viscon'],
                'total' => $total[$name]
            );
            }
        }
        foreach($viscon AS $rek){
            $rowese = mysql_fetch_assoc(mysql_query("SELECT postix_valor, postix_id, postix_network_id FROM postix_posts WHERE postix_id='".$rek['id']."' AND postix_network_id='".$babanta->settings['net_id']."'"));
            $impresiones = $impresiones+$rek['total'];
            $ingresos = $ingresos+($rek['total']/1000*$rowese['postix_valor']);
        }
        $impresiones = number_format($impresiones,0,".",",");
        $ingresos = $ingresos;
        mysql_query("UPDATE u_cobros SET c_impresiones='$impresiones' WHERE c_type='3' AND c_user_id='$user' AND c_network='".$babanta->settings['net_id']."'");
        */
        $data = mysql_fetch_assoc(mysql_query("SELECT c_dinero, c_impresiones, c_user_id, c_type, c_conversiones, c_network FROM u_cobros WHERE c_type='3' AND c_user_id='".$user."' AND c_network='".$babanta->settings['net_id']."'"));
        $ingresos = ($data['c_dinero']) ? $data['c_dinero'] : '0'; $impresiones = ($data['c_impresiones']) ? $data['c_impresiones'] : '0';
        $conversiones = ($data['c_conversiones']) ? $data['c_conversiones'] : '0';
        return array('ingresos' => $ingresos, 'impresiones' => $impresiones, 'conversiones' => $conversiones);
    }

    // OBTENER LOS INGRESOS DE ESTE MES
    function ingresos($useree){
    	global $babanta, $wuser;
        $ingresossqlquery = $this->impremes($useree);
        $totales = $this->valoringresos($ingresossqlquery, $useree);
        $dolares = $totales['ingresos'];
        $impresiones = $totales['impresiones'];
        $data['usd'] = $dolares; // number_format(,3,".",",")
    	$data['impresiones'] = $impresiones;
        $data['conversiones'] = $totales['conversiones'];
        return $data;
    }

    function ingresoskoko($userko, $estadisticas, $global, $ref = false){
        global $mysqli, $wuser, $babanta;
        $ingresossqlquery = $this->impremes($userko);
        $query = mysql_query("SELECT * FROM u_cobros WHERE c_type='3' AND c_user_id='".$userko."' AND c_network='".$babanta->settings['net_id']."'");
        $datainfo = mysql_fetch_assoc($query);
        if(!$datainfo['c_impresiones']){
        $totales = $this->valoringresos($ingresossqlquery, $userko);
        $impresiones = $totales['impresiones'];
        }
        $data['usd'] = ($datainfo['c_dinero']) ? $datainfo['c_dinero'] : '0';
        $data['impresiones'] = ($datainfo['c_impresiones']) ? $datainfo['c_impresiones'] : $impresiones;
        $data['c_referidos'] = $datainfo['c_referidos'];
        $data['c_onlines'] = $datainfo['c_onlines'];
        $data['c_update'] = $datainfo['c_update'];
        $data['c_conversiones'] = ($datainfo['c_conversiones']) ? $datainfo['c_conversiones'] : '0';
        $data['estadisticas'] = '';
                     // (!$userko) ? $this->listardias() :  
        $dataisdlf = json_decode($wuser->info['partner_statics'], true);
        $i = 0; foreach($dataisdlf['visitas'] AS $row){
        $data['pais'] = $dataisdlf['pais'];
        $data['estadisticas'] .= '{
            d: "'.$row['fecha'].'",
            visits: '.$row['visitas'].'
        },';
        $i++; }
        return $data;
    }

    function acmlcnalsguntms($userkop){
        global $wuser, $babanta, $ip, $mysqli;
        $acmlqueryok = mysql_query("SELECT c_dinero, c_user_id, c_type, cid, c_network FROM u_cobros WHERE c_network='".$babanta->settings['net_id']."' AND c_user_id='".$userkop."' AND c_type='3' ORDER BY cid DESC LIMIT 1");
        $ultimopg = $acmlqueryok->fetch_assoc();
        if($ultimopg['c_dinero'] < 2 && $ultimopg['c_dinero'] != 2){
        }
        return $data;
    }

    function ban($ob, $type, $con, $to){
        global $babanta, $wuser;
        /*   bbb_type -
        * 1 => Email de pago
        * 2 => usuarios putos hijos de la verga que usan hitleap o bots
        * 3 => sepalaverga nose aún :v
        */
         if($ob && $type){
            if(mysql_query("INSERT INTO babanta_banned (
                bbb_obj,
                bbb_con,
                bbb_type,
                bbb_hace,
                bbb_from,
                bbb_to
            ) VALUES(
                '".$ob."',
                '".$con."',
                '".$type."',
                '".time()."',
                '".$wuser->uid."',
                '".$to."'
            )")){
            //// ENVIAR CORREO ////
$para = $wuser->info['usuario_email'];
$titulo = $babanta->settings['net_name'].' | Tu cuenta ha sido inhabilitada';
require_once TS_ROOT.'/bbnt_resource/class/mail.class.php';
$tsMail = new tsMail;
$para = array(
  1 => array('c' => $para, 'n' => '@'.$wuser->nick)
);
$de = 2;
$asunto = $titulo;
$body = array(
'top' => 'Haz sido baneado de <b>Babanta</b> Motivo:',
'center' => 'Incumplir con las políticas del programa.',
'bottom' => 'Lamentamos esta situación y esperamos no sigas estos malos pasos con otras empresas, esperamos poder haberte ayudado en todo lo que necesitaras y algun dia encontrarte en buenos pasos :), Gracias por formar parte de Babanta!',
'link' => array('link' => $babanta->settings['url'].'?ref=mail_report__baneo', 'name' => 'Ver baneo'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Haz recibido un baneo por parte de administración, Razón: Incumplir con las políticas del programa';
$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);
/// END CORREO /////

                return '1: Baneo completado';
            }else{ return '0: Ocurrio un error, intenta nuevamente'; }
         }else{ return '0: Ingresa los datos'; }
    }

    // MANTENER ACTUALIZADO EL COBRO DEL MES :)
    function cobrosmnsls($userid, $exclu){
        global $babanta, $wuser, $ip, $mysqli;
        $iduser = ($userid) ? $userid : $wuser->uid;
        $querytusers = $mysqli->query("SELECT buser_id, babanta_update, partner_statics, babanta_ref, buser_network, buser_rango FROM babanta_usuarios WHERE buser_id='".$iduser."' AND (buser_network='".$babanta->settings['net_id']."' OR buser_rango='1')");
        $rowus = $querytusers->fetch_assoc(); // ON; FOREACH
        $otime = strtotime('-30 seconds'); // -4 hours
        /** ACTUALIZAR DINERO **/
        $cobroquerynosekowllk = $mysqli->query("SELECT cid,c_dinero,c_type,c_user_id,c_email,c_update,c_network FROM u_cobros WHERE c_type='3' AND c_user_id='".$iduser."' AND c_network='".$babanta->settings['net_id']."' ");
        $cobrodeluserxstt = $cobroquerynosekowllk->num_rows;
        $cobroinfo = $cobroquerynosekowllk->fetch_assoc();
        //
if($exclu){ // $rowus['babanta_update'] <= $otime || 
        //
        if($cobrodeluserxstt == 1){
        //$infocobrequerysql = mysql_query("SELECT c_dinero, c_type, c_user_id, c_network FROM u_cobros WHERE c_type='3' AND c_user_id='".$iduser."' AND c_network='".$babanta->settings['net_id']."'");
        //$infocobrose = $cobroquerynosekowllk->fetch_assoc();
        $ingreosinsert = $this->ingresos($iduser);
        /*if($rowus['babanta_update'] <= $otime || !$rowus['partner_statics']){
            $insepaises = $this->listardias($iduser);
        }*/
        $usdpagos = $ingreosinsert['usd']; // ($ingreosinsert['usd'] <= $infocobrose['c_dinero']) ? $infocobrose['c_dinero'] : 
        $impresoo = $ingreosinsert['impresiones'];
        // SEND MAIL ACA
        $timeok = time();
        //$impreto = ($impresoo) ? ",c_impresiones='$impresoo'" : "";
        //$mysqli->query("UPDATE u_cobros SET c_dinero='$usdpagos'$impreto$refupdate WHERE c_type='3' AND c_user_id='$iduser'");
        $mysqli->query("UPDATE babanta_usuarios SET babanta_update='$timeok' WHERE buser_id='$iduser' AND (buser_network='".$babanta->settings['net_id']."' OR buser_rango='1')");
        /*if($ingreosinsert['usd'] != $infocobrose['c_dinero']){
        $mysqli->query("INSERT INTO u_registro_cobros (urc_ingreso,urc_impresiones,urc_hace,urc_date,urc_referidos,urc_cobro,urc_updateult,urc_usuario) VALUES('$usdpagos','$impresoo','".time()."','".date('d/m/Y h:i:s')."','$usdreferers','$infocobrose[cid]','$rowus[babanta_update]','$wuser->uid')");
        }*/
        //}
        }elseif($cobrodeluserxstt >= 2){
        $mysqli->query("DELETE FROM u_cobros WHERE c_user_id='".$iduser."' AND c_type='3' AND c_network='".$babanta->settings['net_id']."'");
        }else{
        $mysqli->query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip,c_network) VALUES('".$iduser."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."','".$babanta->settings['net_id']."')");
        } // END ELSE 1
        }elseif(!$rowus['babanta_update']){
        $mysqli->query("UPDATE babanta_usuarios SET babanta_update='".time()."' WHERE buser_id='".$iduser."' AND buser_network='".$babanta->settings['net_id']."'");
        }else{
        //
        if($cobrodeluserxstt == 1){
        // 
        }elseif($cobrodeluserxstt >= 2){
        $mysqli->query("DELETE FROM u_cobros WHERE c_user_id='".$iduser."' AND c_type='3' AND c_network='".$babanta->settings['net_id']."'");
        }else{
        $mysqli->query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip,c_network) VALUES('".$iduser."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."','".$babanta->settings['net_id']."')");
        }
        //
        }
        return true;
    }

    function pagos_status($user){
    global $babanta, $wuser, $ip, $mysqli;
    $query = mysql_query("SELECT c.cid,c.c_type, c.c_recaudado, c.c_dinero, c.c_referidos, c.c_date, c.c_pais, c.c_network, p.pid FROM u_cobros AS c LEFT JOIN u_pagos AS p ON c.c_pais = p.pid WHERE c.c_user_id='".$user."' AND c.c_network='".$babanta->settings['net_id']."'");
    $data = result_array($query);
    return $data;
    }

    // PAGAR CUANDO EL ADMINISTRADOR DE ESTA SECCIÓN LO HAGA
    function pagar($userreemit, $cidpost, $tipo){
    global $babanta, $wuser, $ip, $mysqli;
    $mes = date('m'); $anio = date('Y');
    $userreemitquery = ($userreemit) ? " WHERE buser_id='".$userreemit."' AND buser_network='".$babanta->settings['net_id']."' LIMIT 1" : " WHERE buser_network='".$babanta->settings['net_id']."' LIMIT 1";
    $querytusers = mysql_query("SELECT * FROM babanta_usuarios".$userreemitquery);
    $o = 1; while($rowu = mysql_fetch_assoc($querytusers)){
    $ingreosinsert = $this->ingresos($rowu['buser_id']);
    
    // ON FOREACH TODOS LO USUARIOS
    //mysql_query("SELECT * FROM u_cobros WHERE c_type='3' AND c_pais='0.1' AND c_user_id='".$rowu['buser_id']."'");
    $darpuntosqlquer = mysql_query("SELECT * FROM u_cobros WHERE c_type='3' AND c_pais='0.1' AND c_user_id='".$rowu['buser_id']."' AND c_network='".$babanta->settings['net_id']."'");
    $queryr = mysql_fetch_assoc($darpuntosqlquer);
    $facturaid = ($cidpost) ? $cidpost : $queryr['cid'];
    // PAGO OFICIALMENTE
   
    $pagooficial = mysql_query("INSERT INTO u_pagos(
        p_user_id,
        p_dinero,
        p_secret,
        p_date,
        p_autor_ip,
        p_type,
        p_up,
        p_network) VALUES(
        '".$rowu['buser_id']."',
        '".$ingreosinsert['usd']."',
        '".substr(md5(time().'KNWKE_BWRTSPGS_PG15S1W2'.time().'KOKOROKO_PGEFTTAD0_1558WE8'), 17.8)."',
        '".time()."',
        '".$ip."',
        '3',
        '".$rowu['partner_pago']."',
        '".$babanta->settings['net_id']."')");
    if($pagooficial){ $n .= 'Pago oficial  ';
    $insertidkok = $mysqli->insert_id; 
    if($facturaid){  $n .= 'Factura id  ';
    // DESACTIVO EL COBRO HECHO
        $tipo = $tipo ? $tipo : '1';
    if(mysql_query("UPDATE u_cobros SET c_type='".$tipo."', c_pais='".$insertidkok."', c_pagostatus='2.5', c_coment='".time()."' WHERE cid='".$facturaid."'")){ // cid='".$queryr['cid']."'
    $n .= 'Update cobros  ';
    //
    mysql_query("UPDATE u_cobros SET c_coment='".time()."' WHERE cid='".$facturaid."'");
    // cuantas facturas hay
    $numerodecpaisenceroquery = mysql_query("SELECT * FROM u_cobros WHERE c_pais='0.1' AND c_type='3' AND c_user_id='".$rowu['buser_id']."' AND c_network='".$babanta->settings['net_id']."'"); 
    $numerodecpaisencero = $numerodecpaisenceroquery->num_rows;
    //
    //if($numerodecpaisencero <= 0){
    // INSERTO UN NUEVO COBRO DEL MES, c_email = ultimo pago que se hizo, c_coment=el dia que se pago, c_pais = id del pago
   // $nuevocobro = mysql_query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip) VALUES('".$rowu['buser_id']."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."')");
    //}
    if($numerodecpaisencero){ $n .= 'Se actualizo   ';
    if($nuevocobro){ $n .= 'Nuevo cobro   ';
    if($numerodecpaisencero == 1){

//// ENVIAR CORREO ////
$para = $rowu['buser_mail'];
$titulo = $babanta->settings['net_name'].' | Confirmación de pago ';
require_once TS_ROOT.'/bbnt_resource/class/mail.class.php';
$tsMail = new tsMail;
$para = array(1 => array('c' => $para, 'n' => '@'.$rowu['buser_nick']));
$de = 2;
$asunto = $titulo;
$body = array(
'top' => 'Hola, esperamos que estes teniendo un buen dia, este correo es solo una confirmaci&oacute;n de pago en tu cuenta de '.$babanta->settings['net_name'].', por favor no responder este correo.',
'center' => 'Se ha enviado el pago de tu factura #'.$queryr['cid'].'',
'bottom' => '',
'link' => array('link' => $babanta->settings['url'].'/inf/factura/?id='.$queryr['cid'], 'name' => 'Ver&nbsp;a&nbsp;Factura'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Se ha enviado el pago de tu factura #'.$queryr['cid'].', esta solo es una confirmaci&oacute;n por favor entrar a babanta.net y revisar mas informaci&oacute;n';
$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);
/// END CORREO /////

$mysqli->query("INSERT INTO u_cobros (c_user_id,c_email,c_pais,c_dinero,c_secret,c_date,c_type,c_autor_ip,c_network) VALUES('".$rowu['buser_id']."','".time()."','0.1','0','".substr(md5(time().'KNWKE_BWRTS_PG15S1W2'.time().'KOKOROKO_1558WE8'), 14)."','".time()."','3','".$ip."','".$babanta->settings['net_id']."')");

    $n .= '<div><b> Factura pagada para @'.$rowu['buser_nick'].'</div><br>'; // '.$o.';'.$nuevocobro->insert_id.'</b>: <u>Generada</u>
    }elseif($numerodecpaisencero >= 2){
    //    $ELEM = $numerodecpaisencero-1;
    //    mysql_query("DELETE FROM u_cobros WHERE c_pais='0.1' AND c_type='3' AND c_user_id='".$rowu['buser_id']."' LIMIT ".$ELEM);
     //   $this->pagar($rowu['buser_id']);
    }
    }else{ $n .= $o.'Error #3'; }
      }else{ $n .= $o.' ERROR - NO COBRO NUEVO INSERT'; }
    }else{ $n .= $o.'Error #2'; } 
     }else{ $n .= $o.' ERROR - NO INSERT ID PAGO ::'.$queryr['cid'].' => '.$rowu['buser_id']; }
    }else{ $n .= $o.'Error #1'; }
    // END FOREACH TODOS USUARIOS
    $o++; }
    return 'Funcion realizada:<br> '.$n;
    }

    /* ESTADISTICAS */

    function build_sorter($clave) {
    return function ($a, $b) use ($clave) {
        return strnatcmp($a[$clave], $b[$clave]);
    };
    }

    function listardias($useras){
        global $babanta, $wuser;
        $listado = $this->impremes($useras, true);
        $data = result_array($listado);
        $numeros = array();
        $total = array();
        $valores = array();
        $meses = array();
        $infouser = mysql_fetch_assoc(mysql_query("SELECT babanta_pagomil, buser_id FROM babanta_usuarios WHERE buser_id=".$useras));

        $i = 0; foreach($data AS $row){
        $aniodia = date('j', $row['v_hace']); 
        $aniomes = date('n', $row['v_hace']);
        $meses[$aniomes] = $meses[$aniomes]+1;
        //
        $total[$aniomes.'.'.$aniodia] = $total[$aniomes.'.'.$aniodia]+1;
        // 
        $paiseste = ($row['vw_pais']) ? $row['vw_pais'] : 'UNDEFINED';
        if($paiseste != 'UNDEFINED'){ $pais[$paiseste] = $pais[$paiseste]+1;
        $paises[$paiseste] = array('code' => $paiseste,'total' => $pais[$paiseste]); }
        //
        $numeros[$aniomes] = array( 
            'fecha' => $aniomes.'-'.date('Y'),  
            'mes' => $aniomes,
            //'visitas' => $row['total'] 
            );
        //
        $valores[$aniomes]['dias'][$aniodia] = array(
            'visitas' => $total[$aniomes][$aniodia],
            'dia' => $aniodia
            );
        $i++; }
        //
        usort($numeros, $this->build_sorter('mes'));
        $ultimo = array_pop($numeros);
        $primero = array_values($numeros)[0];
        for($l=$primero['mes'];$l<date('n')+1;$l++){ 
        if($l>=1){
        if($l == date('n')){
        //
        //$tt = 1; foreach($valores[$l]['dias'] AS $rowee){
            for($tt=1;$tt<date('j')+1;$tt++){
            $diatotale = ($total[$l.'.'.$tt]) ? $total[$l.'.'.$tt] : 0;
            $percent = 0;//$diatotale*20/100;
            $diatotal = $diatotale-$percent;
            $datos[$l.'-'.$tt] = array(
            'fecha' => date('Y').'-'.$l.'-'.$tt, 
            'visitas' => $diatotal, 
            'pago' => $diatotal*$infouser['babanta_pagomil']/1000
            );
             } // foreach por dias
        } // end else
        $mestotale = ($meses[$l]) ? $meses[$l] : 0;
        $percent = 0;//$mestotale*20/100;
        $mestotal = $mestotale-$percent;
        $datos[$l] = array(
            'fecha' => date('Y').'-'.$l, 
            'visitas' => $mestotal, 
            'pago' => $mestotal*$infouser['babanta_pagomil']/1000,
            'oficial' => true
            );
        //
         }
          }
          $arraystatics = '';
          $arraystatics['visitas'] = $datos;
          $arraystatics['pais'] = $paises;
          $estadisticasjson = json_encode($arraystatics);
          mysql_query("UPDATE babanta_usuarios SET partner_statics='".$estadisticasjson."' WHERE buser_id='".$useras."'");
          //die(var_dump($datos));
        return $arraystatics;
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
            $array[$i]['mes'] = $mes;
            $array[$i]['dia'] = $dia;
            $array[$i]['v_hace'] = $row['v_hace'];
            $array[$i]['u_v'] = $row['v_u'];
            $array[$i]['type'] = $row['type'];
            $array[$i]['timestamp'] = $row['v_hace'];
            $array[$i]['title'] = $babanta->setHace($row['v_hace']);
            $array[$i]['date'] = $row['fecha']; 
            $array[$i]['total'] = $row['total'];
        $i++; }

        return $array;
    }

    function getadminfacturas($tipo, $userkk, $mayoracero){
        global $babanta, $location;
        $sl= ($userkk) ? "" : " AND c.c_type='3'";
        $esta = ($tipo) ? " AND c.c_type='".$tipo."'" : $sl;
        $klakl = ($tipo) ? $tipo : 3;
        //
        $max = 10; // MAXIMO A MOSTRAR
        $pagina = $babanta->setSecure($_GET['pnum']);
        if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;}
        $limit = $inicio.','.$max;
        //
        //$and = ($tipo || !$userkk) ? ' AND ' : '';
        $userfrom = ($userkk) ? " AND u.buser_id='".$userkk."'" : '';
        //
        //die($esta.$userfrom.$ta);
        $ta = (!$userkk && !$mayoracero) ? " AND (c.c_dinero>='1' OR c.c_referidos>='1')" : '';
        $nobaned = "AND (u.buser_id NOT IN (SELECT bbb_obj FROM babanta_banned WHERE bbb_obj=u.buser_id AND bbb_type='2' AND bbb_state='1'))";
        $query = mysql_query("SELECT SUM(c_dinero) AS pagototal,c.*, u.* FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id=u.buser_id WHERE c.c_network='".$babanta->settings['net_id']."' $nobaned$esta$userfrom$ta GROUP BY u.buser_id,c.cid LIMIT ".$limit);
        $totalnum = mysql_num_rows(mysql_query("SELECT c.c_user_id, c.c_type, c.cid, u.buser_id FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id=u.buser_id WHERE c.c_network='".$babanta->settings['net_id']."' $nobaned$esta$userfrom$ta GROUP BY u.buser_id,c.cid"));
        //die($nobaned.$esta.$userfrom.$ta);
        $data['array'] = result_array($query);
        //$datakee = mysql_fetch_assoc($query);
        $io = 0; foreach($data['array'] AS $row){
           $isbanned = mysql_num_rows(mysql_query("SELECT * FROM babanta_banned WHERE bbb_obj='$row[buser_id]' AND bbb_type='2' AND bbb_state='1' "));
           $data['array'][$io]['banned'] = $isbanned;
           if($row['c_dinero'] >= 10){ $dinero = $dinero+$row['c_dinero']; }
        $io++; }
        $oktt = $babanta->setSecure($_GET['tipo']);
        $useridd = $babanta->setSecure($_GET['userid']);
        $kakuser = ($useridd) ? '&userid='.$useridd : '';
        $tipo = ($oktt) ? '&tipo='.$oktt.$kakuser : $kakuser; 
        $data['pages'] = $babanta->getpages($totalnum, $max, false, $babanta->settings['partner_url'].'?page=payments'.$tipo, 'pnum', true);;
        $data['total'] = $dinero;
        return $data;
    }
    
    function url_dominio($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
    }

    function limpiar_visitas($userke, $nameis){
        global $babanta, $wuser;
        $userke = ($userke) ? $userke : $_REQUEST['u'];
        $nameiser = ($nameis) ? $wuser->loadUserID($userke) : $userke;
        if($nameis && $wuser->uid == $nameiser || !$nameis && $wuser->admod){
        $extra = ($userke) ? " WHERE vis_con='".$nameiser."' AND type='58'" : " WHERE type='58'";
        $visitas = mysql_query("SELECT id, vis_con, u_v, vw_ref FROM visitas".$extra."");
        $data = result_array($visitas);
        $rk = 0; foreach($data AS $roke){
            $dominio = $this->url_dominio($roke['vw_ref']);
            $fbotw = (strstr($dominio,'facebook.com') || strstr($dominio, 'twitter.com')) ? true : false;
            if($fbotw && $roke['vw_ref']){ // (strpos($dominio,'facebook.com') || strpos($dominio,'m.facebook.com'))
            if(mysql_query("UPDATE visitas SET vw_valida='1', vw_domain='".$dominio."' WHERE id=".$roke['id'])){
                $validas[$rk] = $roke['id'];
            }else{ $validasdoerror[$rk] = $roke['id']; }
            }else{
                //if(mysql_query("UPDATE visitas SET vw_valida='".$dominio."' WHERE id=".$roke['id'])){
                $limpiado[$rk] = $roke['id'];
                //}else{ $limpiadoerror[$rk] = $roke['id']; }
            }
        $rk++; }
        $datos = array(
            //'Invalidas' => count($limpiado),
            //'error_al_limpiar' => count($limpiadoerror),
            'Aviso' => count($validas)
            //'Generado' => '$'.count($validas)/1000*$wuser->info['babanta_pagomil'] ),
            //'error_validos' => count($validasdoerror)
            );
        }else{
            $datos = array(
                'Aviso' => '¿Por que quieres ver las ganancias que no son tuyas? mejor <a href='.$babanta->settings['url'].'/ajax/postix-datos.php?u='.$wuser->nick.'>mira las tuyas</a>'
                );
        }
        return $datos;
    }

/* FINALIZACIÓN DE LA CLASE */
}