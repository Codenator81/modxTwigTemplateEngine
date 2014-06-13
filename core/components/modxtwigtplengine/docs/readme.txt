Thanks Fi1osof for amazing Smarty plugin.
This plugin made on base his modxSmarty plugin.

Using MODX-elements via Twig


Full funcional Twig so everything from Twig working here 
just look Twig manual


For using Twig go to templates in Elements tab check static checkbox 
and create for example baseController.php file.
In template add 
<?php
return $modx->twig->render('index.twig');
after that in core/components/modxtwigtplengine/templates/default/
you can fing example index.twig file.


For pass same variables in template write
$myvar = ['first'=>'Первый','sekond'=>'Второй','last'=>'Последний'];
$modx->twig->addGlobal('text', $myvar);
return $modx->twig->render('index.twig');

to call $myvar in index.twig write
{{ myvar.first }} 
and we get output 'Первый'

modx
================================================
$modx->getOption('site_url');
{{ modx.Option('site_url') }}
$modx->resource->content;
{{ modx.resource.content }}

Snippet
=================================================
min snippet`s call
{{ snippet('mysnippet') }}

where Wayfinder snippet`s name and  {'startId':0} params
{{ snippet('Wayfinder', {'startId':0}) }} 


Chunk
===============================================
Chunk call
{{ chunk('mychunk') }}

Call chunk with params
{{ chunk('mychunk',{'key':'value'}) }}

Placeholders
================================================
{{ ph('myplaceholder') }}

Configs
================================================
{{ config('site_start') }}
with params
{{ config('site_start':'default') }}

Link
================================================
{{ link('id') }}
with params like 
{{ link('id',{'cultureKey':'ru'}) }}


Resources fields
=================================================
{{ field('name') }}
with params
{{ field('name'),{'key':'value'} }}

field work with tv as well

Translation (Lexicon)
=================================================
minimum call
{{ trans('key','lang:namespace:topic') }}

{{ trans('key','lang:namespace:topic',{'key':'value_for_placeholder'}) }}

