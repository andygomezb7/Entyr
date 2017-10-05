<?php 
    function impremes($useras, $estadisticas){
    	global $babanta, $wuser, $mysqli;
        $useraskeke = ($useras) ? " AND vis_con='$useras'" : "";
        //
        $datesqlpago = $this->datesql($useras);
        $primer = $datesqlpago['primer'];
        $hoy = $datesqlpago['hoy'];
        $num = $datesqlpago['num'];
        $date = $datesqlpago['date'];
        //
        if(!$estadisticas){
        $queryimpresiones = mysql_query("SELECT *, COUNT(id) AS total FROM (SELECT id,id_v, type, vis_con, v_hace, vw_valida, u_v, vw_pais FROM visitas WHERE type='58'".$useraskeke."".($num>=1 && $primer && $date ? " AND v_hace >= $primer" : "")." AND vw_valida='1' GROUP BY u_v, id_v) as dat GROUP BY id_v");
       }else{
        $queryimpresiones = mysql_query(" SELECT id, type, vis_con, v_hace, vw_valida, u_v, vw_pais FROM visitas WHERE type='58'".$useraskeke."".($num>=1 && $primer && $date ? " AND v_hace >= $primer" : "")." AND vw_valida='1' GROUP BY u_v");
       }
       if(mysql_error()){
        die(mysql_error());
       }
        // NUEVO
        // SELECT *, COUNT(id) AS total FROM (SELECT id,id_v, type, vis_con, v_hace, vw_valida, u_v, vw_pais FROM visitas WHERE type='58'".$useraskeke."".($num>=1 && $primer && $date ? " AND v_hace >= $primer" : "")." AND vw_valida='1' GROUP BY u_v, id_v) as dat GROUP BY id_v
        // ANTES
        // SELECT id, COUNT(id) AS total,id_v, type, vis_con, v_hace, vw_valida, u_v, vw_pais FROM visitas WHERE type='58'".$useraskeke."".($num>=1 && $primer && $date ? " AND v_hace >= $primer" : "")." AND vw_valida='1' GROUP BY id_v
        return $queryimpresiones;
    }

?>