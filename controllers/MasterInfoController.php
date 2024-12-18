<?php
require_once __DIR__ . '/../../KP-SMK-ALHUSNA-WEB/models/MasterInfoModel.php';

class MasterInfoController
{

    private $masterInfo;

    public function __construct($db)
    {
        $this->masterInfo = new MasterInfo($db);
    }

    public function getInfo()
    {
        return $this->masterInfo->getInfo();
    }

    public function addInfo($title, $content, $attachment, $create_user)
    {
        return $this->masterInfo->addNewInfo($title, $content, $attachment, $create_user);
    }
}
