<?php
// auto-generated by sfRoutingConfigHandler
// date: 2019/12/17 08:32:50
return array(
'list' => new sfRoute('/genus/list', array (
  'module' => 'genus',
  'action' => 'list',
), array (
), array (
)),
'created_note' => new sfDoctrineRoute('/genus.:sf_format', array (
  'module' => 'genus',
  'action' => 'createNotes',
  'sf_format' => 'html',
), array (
  'sf_method' => 'post',
), array (
  'model' => 'Genus',
  'type' => 'object',
)),
'genus_note' => new sfDoctrineRouteCollection(array (
  'model' => 'GenusNote',
  'name' => 'genus_note',
  'requirements' => 
  array (
  ),
)),
'genus' => new sfDoctrineRouteCollection(array (
  'model' => 'Genus',
  'name' => 'genus',
  'requirements' => 
  array (
  ),
)),
'homepage' => new sfRoute('/', array (
  'module' => 'genus',
  'action' => 'index',
), array (
), array (
)),
);