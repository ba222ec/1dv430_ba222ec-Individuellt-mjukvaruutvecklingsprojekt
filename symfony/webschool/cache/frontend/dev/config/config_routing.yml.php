<?php
// auto-generated by sfRoutingConfigHandler
// date: 2014/05/12 12:57:50
return array(
'homepage' => new sfRoute('/', array (
  'module' => 'user',
  'action' => 'index',
), array (
), array (
)),
'register_new_user' => new sfRoute('/registrera-konto', array (
  'module' => 'user',
  'action' => 'new',
), array (
), array (
)),
'edit_user_account' => new sfRoute('/redigera-konto', array (
  'module' => 'user',
  'action' => 'edit',
), array (
), array (
)),
'edit_user_password' => new sfRoute('/redigera-losenord', array (
  'module' => 'user',
  'action' => 'editpassword',
), array (
), array (
)),
'delete_user_account' => new sfRoute('/radera-konto', array (
  'module' => 'user',
  'action' => 'delete',
), array (
), array (
)),
'show_lesson' => new sfPropelRoute('/lektion/:lessonID/:title_slug', array (
  'module' => 'lesson',
  'action' => 'lesson',
), array (
), array (
  'model' => 'Lesson',
  'type' => 'object',
)),
'show_test' => new sfPropelRoute('/lektion/:lessonID/:title_slug/test', array (
  'module' => 'lesson',
  'action' => 'quiz',
), array (
), array (
  'model' => 'Lesson',
  'type' => 'object',
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
