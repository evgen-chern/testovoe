<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
//echo'<pre>';
//print_r($arParams);
//echo'</pre>';?>
<div class="wrapper">
    <form>
        <input type="text" name="q">
        <input type="submit">
    </form>
    <?
//    if(!empty($_REQUEST['q'])){
//        $filter = Array
//        (
//            "ACTIVE"   => "Y",
//            "LOGIN"    => $_REQUEST['q'],
//        );
//        $rsUsers = CUser::GetList(($by="personal_country"), ($order="desc"), $filter);
//        $userF = [];
//        while($userF=$rsUsers->fetch()){
//            $arResult['FINDER']['ID'] = $userF['ID'];
//            $arResult['FINDER']['LOGIN'] = $userF['LOGIN'];
//        }
//        $arGroups = CUser::GetUserGroup($arResult['FINDER']['ID']);
//        echo "<pre>";
//        print_r($arGroups);
//        echo "</pre>";
//    }else{
//        echo 'ЗАПРОС ПУСТОЙ';
//    }
    ?>
    <div class="searched_groups">
        <?if($arResult['FINDER'][0]['MAIN_USER_GROUP_USER_LOGIN']):?>
            <p>Логин: <span><?=$arResult['FINDER'][0]['MAIN_USER_GROUP_USER_LOGIN']?></span></p>
        <?endif;?>
        <?foreach ($arResult['FINDER'] as $find):?>
            <p>Название группы: <span><?=$find['MAIN_USER_GROUP_GROUP_NAME']?></span></p>
            <p>Описание группы: <span><?=$find['MAIN_USER_GROUP_GROUP_DESCRIPTION']?></span></p>
        <?endforeach;?>
        <?if($arResult['ERROR_MESSAGE']):?>
            <div class="errors"><?=$arResult['ERROR_MESSAGE'];?></div>
        <?endif;?>
    </div>

    <div class="evgen_table">
        <div class="head">
            <p>ID</p>
            <p>Название</p>
            <p>Описание</p>
        </div>
        <div class="body">
            <?foreach ($arResult['GROUPS'] as $groups):?>
                <p><?=$groups[0]['GROUP_ID']?></p>
                <p><?=$groups[0]['MAIN_USER_GROUP_GROUP_NAME']?></p>
                <p><?=$groups[0]['MAIN_USER_GROUP_GROUP_DESCRIPTION']?></p>
            <?endforeach;?>
        </div>
    </div>
</div>
