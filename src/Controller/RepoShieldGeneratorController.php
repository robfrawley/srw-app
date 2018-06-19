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

class RepoShieldGeneratorController
{
    /**
     * @param string $organization
     * @param string $name
     * @param string $service
     * @param string $style
     *
     * @return Response
     */
    public function shieldAction(string $organization, string $name, string $service, string $style): Response
    {
        var_dump([
            __METHOD__,
            $organization,
            $name,
            $service,
            $style,
        ]);
        die();
    }
}
