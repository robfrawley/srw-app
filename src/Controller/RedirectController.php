<?php

/*
 * This file is part of the `src-run/src-run-app` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RedirectController
{
    /**
     * @return Response
     */
    public function defaultAction(): Response
    {
        return new RedirectResponse('//github.com/src-run', 302);
    }

    /**
     * @param string $name
     *
     * @return Response
     */
    public function namedLinkAction(string $name): Response
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
    public function namedFileAction(string $name): Response
    {
        var_dump([
            __METHOD__,
            $name,
        ]);
        die();
    }
}
