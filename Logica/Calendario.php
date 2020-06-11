<?php
    // Librerias===============================================
    // ========================================================
    if(isset($_POST["metodo"])){
        //########################
        $_SESSION['NavBarSelected'] = '"itemHome","img/HomeIconBlue.svg"';
        if($_POST["metodo"]=="imprimirCalendario"){
            //declaracion de variables--------------------------
            //salida--------------------------------------------
            $json[] =   
                [
                    'script'   => generar_calendario($_POST["mes"],$_POST["año"]),
                ];
            $jsonString = json_encode($json);
            echo $jsonString;
        }
        //########################
    }
    function generar_calendario($month,$year,$holidays = null){
        // Declaracion de Variables================================================================
        $months = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
        $headings = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
        $monthBefore = $month-1;
        $yearBefore = $year;
        $monthAfter = $month+1;
        $yearAfter = $year;
        // ========================================================================================
        if($month == 12){
            $yearAfter = $year + 1;
            $monthAfter = 01;
        }
        if($month == 01){
            $yearBefore = $year - 1;
            $monthBefore = 12;
        }
        $calendar.= '<a<tr class="calendar-row">
                        <td class="calendar-button-head" style="font-weight:300;" onclick=imprimirCalendario('.$monthBefore.','.$yearBefore.')>'.$months[$monthBefore-1].'</td>
                        <td class="calendar-name-head" colspan="5">'.$months[$month-1].' de '.$year.'</td>>
                        <td class="calendar-button-head" style="font-weight:300;"  onclick=imprimirCalendario('.$monthAfter.','.$yearAfter.')>'.$months[$monthAfter-1].'</td></tr>';
        $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
        $running_day = date('w',mktime(0,0,0,$month,1,$year));
        $running_day = ($running_day > 0) ? $running_day-1 : $running_day;
        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $dates_array = array();
        $calendar.= '<tr class="calendar-row">';
        for($x = 0; $x < $running_day; $x++){
            $calendar.= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        }
        for($list_day = 1; $list_day <= $days_in_month; $list_day++){
            if($list_day == date("d") && $month == date("m") && $year == date("Y")){
                $calendar.= '<td class="calendar-day calendar-today">';
            }else{
                $calendar.= '<td class="calendar-day">';
            }
            $class="day-number ";
            if($running_day == 0 || $running_day == 6 ){
                $class.=" not-work ";
            }
            $key_month_day = "month_{$month}_day_{$list_day}";
            if($holidays != null && is_array($holidays)){
                $month_key = array_search($key_month_day, $holidays);
                if(is_numeric($month_key)){
                    $class.=" not-work-holiday ";
                }
            }
            //EN LA VARIABLE EVENTS VAN LOS EVENTOS DEL DÍA
            $events = "<div class='event'>Prueba 1</div>";//===============================================================
                $calendar.= "<div class='{$class}'>".$list_day.$events." </div>";
            $calendar.= '</td>';
            if($running_day == 6){
                $calendar.= '</tr>';
                if(($day_counter+1) != $days_in_month){
                    $calendar.= '<tr class="calendar-row">';
                }
                $running_day = -1;
                $days_in_this_week = 0;
            }
            $days_in_this_week++; $running_day++; $day_counter++;
        }
        if($days_in_this_week < 8){
            for($x = 1; $x <= (8 - $days_in_this_week); $x++){
                $calendar.= '<td class="calendar-day-np"> </td>';
            }
        }
        $calendar.= '</tr>';
        $calendar.= '</table>';
        return $calendar;
    }
?>
