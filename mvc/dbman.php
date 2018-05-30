<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.6.2
*/error_reporting(6135);$Jb=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Jb||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$W){$Ne=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);if($Ne)$$W=$Ne;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){$xc=substr($u,-1);return
str_replace($xc.$xc,$xc,substr($u,1,-1));}function
escape_string($W){return
substr(q($W),1,-1);}function
number($W){return
preg_replace('~[^0-9]+~','',$W);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($wd,$Jb=false){if(get_magic_quotes_gpc()){while(list($y,$W)=each($wd)){foreach($W
as$rc=>$V){unset($wd[$y][$rc]);if(is_array($V)){$wd[$y][stripslashes($rc)]=$V;$wd[]=&$wd[$y][stripslashes($rc)];}else$wd[$y][stripslashes($rc)]=($Jb?$V:stripslashes($V));}}}}function
bracket_escape($u,$ua=false){static$De=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($ua?array_flip($De):$De));}function
min_version($Ve,$Fc="",$g=null){global$f;if(!$g)$g=$f;$Ud=$g->server_info;if($Fc&&preg_match('~([\d.]+)-MariaDB~',$Ud,$B)){$Ud=$B[1];$Ve=$Fc;}return(version_compare($Ud,$Ve)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($ae,$Ce="\n"){return"<script".nonce().">$ae</script>$Ce";}function
script_src($Se){return"<script src='".h($Se)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($R){return
str_replace("\0","&#0;",htmlspecialchars($R,ENT_QUOTES,'utf-8'));}function
nbsp($R){return(trim($R)!=""?h($R):"&nbsp;");}function
nl_br($R){return
str_replace("\n","<br>",$R);}function
checkbox($E,$X,$Fa,$uc="",$Zc="",$Ia="",$vc=""){$L="<input type='checkbox' name='$E' value='".h($X)."'".($Fa?" checked":"").($vc?" aria-labelledby='$vc'":"").">".($Zc?script("qsl('input').onclick = function () { $Zc };",""):"");return($uc!=""||$Ia?"<label".($Ia?" class='$Ia'":"").">$L".h($uc)."</label>":$L);}function
optionlist($F,$Pd=null,$Te=false){$L="";foreach($F
as$rc=>$V){$dd=array($rc=>$V);if(is_array($V)){$L.='<optgroup label="'.h($rc).'">';$dd=$V;}foreach($dd
as$y=>$W)$L.='<option'.($Te||is_string($y)?' value="'.h($y).'"':'').(($Te||is_string($y)?(string)$y:$W)===$Pd?' selected':'').'>'.h($W);if(is_array($V))$L.='</optgroup>';}return$L;}function
html_select($E,$F,$X="",$Yc=true,$vc=""){if($Yc)return"<select name='".h($E)."'".($vc?" aria-labelledby='$vc'":"").">".optionlist($F,$X)."</select>".(is_string($Yc)?script("qsl('select').onchange = function () { $Yc };",""):"");$L="";foreach($F
as$y=>$W)$L.="<label><input type='radio' name='".h($E)."' value='".h($y)."'".($y==$X?" checked":"").">".h($W)."</label>";return$L;}function
select_input($c,$F,$X="",$Yc="",$od=""){$qe=($F?"select":"input");return"<$qe$c".($F?"><option value=''>$od".optionlist($F,$X,true)."</select>":" size='10' value='".h($X)."' placeholder='$od'>").($Yc?script("qsl('$qe').onchange = $Yc;",""):"");}function
confirm($C="",$Qd="qsl('input')"){return
script("$Qd.onclick = function () { return confirm('".($C?js_escape($C):'Are you sure?')."'); };","");}function
print_fieldset($t,$zc,$Ye=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$zc</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Ye?"":" class='hidden'").">\n";}function
bold($Aa,$Ia=""){return($Aa?" class='active $Ia'":($Ia?" class='$Ia'":""));}function
odd($L=' class="odd"'){static$s=0;if(!$L)$s=-1;return($s++%2?$L:'');}function
js_escape($R){return
addcslashes($R,"\r\n'\\/");}function
json_row($y,$W=null){static$Kb=true;if($Kb)echo"{";if($y!=""){echo($Kb?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($W!==null?'"'.addcslashes($W,"\r\n\"\\/").'"':'null');$Kb=false;}else{echo"\n}\n";$Kb=true;}}function
ini_bool($lc){$W=ini_get($lc);return(preg_match('~^(on|true|yes)$~i',$W)||(int)$W);}function
sid(){static$L;if($L===null)$L=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$L;}function
set_password($Y,$P,$U,$I){$_SESSION["pwds"][$Y][$P][$U]=($_COOKIE["adminer_key"]&&is_string($I)?array(encrypt_string($I,$_COOKIE["adminer_key"])):$I);}function
get_password(){$L=get_session("pwds");if(is_array($L))$L=($_COOKIE["adminer_key"]?decrypt_string($L[0],$_COOKIE["adminer_key"]):false);return$L;}function
q($R){global$f;return$f->quote($R);}function
get_vals($J,$d=0){global$f;$L=array();$K=$f->query($J);if(is_object($K)){while($M=$K->fetch_row())$L[]=$M[$d];}return$L;}function
get_key_vals($J,$g=null,$we=0,$Xd=true){global$f;if(!is_object($g))$g=$f;$L=array();$g->timeout=$we;$K=$g->query($J);$g->timeout=0;if(is_object($K)){while($M=$K->fetch_row()){if($Xd)$L[$M[0]]=$M[1];else$L[]=$M[0];}}return$L;}function
get_rows($J,$g=null,$k="<p class='error'>"){global$f;$Sa=(is_object($g)?$g:$f);$L=array();$K=$Sa->query($J);if(is_object($K)){while($M=$K->fetch_assoc())$L[]=$M;}elseif(!$K&&!is_object($g)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$L;}function
unique_array($M,$v){foreach($v
as$jc){if(preg_match("~PRIMARY|UNIQUE~",$jc["type"])){$L=array();foreach($jc["columns"]as$y){if(!isset($M[$y]))continue
2;$L[$y]=$M[$y];}return$L;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$m=array()){global$f,$x;$L=array();foreach((array)$Z["where"]as$y=>$W){$y=bracket_escape($y,1);$d=escape_key($y);$L[]=$d.($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$W)?" LIKE ".q(addcslashes($W,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$W)):" = ".unconvert_field($m[$y],q($W))));if($x=="sql"&&preg_match('~char|text~',$m[$y]["type"])&&preg_match("~[^ -@]~",$W))$L[]="$d = ".q($W)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$y)$L[]=escape_key($y)." IS NULL";return
implode(" AND ",$L);}function
where_check($W,$m=array()){parse_str($W,$Ea);remove_slashes(array(&$Ea));return
where($Ea,$m);}function
where_link($s,$d,$X,$bd="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($X!==null?$bd:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($X);}function
convert_fields($e,$m,$O=array()){$L="";foreach($e
as$y=>$W){if($O&&!in_array(idf_escape($y),$O))continue;$oa=convert_field($m[$y]);if($oa)$L.=", $oa AS ".idf_escape($y);}return$L;}function
cookie($E,$X,$Bc=2592000){global$aa;return
header("Set-Cookie: $E=".urlencode($X).($Bc?"; expires=".gmdate("D, d M Y H:i:s",time()+$Bc)." GMT":"")."; path=".preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$W){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$W;}function
auth_url($Y,$P,$U,$h=null){global$mb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($mb))."|username|".($h!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Y!="server"||$P!=""?urlencode($Y)."=".urlencode($P)."&":"")."username=".urlencode($U).($h!=""?"&db=".urlencode($h):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$C=null){if($C!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$C;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($J,$A,$C,$Dd=true,$Bb=true,$Eb=false,$ve=""){global$f,$k,$b;if($Bb){$ee=microtime(true);$Eb=!$f->query($J);$ve=format_time($ee);}$ce="";if($J)$ce=$b->messageQuery($J,$ve,$Eb);if($Eb){$k=error().$ce.script("messagesPrint();");return
false;}if($Dd)redirect($A,$C.$ce);return
true;}function
queries($J){global$f;static$zd=array();static$ee;if(!$ee)$ee=microtime(true);if($J===null)return
array(implode("\n",$zd),format_time($ee));$zd[]=(preg_match('~;$~',$J)?"DELIMITER ;;\n$J;\nDELIMITER ":$J).";";return$f->query($J);}function
apply_queries($J,$pe,$zb='table'){foreach($pe
as$S){if(!queries("$J ".$zb($S)))return
false;}return
true;}function
queries_redirect($A,$C,$Dd){list($zd,$ve)=queries(null);return
query_redirect($zd,$A,$C,$Dd,false,!$Dd,$ve);}function
format_time($ee){return
sprintf('%.3f s',max(0,microtime(true)-$ee));}function
remove_from_uri($jd=""){return
substr(preg_replace("~(?<=[?&])($jd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($H,$ab){return" ".($H==$ab?$H+1:'<a href="'.h(remove_from_uri("page").($H?"&page=$H".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($H+1)."</a>");}function
get_file($y,$eb=false){$Hb=$_FILES[$y];if(!$Hb)return
null;foreach($Hb
as$y=>$W)$Hb[$y]=(array)$W;$L='';foreach($Hb["error"]as$y=>$k){if($k)return$k;$E=$Hb["name"][$y];$Ae=$Hb["tmp_name"][$y];$Ta=file_get_contents($eb&&preg_match('~\\.gz$~',$E)?"compress.zlib://$Ae":$Ae);if($eb){$ee=substr($Ta,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$ee,$Ed))$Ta=iconv("utf-16","utf-8",$Ta);elseif($ee=="\xEF\xBB\xBF")$Ta=substr($Ta,3);$L.=$Ta."\n\n";}else$L.=$Ta;}return$L;}function
upload_error($k){$Jc=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Unable to upload a file.'.($Jc?" ".sprintf('Maximum allowed file size is %sB.',$Jc):""):'File does not exist.');}function
repeat_pattern($md,$_c){return
str_repeat("$md{0,65535}",$_c/65535)."$md{0,".($_c%65535)."}";}function
is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$W));}function
shorten_utf8($R,$_c=80,$ke=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$_c).")($)?)u",$R,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$_c).")($)?)",$R,$B);return
h($B[1]).$ke.(isset($B[2])?"":"<i>...</i>");}function
format_number($W){return
strtr(number_format($W,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}function
hidden_fields($wd,$ic=array()){$L=false;while(list($y,$W)=each($wd)){if(!in_array($y,$ic)){if(is_array($W)){foreach($W
as$rc=>$V)$wd[$y."[$rc]"]=$V;}else{$L=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($W).'">';}}}return$L;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($S,$Fb=false){$L=table_status($S,$Fb);return($L?$L:array("Name"=>$S));}function
column_foreign_keys($S){global$b;$L=array();foreach($b->foreignKeys($S)as$Pb){foreach($Pb["source"]as$W)$L[$W][]=$Pb;}return$L;}function
enum_input($Ge,$c,$l,$X,$vb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Gc);$L=($vb!==null?"<label><input type='$Ge'$c value='$vb'".((is_array($X)?in_array($vb,$X):$X===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Gc[1]as$s=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?$X==$s+1:(is_array($X)?in_array($s+1,$X):$X===$W));$L.=" <label><input type='$Ge'$c value='".($s+1)."'".($Fa?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$L;}function
input($l,$X,$q){global$Ie,$b,$x;$E=h(bracket_escape($l["field"]));echo"<td class='function'>";if(is_array($X)&&!$q){$na=array($X);if(version_compare(PHP_VERSION,5.4)>=0)$na[]=JSON_PRETTY_PRINT;$X=call_user_func_array('json_encode',$na);$q="json";}$Hd=($x=="mssql"&&$l["auto_increment"]);if($Hd&&!$_POST["save"])$q=null;$Tb=(isset($_GET["select"])||$Hd?array("orig"=>'original'):array())+$b->editFunctions($l);$c=" name='fields[$E]'";if($l["type"]=="enum")echo
nbsp($Tb[""])."<td>".$b->editInput($_GET["edit"],$l,$c,$X);else{$Zb=(in_array($q,$Tb)||isset($Tb[$q]));echo(count($Tb)>1?"<select name='function[$E]'>".optionlist($Tb,$q===null||$Zb?$q:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):nbsp(reset($Tb))).'<td>';$nc=$b->editInput($_GET["edit"],$l,$c,$X);if($nc!="")echo$nc;elseif(preg_match('~bool~',$l["type"]))echo"<input type='hidden'$c value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?" checked='checked'":"")."$c value='1'>";elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Gc);foreach($Gc[1]as$s=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?($X>>$s)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$E][$s]' value='".(1<<$s)."'".($Fa?' checked':'').">".h($b->editVal($W,$l)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$E'>";elseif(($se=preg_match('~text|lob~',$l["type"]))||preg_match("~\n~",$X)){if($se&&$x!="sqlite")$c.=" cols='50' rows='12'";else{$N=min(12,substr_count($X,"\n")+1);$c.=" cols='30' rows='$N'".($N==1?" style='height: 1.2em;'":"");}echo"<textarea$c>".h($X).'</textarea>';}elseif($q=="json"||preg_match('~^jsonb?$~',$l["type"]))echo"<textarea$c cols='50' rows='12' class='jush-js'>".h($X).'</textarea>';else{$Lc=(!preg_match('~int~',$l["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$l["length"],$B)?((preg_match("~binary~",$l["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$l["unsigned"]?1:0)):($Ie[$l["type"]]?$Ie[$l["type"]]+($l["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$l["type"]))$Lc+=7;echo"<input".((!$Zb||$q==="")&&preg_match('~(?<!o)int(?!er)~',$l["type"])&&!preg_match('~\[\]~',$l["full_type"])?" type='number'":"")." value='".h($X)."'".($Lc?" data-maxlength='$Lc'":"").(preg_match('~char|binary~',$l["type"])&&$Lc>20?" size='40'":"")."$c>";}echo$b->editHint($_GET["edit"],$l,$X);$Kb=0;foreach($Tb
as$y=>$W){if($y===""||!$W)break;$Kb++;}if($Kb)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Kb), oninput: function () { this.onchange(); }});");}}function
process_input($l){global$b,$i;$u=bracket_escape($l["field"]);$q=$_POST["function"][$u];$X=$_POST["fields"][$u];if($l["type"]=="enum"){if($X==-1)return
false;if($X=="")return"NULL";return+$X;}if($l["auto_increment"]&&$X=="")return
null;if($q=="orig")return($l["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($l["field"]):false);if($q=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$X);if($q=="json"){$q="";$X=json_decode($X,true);if(!is_array($X))return
false;return$X;}if(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads")){$Hb=get_file("fields-$u");if(!is_string($Hb))return
false;return$i->quoteBinary($Hb);}return$b->processInput($l,$X,$q);}function
fields_from_edit(){global$i;$L=array();foreach((array)$_POST["field_keys"]as$y=>$W){if($W!=""){$W=bracket_escape($W);$_POST["function"][$W]=$_POST["field_funs"][$y];$_POST["fields"][$W]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$W){$E=bracket_escape($y,1);$L[$E]=array("field"=>$E,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$i->primary),);}return$L;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$Sd="<ul>\n";foreach(table_status('',true)as$S=>$T){$E=$b->tableName($T);if(isset($T["Engine"])&&$E!=""&&(!$_POST["tables"]||in_array($S,$_POST["tables"]))){$K=$f->query("SELECT".limit("1 FROM ".table($S)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($S),array())),1));if(!$K||$K->fetch_row()){$ud="<a href='".h(ME."select=".urlencode($S)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$E</a>";echo"$Sd<li>".($K?$ud:"<p class='error'>$ud: ".error())."\n";$Sd="";}}}echo($Sd?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($gc,$Oc=false){global$b;$L=$b->dumpHeaders($gc,$Oc);$gd=$_POST["output"];if($gd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($gc).".$L".($gd!="file"&&!preg_match('~[^0-9a-z]~',$gd)?".$gd":""));session_write_close();ob_flush();flush();return$L;}function
dump_csv($M){foreach($M
as$y=>$W){if(preg_match("~[\"\n,;\t]~",$W)||$W==="")$M[$y]='"'.str_replace('"','""',$W).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$M)."\r\n";}function
apply_sql_function($q,$d){return($q?($q=="unixepoch"?"DATETIME($d, '$q')":($q=="count distinct"?"COUNT(DISTINCT ":strtoupper("$q("))."$d)"):$d);}function
get_temp_dir(){$L=ini_get("upload_tmp_dir");if(!$L){if(function_exists('sys_get_temp_dir'))$L=sys_get_temp_dir();else{$n=@tempnam("","");if(!$n)return
false;$L=dirname($n);unlink($n);}}return$L;}function
file_open_lock($n){$p=@fopen($n,"r+");if(!$p){$p=@fopen($n,"w");if(!$p)return;chmod($n,0660);}flock($p,LOCK_EX);return$p;}function
file_write_unlock($p,$bb){rewind($p);fwrite($p,$bb);ftruncate($p,strlen($bb));flock($p,LOCK_UN);fclose($p);}function
password_file($Va){$n=get_temp_dir()."/adminer.key";$L=@file_get_contents($n);if($L||!$Va)return$L;$p=@fopen($n,"w");if($p){chmod($n,0660);$L=rand_string();fwrite($p,$L);fclose($p);}return$L;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($W,$_,$l,$te){global$b;if(is_array($W)){$L="";foreach($W
as$rc=>$V)$L.="<tr>".($W!=array_values($W)?"<th>".h($rc):"")."<td>".select_value($V,$_,$l,$te);return"<table cellspacing='0'>$L</table>";}if(!$_)$_=$b->selectLink($W,$l);if($_===null){if(is_mail($W))$_="mailto:$W";if(is_url($W))$_=$W;}$L=$b->editVal($W,$l);if($L!==null){if($L==="")$L="&nbsp;";elseif(!is_utf8($L))$L="\0";elseif($te!=""&&is_shortable($l))$L=shorten_utf8($L,max(0,+$te));else$L=h($L);}return$b->selectVal($L,$_,$l,$W);}function
is_mail($sb){$pa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$md="$pa+(\\.$pa+)*@($lb?\\.)+$lb";return
is_string($sb)&&preg_match("(^$md(,\\s*$md)*\$)i",$sb);}function
is_url($R){$lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($lb?\\.)+$lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$R);}function
is_shortable($l){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$l["type"]);}function
count_rows($S,$Z,$w,$r){global$x;$J=" FROM ".table($S).($Z?" WHERE ".implode(" AND ",$Z):"");return($w&&($x=="sql"||count($r)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$r).")$J":"SELECT COUNT(*)".($w?" FROM (SELECT 1$J GROUP BY ".implode(", ",$r).") x":$J));}function
slow_query($J){global$b,$Be;$h=$b->database();$we=$b->queryTimeout();if(support("kill")&&is_object($g=connect())&&($h==""||$g->select_db($h))){$tc=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$tc,'&token=',$Be,'\');
}, ',1000*$we,');
</script>
';}else$g=null;ob_flush();flush();$L=@get_key_vals($J,$g,$we,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$L;}function
get_token(){$Bd=rand(1,1e6);return($Bd^$_SESSION["token"]).":$Bd";}function
verify_token(){list($Be,$Bd)=explode(":",$_POST["token"]);return($Bd^$_SESSION["token"])==$Be;}function
lzw_decompress($za){$jb=256;$_a=8;$Ka=array();$Id=0;$Jd=0;for($s=0;$s<strlen($za);$s++){$Id=($Id<<8)+ord($za[$s]);$Jd+=8;if($Jd>=$_a){$Jd-=$_a;$Ka[]=$Id>>$Jd;$Id&=(1<<$Jd)-1;$jb++;if($jb>>$_a)$_a++;}}$ib=range("\0","\xFF");$L="";foreach($Ka
as$s=>$Ja){$rb=$ib[$Ja];if(!isset($rb))$rb=$cf.$cf[0];$L.=$rb;if($s)$ib[]=$cf.$rb[0];$cf=$rb;}return$L;}function
on_help($Pa,$Yd=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $Pa, $Yd) }, onmouseout: helpMouseout});","");}function
edit_form($a,$m,$M,$Qe){global$b,$x,$Be,$k;$oe=$b->tableName(table_status1($a,true));page_header(($Qe?'Edit':'Insert'),$k,array("select"=>array($a,$oe)),$oe);if($M===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$m)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($m
as$E=>$l){echo"<tr><th>".$b->fieldName($l);$fb=$_GET["set"][bracket_escape($E)];if($fb===null){$fb=$l["default"];if($l["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$fb,$Ed))$fb=$Ed[1];}$X=($M!==null?($M[$E]!=""&&$x=="sql"&&preg_match("~enum|set~",$l["type"])?(is_array($M[$E])?array_sum($M[$E]):+$M[$E]):$M[$E]):(!$Qe&&$l["auto_increment"]?"":(isset($_GET["select"])?false:$fb)));if(!$_POST["save"]&&is_string($X))$X=$b->editVal($X,$l);$q=($_POST["save"]?(string)$_POST["function"][$E]:($Qe&&$l["on_update"]=="CURRENT_TIMESTAMP"?"now":($X===false?null:($X!==null?'':'NULL'))));if(preg_match("~time~",$l["type"])&&$X=="CURRENT_TIMESTAMP"){$X="";$q="now";}input($l,$X,$q);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($m){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Qe?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Qe?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."...', this); };"):"");}}echo($Qe?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$m?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$Be,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1Èä·ã`Â8(áÕ3M¨ó\"Ç39é?Ee=Ò¬ü~ù¾²ôÅîÓ¸7;ÉCÄÁ›ÍE\rd!)Âa*¯5ajo\0ª#`Ê38¶\0Êí]“eŒêˆÆ2¤	mk×øe]…Á­AZsÕStZ•Z!)BR¨G+Î#Jv2(ã öîc…4<¸#sB¯0éú‚6YL\r²=£…¿[×73Æğ<Ô:£Šbx”ßJ=	m_ ¾ÏÅfªlÙ×t‹åIªƒHÚ3x*€›á6`t6¾Ã%UÔLòeÙ‚˜<´\0ÉAQ<P<:š#u/¤:T\\> Ë-…xJˆÍQH\nj¡L+jİzğó°7£•«`İğ³\nkƒƒ'“NÓvX>îC-TË©¶œ¸†4*L”%Cj>7ß¨ŠŞ¨­õ™`ù®œ;yØûÆqÁrÊ3#¨Ù} :#ní\rã½^Å=CåAÜ¸İÆs&8£K&»ô*0ÑÒtİSÉÔÅ=¾[×ó:\\]ÃEİŒ/Oà>^]ØÃ¸Â<èØ÷gZÔV†éqº³ŠŒù ñËx\\­è•ö¹ßŞº´„\"J \\Ã®ˆû##Á¡½D†Îx6êœÚ5xÊÜ€¸¶†¨\rHøl ‹ñø°bú r¼7áÔ6†àöj|Á‰ô¢Û–*ôFAquvyO’½WeM‹Ö÷‰D.Fáö:RĞ\$-¡Ş¶µT!ìDS`°8D˜~ŸàA`(Çemƒ¦òı¢T@O1@º†X¦â“\nLpğ–‘PäşÁÓÂm«yf¸£)	‰«ÂˆÚGSEI‰¥xC(s(a?\$`tE¨n„ñ±­,÷Õ \$a‹U>,èĞ’\$ZñkDm,G\0å \\iú£%Ê¹¢ n¬¥¥±·ìİÜgÉ„b	y`’òÔ†ËWì· ä——¡_CÀÄT\niÏH%ÕdaÀÖiÍ7íAt°,Á®J†X4nˆ‘”ˆ0oÍ¹»9g\nzm‹M%`É'Iü€Ğ-èò©Ğ7:pğ3pÇQ—rEDš¤×ì àb2]…PF ı¥É>eÉú†3j\n€ß°t!Á?4ftK;£Ê\rÎĞ¸­!àoŠu?ÓúPhÒ0uIC}'~ÅÈ2‡vşQ¨ÒÎ8)ìÀ†7ìDIù=§éy&•¢eaàs*hÉ•jlAÄ(ê›\"Ä\\Óêm^i‘®M)‚°^ƒ	|~Õl¨¶#!YÍf81RS Áµ!‡†è62PÆC‘ôl&íûäxd!Œ| è9°`Ö_OYí=ğÑGà[EÉ-eLñCvT¬ )Ä@j-5¨¶œpSg».’G=”ĞZEÒö\$\0¢Ñ†KjíU§µ\$ ‚ÀG'IäP©Â~ûÚğ ;ÚhNÛG%*áRjñ‰X[œXPf^Á±|æèT!µ*NğğĞ†¸\rU¢Œ^q1V!ÃùUz,ÃI|7°7†r,¾¡¬7”èŞÄ¾BÖùÈ;é+÷¨©ß•ˆAÚpÍÎ½Ç^€¡~Ø¼W!3PŠI8]“½vÓJ’Áfñq£|,êè9Wøf`\0áq”ZÎp}[Jdhy­•NêµY|ï™Cy,ª<s A{eÍQÔŸòhd„ìÇ‡ ÌB4;ks&ƒ¬ñÄİÇaŞøÅûé”Ø;Ë¹}çSŒËJ…ïÍ)÷=dìÔ|ÎÌ®NdÒ·Iç*8µ¢dlÃÑ“E6~Ï¨F¦•Æ±X`˜M\rÊ/Ô%B/VÀIåN&;êùã0ÅUC cT&.E+ç•óƒÀ°Š›éÜ@²0`;ÅàËGè5ä±ÁŞ¦j'™›˜öàÆ»Yâ+¶‰QZ-iôœyvƒ–I™5Úó,O|­PÖ]FÛáòÓùñ\0üË2™49Í¢™¢n/Ï‡]Ø³&¦ªI^®=Ól©qfIÆÊ= Ö]x1GRü&¦e·7©º)Šó'ªÆ:B²B±>a¦z‡-¥‰Ñ2.¯ö¬¸bzø´Ü#„¥¼ñ“ÄUá“ÆL7-¼w¿tç3Éµñ’ôe§ŠöDä§\$²#÷±¤jÕ@ÕG—8Î “7púÜğR YCÁĞ~ÁÈ:À@ÆÖEU‰JÜÙ;67v]–J'ØÜäq1Ï³éElôQĞ†i¾ÍÃÎñ„/íÿ{k<àÖ¡MÜpoì}ĞèrÁ¢qŒØìcÕÃ¤™_mÒwï¾^ºu–´ÅùÚüù½«¶Çlnş”™	ı_‘~·Gønèæ‹Ö{kÜßwãŞù\rj~—K“\0Ïİü¦¾-îúÏ¢B€;œà›öb`}ÁCC,”¹-¶‹LĞ8\r,‡¿klıÇŒòn}-5Š3u›gm¸òÅ¸À*ß/äôÊùÏî×ô`Ë`½#xä+B?#öÛN;OR\r¨èø¯\$÷ÎúöÉkòÿÏ™\01\0kó\0Ğ8ôÍaèé/t úû#(&Ìl&­ù¥p¸Ïì‚…şâÎiM{¯zp*Ö-g¨Âèv‰Å6œkë	åˆğœd¬Ø‹¬Ü×ÄA`");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO“ÊerÙxî9*Åº°ºn3\rÑ‰vƒCÁ`õšİ2G%¨YãæáşŸ1™Ífô¹ÑÈ‚l¤Ã1‘\ny£*pC\r\$ÌnTª•3=\\‚r9O\"ã	Ààl<Š\rÇ\\€³I,—s\nA¤Æeh+Mâ‹!q0™ıf»`(¹N{c–—+wËñÁY£–pÙ§3Š3ú˜+I¦Ôj¹ºıÏk·²n¸qÜƒzi#^rØÀº´‹3èâÏ[èºo;®Ë(‹Ğ6#ÀÒ\":cz>ß£C2vÑCXÊ<P˜Ãc*5\nº¨è·/üP97ñ|F»°c0ƒ³¨°ä!ƒæ…!¨œƒ!‰Ã\nZ%ÃÄ‡#CHÌ!¨Òr8ç\$¥¡ì¯,ÈRÜ”2…Èã^0·á@¤2Œâ(ğ88P/‚à¸İ„á\\Á\$La\\å;càH„áHX„•\nÊƒtœ‡á8A<ÏsZô*ƒ;IĞÎ3¡Á@Ò2<Š¢¬!A8G<Ôj¿-Kƒ({*\r’Åa1‡¡èN4Tc\"\\Ò!=1^•ğİM9O³:†;jŒŠ\rãXÒàL#HÎ7ƒ#Tİª/-´‹£pÊ;B Â‹\n¿2!ƒ¥Ít]apÎİî\0RÛCËv¬MÂI,\rö§\0Hv°İ?kTŞ4£Š¼óuÙ±Ø;&’ò+&ƒ›ğ•µ\rÈXbu4İ¡i88Â2Bä/âƒ–4ƒ¡€N8AÜA)52íúøËåÎ2ˆ¨sã8ç“5¤¥¡pçWC@è:˜t…ã¾´Öešh\"#8_˜æcp^ãˆâI]OHşÔ:zdÈ3g£(„ˆ×Ã–k¸î“\\6´˜2ÚÚ–÷¹iÃä7²˜Ï]\rÃxO¾nºpè<¡ÁpïQ®UĞn‹ò|@çËó#G3ğÁ8bA¨Ê6ô2Ÿ67%#¸\\8\rıš2Èc\ræİŸk®‚.(’	’-—J;î›Ñó ÈéLãÏ ƒ¼Wâøã§“Ñ¥É¤â–÷·nû Ò§»æıMÎÀ9ZĞs]êz®¯¬ëy^[¯ì4-ºU\0ta ¶62^•˜.`¤‚â.Cßjÿ[á„ % Q\0`dëM8¿¦¼ËÛ\$O0`4²êÎ\n\0a\rA„<†@Ÿƒ›Š\r!À:ØBAŸ9Ù?h>¤Çº š~ÌŒ—6ÈˆhÜ=Ë-œA7XäÀÖ‡\\¼\r‘Q<èš§q’'!XÎ“2úT °!ŒD\r§Ò,K´\"ç%˜HÖqR\r„Ì ¢îC =í‚ æäÈ<c”\n#<€5Mø êEƒœyŒ¡”“‡°úo\"°cJKL2ù&£ØeRœÀWĞAÎTwÊÑ‘;åJˆâá\\`)5¦ÔŞœBòqhT3§àR	¸'\r+\":‚8¤ÀtV“Aß+]ŒÉS72Èğ¤YˆFƒ¼Z85àc,æô¶JÁ±/+S¸nBpoWÅdÖ\"§Qû¦a­ZKpèŞ§y\$›’ĞÏõ4I¢@L'@‰xCÑdfé~}Q*”ÒºAµàQ’\"BÛ*2\0œ.ÑÕkF©\"\r”‘° Øoƒ\\ëÔ¢™ÚVijY¦¥MÊôO‚\$Šˆ2ÒThH´¤ª0XHª5~kL©‰…T*:~P©”2¦tÒÂàB\0ıY…ÀÈÁœŸj†vDĞs.Ğ9“s¸¹Ì¤ÆP¥*xª•b¤o“õÿ¢PÜ\$¹W/“*ÃÉz';¦Ñ\$*ùÛÙédâmíÃƒÄ'b\rÑn%ÅÄ47Wì-Ÿ’àöÕ ¶K´µ³@<ÅgæÃ¨bBÑÿ[7§\\’|€VdR£¿6leQÌ`(Ô¢,Ñd˜å¹8\r¥]S:?š1¹`îÍYÀ`ÜAåÒ“%¾ÒZkQ”sMš*Ñ×È{`¯J*w¶×ÓŠ>îÕ¾ôDÏû›>ïeÓ¾·\"åt+poüüŸÊ=Ş*‚µApc7gæä ]ÓÊlî!×Ñ—+ÌûzsN¦îıàÀPÔšòia§y}U²ašÓù™`äãA¥­Á½Áw\n¡óÊ›Øj“ÿ<­:+Ÿ7;\"°ÕN3tqd4Åºg”ƒ¦T‹x€ªPH¨—FvWõV\nÕh;¢”BáD°Ø³/öbJ³İ\\Ê+ %¥ñ–÷îá]úúÑŠ½£wa×İ«¹Š¦»á¦ğèE‘­(iÉ!îô7ë×x±†z¤×Ò÷çÅHÉ³¸d´êmdéìèQ±r@§a•î¤ja?¤\r”\ryë4-4µfPáÒ‰WÃÊ`,¼x@§ƒİx¼ˆèA’¦K.€OÁi€¯o²;ê©ö–)±Ğ¨ºä’É†SÙdÙÓeOı™%ÙNĞåL78í¦Fãª›§SîáÒùöIÁÂ\rîÛZ˜²r^‰>ıĞì*‚d\ri°YüëYd‹uÃës‡*œ	ÌèE ¡Ê½éD§9æë!Â>ùkCá€›A‡Ád®åâ°!WWì1ğğÿQAæœÛk½°d%¦Ü# ïy†°{›–`}Té_YY‹R®ğ-¹MôºO–2ÖâÊ,Ë,Å É`ú-2ÓÀ÷¨+]L•È7E¤Ôç{`¢ƒË•­ñ~wì-…×ı ©M6¥¤]Fóûƒ¦@™§Ìe`°/˜8¹@‡e¦ÍØ\\ap.‚H¥ûĞC´Àæ*EAoz2¹Æçg0úˆ?]Í~Ÿs°ñÏ`ŒhJ`†êç®¤`û}‡áÍ^`èÑÃ>§ÈOñ5\rğW^Iœõõ\n³ù¬ı;ñ¸´ğ:ŸäÏ_h›n±µŒ´ßYP4®ğˆ)û *ı¸îÉõ¯æÑ6vÖä[Ë¤­C;ûö³ïã»¶näW/jº<\$J*qÄ¢ûä°ú-LôŒ\0µ¯ãï÷\0Oš\$ëZW zş	\0}Ú.4F„\rnu\0âàØÀä‹’éLŞ ÷IA\nz›©*–©ªŠjJ˜Ì…PŠ¢ë‚Ğp…Â6€Ø¦NšDÈBf\\	\0¨	 ˜W@L\rÀÄ`àg'Bd¯	Bi	œ°‚‰*|r%|\nr\r#°„@w®»î(T.¬vâ8ñÊâ\nm˜¥ğ<pØÔ`úY0ØÔâğÀÊö\0Ğ#€Ì‘}.I œx¢T\\âôÑ\n ÍQ‘æ@bR MFÙÇ|¢è%0SDr§ÂÈ f/b–àÂá¢:áík/şã	f%äĞ¨®e\nx\0Âl\0ÌÅÚ	‘0€W`ß¥Ú\nç8\r\0}p²‘›Â;\0È.Bè¤Vù§,z&Àf Ì\röWOcKƒ\nì» ’åÒkªz2\rñÉÀîW@Â’ç%\n~1€‚X ¤ßqâD¢!°^ù¦t<§\$²{0<E¦ÊÑª³2&ÜNÒ\r\næ^iÀ\"è³#nı ì­#2D§ˆüË®Dâæo!¬zK6Âë:ïìÃÏğ#RlÓ%q'kŞ¾*¸«Ã€à¶ Z@ºòJÌ`^PàHÀbSR|§	%|öôì.ÿ¯Âµ²^ßrc&oæÑk<ÿ­şí&ş²xK²Õ'æüLÄ‚«ò‹(ò’òmE)¥*–ÿ¬`R¥bWGbTRø½î`VNf¢®jæğ´woVèè˜(\"­’Ú§ô&s\0§².²¦Ş³8=h®ë Q&üân*hø\0òv¢BèGØè@\\F\n‚WÅr f\$óe6‘6àaã¤¥¢5H•ñâ°bYĞfÓRF€Ñ9¨(Òº³.EQå*Êî¸ë(Ú1‰*Â/+,º\"ˆö\r Ü	ªâ8ı\0ˆü3@İ%lå­ã¥,+¼¼å&í#-\$¦óÈ%†ÌÅgF!sİ1³Ö%¯Ôsó/¥nKªq”\0O\"EA©8…2ÀŠ}5\0Ë8‹ŸA\n¯ÅRrH…Ú³‡9Å4UìdW3!b¨z`í>ãF>Òi,”a?L>°´`´r¾±r ta;L¦ëÅ%ÀRxîŒ‰R†ëtŠÊ¥HW/m7Dr¶EsG2Î.B5Iî°ëÉQ3â_€ÒÔˆë´¤§24.ì‰ÅRkâ€z@¶@ºNì[4Î&<%b>n¦YPWÎŸâ“6n\$bK5“t‡âZB³YI Lê~G³YÎÖñcQc	6DXÖµ\"}ÆfŠĞ¢IÎj€ó5“\\ö XÙ¢td®„\nbtNaEÀTb;lâp‚Õ|\0Ô¯x\n‚ådVÖíŒÖà]Xõ“Yf„÷%D`‡QbØsvDsk0ÓqT¥ÿ7“l c7ç€ä ÖôÎSZ”6äï¾ãµŠÄ#êx‚Õh Õšâ¬£`·_`Ü¾ÎÚ§±•ê¥œ·+w`Ö%U§…’ï©è™¯¶ïÌ»U òöD‹Xl#µ†Ju¯[ åQ'×\\Hğ÷„¤÷äGRÕë0«oaĞõÓCÃX¥+ÔaícàNä®`ÖreÚ\n€Ò%¤4šS_­k_àÚš!3({7ó’bI\rV\r÷5ç×\0µ\\“€aeSg[Óz f-PöO,ju;XUvĞîıÖÃmËl…\"\\B1ÄİÅ0æ µ‘pğå4á•ë;2*‘î.b£\0ØØuÔãJ\"NV‰ÛrrOÕfî2äW3[‰Ø¢”¤³	€ËÆ5\r7²Ë0,ytÉÛwS	W	]kGÓX·iA*=P\rbs\"®\\÷o{eÀòœ¶5k€ïkÆ<±‚;®;xÕ¶-ö0§É_\$4İ ²¶´™8*i\0f›.Ñ(`¼•òñD`æP·&Œô˜ŒÄA+eB\"ZÀ¨¶³¢WÌ¢\\M>¶wö÷ú¶Ëg0¦ãGààš…‘Òø´\rÆÜ©*İf\\òŒp\0ğ¼‚åKf#€ÛÀËƒ\rÎÙÍ¡ƒØ@\r÷‚Öd ¢Ÿ\nó&D°%‚Ø3­wı‚©.}÷ùÏÿÅ­‚ ñ‚kHÆk1x~]¸PÙ­Óƒ€[…Œ;…ÀY€ØˆØ‘KÅ6 ËZäÖàtµ©>gL\r€àHsMìºe¤\0Ÿä&3²\$ë‰n3íü wÊ“7Õ—®·\"ôÒë+İ;¢s;é” *1™ y*îË®;TG|ç|B©! {!åÅ\"/Ê–oÎãj÷Wë+µæ“LşDJş’Í…´w2´ÆVTZ¹Gg/šıÖŠƒ]4n½4²À¿±Á‹Ï÷i©=ÈT…ˆ]dâ&¦ÀÄM\0Ö[88‡È®Eæ–â8&LXVmôvÀ±	Ê”j„×›‡FåÄ\\™Â	™ÆÊ&t\0Q›à\\\"òb€°	àÄ\rBs	wÂ	ŸõŸ‚N š7ÇC/|Ù×	€¨\n\nNúıK›yà*A™`ñWÏYvUZ4tz;~0}šñJ?hW£d*#É3€åĞàyF\nKTë¤Åæ@|„gy›\0ÊOÀxôa§`w£Z9¥ŒbO„»¨ÚWY’RÄÉ}J¾ˆXÊÚPñU2`÷©šG©åbeuª…zWö+œÈğ\rè¬\$4ƒ…\"\n\0\n`¨X@Nà‹®%d|‚hé¬ÈÚ™ŞÅ‡egÄê‚+âH¸t™(ªŞÑ( À^\0Zk@îªP¦@%Â(WÍ{¬º/¯ºşt{o\$â\0[³èŞ±¡„%¡§ë´É™¯‚hU]¤B,€rDèğe:D§¢ÌX«†V&ÚWll@ÀdòìY4 Ë¯›iYy¡š[‘¬Ã+«Z¹©]¦g·‡FrÚFû´wŞµ”#1¦tÏ¦¤ÃN¢hq`å§Dóğğ§v|º¦Z…Lúv…:S¨ú@åeº»ÿB’ƒ.2‡¬EŠ%Ú¯Bè’@[”ŠúÖB£*Y;¿™[ú#ª”©™›µ@:5Ã`Y8Û¾–è&¹è	@¦	àœüQÅS8!›£³»Â Â¼¢2MY„äO;¾«©Æ›È)êõFÂ¨FZõA\\1 PF¨B¤lF+šó”<ÚRÊ><J?šÚ{µf’õkÄ˜8®ëW‚¬èë®ºM\r•Í¼Û–RsC÷NÍô€î”%©ÊJë~Á˜?·Úâ¯,\r4×k0µ,Jóª•b—öo\0Ê!1 ø5'¦\ràø·u\r\0øÊ\$¡Ğ=š}\r7NÌÔ=DW6Kø8võ\r³ Ê\n ¤	*‚\r»Ä7)¦ÏDüm›1	aÖ@ßÖ‡°¨w.äT”Èİ~©Ç¼pV½ÀœJ‚u¢\rä&N MqcÊdĞĞdĞ8îğØ€_ĞK×aU&®H#]°d}`P¬\0~ÀU/ª…ñƒ…ùÌynY<>dC·<GÉ@éÃ\"’eZS¹wã•›“ÆGy¼\\j)ğ}•¤\r5â1,pª^u\0èéˆÕÆnÌÚC©ºHPÖ¬G<Ÿšp‹ô2¨\nèFDÜ\rÖ\$°­yuycöçõv6İe)ÖpÛYHÏÄ’õŞ#VP¾€üÕØeW®Ş=mÙæc:&‰¥æ-ÛÄPv.£Ë€øæºğš	‹úØ£\0\$êÁ@+×ì¹Pÿl&_çCb-U&0\"åF…®Vy¸p\rÄa5Ûq9U>5è\\LBg†èU­[¶7m düóyV[5Ÿ*}Õ4ø5/ç¶àÒ¾HöD60 ¿­Åì¿íÃ:Suy\r„¼‡ãSMÀŸÂ;W“ªØÎµL4ÖG¢NØã°§–Ÿõ ÜeÜmğšt„Èsq¶€˜\".Fÿ™§CsQ¸ h€e7äünØ>°²*àc!iSİj¾†Ì­Ù‘ü°ø‚°ü {üµ­÷%t€ê\0`&lrÅ“,Ü!0ahy	RµB=ÍegWãùo\0¦H‡h/v(’N4‘\rı„ÀTz„&q÷?X\$€X!ôJ^,Ÿ­öbó“ı`2@:†¼7ÃCX’H€e¡Š@qïÛ\ny¶ 0¦è‹´£´€ñPÀO02@èv‰/IPa°2ÀÜ0\n]-(^Æüt.½•3&Ç\"«0¤˜\"Ğ\0]°1šÍñaÂ˜´°E³SúÄP|\\€ÉÑAõpú9›\$K˜ˆByuØ¯zë7Z•\rìb¤uÉ_ïò8õÆmãq³ğû˜E<-ÈÉ@\0®!)³Ä )÷)Õ~Qå	rÙ‘Ü/MèPÿ\nº	¦É`à!\n(ˆ‚\n\n>X€Ğ!` WºËáø¼àp4AÚ	Å¶Á©d‘Ç\0XÒÙ§V\n€+Cd/EØFåâ¯m+`\0Ş2´ôp/-ØÌ2·™´eæËC@C„\0pX,4½ìª¼ƒÌ9àòÔXt!.Pß˜\\ı•q„£b{…vˆbfMÃÍ)D]ûw„˜°ŸË… XàB4'»—fÀtXĞ¦¢(O Õ¾©	ğ‘qü#³3¸«p]¢i\".ªè7¬iw[T\0y\rÄ4Cå;,\$a2i(™\$µmÈ†DÒ&Ô”4¥Z â;E#6UAÄR€­üìeFFUŒ1•h2\n¨÷UpÖ‡ÃéTÊ¹€âÏØÕ[î+‘^ôXÕ¤Ù78 A\rnK‚‚d1´>€pƒ+¦`Î:‡‹Iƒo<ÚL„@äa	¾€´\0:ˆ†İG—½ hQ„\$ùjR¸Ç'ÉÈŒ¯K!ı`¨£¸1ÅÒÀHƒCÆâZ0\$ÀeÉyXG£5hÎEâ\r1ŸG‚\nº`·g'\0¼İ6qVã(\r‡„VPHöÇŒëbÖŠ\r¯-k–\0B‘bÆıØGß:½áŒZ×Ñ|¹>*ÄXXÙ!¡’£´\"&öÀ:EÕa«÷,vB P‰h!pf;\0£¾[Á‘/r:qTƒèÙ8\"x3Gl‘İ\"Xm#Ã`è5ÑæÜx\n¨óG¶;ÑşEQ—X¹Ç‚<HhAúå¢ê·+1Nsº´ã¡µk•jsH{€Øõãï&1•GãaIÊ?76š22Îp4™ş—È™V!°Á‡¢º2ÍŸ:€¤z	IàÄ‰ZÔ1ER7Ãİ%£¶ÂôÅ6!Á?@(•ä–‘ï,&…2’¸ò”>™I8 ÒP+œ”‚hâ&7N'2V˜š\0Ñ¢i\0œ‡ËÜ™i%8ù¹V8e„Z:Ò@Ê´°ñ6ä¦R{¨JzÔs2…	j(C`Z*ôˆJ-bçë#¸DEu\$¹WŒ*Œ¥*#9ˆ”D3y¥?\"Ø9ı,Q”/§ßw8ˆ‚UÀ=•qÿ™]\0ƒÊ¹¸mtøŒ-*ç(˜ğdÒ‰•!åƒ+FX\$IŒÌ„âîˆ¼ºU\$õ`‚‚Ìeò'c¦¿Vr¨n«Æ1l€Šõ5¬?XTÅ&*@ òIBÖtyt–fêõN¨ğ%ÂÅS™H˜xô\$Ü\0}/sH]]˜â»ôãÃP')HC&…ìIá1\ri.äU&\$…dIı<)ôÅÓÓ(	EPâˆT^\n¢7›(ˆ™T'&TÇÔ:.,µdªBjõ¸:D…ğ}u{¬a\0ì¦&mÑ1CCH\n˜5!ª²hÀlš@¸ÒÁàL©€â¹™i&Ä:™µ¿G†fqNš\\Ó\\|ğÇ „`»“X\nzâÌ–üz©™‡Ê¦³6`¸=\rJEƒ\n0¦äegÌÔÊÎ‰ÜË×\n‡Y™¾äWÎ®ƒû¯áM\$aÁæ'îíwZ°ÑDa¸L÷É\\¨1)‘‘Z=&«ZúA’.Ç´91úpŸ;™‰Øó•‘<ìãïA8ÑË,F¬	lË,=ò¤\0ø›'Íåè&yğKÔ5X”e÷“xw´ß§E3)ÒLÒpn¼™ôá¦€M9Å5I(sw“E&İ6Y™ÉˆÔõ€N9qM{I2èëÀÂeT„:aÈñ.ªI”ÜøX¢òtÓ •De&f§fniØ]’hbHE†`˜");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$p=file_open_lock(get_temp_dir()."/adminer.version");if($p)file_write_unlock($p,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$mb,$pb,$xb,$k,$Tb,$Wb,$aa,$mc,$x,$ba,$wc,$Xc,$nd,$he,$ac,$Be,$Fe,$Ie,$Pe,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$kd=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$kd[]=true;call_user_func_array('session_set_cookie_params',$kd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Jb);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($Ee,$Uc=null){if(is_array($Ee)){$qd=($Uc==1?0:1);$Ee=$Ee[$qd];}$Ee=str_replace("%d","%s",$Ee);$Uc=format_number($Uc);return
sprintf($Ee,$Uc);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$qd=array_search("SQL",$b->operators);if($qd!==false)unset($b->operators[$qd]);}function
dsn($nb,$U,$I,$F=array()){try{parent::__construct($nb,$U,$I,$F);}catch(Exception$_b){auth_error(h($_b->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($J,$Je=false){$K=parent::query($J);$this->error="";if(!$K){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($K);return$K;}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result($K=null){if(!$K){$K=$this->_result;if(!$K)return
false;}if($K->columnCount()){$K->num_rows=$K->rowCount();return$K;}$this->affected_rows=$K->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch();return$M[$l];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$M=(object)$this->getColumnMeta($this->_offset++);$M->orgtable=$M->table;$M->orgname=$M->name;$M->charsetnr=(in_array("blob",(array)$M->flags)?63:0);return$M;}}}$mb=array();class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($S,$O,$Z,$r,$G=array(),$z=1,$H=0,$ud=false){global$b,$x;$w=(count($r)<count($O));$J=$b->selectQueryBuild($O,$Z,$r,$G,$z,$H);if(!$J)$J="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$r&&$w&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$O)."\nFROM ".table($S),($Z?"\nWHERE ".implode(" AND ",$Z):"").($r&&$w?"\nGROUP BY ".implode(", ",$r):"").($G?"\nORDER BY ".implode(", ",$G):""),($z!=""?+$z:null),($H?$z*$H:0),"\n");$ee=microtime(true);$L=$this->_conn->query($J);if($ud)echo$b->selectQuery($J,$ee,!$L);return$L;}function
delete($S,$_d,$z=0){$J="FROM ".table($S);return
queries("DELETE".($z?limit1($S,$J,$_d):" $J$_d"));}function
update($S,$Q,$_d,$z=0,$Td="\n"){$Ue=array();foreach($Q
as$y=>$W)$Ue[]="$y = $W";$J=table($S)." SET$Td".implode(",$Td",$Ue);return
queries("UPDATE".($z?limit1($S,$J,$_d,$Td):" $J$_d"));}function
insert($S,$Q){return
queries("INSERT INTO ".table($S).($Q?" (".implode(", ",array_keys($Q)).")\nVALUES (".implode(", ",$Q).")":" DEFAULT VALUES"));}function
insertUpdate($S,$N,$td){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
convertSearch($u,$W,$l){return$u;}function
value($W,$l){return$W;}function
quoteBinary($Ld){return
q($Ld);}function
warnings(){return'';}function
tableHelp($E){}}$mb=array("server"=>"MySQL")+$mb;if(!defined("DRIVER")){$rd=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($P="",$U="",$I="",$cb=null,$pd=null,$Zd=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($ec,$pd)=explode(":",$P,2);$de=$b->connectSsl();if($de)$this->ssl_set($de['key'],$de['cert'],$de['ca'],'','');$L=@$this->real_connect(($P!=""?$ec:ini_get("mysqli.default_host")),($P.$U!=""?$U:ini_get("mysqli.default_user")),($P.$U.$I!=""?$I:ini_get("mysqli.default_pw")),$cb,(is_numeric($pd)?$pd:ini_get("mysqli.default_port")),(!is_numeric($pd)?$pd:$Zd),($de?64:0));return$L;}function
set_charset($Da){if(parent::set_charset($Da))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Da");}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch_array();return$M[$l];}function
quote($R){return"'".$this->escape_string($R)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($P,$U,$I){$this->_link=@mysql_connect(($P!=""?$P:ini_get("mysql.default_host")),("$P$U"!=""?$U:ini_get("mysql.default_user")),("$P$U$I"!=""?$I:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Da){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Da,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Da");}function
quote($R){return"'".mysql_real_escape_string($R,$this->_link)."'";}function
select_db($cb){return
mysql_select_db($cb,$this->_link);}function
query($J,$Je=false){$K=@($Je?mysql_unbuffered_query($J,$this->_link):mysql_query($J,$this->_link));$this->error="";if(!$K){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($K===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($K);}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($J,$l=0){$K=$this->query($J);if(!$K||!$K->num_rows)return
false;return
mysql_result($K->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($K){$this->_result=$K;$this->num_rows=mysql_num_rows($K);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$L=mysql_fetch_field($this->_result,$this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=($L->blob?63:0);return$L;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($P,$U,$I){global$b;$F=array();$de=$b->connectSsl();if($de)$F=array(PDO::MYSQL_ATTR_SSL_KEY=>$de['key'],PDO::MYSQL_ATTR_SSL_CERT=>$de['cert'],PDO::MYSQL_ATTR_SSL_CA=>$de['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$P)),$U,$I,$F);return
true;}function
set_charset($Da){$this->query("SET NAMES $Da");}function
select_db($cb){return$this->query("USE ".idf_escape($cb));}function
query($J,$Je=false){$this->setAttribute(1000,!$Je);return
parent::query($J,$Je);}}}class
Min_Driver
extends
Min_SQL{function
insert($S,$Q){return($Q?parent::insert($S,$Q):queries("INSERT INTO ".table($S)." ()\nVALUES ()"));}function
insertUpdate($S,$N,$td){$e=array_keys(reset($N));$sd="INSERT INTO ".table($S)." (".implode(", ",$e).") VALUES\n";$Ue=array();foreach($e
as$y)$Ue[$y]="$y = VALUES($y)";$ke="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ue);$Ue=array();$_c=0;foreach($N
as$Q){$X="(".implode(", ",$Q).")";if($Ue&&(strlen($sd)+$_c+strlen($X)+strlen($ke)>1e6)){if(!queries($sd.implode(",\n",$Ue).$ke))return
false;$Ue=array();$_c=0;}$Ue[]=$X;$_c+=strlen($X)+2;}return
queries($sd.implode(",\n",$Ue).$ke);}function
convertSearch($u,$W,$l){return(preg_match('~char|text|enum|set~',$l["type"])&&!preg_match("~^utf8~",$l["collation"])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$K=$this->_conn->query("SHOW WARNINGS");if($K&&$K->num_rows){ob_start();select($K);return
ob_get_clean();}}function
tableHelp($E){$Ec=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Ec?"information-schema-$E-table/":str_replace("_","-",$E)."-table.html"));if(DB=="mysql")return($Ec?"mysql$E-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$Ie,$he;$f=new
Min_DB;$Xa=$b->credentials();if($f->connect($Xa[0],$Xa[1],$Xa[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$he['Strings'][]="json";$Ie["json"]=4294967295;}return$f;}$L=$f->error;if(function_exists('iconv')&&!is_utf8($L)&&strlen($Ld=iconv("windows-1250","utf-8",$L))>strlen($L))$L=$Ld;return$L;}function
get_databases($Lb){$L=get_session("dbs");if($L===null){$J=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$L=($Lb?slow_query($J):get_vals($J));restart_session();set_session("dbs",$L);stop_session();}return$L;}function
limit($J,$Z,$z,$Vc=0,$Td=" "){return" $J$Z".($z!==null?$Td."LIMIT $z".($Vc?" OFFSET $Vc":""):"");}function
limit1($S,$J,$Z,$Td="\n"){return
limit($J,$Z,1,0,$Td);}function
db_collation($h,$Na){global$f;$L=null;$Va=$f->result("SHOW CREATE DATABASE ".idf_escape($h),1);if(preg_match('~ COLLATE ([^ ]+)~',$Va,$B))$L=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Va,$B))$L=$Na[$B[1]][-1];return$L;}function
engines(){$L=array();foreach(get_rows("SHOW ENGINES")as$M){if(preg_match("~YES|DEFAULT~",$M["Support"]))$L[]=$M["Engine"];}return$L;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($db){$L=array();foreach($db
as$h)$L[$h]=count(get_vals("SHOW TABLES IN ".idf_escape($h)));return$L;}function
table_status($E="",$Fb=false){$L=array();foreach(get_rows($Fb&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($E!=""?"AND TABLE_NAME = ".q($E):"ORDER BY Name"):"SHOW TABLE STATUS".($E!=""?" LIKE ".q(addcslashes($E,"%_\\")):""))as$M){if($M["Engine"]=="InnoDB")$M["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$M["Comment"]);if(!isset($M["Engine"]))$M["Comment"]="";if($E!="")return$M;$L[$M["Name"]]=$M;}return$L;}function
is_view($T){return$T["Engine"]===null;}function
fk_support($T){return
preg_match('~InnoDB|IBMDB2I~i',$T["Engine"])||(preg_match('~NDB~i',$T["Engine"])&&min_version(5.6));}function
fields($S){$L=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($S))as$M){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$M["Type"],$B);$L[$M["Field"]]=array("field"=>$M["Field"],"full_type"=>$M["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($M["Default"]!=""||preg_match("~char|set~",$B[1])?$M["Default"]:null),"null"=>($M["Null"]=="YES"),"auto_increment"=>($M["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$M["Extra"],$B)?$B[1]:""),"collation"=>$M["Collation"],"privileges"=>array_flip(preg_split('~, *~',$M["Privileges"])),"comment"=>$M["Comment"],"primary"=>($M["Key"]=="PRI"),);}return$L;}function
indexes($S,$g=null){$L=array();foreach(get_rows("SHOW INDEX FROM ".table($S),$g)as$M){$E=$M["Key_name"];$L[$E]["type"]=($E=="PRIMARY"?"PRIMARY":($M["Index_type"]=="FULLTEXT"?"FULLTEXT":($M["Non_unique"]?($M["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$L[$E]["columns"][]=$M["Column_name"];$L[$E]["lengths"][]=($M["Index_type"]=="SPATIAL"?null:$M["Sub_part"]);$L[$E]["descs"][]=null;}return$L;}function
foreign_keys($S){global$f,$Xc;static$md='`(?:[^`]|``)+`';$L=array();$Wa=$f->result("SHOW CREATE TABLE ".table($S),1);if($Wa){preg_match_all("~CONSTRAINT ($md) FOREIGN KEY ?\\(((?:$md,? ?)+)\\) REFERENCES ($md)(?:\\.($md))? \\(((?:$md,? ?)+)\\)(?: ON DELETE ($Xc))?(?: ON UPDATE ($Xc))?~",$Wa,$Gc,PREG_SET_ORDER);foreach($Gc
as$B){preg_match_all("~$md~",$B[2],$ae);preg_match_all("~$md~",$B[5],$re);$L[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$ae[0]),"target"=>array_map('idf_unescape',$re[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$L;}function
view($E){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$f->result("SHOW CREATE VIEW ".table($E),1)));}function
collations(){$L=array();foreach(get_rows("SHOW COLLATION")as$M){if($M["Default"])$L[$M["Charset"]][-1]=$M["Collation"];else$L[$M["Charset"]][]=$M["Collation"];}ksort($L);foreach($L
as$y=>$W)asort($L[$y]);return$L;}function
information_schema($h){return(min_version(5)&&$h=="information_schema")||(min_version(5.5)&&$h=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($h,$Ma){return
queries("CREATE DATABASE ".idf_escape($h).($Ma?" COLLATE ".q($Ma):""));}function
drop_databases($db){$L=apply_queries("DROP DATABASE",$db,'idf_escape');restart_session();set_session("dbs",null);return$L;}function
rename_database($E,$Ma){$L=false;if(create_database($E,$Ma)){$Fd=array();foreach(tables_list()as$S=>$Ge)$Fd[]=table($S)." TO ".idf_escape($E).".".table($S);$L=(!$Fd||queries("RENAME TABLE ".implode(", ",$Fd)));if($L)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$L;}function
auto_increment(){$ta=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$jc){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$jc["columns"],true)){$ta="";break;}if($jc["type"]=="PRIMARY")$ta=" UNIQUE";}}return" AUTO_INCREMENT$ta";}function
alter_table($S,$E,$m,$Mb,$Qa,$wb,$Ma,$sa,$ld){$ma=array();foreach($m
as$l)$ma[]=($l[1]?($S!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($S!=""?$l[2]:""):"DROP ".idf_escape($l[0]));$ma=array_merge($ma,$Mb);$fe=($Qa!==null?" COMMENT=".q($Qa):"").($wb?" ENGINE=".q($wb):"").($Ma?" COLLATE ".q($Ma):"").($sa!=""?" AUTO_INCREMENT=$sa":"");if($S=="")return
queries("CREATE TABLE ".table($E)." (\n".implode(",\n",$ma)."\n)$fe$ld");if($S!=$E)$ma[]="RENAME TO ".table($E);if($fe)$ma[]=ltrim($fe);return($ma||$ld?queries("ALTER TABLE ".table($S)."\n".implode(",\n",$ma).$ld):true);}function
alter_indexes($S,$ma){foreach($ma
as$y=>$W)$ma[$y]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"")."(".implode(", ",$W[2]).")");return
queries("ALTER TABLE ".table($S).implode(",",$ma));}function
truncate_tables($pe){return
apply_queries("TRUNCATE TABLE",$pe);}function
drop_views($Xe){return
queries("DROP VIEW ".implode(", ",array_map('table',$Xe)));}function
drop_tables($pe){return
queries("DROP TABLE ".implode(", ",array_map('table',$pe)));}function
move_tables($pe,$Xe,$re){$Fd=array();foreach(array_merge($pe,$Xe)as$S)$Fd[]=table($S)." TO ".idf_escape($re).".".table($S);return
queries("RENAME TABLE ".implode(", ",$Fd));}function
copy_tables($pe,$Xe,$re){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($pe
as$S){$E=($re==DB?table("copy_$S"):idf_escape($re).".".table($S));if(!queries("\nDROP TABLE IF EXISTS $E")||!queries("CREATE TABLE $E LIKE ".table($S))||!queries("INSERT INTO $E SELECT * FROM ".table($S)))return
false;}foreach($Xe
as$S){$E=($re==DB?table("copy_$S"):idf_escape($re).".".table($S));$We=view($S);if(!queries("DROP VIEW IF EXISTS $E")||!queries("CREATE VIEW $E AS $We[select]"))return
false;}return
true;}function
trigger($E){if($E=="")return
array();$N=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($E));return
reset($N);}function
triggers($S){$L=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M)$L[$M["Trigger"]]=array($M["Timing"],$M["Event"]);return$L;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($E,$Ge){global$f,$xb,$mc,$Ie;$la=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$be="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$He="((".implode("|",array_merge(array_keys($Ie),$la)).")\\b(?:\\s*\\(((?:[^'\")]|$xb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$md="$be*(".($Ge=="FUNCTION"?"":$mc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$He";$Va=$f->result("SHOW CREATE $Ge ".idf_escape($E),2);preg_match("~\\(((?:$md\\s*,?)*)\\)\\s*".($Ge=="FUNCTION"?"RETURNS\\s+$He\\s+":"")."(.*)~is",$Va,$B);$m=array();preg_match_all("~$md\\s*,?~is",$B[1],$Gc,PREG_SET_ORDER);foreach($Gc
as$jd){$E=str_replace("``","`",$jd[2]).$jd[3];$m[]=array("field"=>$E,"type"=>strtolower($jd[5]),"length"=>preg_replace_callback("~$xb~s",'normalize_enum',$jd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$jd[8] $jd[7]"))),"null"=>1,"full_type"=>$jd[4],"inout"=>strtoupper($jd[1]),"collation"=>strtolower($jd[9]),);}if($Ge!="FUNCTION")return
array("fields"=>$m,"definition"=>$B[11]);return
array("fields"=>$m,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($E,$M){return
idf_escape($E);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$J){return$f->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$J);}function
found_rows($T,$Z){return($Z||$T["Engine"]!="InnoDB"?null:$T["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Md){return
true;}function
create_sql($S,$sa,$ie){global$f;$L=$f->result("SHOW CREATE TABLE ".table($S),1);if(!$sa)$L=preg_replace('~ AUTO_INCREMENT=\\d+~','',$L);return$L;}function
truncate_sql($S){return"TRUNCATE ".table($S);}function
use_sql($cb){return"USE ".idf_escape($cb);}function
trigger_sql($S){$L="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")),null,"-- ")as$M)$L.="\nCREATE TRIGGER ".idf_escape($M["Trigger"])." $M[Timing] $M[Event] ON ".table($M["Table"])." FOR EACH ROW\n$M[Statement];;\n";return$L;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($l){if(preg_match("~binary~",$l["type"]))return"HEX(".idf_escape($l["field"]).")";if($l["type"]=="bit")return"BIN(".idf_escape($l["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($l["field"]).")";}function
unconvert_field($l,$L){if(preg_match("~binary~",$l["type"]))$L="UNHEX($L)";if($l["type"]=="bit")$L="CONV($L, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))$L=(min_version(8)?"ST_":"")."GeomFromText($L)";return$L;}function
support($Gb){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view"))."~",$Gb);}function
kill_process($W){return
queries("KILL ".number($W));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}$x="sql";$Ie=array();$he=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$W){$Ie+=$W;$he[$y]=array_keys($W);}$Pe=array("unsigned","zerofill","unsigned zerofill");$cd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Tb=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Wb=array("avg","count","count distinct","group_concat","max","min","sum");$pb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.6.2";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($Va=false){return
password_file($Va);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($P){}function
database(){global$f;if($f){$db=$this->databases(false);return(!$db?$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$db[(information_schema($db[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($Lb=true){return
get_databases($Lb);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$L=array();$n="adminer.css";if(file_exists($n))$L[]=$n;return$L;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>Username<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Password<td><input type="password" name="auth[password]">
</table>
',script("focus(qs('#username'));"),"<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($Cc,$I){return
true;}function
tableName($ne){return
h($ne["Comment"]!=""?$ne["Comment"]:$ne["Name"]);}function
fieldName($l,$G=0){return
h(preg_replace('~\s+\[.*\]$~','',($l["comment"]!=""?$l["comment"]:$l["field"])));}function
selectLinks($ne,$Q=""){$a=$ne["Name"];if($Q!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$Q).'">'.'New item'."</a>\n";}function
foreignKeys($S){return
foreign_keys($S);}function
backwardKeys($S,$me){$L=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($S)."
ORDER BY ORDINAL_POSITION",null,"")as$M)$L[$M["TABLE_NAME"]]["keys"][$M["CONSTRAINT_NAME"]][$M["COLUMN_NAME"]]=$M["REFERENCED_COLUMN_NAME"];foreach($L
as$y=>$W){$E=$this->tableName(table_status($y,true));if($E!=""){$Nd=preg_quote($me);$Td="(:|\\s*-)?\\s+";$L[$y]["name"]=(preg_match("(^$Nd$Td(.+)|^(.+?)$Td$Nd\$)iu",$E,$B)?$B[2].$B[3]:$E);}else
unset($L[$y]);}return$L;}function
backwardKeysPrint($wa,$M){foreach($wa
as$S=>$va){foreach($va["keys"]as$Oa){$_=ME.'select='.urlencode($S);$s=0;foreach($Oa
as$d=>$W)$_.=where_link($s++,$d,$M[$W]);echo"<a href='".h($_)."'>".h($va["name"])."</a>";$_=ME.'edit='.urlencode($S);foreach($Oa
as$d=>$W)$_.="&set".urlencode("[".bracket_escape($d)."]")."=".urlencode($M[$W]);echo"<a href='".h($_)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($J,$ee,$Eb=false){return"<!--\n".str_replace("--","--><!-- ",$J)."\n(".format_time($ee).")\n-->\n";}function
rowDescription($S){foreach(fields($S)as$l){if(preg_match("~varchar|character varying~",$l["type"]))return
idf_escape($l["field"]);}return"";}function
rowDescriptions($N,$Ob){$L=$N;foreach($N[0]as$y=>$W){if(list($S,$t,$E)=$this->_foreignColumn($Ob,$y)){$hc=array();foreach($N
as$M)$hc[$M[$y]]=q($M[$y]);$hb=$this->_values[$S];if(!$hb)$hb=get_key_vals("SELECT $t, $E FROM ".table($S)." WHERE $t IN (".implode(", ",$hc).")");foreach($N
as$D=>$M){if(isset($M[$y]))$L[$D][$y]=(string)$hb[$M[$y]];}}}return$L;}function
selectLink($W,$l){}function
selectVal($W,$_,$l,$fd){$L=($W===null?"&nbsp;":$W);$_=h($_);if(preg_match('~blob|bytea~',$l["type"])&&!is_utf8($W)){$L=lang(array('%d byte','%d bytes'),strlen($fd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$fd))$L="<img src='$_' alt='$L'>";}if(like_bool($l)&&$L!="&nbsp;")$L=(preg_match('~^(1|t|true|y|yes|on)$~i',$W)?'yes':'no');if($_)$L="<a href='$_'".(is_url($_)?target_blank():"").">$L</a>";if(!$_&&!like_bool($l)&&preg_match(number_type(),$l["type"]))$L="<div class='number'>$L</div>";elseif(preg_match('~date~',$l["type"]))$L="<div class='datetime'>$L</div>";return$L;}function
editVal($W,$l){if(preg_match('~date|timestamp~',$l["type"])&&$W!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~','$1-$3-$5',$W);return$W;}function
selectColumnsPrint($O,$e){}function
selectSearchPrint($Z,$e,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$sc=array();foreach($Z
as$y=>$W)$sc[$W["col"]]=$y;$s=0;$m=fields($_GET["select"]);foreach($e
as$E=>$gb){$l=$m[$E];if(preg_match("~enum~",$l["type"])||like_bool($l)){$y=$sc[$E];$s--;echo"<div>".h($gb)."<input type='hidden' name='where[$s][col]' value='".h($E)."'>:",(like_bool($l)?" <select name='where[$s][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$l,(array)$Z[$y]["val"],($l["null"]?0:null))),"</div>\n";unset($e[$E]);}elseif(is_array($F=$this->_foreignKeyOptions($_GET["select"],$E))){if($m[$E]["null"])$F[0]='('.'empty'.')';$y=$sc[$E];$s--;echo"<div>".h($gb)."<input type='hidden' name='where[$s][col]' value='".h($E)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($F,$Z[$y]["val"],true)."</select></div>\n";unset($e[$E]);}}$s=0;foreach($Z
as$W){if(($W["col"]==""||$e[$W["col"]])&&"$W[col]$W[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".'anywhere'.")".optionlist($e,$W["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$W["op"]),"<input type='search' name='where[$s][val]' value='".h($W["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".'anywhere'.")".optionlist($e,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($G,$e,$v){$ed=array();foreach($v
as$y=>$jc){$G=array();foreach($jc["columns"]as$W)$G[]=$e[$W];if(count(array_filter($G,'strlen'))>1&&$y!="PRIMARY")$ed[$y]=implode(", ",$G);}if($ed){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$ed,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($te){}function
selectActionPrint($v){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($tb,$e){if($tb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$e,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($tb)==1?'<input type="hidden" name="email_field" value="'.h(key($tb)).'">':html_select("email_field",$tb)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($e,$v){return
array(array(),array());}function
selectSearchProcess($m,$v){$L=array();foreach((array)$_GET["where"]as$y=>$Z){$La=$Z["col"];$ad=$Z["op"];$W=$Z["val"];if(($y<0?"":$La).$W!=""){$Ra=array();foreach(($La!=""?array($La=>$m[$La]):$m)as$E=>$l){if($La!=""||is_numeric($W)||!preg_match(number_type(),$l["type"])){$E=idf_escape($E);if($La!=""&&$l["type"]=="enum")$Ra[]=(in_array(0,$W)?"$E IS NULL OR ":"")."$E IN (".implode(", ",array_map('intval',$W)).")";else{$ue=preg_match('~char|text|enum|set~',$l["type"]);$X=$this->processInput($l,(!$ad&&$ue&&preg_match('~^[^%]+$~',$W)?"%$W%":$W));$Ra[]=$E.($X=="NULL"?" IS".($ad==">="?" NOT":"")." $X":(in_array($ad,$this->operators)||$ad=="="?" $ad $X":($ue?" LIKE $X":" IN (".str_replace(",","', '",$X).")")));if($y<0&&$W=="0")$Ra[]="$E IS NULL";}}}$L[]=($Ra?"(".implode(" OR ",$Ra).")":"1 = 0");}}return$L;}function
selectOrderProcess($m,$v){$kc=$_GET["index_order"];if($kc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($kc!=""?array($v[$kc]):$v)as$jc){if($kc!=""||$jc["type"]=="INDEX"){$Yb=array_filter($jc["descs"]);$gb=false;foreach($jc["columns"]as$W){if(preg_match('~date|timestamp~',$m[$W]["type"])){$gb=true;break;}}$L=array();foreach($jc["columns"]as$y=>$W)$L[]=idf_escape($W).(($Yb?$jc["descs"][$y]:$gb)?" DESC":"");return$L;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Ob){if($_POST["email_append"])return
true;if($_POST["email"]){$Rd=0;if($_POST["all"]||$_POST["check"]){$l=idf_escape($_POST["email_field"]);$je=$_POST["email_subject"];$C=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$je.$C",$Gc);$N=get_rows("SELECT DISTINCT $l".($Gc[1]?", ".implode(", ",array_map('idf_escape',array_unique($Gc[1]))):"")." FROM ".table($_GET["select"])." WHERE $l IS NOT NULL AND $l != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$m=fields($_GET["select"]);foreach($this->rowDescriptions($N,$Ob)as$M){$Gd=array('{\\'=>'{');foreach($Gc[1]as$W)$Gd['{$'."$W}"]=$this->editVal($M[$W],$m[$W]);$sb=$M[$_POST["email_field"]];if(is_mail($sb)&&send_mail($sb,strtr($je,$Gd),strtr($C,$Gd),$_POST["email_from"],$_FILES["email_files"]))$Rd++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$Rd));}return
false;}function
selectQueryBuild($O,$Z,$r,$G,$z,$H){return"";}function
messageQuery($J,$ve,$Eb=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$J)."\n".($ve?"($ve)\n":"")."-->";}function
editFunctions($l){$L=array();if($l["null"]&&preg_match('~blob~',$l["type"]))$L["NULL"]='empty';$L[""]=($l["null"]||$l["auto_increment"]||like_bool($l)?"":"*");if(preg_match('~date|time~',$l["type"]))$L["now"]='now';if(preg_match('~_(md5|sha1)$~i',$l["field"],$B))$L[]=strtolower($B[1]);return$L;}function
editInput($S,$l,$c,$X){if($l["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$c value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$c,$l,($X||isset($_GET["select"])?$X:0),($l["null"]?"":null));$F=$this->_foreignKeyOptions($S,$l["field"],$X);if($F!==null)return(is_array($F)?"<select$c>".optionlist($F,$X,true)."</select>":"<input value='".h($X)."'$c class='hidden'>"."<input value='".h($F)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($S)."&field=".urlencode($l["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($l))return'<input type="checkbox" value="'.h($X?$X:1).'"'.($X?' checked':'')."$c>";$dc="";if(preg_match('~time~',$l["type"]))$dc='HH:MM:SS';if(preg_match('~date|timestamp~',$l["type"]))$dc='[yyyy]-mm-dd'.($dc?" [$dc]":"");if($dc)return"<input value='".h($X)."'$c> ($dc)";if(preg_match('~_(md5|sha1)$~i',$l["field"]))return"<input type='password' value='".h($X)."'$c>";return'';}function
editHint($S,$l,$X){return(preg_match('~\s+(\[.*\])$~',($l["comment"]!=""?$l["comment"]:$l["field"]),$B)?h(" $B[1]"):'');}function
processInput($l,$X,$q=""){if($q=="now")return"$q()";$L=$X;if(preg_match('~date|timestamp~',$l["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$X,$B))$L=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$L=($l["type"]=="bit"&&preg_match('~^[0-9]+$~',$X)?$L:q($L));if($X==""&&like_bool($l))$L="0";elseif($X==""&&($l["null"]||!preg_match('~char|text~',$l["type"])))$L="NULL";elseif(preg_match('~^(md5|sha1)$~',$q))$L="$q($L)";return
unconvert_field($l,$L);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($h){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($S,$ie,$J){global$f;$K=$f->query($J,1);if($K){while($M=$K->fetch_assoc()){if($ie=="table"){dump_csv(array_keys($M));$ie="INSERT";}dump_csv($M);}}}function
dumpFilename($gc){return
friendly_url($gc);}function
dumpHeaders($gc,$Oc=false){$Cb="csv";header("Content-Type: text/csv; charset=utf-8");return$Cb;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Nc){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Nc=="auth"){$Kb=true;foreach((array)$_SESSION["pwds"]as$Y=>$Vd){foreach($Vd[""]as$U=>$I){if($I!==null){if($Kb){echo"<p id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Kb=false;}echo"<a href='".h(auth_url($Y,"",$U))."'>".($U!=""?h($U):"<i>".'empty'."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($Nc);if($Nc!="db"&&$Nc!="ns"){$T=table_status('',true);if(!$T)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Nc){}function
tablesPrint($pe){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($pe
as$M){echo'<li>';$E=$this->tableName($M);if(isset($M["Engine"])&&$E!="")echo"<a href='".h(ME).'select='.urlencode($M["Name"])."'".bold($_GET["select"]==$M["Name"]||$_GET["edit"]==$M["Name"],"select")." title='".'Select data'."'>$E</a>\n";}echo"</ul>\n";}function
_foreignColumn($Ob,$d){foreach((array)$Ob[$d]as$Nb){if(count($Nb["source"])==1){$E=$this->rowDescription($Nb["table"]);if($E!=""){$t=idf_escape($Nb["target"][0]);return
array($Nb["table"],$t,$E);}}}}function
_foreignKeyOptions($S,$d,$X=null){global$f;if(list($re,$t,$E)=$this->_foreignColumn(column_foreign_keys($S),$d)){$L=&$this->_values[$re];if($L===null){$T=table_status($re);$L=($T["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $E FROM ".table($re)." ORDER BY 2"));}if(!$L&&$X!==null)return$f->result("SELECT $E FROM ".table($re)." WHERE $t = ".q($X));return$L;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($xe,$k="",$Ca=array(),$ye=""){global$ba,$ca,$b,$mb,$x;page_headers();if(is_ajax()&&$k){page_messages($k);exit;}$ze=$xe.($ye!=""?": $ye":"");$_e=strip_tags($ze.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$_e,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.6.2&driver=mysql"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.6.2&driver=mysql");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2&driver=mysql"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2&driver=mysql"),'">
';foreach($b->css()as$Za){echo'<link rel="stylesheet" type="text/css" href="',h($Za),'">
';}}echo'
<body class="ltr nojs">
';$n=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($n)&&filemtime($n)+86400>time()){$Ve=unserialize(file_get_contents($n));$xd="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ve["version"],base64_decode($Ve["signature"]),$xd)==1)$_COOKIE["adminer_version"]=$Ve["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ca!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$mb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$P=$b->serverName(SERVER);$P=($P!=""?$P:'Server');if($Ca===false)echo"$P\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$P</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ca)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ca)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ca
as$y=>$W){$gb=(is_array($W)?$W[1]:h($W));if($gb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($W)?$W[0]:$W)."'>$gb</a> &raquo; ";}}echo"$xe\n";}}echo"<h2>$ze</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($k);$db=&get_session("dbs");if(DB!=""&&$db&&!in_array(DB,$db,true))$db=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Ya){$bc=array();foreach($Ya
as$y=>$W)$bc[]="$y $W";header("Content-Security-Policy: ".implode("; ",$bc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Sc;if(!$Sc)$Sc=base64_encode(rand_string());return$Sc;}function
page_messages($k){$Re=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Mc=$_SESSION["messages"][$Re];if($Mc){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Mc)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Re]);}if($k)echo"<div class='error'>$k</div>\n";}function
page_footer($Nc=""){global$b,$Be;echo'</div>

';if($Nc!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$Be,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Nc);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($D){while($D>=2147483648)$D-=4294967296;while($D<=-2147483649)$D+=4294967296;return(int)$D;}function
long2str($V,$Ze){$Ld='';foreach($V
as$W)$Ld.=pack('V',$W);if($Ze)return
substr($Ld,0,end($V));return$Ld;}function
str2long($Ld,$Ze){$V=array_values(unpack('V*',str_pad($Ld,4*ceil(strlen($Ld)/4),"\0")));if($Ze)$V[]=strlen($Ld);return$V;}function
xxtea_mx($ef,$df,$le,$rc){return
int32((($ef>>5&0x7FFFFFF)^$df<<2)+(($df>>3&0x1FFFFFFF)^$ef<<4))^int32(($le^$df)+($rc^$ef));}function
encrypt_string($ge,$y){if($ge=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$V=str2long($ge,true);$D=count($V)-1;$ef=$V[$D];$df=$V[0];$yd=floor(6+52/($D+1));$le=0;while($yd-->0){$le=int32($le+0x9E3779B9);$ob=$le>>2&3;for($hd=0;$hd<$D;$hd++){$df=$V[$hd+1];$Pc=xxtea_mx($ef,$df,$le,$y[$hd&3^$ob]);$ef=int32($V[$hd]+$Pc);$V[$hd]=$ef;}$df=$V[0];$Pc=xxtea_mx($ef,$df,$le,$y[$hd&3^$ob]);$ef=int32($V[$D]+$Pc);$V[$D]=$ef;}return
long2str($V,false);}function
decrypt_string($ge,$y){if($ge=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$V=str2long($ge,false);$D=count($V)-1;$ef=$V[$D];$df=$V[0];$yd=floor(6+52/($D+1));$le=int32($yd*0x9E3779B9);while($le){$ob=$le>>2&3;for($hd=$D;$hd>0;$hd--){$ef=$V[$hd-1];$Pc=xxtea_mx($ef,$df,$le,$y[$hd&3^$ob]);$df=int32($V[$hd]-$Pc);$V[$hd]=$df;}$ef=$V[$D];$Pc=xxtea_mx($ef,$df,$le,$y[$hd&3^$ob]);$df=int32($V[0]-$Pc);$V[0]=$df;$le=int32($le-0x9E3779B9);}return
long2str($V,true);}$f='';$ac=$_SESSION["token"];if(!$ac)$_SESSION["token"]=rand(1,1e6);$Be=get_token();$nd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($y)=explode(":",$W);$nd[$y]=$W;}}function
add_invalid_login(){global$b;$p=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$p)return;$pc=unserialize(stream_get_contents($p));$ve=time();if($pc){foreach($pc
as$qc=>$W){if($W[0]<$ve)unset($pc[$qc]);}}$oc=&$pc[$b->bruteForceKey()];if(!$oc)$oc=array($ve+30*60,0);$oc[1]++;file_write_unlock($p,serialize($pc));}function
check_invalid_login(){global$b;$pc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$oc=$pc[$b->bruteForceKey()];$Rc=($oc[1]>29?$oc[0]-time():0);if($Rc>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Rc/60)));}$ra=$_POST["auth"];if($ra){session_regenerate_id();$Y=$ra["driver"];$P=$ra["server"];$U=$ra["username"];$I=(string)$ra["password"];$h=$ra["db"];set_password($Y,$P,$U,$I);$_SESSION["db"][$Y][$P][$U][$h]=true;if($ra["permanent"]){$y=base64_encode($Y)."-".base64_encode($P)."-".base64_encode($U)."-".base64_encode($h);$vd=$b->permanentLogin(true);$nd[$y]="$y:".base64_encode($vd?encrypt_string($I,$vd):"");cookie("adminer_permanent",implode(" ",$nd));}if(count($_POST)==1||DRIVER!=$Y||SERVER!=$P||$_GET["username"]!==$U||DB!=$h)redirect(auth_url($Y,$P,$U,$h));}elseif($_POST["logout"]){if($ac&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.sprintf('Thanks for using Adminer, consider <a href="%s">donating</a>.','https://sourceforge.net/donate/index.php?group_id=264133'));}}elseif($nd&&!$_SESSION["pwds"]){session_regenerate_id();$vd=$b->permanentLogin();foreach($nd
as$y=>$W){list(,$Ha)=explode(":",$W);list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$y));set_password($Y,$P,$U,decrypt_string(base64_decode($Ha),$vd));$_SESSION["db"][$Y][$P][$U][$h]=true;}}function
unset_permanent(){global$nd;foreach($nd
as$y=>$W){list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$y));if($Y==DRIVER&&$P==SERVER&&$U==$_GET["username"]&&$h==DB)unset($nd[$y]);}cookie("adminer_permanent",implode(" ",$nd));}function
auth_error($k){global$b,$ac;$Wd=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Wd]||$_GET[$Wd])&&!$ac)$k='Session expired, please login again.';else{add_invalid_login();$I=get_password();if($I!==null){if($I===false)$k.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Wd]&&$_GET[$Wd]&&ini_bool("session.use_only_cookies"))$k='Session support must be enabled.';$kd=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$kd["lifetime"]);page_header('Login',$k,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$rd)),false);page_footer("auth");exit;}list($ec,$pd)=explode(":",SERVER,2);if(is_numeric($pd)&&$pd<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$f=connect();$i=new
Min_Driver($f);}$Cc=null;if(!is_object($f)||($Cc=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($f)?h($f):(is_string($Cc)?$Cc:'Invalid credentials.')));if($ra&&$_POST["token"])$_POST["token"]=$Be;$k='';if($_POST){if(!verify_token()){$lc="max_input_vars";$Kc=ini_get($lc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$W=ini_get($y);if($W&&(!$Kc||$W<$Kc)){$lc=$y;$Kc=$W;}}}$k=(!$_POST["token"]&&$Kc?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$lc'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$k=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$k.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($bc){return"=?UTF-8?B?".base64_encode($bc)."?=";}function
send_mail($sb,$je,$C,$Sb="",$Ib=array()){$j=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$C=str_replace("\n",$j,wordwrap(str_replace("\r","","$C\n")));$Ba=uniqid("boundary");$qa="";foreach((array)$Ib["error"]as$y=>$W){if(!$W)$qa.="--$Ba$j"."Content-Type: ".str_replace("\n","",$Ib["type"][$y]).$j."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$Ib["name"][$y])."\"$j"."Content-Transfer-Encoding: base64$j$j".chunk_split(base64_encode(file_get_contents($Ib["tmp_name"][$y])),76,$j).$j;}$ya="";$cc="Content-Type: text/plain; charset=utf-8$j"."Content-Transfer-Encoding: 8bit";if($qa){$qa.="--$Ba--$j";$ya="--$Ba$j$cc$j$j";$cc="Content-Type: multipart/mixed; boundary=\"$Ba\"";}$cc.=$j."MIME-Version: 1.0$j"."X-Mailer: Adminer Editor".($Sb?$j."From: ".str_replace("\n","",$Sb):"");return
mail($sb,email_header($je),$ya.$C.$qa,$cc);}function
like_bool($l){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$l["full_type"]);}$f->select_db($b->database());$Xc="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$mb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$m=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$O=array(idf_escape($_GET["field"]));$K=$i->select($a,$O,array(where($_GET,$m)),$O);$M=($K?$K->fetch_row():array());echo$i->value($M[0],$m[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$m=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$m):""):where($_GET,$m));$Qe=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($m
as$E=>$l){if(!isset($l["privileges"][$Qe?"update":"insert"])||$b->fieldName($l)=="")unset($m[$E]);}if($_POST&&!$k&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Qe?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$v=indexes($a);$Le=unique_array($_GET["where"],$v);$Ad="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,'Item has been deleted.',$i->delete($a,$Ad,!$Le));else{$Q=array();foreach($m
as$E=>$l){$W=process_input($l);if($W!==false&&$W!==null)$Q[idf_escape($E)]=$W;}if($Qe){if(!$Q)redirect($A);queries_redirect($A,'Item has been updated.',$i->update($a,$Q,$Ad,!$Le));if(is_ajax()){page_headers();page_messages($k);exit;}}else{$K=$i->insert($a,$Q);$yc=($K?last_id():0);queries_redirect($A,sprintf('Item%s has been inserted.',($yc?" $yc":"")),$K);}}}$M=null;if($_POST["save"])$M=(array)$_POST["fields"];elseif($Z){$O=array();foreach($m
as$E=>$l){if(isset($l["privileges"]["select"])){$oa=convert_field($l);if($_POST["clone"]&&$l["auto_increment"])$oa="''";if($x=="sql"&&preg_match("~enum|set~",$l["type"]))$oa="1*".idf_escape($E);$O[]=($oa?"$oa AS ":"").idf_escape($E);}}$M=array();if(!support("table"))$O=array("*");if($O){$K=$i->select($a,$O,array($Z),$O,array(),(isset($_GET["select"])?2:1));if(!$K)$k=error();else{$M=$K->fetch_assoc();if(!$M)$M=false;}if(isset($_GET["select"])&&(!$M||$K->fetch_assoc()))$M=null;}}if(!support("table")&&!$m){if(!$Z){$K=$i->select($a,array("*"),$Z,array("*"));$M=($K?$K->fetch_assoc():false);if(!$M)$M=array($i->primary=>"");}if($M){foreach($M
as$y=>$W){if(!$Z)$M[$y]=null;$m[$y]=array("field"=>$y,"null"=>($y!=$i->primary),"auto_increment"=>($y==$i->primary));}}}edit_form($a,$m,$M,$Qe);}elseif(isset($_GET["select"])){$a=$_GET["select"];$T=table_status1($a);$v=indexes($a);$m=fields($a);$Qb=column_foreign_keys($a);$Wc=$T["Oid"];parse_str($_COOKIE["adminer_import"],$ia);$Kd=array();$e=array();$te=null;foreach($m
as$y=>$l){$E=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$E!=""){$e[$y]=html_entity_decode(strip_tags($E),ENT_QUOTES);if(is_shortable($l))$te=$b->selectLengthProcess();}$Kd+=$l["privileges"];}list($O,$r)=$b->selectColumnsProcess($e,$v);$w=count($r)<count($O);$Z=$b->selectSearchProcess($m,$v);$G=$b->selectOrderProcess($m,$v);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Me=>$M){$oa=convert_field($m[key($M)]);$O=array($oa?$oa:idf_escape(key($M)));$Z[]=where_check($Me,$m);$L=$i->select($a,$O,$Z,$O);if($L)echo
reset($L->fetch_row());}exit;}$td=$Oe=null;foreach($v
as$jc){if($jc["type"]=="PRIMARY"){$td=array_flip($jc["columns"]);$Oe=($O?$td:array());foreach($Oe
as$y=>$W){if(in_array(idf_escape($y),$O))unset($Oe[$y]);}break;}}if($Wc&&!$td){$td=$Oe=array($Wc=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($Wc));}if($_POST&&!$k){$bf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ga=array();foreach($_POST["check"]as$Ea)$Ga[]=where_check($Ea,$m);$bf[]="((".implode(") OR (",$Ga)."))";}$bf=($bf?"\nWHERE ".implode(" AND ",$bf):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Sb=($O?implode(", ",$O):"*").convert_fields($e,$m,$O)."\nFROM ".table($a);$Vb=($r&&$w?"\nGROUP BY ".implode(", ",$r):"").($G?"\nORDER BY ".implode(", ",$G):"");if(!is_array($_POST["check"])||$td)$J="SELECT $Sb$bf$Vb";else{$Ke=array();foreach($_POST["check"]as$W)$Ke[]="(SELECT".limit($Sb,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m).$Vb,1).")";$J=implode(" UNION ALL ",$Ke);}$b->dumpData($a,"table",$J);exit;}if(!$b->selectEmailProcess($Z,$Qb)){if($_POST["save"]||$_POST["delete"]){$K=true;$ja=0;$Q=array();if(!$_POST["delete"]){foreach($e
as$E=>$W){$W=process_input($m[$E]);if($W!==null&&($_POST["clone"]||$W!==false))$Q[idf_escape($E)]=($W!==false?$W:idf_escape($E));}}if($_POST["delete"]||$Q){if($_POST["clone"])$J="INTO ".table($a)." (".implode(", ",array_keys($Q)).")\nSELECT ".implode(", ",$Q)."\nFROM ".table($a);if($_POST["all"]||($td&&is_array($_POST["check"]))||$w){$K=($_POST["delete"]?$i->delete($a,$bf):($_POST["clone"]?queries("INSERT $J$bf"):$i->update($a,$Q,$bf)));$ja=$f->affected_rows;}else{foreach((array)$_POST["check"]as$W){$af="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m);$K=($_POST["delete"]?$i->delete($a,$af,1):($_POST["clone"]?queries("INSERT".limit1($a,$J,$af)):$i->update($a,$Q,$af,1)));if(!$K)break;$ja+=$f->affected_rows;}}}$C=lang(array('%d item has been affected.','%d items have been affected.'),$ja);if($_POST["clone"]&&$K&&$ja==1){$yc=last_id();if($yc)$C=sprintf('Item%s has been inserted.'," $yc");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$C,$K);if(!$_POST["delete"]){edit_form($a,$m,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$k='Ctrl+click on a value to modify it.';else{$K=true;$ja=0;foreach($_POST["val"]as$Me=>$M){$Q=array();foreach($M
as$y=>$W){$y=bracket_escape($y,1);$Q[idf_escape($y)]=(preg_match('~char|text~',$m[$y]["type"])||$W!=""?$b->processInput($m[$y],$W):"NULL");}$K=$i->update($a,$Q," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Me,$m),!$w&&!$td," ");if(!$K)break;$ja+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ja),$K);}}elseif(!is_string($Hb=get_file("csv_file",true)))$k=upload_error($Hb);elseif(!preg_match('~~u',$Hb))$k='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ia["output"])."&format=".urlencode($_POST["separator"]));$K=true;$Oa=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Hb,$Gc);$ja=count($Gc[0]);$i->begin();$Td=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$N=array();foreach($Gc[0]as$y=>$W){preg_match_all("~((?>\"[^\"]*\")+|[^$Td]*)$Td~",$W.$Td,$Hc);if(!$y&&!array_diff($Hc[1],$Oa)){$Oa=$Hc[1];$ja--;}else{$Q=array();foreach($Hc[1]as$s=>$La)$Q[idf_escape($Oa[$s])]=($La==""&&$m[$Oa[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$La))));$N[]=$Q;}}$K=(!$N||$i->insertUpdate($a,$N,$td));if($K)$K=$i->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ja),$K);$i->rollback();}}}$oe=$b->tableName($T);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $oe",$k);$Q=null;if(isset($Kd["insert"])||!support("table")){$Q="";foreach((array)$_GET["where"]as$W){if($Qb[$W["col"]]&&count($Qb[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!preg_match('~[_%]~',$W["val"]))))$Q.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}$b->selectLinks($T,$Q);if(!$e&&support("table"))echo"<p class='error'>".'Unable to select the table'.($m?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($O,$e);$b->selectSearchPrint($Z,$e,$v);$b->selectOrderPrint($G,$e,$v);$b->selectLimitPrint($z);$b->selectLengthPrint($te);$b->selectActionPrint($v);echo"</form>\n";$H=$_GET["page"];if($H=="last"){$o=$f->result(count_rows($a,$Z,$w,$r));$H=floor(max(0,$o-1)/$z);}$Od=$O;$Ub=$r;if(!$Od){$Od[]="*";$Ua=convert_fields($e,$m,$O);if($Ua)$Od[]=substr($Ua,2);}foreach($O
as$y=>$W){$l=$m[idf_unescape($W)];if($l&&($oa=convert_field($l)))$Od[$y]="$oa AS $W";}if(!$w&&$Oe){foreach($Oe
as$y=>$W){$Od[]=idf_escape($y);if($Ub)$Ub[]=idf_escape($y);}}$K=$i->select($a,$Od,$Z,$Ub,$G,$z,$H,true);if(!$K)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$H)$K->seek($z*$H);$ub=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$N=array();while($M=$K->fetch_assoc()){if($H&&$x=="oracle")unset($M["RNUM"]);$N[]=$M;}if($_GET["page"]!="last"&&$z!=""&&$r&&$w&&$x=="sql")$o=$f->result(" SELECT FOUND_ROWS()");if(!$N)echo"<p class='message'>".'No rows.'."\n";else{$xa=$b->backwardKeys($a,$oe);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$r&&$O?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Qc=array();$Tb=array();reset($O);$Cd=1;foreach($N[0]as$y=>$W){if(!isset($Oe[$y])){$W=$_GET["columns"][key($O)];$l=$m[$O?($W?$W["col"]:current($O)):$y];$E=($l?$b->fieldName($l,$Cd):($W["fun"]?"*":$y));if($E!=""){$Cd++;$Qc[$y]=$E;$d=idf_escape($y);$fc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$gb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($fc.($G[0]==$d||$G[0]==$y||(!$G&&$w&&$r[0]==$d)?$gb:'')).'">';echo
apply_sql_function($W["fun"],$E)."</a>";echo"<span class='column hidden'>","<a href='".h($fc.$gb)."' title='".'descending'."' class='text'> â†“</a>";if(!$W["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Tb[$y]=$W["fun"];next($O);}}$Ac=array();if($_GET["modify"]){foreach($N
as$M){foreach($M
as$y=>$W)$Ac[$y]=max($Ac[$y],min(40,strlen(utf8_decode($W))));}}echo($xa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$H%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($N,$Qb)as$D=>$M){$Le=unique_array($N[$D],$v);if(!$Le){$Le=array();foreach($N[$D]as$y=>$W){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$Le[$y]=$W;}}$Me="";foreach($Le
as$y=>$W){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$m[$y]["type"])&&strlen($W)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$m[$y]["collation"])?$y:"CONVERT($y USING ".charset($f).")").")";$W=md5($W);}$Me.="&".($W!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($W):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$r&&$O?"":"<td>".checkbox("check[]",substr($Me,1),in_array(substr($Me,1),(array)$_POST["check"])).($w||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Me)."' class='edit'>".'edit'."</a>"));foreach($M
as$y=>$W){if(isset($Qc[$y])){$l=$m[$y];$W=$i->value($W,$l);if($W!=""&&(!isset($ub[$y])||$ub[$y]!=""))$ub[$y]=(is_mail($W)?$Qc[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$l["type"])&&$W!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Me;if(!$_&&$W!==null){foreach((array)$Qb[$y]as$Pb){if(count($Qb[$y])==1||end($Pb["source"])==$y){$_="";foreach($Pb["source"]as$s=>$ae)$_.=where_link($s,$Pb["target"][$s],$N[$D][$ae]);$_=($Pb["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($Pb["db"]),ME):ME).'select='.urlencode($Pb["table"]).$_;if($Pb["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\\1'.urlencode($Pb["ns"]),$_);if(count($Pb["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$Le))$_.=where_link($s++,$V["col"],$V["val"],$V["op"]);}foreach($Le
as$rc=>$V)$_.=where_link($s++,$rc,$V);}$W=select_value($W,$_,$l,$te);$t=h("val[$Me][".bracket_escape($y)."]");$X=$_POST["val"][$Me][bracket_escape($y)];$qb=!is_array($M[$y])&&is_utf8($W)&&$N[$D][$y]==$M[$y]&&!$Tb[$y];$se=preg_match('~text|lob~',$l["type"]);if(($_GET["modify"]&&$qb)||$X!==null){$Xb=h($X!==null?$X:$M[$y]);echo"<td>".($se?"<textarea name='$t' cols='30' rows='".(substr_count($M[$y],"\n")+1)."'>$Xb</textarea>":"<input name='$t' value='$Xb' size='$Ac[$y]'>");}else{$Dc=strpos($W,"<i>...</i>");echo"<td id='$t' data-text='".($Dc?2:($se?1:0))."'".($qb?"":" data-warning='".h('Use edit link to modify this value.')."'").">$W</td>";}}}if($xa)echo"<td>";$b->backwardKeysPrint($xa,$N[$D]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(!is_ajax()){if($N||$H){$Ab=true;if($_GET["page"]!="last"){if($z==""||(count($N)<$z&&($N||!$H)))$o=($H?$H*$z:0)+count($N);elseif($x!="sql"||!$w){$o=($w?false:found_rows($T,$Z));if($o<max(1e4,2*($H+1)*$z))$o=reset(slow_query(count_rows($a,$Z,$w,$r)));else$Ab=false;}}$id=($z!=""&&($o===false||$o>$z||$H));if($id){echo(($o===false?count($N)+1:$o-$H*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($H+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Loading'."...');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($N||$H){if($id){$Ic=($o===false?$H+(count($N)>=$z?2:1):floor(($o-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($H+1)."')); return false; };"),pagination(0,$H).($H>5?" ...":"");for($s=max(1,$H-4);$s<min($Ic,$H+5);$s++)echo
pagination($s,$H);if($Ic>0){echo($H+5<$Ic?" ...":""),($Ab&&$o!==false?pagination($Ic,$H):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ic'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$H).($H>1?" ...":""),($H?pagination($H,$H):""),($Ic>$H?pagination($H+1,$H).($Ic>$H+1?" ...":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$kb=($Ab?"":"~ ").$o;echo
checkbox("all",1,0,($o!==false?($Ab?"":"~ ").lang(array('%d row','%d rows'),$o):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$kb' : checked); selectCount('selected2', this.checked || !checked ? '$kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$Rb=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($Rb['sql']);break;}}if($Rb){print_fieldset("export",'Export'." <span id='selected2'></span>");$gd=$b->dumpOutput();echo($gd?html_select("output",$gd,$ia["output"])." ":""),html_select("format",$Rb,$ia["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($ub,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ia["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$Be'>\n","</form>\n",(!$r&&$O?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));elseif(list($S,$t,$E)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$K=$f->query("SELECT $t, $E FROM ".table($S)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$E LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($M=$K->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($S)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($M[0]))."'>".h($M[1])."</a><br>\n";if($M)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$S=>$M){$E=$b->tableName($M);if(isset($M["Engine"])&&$E!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$S,in_array($S,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($S)."'>$E</a>";$W=format_number($M["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($S)."'>".($M["Engine"]=="InnoDB"&&$W?"~ $W":$W)."</a>";}}echo"</table>\n","</form>\n",script("tableCheck();");}}page_footer();