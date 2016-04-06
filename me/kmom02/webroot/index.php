<?php

require __DIR__.'/config_with_app.php';
$app->theme->configure(ANAX_APP_PATH . 'config/myTheme.php');
//$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);
$app->navbar->configure(ANAX_APP_PATH . 'config/myNavbar.php');

$di->set('CommentController', function() use ($di) {
    $controller = new gel\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});


$app->theme->setVariable('title', "HELLO!");


$app->router->add('', function () use ($app) {

    $app->theme->setTitle('Hem');
    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $byline  = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/homepage', [
        'content' => $content,
        'byline' => $byline,
    ]);

});


$app->router->add('redovisning', function () use ($app) {
    $app->theme->setTitle("Redovisning");


    $content = $app->fileContent->get('redovisning.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $byline  = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

    $app->views->add('me/redovisning', [
        'content' => $content,
        'byline' => $byline,
    ]);

});

$app->router->add('sourcecode', function () use ($app) {

    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle('Källkod');

    $source = new \Mos\Source\CSource([
        'secure_dir' => '../..',
        'base_dir' => '../..',
        'add_ignore' => ['.htaccess'],
    ]);

    $app->views->add('me/sourcecode', ['content' => $source->View()]);

});



$app->router->add('comments-page-1', function () use ($app) {

    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle('Comments - Page 1');

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params'     => ['which' => 'comments-page-1']
    ]);

    $app->views->add('comment/form', [
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,
    ]);
});



$app->router->add('comments-page-2', function() use ($app) {

    $app->theme->setTitle('Comments - Page 2');
    $app->theme->addStylesheet('css/source.css');

    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params'     => ['which' => 'comments-page-2']
    ]);


    $app->views->add('comment/form',[
        'mail'      => null,
        'web'       => null,
        'name'      => null,
        'content'   => null,
        'output'    => null,

        ]);

});


$app->router->handle();
$app->theme->render();
