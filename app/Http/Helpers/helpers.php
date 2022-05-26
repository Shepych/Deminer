<?php

# Формат даты
if(!function_exists('formatDate')) {
    function formatDate($date){
        $timeOut = strtotime(date('Y-m-d H:i:s')) - strtotime($date);
        $time = "";

        if($timeOut < 60){
            $time = "Только что";
        } elseif($timeOut < 3600){
            $timeOut /= 60;
            $time = (int)$timeOut . " мин. назад";
        } elseif($timeOut >= 3600 and $timeOut < 86400) {
            $timeOut /= 3600;
            $time = (int)$timeOut . " час. назад";
        } elseif ($timeOut >= 86400 and $timeOut < 172800){
            $dateExplode = explode(" ",$date);
            $timeExplode = explode(':',$dateExplode[1]);
            $hours = $timeExplode[0];
            $minutes = $timeExplode[1];
            $time = "Вчера в $hours:$minutes";
        } else {
            $dateExplode = explode(" ",$date);
            $timeExplode = explode(':',$dateExplode[1]);
            $dateExplode = explode('-',$dateExplode[0]);

            $month = $dateExplode[1];
            $year = $dateExplode[0];
            $day = $dateExplode[2];

            $hours = $timeExplode[0];
            $minutes = $timeExplode[1];

            switch ($month){
                case "01":
                    $month = "Янв";
                    break;
                case "02":
                    $month = "Фев";
                    break;
                case "03":
                    $month = "Мар";
                    break;
                case "04":
                    $month = "Апр";
                    break;
                case "05":
                    $month = "Мая";
                    break;
                case "06":
                    $month = "Июн";
                    break;
                case "07":
                    $month = "Июл";
                    break;
                case "08":
                    $month = "Авг";
                    break;
                case "09":
                    $month = "Сент";
                    break;
                case "10":
                    $month = "Окт";
                    break;
                case "11":
                    $month = "Ноя";
                    break;
                case "12":
                    $month = "Дек";
                    break;
            }
            $time = $day . " " . $month . " " . $year . " в " . $hours.":".$minutes;
        }
        return $time;
    }
}

# Генератор пароля
function generatePassword() {
    //Initialize the random password
    $password = '';

    //Initialize a random desired length
    $desired_length = rand(13, 15);

    for($length = 0; $length < $desired_length; $length++) {
        //Append a random ASCII character (including symbols)
        $password .= chr(rand(32, 126));
    }

    return $password;
}

# Генератор логина
function generateLogin($length = 10){
    $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
//function generateLogin() {
//    $login = '';
//
//    //Initialize a random desired length
//    $desired_length = rand(9, 12);
//
//    for($length = 0; $length < $desired_length; $length++) {
//        //Append a random ASCII character (including symbols)
//        $login .= chr(rand(32, 126));
//    }
//
//    return $login;
//}

# IP
function getIp() {
    $value = '';

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $value = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $value = $_SERVER['REMOTE_ADDR'];
    }
    return $value;
}
