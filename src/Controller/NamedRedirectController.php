<?php

/*
 * This file is part of the `src-run/srw-app` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class NamedRedirectController
{
    /**
     * @return Response
     */
    public function homeAction(): Response
    {
        return new RedirectResponse('//github.com/src-run', 302);
    }

    /**
     * @param string $name
     *
     * @return Response
     */
    public function linkAction(string $name): Response
    {
        var_dump([
            __METHOD__,
            $name,
        ]);
        die();
    }

    /**
     * @param string $name
     *
     * @return Response
     */
    public function fileAction(string $name): Response
    {
        var_dump([
            __METHOD__,
            $name,
        ]);
        die();
    }
}
