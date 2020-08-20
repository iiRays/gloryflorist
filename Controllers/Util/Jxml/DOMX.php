<?php

require_once 'alluser.php';

class DOMX {
    private $users;
    private $xlstProc;

    public function __construct($xmlFile, $xslFile) {
        $this->xlstProc = new XSLTProcessor();
        $this->users = new SplObjectStorage();
        $this->readFromXML($xmlFile);
        $this->display($xmlFile, $xslFile);
    }

    public function readFromXML($xmlFile) {
        $xml = simplexml_load_file($xmlFile);
        $userList = $xml->allUser;

        foreach ($userList as $user) {
            $userTemp = new allUser($user->id, $user->name, $user->email, $user->phone, $user->address, $user->role, $user->status);
            $this->users->attach($userTemp);
        }
    }

    public function display($xmlFile, $xslFile) {
        $proc = new XsltProcessor;
        $proc->importStylesheet(DOMDocument::load($xslFile));
        echo $proc->transformToXML(DOMDocument::load($xmlFile));
    }

}

$user = new DOMX("allUser.xml", "allUser.xsl");
