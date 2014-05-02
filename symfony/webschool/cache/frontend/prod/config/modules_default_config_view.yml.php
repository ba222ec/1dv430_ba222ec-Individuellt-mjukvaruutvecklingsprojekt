<?php
// auto-generated by sfViewConfigHandler
// date: 2014/05/02 14:52:20
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Webbskola', false, false);
  $response->addMeta('language', 'sv', false, false);

  $response->addStylesheet('normalize.css', '', array ());
  $response->addStylesheet('foundation.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addJavascript('/js/vendor/custom.modernizr.js', '', array ());
  $response->addJavascript('/js/vendor/jquery.js', '', array ());
  $response->addJavascript('/js/foundation/foundation.js', '', array ());
  $response->addJavascript('/js/foundation/foundation.topbar.js', '', array ());
  $response->addJavascript('/js/foundation/foundation.alerts.js', '', array ());


