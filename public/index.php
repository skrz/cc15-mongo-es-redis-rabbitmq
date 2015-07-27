<?php
namespace CC15;

use Symfony\Component\HttpFoundation\Request;
use Tracy\Debugger;

require_once __DIR__ . "/../vendor/autoload.php";

$env = "dev";

Debugger::enable($env !== "dev", __DIR__ . "/../log");

$request = Request::createFromGlobals();
$kernel = new CC15Kernel($env, $env === "dev");
$response = $kernel->handle($request);

if ($env === "dev") {
	// ->send() calls fastcgi_finish_request(), so no other content would get rendered (e.g. Tracy debug bar)
	$response->sendHeaders();
	$response->sendContent();
} else {
	$response->send();
}

$kernel->terminate($request, $response);
