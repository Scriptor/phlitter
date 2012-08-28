<?php
namespace phlitter;
require_once('/Users/historium/pharen/lang.php');
use Pharen\Lexical as Lexical;
Lexical::$scopes['phlitter'] = array();
$__scope_id = Lexical::init_closure("phlitter", 144);
$rest_api = "http://api.twitter.com/1/";
Lexical::bind_lexing("phlitter", 144, '$rest_api', $rest_api);
$search_api = "http://search.twitter.com/";
Lexical::bind_lexing("phlitter", 144, '$search_api', $search_api);
function call_api($type, $action, $params){
	return json_decode(file_get_contents(($type . $action . "?" . http_build_query($params))), TRUE);
}

function call_rest($action, $params){
	$rest_api = Lexical::get_lexical_binding('phlitter', 144, '$rest_api', isset($__closure_id)?$__closure_id:0);;
	return call_api($rest_api, $action, $params);
}

function call_search($action, $params){
	$search_api = Lexical::get_lexical_binding('phlitter', 144, '$search_api', isset($__closure_id)?$__closure_id:0);;
	return call_api($search_api, $action, $params);
}

function timeline_for($screen_name, $c=3){
	return call_rest("statuses/user_timeline.json", array("screen_name" => $screen_name, "count" => $c, "exclude_replies" => TRUE));
}

function search($query, $result_type="recent", $rpp=5){
	return call_search("search.json", array("q" => $query, "result_type" => $result_type, "rpp" => $rpp));
}

function print_tweet($tweet){
		return print(("TWEET: " . $tweet["text"] . "\n\n"));

}

function print_tweets($tweets){
	return map("print_tweet", $tweets);
}

function show_header($s){
	prn($s);
	return prn(str_repeat("=", strlen($s)));
}

;
