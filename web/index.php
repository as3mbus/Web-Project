<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/cowsay', function() use($app) {
  $app['monolog']->addDebug('cowsay');
  return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
});

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});
$app->get('/announcement', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('announcement.twig');
});
$app->get('/event', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('event.twig');
});
$app->get('/updatelog', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('updatelog.twig');
});
$app->get('/about', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('about.twig');
});
$app->get('/documentation', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('documentation.twig');
});
$app->get('/testimony', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('testimony.twig');
});
$app->get('/faq', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('faq.twig');
});
$app->get('/contact', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('contact.twig');
});
$app->get('/construction', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('construction.twig');
});

$app->run();
