<?php
// Plugin Twig

$core_path = $modx->getOption('modxTwig.core_path', $scriptProperties, $modx->getOption('core_path', null).'components/modxtwigtplengine/');
$template_dir = $modx->getOption('modxTwig.template_dir', $scriptProperties, $core_path.'templates/');
$template = $modx->getOption('modxTwig.template', $scriptProperties, 'default');
$cache_dir = $modx->getOption('modxTwig.cache_dir', $scriptProperties, $modx->getOption('core_path', null).'cache/modxtwigtplengine/');

require_once($core_path. '/twig_plugins/Twig/Autoloader.php');
Twig_Autoloader::register();

$configTWIG = array(
    'cache' => $modx->getOption('modxTwig.caching') ? $cache_dir : null,
    'debug' => $modx->getOption('modxTwig.debug') ? true : false,
    'autoescape' => false
    );
$configMODx = [
    'cache_dir' => $cache_dir,
    ];

switch($modx->event->name){
    case 'OnHandleRequest':
        if($modx->context->key == 'mgr'){
            return;
        }
        $loader = new Twig_Loader_Filesystem($template_dir . $template);
        $twig = new Twig_Environment($loader, $configTWIG);
        
        include_once($core_path . 'twig_plugins/extensions.php');
        //$twig->addGlobal('modx', $modx);
        
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