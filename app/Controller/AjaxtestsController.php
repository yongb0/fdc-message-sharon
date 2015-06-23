<?php
App::uses('AppController', 'Controller');
App::uses('JsBaseEngineHelper', 'View/Helper');

class AjaxtestsController extends AppController {

function beforeFilter() {
        parent::beforeFilter();
    }

public function returnsSomthing()
    {
        $layout = 'ajax'; // you need to have a no html page, only the data
        $this->autoRender = false; // no need to render the page, just plain data
        $data = array();
        $jquerycallback = $_POST["callback"];
        //do something and then put in $data those things you want to return..
        //$data will be transformed to JSON or what you configure on the dataType

        echo JsBaseEngineHelper::object($data,array('prefix' => $jquerycallback.'({"totalResultsCount":'.count($data).',"ajt":','postfix' => '});'));
    }
}