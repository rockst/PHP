<?php
print("<pre>");
print_r($_GET);
print("</pre>");

// $page = basename($_GET["page"]);
// $ext = pathinfo($page, PATHINFO_EXTENSION);
// $page = str_replace('.' . $ext, '', $page);
// if($page == 'user-account') {
// 	// require_once 'user-model.php';
// }
//require_once $page . '-view.php';

const REGEX_ANY = "([^/]+?)";
const REGEX_INT = "([0-9]+?)";
const REGEX_ALPHA = "([a-zA-Z_-]+?)";
const REGEX_ALPHANUMERIC = "([0-9a-zA-Z_-]+?)";
const REGEX_STATIC = "%s";

require_once 'RouterRegex.php';

$r = new RouterRegex;
// $r->addRoute("/alpha:page/alpha:action/:id", array('controller' => 'default'));
// print("<pre>");
// print_r($r);
// print("</pre>");
// $r = $r->getRoute('/user-account/view/123');
// print("<pre>");
// print_r($r);
// print("</pre>");
//$r->addRoute('/photos/alpha:user/int:photoId/in/regex:(?p<groupType>([a-z]+?))-(?P<groupId>([0-9]+?))');
$r->addRoute('/photos/alpha:user/int:photoId/in/regex:(?P<groupType>([a-z]+?))-(?P<groupId>([0-9]+?))');
print("<pre>");
print_r($r);
print("</pre>");
$r = $r->getRoute('/photos/rockst/12345678/in/set-1234567890');
print("<pre>");
print_r($r);
print("</pre>");