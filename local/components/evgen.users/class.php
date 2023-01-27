<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
class evgenUsers extends CBitrixComponent
{
    private function getUsersGroups()
    {
        $usersGroups = \Bitrix\Main\UserGroupTable::getList(array(
            'filter'    => array('GROUP.ACTIVE'=>'Y'),
            'select'    => array('GROUP_ID','GROUP.NAME','GROUP.DESCRIPTION'),
            'order'     => array('GROUP.C_SORT'=>'ASC'),
            'limit'     => 100
        ));

        return $usersGroups;
    }


    public function executeComponent()
    {
        if ($this->StartResultCache()){
            $tempRes = [];
            $resGroups = $this->getUsersGroups();
            while($group=$resGroups->fetch()){
                $tempRes[$group['GROUP_ID']][] = $group;
            }
            $this->arResult['GROUPS'] = $tempRes;
            $this->EndResultCache();
        }
        $this->includeComponentTemplate();
    }
}