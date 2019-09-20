<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'config.php';

if (!isset($_SERVER)) {
    return;
}

require_once 'sevilla/Handler.php';
$input = Handler::getEvent();


switch ($input['type']) {
    case 'confirmation':
        exit(CONFIRMATION_TOKEN);
        break;
    case 'message_new':
        Handler::ok();
        require_once 'sevilla/BotInterface.php';
        $bot = new BotInterface($input['object']);

        switch ($bot->command[0]) {
            case 'севилла':
            case 'ион':
            case '[club173076069|севилла]':
            case '[club173076069|*club173076069]':
            case '[club173076069|*sevilcounter]':
            case '[club173076069|@club173076069]':
            case '[club173076069|@sevilcounter]':
            case '*sevilcounter':
            case '@sevilcounter':
            case '*club173076069':
            case '@club173076069':
            case 'отклонить':
            case 'одобрить':
            case 'пропустить':
                $bot->cmd_type = 'CMD_NOT_FOUND';
                $bot->handlerCommand();
                $bot->perform();
                break;
        }

        require_once 'sevilla/wordfilter.php';
        $wfp = new WordFilterProcessing();
        if ($wfp->isBlacklisted($input['object']['text'])) {
            require_once 'sevilla/BotInterface.php';
            $inf = new BotInterface($input['object']);
            $inf->cmd_type = 11;
            $inf->object_id = $input['object']['from_id'];
            $inf->perform();
        }
        break;
}