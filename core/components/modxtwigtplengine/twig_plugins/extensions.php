<?php
global $modx;
class Plugins_Twig_Extension extends Twig_Extension
{
    public function getGlobals()
    {   
        global $modx;
        return array(
            'modx' => $modx,
        );
    }
    public function getName()
    {
        return 'plugins';
    }
    public function getFunctions()
    {
        return array(
            // Чанк
            new Twig_SimpleFunction('chunk', function ($name, $scriptProperties = array()) {
                global $modx;
                $modx->getParser();
                if(is_string($scriptProperties)){
                    $scriptProperties = $modx->parser->parseProperties($scriptProperties);
                }        
                $output = $modx->getChunk($name, $scriptProperties);
                return $output;
            }),
            // Сниппет
            new Twig_SimpleFunction('snippet', function ($name, $scriptProperties = array()) {
                global $modx;
                $modx->getParser();
                $output = $modx->runSnippet($name, $scriptProperties);
               // $output .= '<pre>' . print_r($scriptProperties,true) .'</pre>';
                return $output;
            }), 
            new Twig_SimpleFunction('ph', function ($name) {
                global $modx;
                return $modx->getPlaceholder($name);
            }),
            new Twig_SimpleFunction('config', function ($name, $default = null) {
                global $modx;
                return $modx->getOption($name, $default);
            }),
            // {{ link(2) }}
            // {{ link(2,{'name':'Codenator'}) }}
            new Twig_SimpleFunction('link', function ($id, $args=array()) {
                global $modx;
                $context='';
                $scheme = -1;
                $options = array();
                return $modx->makeUrl($id, $context,$args,$scheme, $options);
            }),
            // {{ field({'name':'createdon'})}}
            new Twig_SimpleFunction('field', function ($params = array()) {
                global $modx;
                if (!isset($params['name']) OR !$tagName = $params['name']) {
                    return;
                }
                $output = '';
                $tagPropString = (isset($params['tagPropString']) ? $params['tagPropString'] : "");
                $modx->getParser();
                $nextToken = substr($tagName, 0, 1);
                $cacheable = false;
                if ($nextToken === '#') {
                    $tagName = substr($tagName, 1);
                }
                if (is_array($modx->resource->_fieldMeta) && in_array($modx->parser->realname($tagName), array_keys($modx->resource->_fieldMeta))) {
                    $element = new modFieldTag($modx);
                    $element->set('name', $tagName);
                    $element->setCacheable($cacheable);
                    $output = $element->process($tagPropString);
                } elseif ($element = $modx->parser->getElement('modTemplateVar', $tagName)) {
                    $element->set('name', $tagName);
                    $element->setCacheable($cacheable);
                    $output = $element->process($tagPropString);
                }
                return $output;
            }),
            //{{ trans('key','lang:namespace:topic',{'sport':'basketball'}) }}
            new Twig_SimpleFunction('trans', function ($name, $topicname, $placeholders = []) {
                global $modx;
                if(mb_strlen($name)<2)return;
                if(mb_strlen($topicname)>0) (string)$topicname;
                $modx->getService('lexicon','modLexicon');
                $modx->lexicon->load($topicname);
                $output = $modx->lexicon($name,$placeholders);
                return $output;
            }),
        );
    }//--getFunction
}
?>