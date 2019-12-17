<?php
// auto-generated by sfViewConfigHandler
// date: 2019/12/17 11:35:41
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

  $response->addStylesheet('bootstrap.min.css', '', array ());
  $response->addStylesheet('all.css', '', array ());
  $response->addStylesheet('dataTables.bootstrap4.min.css', '', array ());
  $response->addStylesheet('jquery.dataTables.min.css', '', array ());
  $response->addStylesheet('admin.css', '', array ());
  $response->addStylesheet('styles.css', '', array ());
  $response->addJavascript('jquery-3.4.1.min.js', '', array ());
  $response->addJavascript('popper.min.js', '', array ());
  $response->addJavascript('bootstrap.min.js', '', array ());
  $response->addJavascript('dataTables.bootstrap4.min.js', '', array ());
  $response->addJavascript('jquery.dataTables.min.js', '', array ());
  $response->addJavascript('all.js', '', array ());
  $response->addJavascript('main.js', '', array ());


