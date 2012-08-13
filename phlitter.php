<?php
require_once('/Users/historium/pharen/lang.php');
use Pharen\Lexical as Lexical;
Lexical::$scopes['phlitter'] = array();
$__scope_id = Lexical::init_closure("phlitter", 126);
$base_api = "http://api.twitter.com/1/";
Lexical::bind_lexing("phlitter", 126, '$base_api', $base_api);
function call_api($action, $params){
	$base_api = Lexical::get_lexical_binding('phlitter', 126, '$base_api', isset($__closure_id)?$__closure_id:0);;
	return json_decode(file_get_contents(($base_api . $action . "?" . http_build_query($params))), TRUE);
}

function timeline_for($screen_name, $c){
	return call_api("statuses/user_timeline.json", array("screen_name" => $screen_name, "count" => $c, "exclute_replies" => $true));
}

function print_tweet($text){
	return print(("TWEET: " . $text . "\n\n"));
}

$timeline = timeline_for("tmkhan", 10);
Lexical::bind_lexing("phlitter", 126, '$timeline', $timeline);
function phlitter__partial0($arg0){
	return get("text", $arg0);
}


map(comp("print_tweet", "\\phlitter__partial0"), $timeline);
