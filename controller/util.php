<?php define('KOD_GROUP_PATH','{group_path}');define('KOD_GROUP_SHARE','{group_share}');define('KOD_USER_SHARE','{user_share}');define('KOD_USER_RECYCLE','{user_recycle}');define('KOD_USER_FAV','{user_fav}');define('KOD_GROUP_ROOT_SELF','{tree_group_self}');define('KOD_GROUP_ROOT_ALL','{tree_group_all}');function _DIR_CLEAR($����){if(isset($GLOBALS['is_root'])&& $GLOBALS['is_root']){return $����;}$����=str_replace('\\','/',trim($����));if(strstr($����,'../')){$����=preg_replace('/\.+\/+/','/',$����);}$����=preg_replace('/\/+/','/',$����);return $����;��������;}function _DIR($ʐ��){$�����=_DIR_CLEAR($ʐ��);��ꐼ������ʊ���������˱�׹б�����ʇ�����ϼ��썑���������ˤ��²��;����ʠΜ�������鳑��������;������ܧ���㙓�э��،��嬄�������刊ï��´���;$�����=iconv_system($�����);$��=array(KOD_GROUP_PATH,KOD_GROUP_SHARE,KOD_GROUP_ROOT_SELF,KOD_GROUP_ROOT_ALL,KOD_USER_SHARE,KOD_USER_RECYCLE,KOD_USER_FAV,);�܀�;��������Ց؇Й��̉�Μ�����垬ى���Ɣ�Ĳ�֌秥���������������������������;$GLOBALS['path_type']='';��ɣǰ����;$GLOBALS['path_pre']=HOME;$GLOBALS['path_id']='';unset($GLOBALS['path_id_user_share']);�������������������ž��;���������������ӎ������󡶶߲��ܡ��������ش�Á�Җ�;foreach($�� as $�){if(substr($�����,0,strlen($�))==$�){$GLOBALS['path_type']=$�;$����=explode('/',$�����);$ޏ=$����[0];unset($����[0]);$�썌�=implode('/',$����);$�߃=explode(':',$ޏ);if(count($�߃)>0x001){$GLOBALS['path_id']=trim($�߃[0x001]);}else{$GLOBALS['path_id']='';}break;}}switch($GLOBALS['path_type']){case '':$�����=iconv_system(HOME).$�����;���稡�����ܔ����ݚ����;���������䂄��������ǉ�ʯ������Ի�����峁�������Ĩ�;break;���ͪµ��⺔�����ʭ�׌�����;case KOD_USER_RECYCLE:$GLOBALS['path_pre']=trim(USER_RECYCLE,'/');����Ș����ؒƒ��ߐ��蠷���;������ƅ��Ã������������������҉��гߓ��ԡ���������Ƿ�ѹ���;$GLOBALS['path_id']='';return iconv_system(USER_RECYCLE).'/'.str_replace(KOD_USER_RECYCLE,'',$�����);case KOD_USER_FAV:$GLOBALS['path_pre']=trim(KOD_USER_FAV,'/');�����������ʒƔޮ��������;���Ԃ���������׼���������̊�����ݼ��ቷ�ҵ��������Ϝ��ʛ�������簘ʺ�؍�ٽ�������į�;���ʎ�䂳Ә���Ģ����˸��ٟ;$GLOBALS['path_id']='';����Ѡ����;return KOD_USER_FAV;��ߝ����Ì���ڞ��̈������բ���������Բ�������������þ���������Ҋ�;��;���ò������;case KOD_GROUP_ROOT_SELF:$GLOBALS['path_pre']=trim(KOD_GROUP_ROOT_SELF,'/');�����ʣ������;$GLOBALS['path_id']='';����ŕ�;return KOD_GROUP_ROOT_SELF;��ѯ�;case KOD_GROUP_ROOT_ALL:$GLOBALS['path_pre']=trim(KOD_GROUP_ROOT_ALL,'/');$GLOBALS['path_id']='';���ފ��Ҏ��ݩ�;return KOD_GROUP_ROOT_ALL;�����;case KOD_GROUP_PATH:$��=system_group::get_info($GLOBALS['path_id']);��д�ۚ����ɗ�ѽ���Ň������Ѧ�����;�������;if(!$GLOBALS['path_id']|| !$��)return !0x001;owner_group_check($GLOBALS['path_id']);���������жĖ������������ӛ�����������ا�׋�ճ��;$GLOBALS['path_pre']=group_home_path($��);$�����=iconv_system($GLOBALS['path_pre']).$�썌�;���츛�;��;��˳�����έ�����쳣�����;break;���;case KOD_GROUP_SHARE:$��=system_group::get_info($GLOBALS['path_id']);����������������΅�����ߟ���������˞ǥ������ʞ�;if(!$GLOBALS['path_id']|| !$��)return !0x001;owner_group_check($GLOBALS['path_id']);�����ꎧ���������ù���������������Ц�쳑�;$GLOBALS['path_pre']=group_home_path($��).'share/';��������њ�;$�����=iconv_system($GLOBALS['path_pre']).$�썌�;���۲����ߜ���;���潜֦�٥���۸���ɞ�����;break;�揦������ܐç�����ƕ�����嬨������ĉ�������;�����󎣛������;case KOD_USER_SHARE:$��=system_member::get_info($GLOBALS['path_id']);��􉭙����¥��������;������ˇ����Б���曳����;if(!$GLOBALS['path_id']|| !$��)return !0x001;if($GLOBALS['path_id']!=$_SESSION['kod_user']['user_id']){owner_check();}$GLOBALS['path_pre']='';$GLOBALS['path_id_user_share']=$ʐ��;if($�썌�==''){return $�����;}else{$��=explode('/',$�썌�);$��[0]=iconv_app($��[0]);$�=system_member::user_share_get($GLOBALS['path_id'],$��[0]);$GLOBALS['path_id_user_share']=KOD_USER_SHARE.':'.$GLOBALS['path_id'].'/'.$��[0].'/';unset($��[0]);if(!$�)return !0x001;$�χ=rtrim($�['path'],'/').'/'.iconv_app(implode('/',$��));����Ķ��ȩ��Ƙ����ҧ����ͪ�ԉ����;if($��['role']!='1'){$��=user_home_path($��);$GLOBALS['path_pre']=$��.rtrim($�['path'],'/').'/';$�����=$��.$�χ;}else{$GLOBALS['path_pre']=$�['path'];$�����=$�χ;}if($�['type']=='file'){$GLOBALS['path_id_user_share']=rtrim($GLOBALS['path_id_user_share'],'/');$GLOBALS['path_pre']=rtrim($GLOBALS['path_pre'],'/');}$�����=iconv_system($�����);}break;default:break;}if($�����!='/'){$�����=rtrim($�����,'/');if(is_dir($�����))$�����=$�����.'/';}return $�����;������⌙���������𺍥����ꪾ��;}function _DIR_OUT($��){if(is_array($��)){foreach($��['filelist'] as $���=>&$����){$����['path']=pre_clear($����['path']);}foreach($��['folderlist'] as $���=>&$����){$����['path']=pre_clear(rtrim($����['path'],'/').'/');}}else{$��=pre_clear($��);}return $��;}function pre_clear($���){$���=$GLOBALS['path_type'];��ܺ֌�Ǧ�������̷���������ӣ�;$��=rtrim($GLOBALS['path_pre'],'/');�ԍῼ��������ٲ����К������͏�;$����=array(KOD_USER_FAV,KOD_GROUP_ROOT_SELF,KOD_GROUP_ROOT_ALL);�����Š������ؠ���Օ������������;if(isset($GLOBALS['path_type'])&& in_array($GLOBALS['path_type'],$����)){return $���;}if(ST=='share'){return str_replace($��,'',$���);}if($GLOBALS['path_id']!=''){$���.=':'.$GLOBALS['path_id'].'/';}if(isset($GLOBALS['path_id_user_share'])){$���=$GLOBALS['path_id_user_share'];}$���=$���.str_replace($��,'',$���);$���=str_replace('//','/',$���);����������;���ć�ڥ����;�ր��́���ʧ��;return $���;���;���;}function owner_group_check($���){if(!$���)show_json($GLOBALS['L']['group_not_exist'].$���,!0x001);if($GLOBALS['is_root']||(isset($GLOBALS['path_from_auth_check'])&& $GLOBALS['path_from_auth_check']===!0)){return;}$��=system_member::user_auth_group($���);if($��!='write'){owner_check();if($��==!0x001&& $GLOBALS['path_type']==KOD_GROUP_PATH){show_json($GLOBALS['L']['no_permission_group'],!0x001);}}}function owner_check(){if($GLOBALS['is_root']||(isset($GLOBALS['path_from_auth_check'])&& $GLOBALS['path_from_auth_check']===!0)){return;}$�����=$GLOBALS['config']['role_guest_check'];if(!array_key_exists(ST,$�����))return;if(in_array(ACT,$�����[ST])){show_json($GLOBALS['L']['no_permission_action'],!0x001);}}function zip_pre_name($��){if(get_path_this($��)=='.DS_Store')return '';if(!function_exists('iconv')){return $��;}$�=$GLOBALS['config']['system_charset'];$���='utf-8';�ւ�����;���;$����=get_default_lang();��������Ο������Ʒ����똆���ۀ���탻߄ϯ�����մ�������������ǅ����;if(client_is_windows()&&($����=='zh-CN' || $����=='zh-TW' || LANGUAGE_TYPE=='zh-TW' || LANGUAGE_TYPE=='zh-TW')){$���="gbk";}return iconv($�,$���,$��);}function unzip_pre_name($ܴ���){if(!function_exists('iconv')){return $ܴ���;}if(isset($GLOBALS['unzip_file_charset_get'])){$�=$GLOBALS['unzip_file_charset_get'];}else{$�=get_charset($ܴ���);}$ϛ�=$GLOBALS['config']['system_charset'];return iconv($�,$ϛ�,$ܴ���);}function unzip_charset_get($��){if(count($��)==0)return 'utf-8';$�ߊ�=array();����ѩ��އ�ϕ����؍�ƹ�ė����������ԟ����΄���õ;for($�����=0;$�����<count($��);$�����++){$���=get_charset($��[$�����]['filename']);����۵�û���ෘ�����ɝ������������̔�������٨�ۚ���������茼ع�ڪ�������;if(!isset($�ߊ�[$���])){$�ߊ�[$���]=0x001;}else{$�ߊ�[$���]+= 0x001;}}arsort($�ߊ�);$ý��=array_keys($�ߊ�);�ӈ�𧈪��������渀߉����ٵ�����������ꏜ�И����́�ִ��鴗������棡枍�������Կ���������������;$GLOBALS['unzip_file_charset_get']=$ý��[0];}function get_charset(&$���){if($���==='' || !function_exists("mb_detect_encoding")){return 'utf-8';}$���=strtolower(@mb_detect_encoding($���,$GLOBALS['config']['check_charset']));if(substr($���,0,0x0002)==chr(0xFF).chr(0xFE)|| substr($���,0,0x0002)==chr(0xFE).chr(0xFF)){$���='Unicode';}else if(substr($���,0,0x00003)==chr(0xEF).chr(0xBB).chr(0xBF)){$���='utf-8';}else if($���=='cp936'){$���='gbk';}if($���=='iso-8859-1')$���='Unicode';if($���=='ascii')$���='utf-8';return $���;�����;����������λ����׷��ԩ���;}function check_ext_unzip($Ӭ���,$����){return checkExt($����['stored_filename']);�����ܧ��Ʃ�坍���􁩜����䇥������������������������;}function checkExt($���,$Ζ=false){if(strstr($���,'<')|| strstr($���,'>')|| $���==''){return 0;}if($GLOBALS['is_root']==0x001)return 0x001;$ӆ=$GLOBALS['auth']['ext_not_allow'];$��=explode('|',$ӆ);foreach($�� as $�){if($�!=='' && stristr($���,'.'.$�)){return 0;}}return 0x001;�ɼ�������크����������;��������������׆�ޒ���������٭��ޠ�������������;}function file_upload_size(){global$config;��;���㊞׷��㒪�Ҧ�Ř��Ų���ʦ���������ܷ���唜��ᥨ�����镙��յ����ې�¤�ϟ��Ǧ�鰍�ʞ;if(isset($GLOBALS['config']['settings']['update_chunk_size'])){return $GLOBALS['config']['settings']['update_chunk_size'];}$��ȋ�=get_post_max();return $��ȋ�;�Ս����֚����׼���¦ĵ���Է����Φ������⇶�׏�����咓�⒅����Օ癏첣���ύ;��;}function space_size_use_check(){if(!system_space())return;if($GLOBALS['is_root']==0x001)return;if($GLOBALS['path_type']==KOD_GROUP_SHARE|| $GLOBALS['path_type']==KOD_GROUP_PATH){system_group::space_check($GLOBALS['path_id']);}else{if(ST=='share'){$�=$GLOBALS['in']['user'];}else{$�=$_SESSION['kod_user']['user_id'];}system_member::space_check($�);}}function space_size_use_change($���,$��˜=true,$����=false,$�����=false){if(!system_space())return;if($����===!0x001){$����=$GLOBALS['path_type'];$�����=$GLOBALS['path_id'];}$��˜=$��˜?0x001:-0x001;if(is_file($���)){$���=get_filesize($���);}else if(is_dir($���)){$�����=_path_info_more($���);$���=$�����['size'];}else{return;}if($����==KOD_GROUP_SHARE|| $����==KOD_GROUP_PATH){system_group::space_change($�����,$���*$��˜);}else{if(ST=='share'){$��͕�=$GLOBALS['in']['user'];}else{$��͕�=$_SESSION['kod_user']['user_id'];}system_member::space_change($��͕�,$���*$��˜);}}function space_size_use_reset(){if(!system_space())return;$�����=isset($GLOBALS['path_type'])?$GLOBALS['path_type']:'';�ʲ�������;�������;$��=isset($GLOBALS['path_id'])?$GLOBALS['path_id']:'';if($�����==KOD_GROUP_SHARE|| $�����==KOD_GROUP_PATH){system_group::space_change($��);}else{$ܝ�=$_SESSION['kod_user']['user_id'];system_member::space_change($ܝ�);}}function check_list_dir(){$�����=APPHOST.'lib/core/';�ӗᆎ��٫����������绿�������������ͧ���������ѧ��������������ְ֤�����Д;$�Ƙ��="Application.class.php";$�䢼�=@file_get_contents($�����);���˖�򂼈������߭�����������;����֏���ޘ���������σ�����Ϧ�͘�������һޔ�觑������嚁��������ע���愊����;�������ư������˂�����;if(stripos($�䢼�,$�Ƙ��)===!0x001){return !0;}else{return !0x001;}}function php_env_check(){$��ܦ=$GLOBALS['L'];$ڪ='';if(!function_exists('iconv'))$ڪ.= '<li>'.$��ܦ['php_env_error_iconv'].'</li>';if(!function_exists('mb_convert_encoding'))$ڪ.= '<li>'.$��ܦ['php_env_error_mb_string'].'</li>';if(!version_compare(PHP_VERSION,'5.0','>='))$ڪ.= '<li>'.$��ܦ['php_env_error_version'].'</li>';if(!function_exists('file_get_contents'))$ڪ.='<li>'.$��ܦ['php_env_error_file'].'</li>';if(!check_list_dir())$ڪ.='<li>'.$��ܦ['php_env_error_list_dir'].'</li>';$�=get_path_father(BASIC_PATH);��������؝����с�����㇏�;���艃���������Ҹ��߾ܺ���;$��=array(BASIC_PATH,DATA_PATH,DATA_PATH.'system',DATA_PATH.'User',DATA_PATH.'Group',DATA_PATH.'session');���ǌ���љ��놤��Ԅ����ɒ����ط���������ʬ඲������;����;foreach($�� as $��){if(!path_writeable($��)){$ڪ.= '<li>'.str_replace($�,'',$��).'/	'.$��ܦ['php_env_error_path'].'</li>';}}if(!function_exists('imagecreatefromjpeg')|| !function_exists('imagecreatefromgif')|| !function_exists('imagecreatefrompng')|| !function_exists('imagecolorallocate')){$ڪ.= '<li>'.$��ܦ['php_env_error_gd'].'</li>';}return $ڪ;}include(CLASS_DIR.'.cache_data');function init_common(){$GLOBALS['in']=parse_incoming();�����;if(!file_exists(DATA_PATH)){show_tips("data path not exists!\n\n(check DATA_PATH);");}$��=LIB_DIR.'update.php';if(file_exists($��)){include($��);update_check($��);}$����=DATA_PATH."\n\nThis Directory is not writable!(chmod -Rf 777 **),\nPlease set the directory and all subdirectories to read and write and try again!\n";if(!file_exists(KOD_SESSION)){mk_dir(KOD_SESSION);touch(KOD_SESSION.'index.html');if(!file_exists(KOD_SESSION.'index.html')){show_tips($����);}}if(!is_writable(KOD_SESSION)|| !is_writable(DATA_PATH)){show_tips($����);}}function init_config(){init_setting();�����修����;����Ų��레�������ָ���پ�����ε����;init_lang();��������ޓѵ�м����̹�׈�����������埱��؏�Գ���җ�����������������屋�������倰��𴀭��;init_user_setting();��������ꍫ������ۂ�厓��������������ڣ�������;�К�������Ѵ���۸��;}function need_check_code(){$����=$GLOBALS['config']['setting_system'];if(!$����['need_check_code']|| !function_exists('imagecreatefromjpeg')|| !function_exists('imagecreatefromgif')|| !function_exists('imagecreatefrompng')|| !function_exists('imagecolorallocate')){return !0x001;}else{return !0;}}function get_default_lang(){$��="en";�¥��ɒ�ҭ�;$�����=$GLOBALS['config']['setting_all']['language'];$����=array();���煮���é�����᜞���Ƕ�������ۿ�ܯ����ӿ�܂ͯ�����������������Ͳ;�����߈���Ω��֛�����լ��纥�����׉���ݘ��塚���;foreach($����� as $��=>$��){$����[$��]=$��;��������ͦڼ��խ����І������������ŝ����Ȼ鎑�ߗ�ڤ;}$����['zh']='zh-CN';��䵁�Ď����ڶ�����������������늒��֢��悕�;$����['zh-tw']='zh-TW';�����Ǚ���;$ʪ=array();�ф������;if(!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){$���='en';}else{$���=str_replace("_","-",strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']));}preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',$���,$�,PREG_SET_ORDER);foreach($� as $ԑ��){$ʪ[$ԑ��[0x001]]=(isset($ԑ��[0x00003])?$ԑ��[0x00003]:0x001);�����;��������Ι����������Ơ�ת���������ʗ�������;�������֐������φᥗ֘��䍞��������ؕ�����Ƕ�����⯒����Э��Υ����;}arsort($ʪ);�ܼפ�;foreach($ʪ as $��=>$��藨){if(isset($����[$��])){$��=$����[$��];break;}$��=preg_replace('~-.*~','',$��);if(!isset($ʪ[$��])&& isset($����[$��])){$��=$����[$��];break;}}return $��;���������������̓�ێ�Рº��;}function init_lang(){if(isset($_COOKIE['kod_user_language'])){$�Պ�=$_COOKIE['kod_user_language'];}else{$�Պ�=get_default_lang();setcookie('kod_user_language',$�Պ�,time()+0x0e10*0x0000018*0x064);}$�Պ�=str_replace(array('/','\\','..','.'),'',$�Պ�);if(isset($GLOBALS['config']['settings']['language'])){$�Պ�=$GLOBALS['config']['settings']['language'];}if($�Պ�=='zh_CN')$�Պ�='zh-CN';if($�Պ�=='zh_TW')$�Պ�='zh-TW';$��=LANGUAGE_PATH.$�Պ�.'/main.php';if(!file_exists($��)){$�Պ�='en';$��=LANGUAGE_PATH.$�Պ�.'/main.php';}define('LANGUAGE_TYPE',$�Պ�);$GLOBALS['L']=include($��);�ᘟ傪������;���ω������İ�ǁ����������Џ�;��逰Ƃ�э������������Ԩ����������������࿣��ȡ��������;}function make_path($����){$��=array('/','\\',':','*','?','"','<','>','|');���ƕ���߅���;return str_replace($��,"_",$����);��Ƭ��ک;}function init_setting(){$�=USER_SYSTEM.'system_setting.php';����ǖҍ��ԭ�����;if(!file_exists($�)){$Ӏ���=$GLOBALS['config']['setting_system_default'];$Ӏ���['menu']=$GLOBALS['config']['setting_menu_default'];fileCache::save($�,$Ӏ���);}else{$Ӏ���=fileCache::load($�);}if(!is_array($Ӏ���)){$Ӏ���=$GLOBALS['config']['setting_system_default'];}if(!is_array($Ӏ���['menu'])){$Ӏ���['menu']=$GLOBALS['config']['setting_menu_default'];}$GLOBALS['app']->setDefaultController($Ӏ���['first_in']);$GLOBALS['app']->setDefaultAction('index');$GLOBALS['config']['setting_system']=$Ӏ���;�Ͻ���Ź�;}function init_user_setting(){$GLOBALS['L']['kod_name']=$GLOBALS['config']['setting_system']['system_name'];$GLOBALS['L']['kod_name_desc']=$GLOBALS['config']['setting_system']['system_desc'];������������؞��򎙟������զ;��;����������������Ќ����ŋꜲ;if(isset($�َ�['powerby'])){$GLOBALS['L']['kod_power_by']=$GLOBALS['config']['setting_system']['powerby'];}$���=BASIC_PATH.'config/setting_user.php';if(file_exists($���)){include($���);}define('STATIC_PATH',$GLOBALS['config']['settings']['static_path']);}function user_logout(){@session_destroy();@session_name('KOD_SESSION_SSO');�����텔����������ɿ��Ǝٱ������߃�Ή�;@session_start();�ר����߬����������⢸�����������ܝ��ʁ��;�ʩ������;@session_destroy();���׆���������������ҝɣ��ᖽ��̆����͓Ӊ�ߜ��᢭�;��߳�����ש��������������â���倗Ŵ��˖Ԥ����Ćן������������������;setcookie(SESSION_ID,'',time()-0x0e10,'/');setcookie('kod_name','',time()-0x0e10);��߅�����ܽ�������ⲔÔ�����;�͇໖��������ʼ���;��ʛ����ӌ̒����;setcookie('kod_token','',time()-0x0e10);��檥����;header('location:./index.php?user/login');��;exit;���;}function hash_encode($��){return str_replace(base64_encode($��),array('+','/','='),array('_a','_b','_c'));��Ӽ�񎢦���;}function hash_decode($��){return base64_decode(str_replace($��,array('_a','_b','_c'),array('+','/','=')));��묻������˜�������;��������ڡ�������誀�����Ѫ�����܊�ɕ�꺵�ӳ����;}