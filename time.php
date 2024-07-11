<?php


function get_time()
{
    global $DB, $COURSE, $USER,$PAGE;



    if ($COURSE->id && $USER->id) {
        try {
        if (required_param('id', PARAM_INT) == $COURSE->id) {
            
            $userid = $USER->id;
            $curseid = $COURSE->id;

            $query = $DB->get_records_sql(
                'SELECT timecreated,userid,courseid FROM {logstore_standard_log} WHERE userid = ' . $userid . ' AND courseid = ' . $curseid . ' ORDER BY timecreated;'
            );



            $array = (array) $query;
            $date = new DateTime();
            $secondsold = 0;

            $i = 1;
            $totalseconds = 0;

            foreach ($array as $click) {
                $date->setTimestamp($click->timecreated);
                $seconds = strtotime($date->format('Y-m-d H:i:s'));
                if ($i != 1) {

                    // $diff= $date->diff($secondsold);
                    $diff = $seconds - $secondsold;
                    $hour = floor($diff / 3600);
                    $limit = get_config('block_tmp', 'cliks');
                    if ($hour < $limit) {
                        $totalseconds += $diff;
                    }
                }




                $secondsold = $seconds;

                $i += 1;
            }

            $horas = floor($totalseconds / 3600);
            $minutos = floor(($totalseconds - ($horas * 3600)) / 60);
            $segundos = $totalseconds - ($horas * 3600) - ($minutos * 60);
            $time = $horas . " horas " . $minutos . " minutos " . $segundos . " segundos";

            return $time;
        } 
    }  catch (Exception $e){
        return 'El usuario o el curso es incorrecto';
        }
    }else{
        return "El usuario o el curso es incorrecto";
    }
}
