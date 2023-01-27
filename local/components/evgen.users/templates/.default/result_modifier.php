<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

if ($arParams["TITLE"]) {
        $APPLICATION->SetTitle($arParams["TITLE"]);
}
if($_REQUEST['q']){
    $findUser = \Bitrix\Main\UserGroupTable::getList(array(
        'filter'    => array('GROUP.ACTIVE'=>'Y', 'USER.LOGIN'=>$_REQUEST['q']),
        'select'    => array('GROUP_ID','GROUP.NAME','GROUP.DESCRIPTION','USER.LOGIN'),
        'order'     => array('GROUP.C_SORT'=>'ASC'),
        'limit'     => 100
    ));
    $userF = [];
    while($userF=$findUser->fetch()){
        $arResult['FINDER'][] = $userF;
    }
    if(!$arResult['FINDER']){
        $arResult['ERROR_MESSAGE'] = 'Нет такого пользователя.';
    }
}else{
    $arResult['ERROR_MESSAGE'] = 'Введите логин пользователя.';
}