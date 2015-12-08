<?php
/* define the MODX path constants necessary for core installation */
define('MODX_CORE_PATH', dirname(dirname(__FILE__)) . '/core/');
define('MODX_CONFIG_KEY', 'revo_3_x');

$root = dirname(dirname(__FILE__)).'/';
/*
 * Константы
 */
global $sources;
$sources = array(
    'root' => $root,
    'build' => $root . '_build/',
    'data' => $root . '_build/data/',
    'resolvers' => $root . '_build/resolvers/',
    'chunks' => $root.'core/components/'.PKG_PATH.'/elements/chunks/',
    'snippets' => $root.'core/components/'.PKG_PATH.'/elements/snippets/',
    'plugins' => $root.'core/components/'.PKG_PATH.'/elements/plugins/',
    'lexicon' => $root . 'core/components/'.PKG_PATH.'/lexicon/',
    'docs' => $root.'core/components/'.PKG_PATH.'/docs/',
    'pages' => $root.'core/components/'.PKG_PATH.'/elements/pages/',
    'source_assets' => $root.'assets/components/'.PKG_PATH,
    'source_core' => $root.'core/components/'.PKG_PATH,
    'templates' => $root.'core/components/'.PKG_PATH.'/elements/templates/',
    'model' => $root.'core/components/'.PKG_PATH.'/model/',
);

require_once $sources['build'] . 'includes/functions.php';