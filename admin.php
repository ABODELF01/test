

#Start Variables
$ids = $message->from->id;
$chuser = "@porn691"; # <<<== معرف قناتك #
️$chname = "+18"; # <<<== اسم قناتك #
$ary = array(1833652878); # <<<== ايديك + ايديات الادمنية  #
$admins = in_array($ids,$ary);
$chcut = explode("@",$chuser);
$chlink = $chcut[1];
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-1;
$mode = file_get_contents("stats/bc.txt");
$name = $message->from->first_name;
$urlget = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chuser&user_id=".$ids));
$joinch = $urlget->result->status;
#Start code Subscription

if ($joinch == 'left') {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا عزيزي `( $name )` 🚫 !

⚠️ انت لم تشترك بلقناة ( $chuser ) !
♥️ اشترك اولا ثم ارسل `[ /start ]` '
📻 حتى تتمكن من استخدام البوت بشكل صحيح  !
-",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>"️$chname", 'url'=>"t.me/$chlink"]]    
    ]    
    ])
  ]);
  die('error_log');}
#Start code admins

if ($update && !in_array($chat_id, $cut)) {
    mkdir('stats');
    file_put_contents("stats/users.txt", $chat_id."\n",FILE_APPEND);
  }

    if(preg_match("/(stats)/",$text) && $admins) {
        bot('sendMessage',[
            'chat_id'=>$chat_id,
          'text'=>"
اهلا بك عزيزي *( المطور )* 📻 !
    
اليك كل احصائيات البوت ⚠️
يمكنك استخدام اعدادات بوتك بشكل كامل 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'العدد 👥 ','callback_data'=>'users'],['text'=>'ارسال للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
            ]);
    }
    if($data == 'homestats'){
    bot('editMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>"
اهلا بك عزيزي *( المطور )* 📻 !
        
اليك كل احصائيات البوت ⚠️
يمكنك استخدام اعدادات بوتك بشكل كامل 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'العدد 👥 ','callback_data'=>'users'],['text'=>'ارسال للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
    ]);
    file_put_contents('stats/bc.txt', 'no');
    }
    
    if($data == "users"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
⚠️ البوت فعال  ☑️ !
عدد المشتركين (  [ $users ] ) !
-",
            'show_alert'=>true,
    ]);
    }
    
    if($data == "set"){ 
        file_put_contents("stats/bc.txt","yas");
        bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
ارسل النص الان 📩 !
ليتم ارسالة الى ( $users ) مشتركاً 👥
ارسل *النص فقط ! * 📄
-
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' الغاء 🚫. ','callback_data'=>'homestats']]    
            ]
        ])
        ]);
    }
    if($text and $mode == "yas"){
        bot('sendMessage',[
              'chat_id'=>$chat_id,
              'text'=>"
تم ارسال رسالتك بنجاح ❕
وسيتم التوصيل الى ( $users ) 👥 !
-",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
    ]);
    for ($i=0; $i < count($cut); $i++) { 
     bot('sendMessage',[
    'chat_id'=>$cut[$i],
    'text'=>"$text",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    ]);
    file_put_contents("stats/bc.txt","no");
    } 
    }
    date_default_timezone_set("Asia/Baghdad");
    $getMe = bot('getMe')->result;
    $date = $message->date;
    $gettime = time();
    $sppedtime = $gettime - $date;
    $time = date('h:i');
    $date = date('y/m/d');
    $userbot = "{$getMe->username}";
    $userb = strtoupper($userbot);
    if($data == "stats"){ 
    if ($sppedtime == 3  or $sppedtime < 3) {
    $f = "ممتازة 👏🏻";
    }
    if ($sppedtime == 9 or $sppedtime > 9 ) {
    $f = "لا بأس 👍🏻";
    }
    if ($sppedtime == 10 or $sppedtime > 10) {
    $f = " سئ جدا 👎🏻";
    }
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text' =>"
معلومات البوت 🔋:- 

📄معرف البوت :- @$userb
📈 حالة البوت :- ( $f ) 
⏰ الوقت الان : ( 20$date | $time ) 
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
       ]);
    }
