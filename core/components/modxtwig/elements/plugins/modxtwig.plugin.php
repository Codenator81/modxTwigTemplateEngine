<?php
// Plugin Twig

$core_path = $modx->getOption('core_path', null).'components/modxtwig/';
$template_dir = $core_path.'templates/';
$cache_dir = 'cache/modxtwig/';

require_once($core_path. '/twig_plugins/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();

$configTWIG = array(
    'cache' => $modx->getOption('modxTwig.caching') ? $cache_dir : null,
    'debug' => $modx->getOption('modxTwig.debug') ? true : false,
    'autoescape' => false
    );

switch($modx->event->name){
    case 'OnHandleRequest':
        if($modx->context->key == 'mgr'){
            return;
        }
        $loader = new Twig_Loader_Filesystem( $template_dir );
        $twig = new Twig_Environment($loader, $configTWIG);
        
        include_once($core_path . 'twig_plugins/extensions.php');

        $twig->addExtension(new Twig_Extension_Debug());
        $twig->addExtension(new Plugins_Twig_Extension());
        $modx->twig = & $twig;
        break;
    
    case 'OnSiteRefresh':
            $twig = new Twig_Environment(null, $configTWIG);
            $twig->clearCacheFiles();
        break;
       
    
    default:;
}