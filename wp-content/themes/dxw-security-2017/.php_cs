<?php

$finder = \PhpCsFixer\Finder::create()
->exclude('vendor')
->exclude('vendor')
->exclude('assets')
->exclude('static')
->exclude('templates')
->exclude('node_modules')
->exclude('bower_components')
->in(__DIR__);

return \Dxw\PhpCsFixerConfig\Config::create()
->setFinder($finder);
