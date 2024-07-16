<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_REGIONAL_TEXT" => array(
		"PARENT" => "BASE",
		"NAME" => GetMessage("T_IBLOCK_REGIONAL_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "N",
	),
	"DISPLAY_REGIONAL_TEXT_ID" => array(
		"PARENT" => "BASE",
		"NAME" => GetMessage("T_IBLOCK_REGIONAL_TEXT_ID"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
);
?>
