<?php

/*
 * This file is part of the `src-run/src-run-app` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

/* include composer-generated autoloader file */
require __DIR__.'/../vendor/autoload.php';

/* load environment variables */
(new Dotenv())->load(__DIR__.'/../.env');

/* determine kernel environment */
$environment = $_SERVER['APP_ENV'] ?? 'dev';

/* resolve debug state and enable if required */
if ($debug = (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== $environment))) {
    Debug::enable();
}

/* set trusted proxies if required */
if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

/* set trusted hosts if required */
if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts(explode(',', $trustedHosts));
}

/* main() */
($kernel = new Kernel($environment, $debug))->terminate($r = Request::createFromGlobals(), $kernel->handle($r)->send());
