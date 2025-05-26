<?php

namespace Contracts;

interface MiddlewareContracts
{
    public function handle($request, $next);
}
