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

class RepoServiceRedirectController
{
    /**
     * @param string $organization
     * @param string $name
     * @param string $service
     * @param string $context
     *
     * @return Response
     */
    public function serviceAction(string $organization, string $name, string $service, string $context): Response
    {
        var_dump([
            __METHOD__,
            $organization,
            $name,
            $service,
            $context,
        ]);
        die();
    }
}
