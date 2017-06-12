<?php

\Mockery::getConfiguration()->allowMockingNonExistentMethods(false);
\Mockery::getConfiguration()->allowMockingMethodsUnnecessarily(false);

return function(\Evenement\EventEmitterInterface $emitter) {
    $dot = new \Peridot\Reporter\Dot\DotReporterPlugin($emitter);
};
