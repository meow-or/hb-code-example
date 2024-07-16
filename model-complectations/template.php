<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);
?>

<pre class="hide">
    <? var_dump($arResult);?>
</pre>

<? if(!empty($arResult['ITEMS'])): ?>

    <section class="site-section site-section--gray model-complectations">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <h2 class="model-complectations-title">
                        Комплектации и цены <?=$arResult['SECTION']['PATH'][0]['NAME']?>
                    </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="model-complectations-switch">
						<? foreach ($arResult['ITEMS'] as $arItem ): ?>

                            <?
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>

                            <? if(!empty($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'])): ?>

                                <a
                                    id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                                    href="#<?= $arItem['CODE'] ?>"
                                    class="model-complectations-switch-item"
                                    data-model="<?= $arItem['ID'] ?>"
                                >
                                    <?
                                        $arrName = explode(" ", $arItem['NAME']);
                                        array_shift($arrName);
                                        echo mb_strtolower(implode(" ", $arrName)); 
                                    ?>
                                </a>

                            <? endif; ?>
                            
						<? endforeach; ?>
					</div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group main-toggle--select ui-front">

                        <select name="main-toggle--select" id="model-menu">

                            <? foreach ($arResult['ITEMS'] as $arItem ): ?>

                                <option
                                    value="#<?=$arItem['CODE']?>"
                                    data-model="<?= $arItem['ID'] ?>"
                                >
                                    <?
                                        $arrName = explode(" ", $arItem['NAME']);
                                        array_shift($arrName);
                                        echo mb_strtolower(implode(" ", $arrName)); 
                                    ?>
                                </option>

                            <?endforeach;?>

                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="swiper model-toggle-slider">

                        <div class="swiper-wrapper">
                            <? foreach ($arResult['ITEMS'] as $arItem): ?>
                                <div
                                    class="swiper-slide model-complectations-model-slide"
                                    data-hash="<?= $arItem['CODE'] ?>"
                                >
                                    <div class="row">

                                        <?php if ($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS']): ?>

                                            <div class="col-sm-12 col-md-6 middle-xs">
                                                
                                                <div class="model-colorpicker-container">
                                                    <div class="swiper model-color-slider model-colorpicker-photo-container">

                                                        <div class="swiper-wrapper">

                                                            <?php foreach ($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'] as $item): ?>

                                                                <img
                                                                    class="lozad model-colorpicker-photo swiper-slide"
                                                                    data-src="
                                                                        <?=
                                                                            isset($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'])
                                                                                ? $item['IMAGE']
                                                                                : ''
                                                                        ?>" 
                                                                    alt="<?= $item['NAME']?>"
                                                                    title="<?= $item['NAME']?>"
                                                                    data-hash="<?= preg_replace('/#/', '', $item['COLOR']) ?>"
                                                                >

                                                            <? endforeach ?>

                                                        </div>

                                                    </div>

                                                    <div class="model-colorpicker">
                                            
                                                        <svg 
                                                            class="model-colorpicker-colors"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 650 159"
                                                            fill="none"
                                                        >
                                                            <path d="M649.5 72C649.5 76.807 647.303 81.5445 643.03 86.1712C638.754 90.8007 632.423 95.2903 624.228 99.5827C607.839 108.167 584.09 115.913 554.702 122.424C495.933 135.443 414.721 143.5 325 143.5C235.279 143.5 154.067 135.443 95.2984 122.424C65.9102 115.913 42.1615 108.167 25.7721 99.5827C17.5769 95.2903 11.2462 90.8007 6.97014 86.1712C2.69651 81.5445 0.5 76.807 0.5 72C0.5 67.193 2.69651 62.4555 6.97014 57.8287C11.2462 53.1993 17.5769 48.7097 25.7721 44.4173C42.1615 35.8329 65.9102 28.0871 95.2984 21.5765C154.067 8.557 235.279 0.5 325 0.5C414.721 0.5 495.933 8.557 554.702 21.5765C584.09 28.0871 607.839 35.8329 624.228 44.4173C632.423 48.7097 638.754 53.1993 643.03 57.8287C647.303 62.4555 649.5 67.193 649.5 72Z" stroke="#4E5864" stroke-opacity="0.15"/>
                                                            <g xmlns="http://www.w3.org/2000/svg" class="model-colorpicker-colors-items">

                                                                <?php foreach ($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'] as $item): ?>

                                                                    <a href="<?= $item['COLOR'] ?>">
                                                                        <?= $item['SVG_G'] ?>
                                                                    </a>

                                                                <? endforeach; ?>
                                                            </g>
                                                        </svg>

                                                    </div>

                                                    <div class="swiper model-color-name-slider">

                                                        <div class="swiper-wrapper">

                                                            <?php foreach ($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'] as $item): ?>

                                                                <div
                                                                    class="swiper-slide"
                                                                    data-hash="<?= preg_replace('/#/', '', $item['COLOR']) ?>"
                                                                >
                                                                    <span class="model-color-name-title">Цвет: </span><?= $item['NAME'] ?>
                                                                </div>
                                                                
                                                            <? endforeach ?>

                                                        </div>

                                                    </div>
                                                        
                                                </div>

                                            </div>
                                            
                                        <? endif; ?>

                                        <div class="col-sm-12 col-md-6 col-md-offset-0 col-lg-5 col-lg-offset-1 start-xs">
                                            <div class="model-text-container">
                                                <h2 class="model-name">
                                                    Lada <?= $arItem['NAME'] ?>            
                                                </h2>

                                                <div class="model-text">
                                                    <p><?= $arItem['PREVIEW_TEXT'] ?></p>
                                                </div>

                                                <? if(!empty($arItem['PROPERTIES']['PRICE']['VALUE'])): ?>                    
                                                    <div class="model-price">
                                                        цена от <?= number_format($arItem['PROPERTIES']['PRICE']['VALUE'], 0, '', ' '); ?> ₽
                                                    </div>
                                                <? endif; ?>

                                                <div class="model-text-button">
                                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn btn--white btn-l">
                                                        Подробнее
                                                    </a>
                                                </div>
                                            </div>                        
                                                

                                        </div>

                                        <? if(!empty($arItem['COMPLECTATIONS'])): ?>

                                            <div class="col-xs-12">
                                                <div class="swiper model-complectations-swiper">
                                                    <div class="swiper-wrapper">

                                                        <?php foreach($arItem['COMPLECTATIONS'] as $complectation): ?>

                                                            <div class="swiper-slide">
                                                                <div class="model-complectations-card">

                                                                    <div class="model-complectations-card-title">
                                                                        <?= /*'Lada '.explode(' ', $arItem['NAME'])[0] . ' ' .*/ $complectation['NAME'] ?>
                                                                    </div>

                                                                    <div class="model-complectations-card-price">
                                                                        от <?= number_format($complectation['PROPERTY_PRICE_VALUE'], 0, " ", " ").' &#8381;' ?>
                                                                    </div>
                                                                    
                                                                    <div class="model-complectations-card-engine">
                                                                        <?= mb_strtolower($complectation['PROPERTY_ENGINE_VALUE']) ?>
                                                                    </div>

                                                                    <div class="model-complectations-card-transmission">
                                                                        <?= 
                                                                            str_contains($complectation['PROPERTY_TRANSMISSION_VALUE'], 'МТ') ? 'Механика 5 ст' : 'Автомат'
                                                                        ?>
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>

                                                        <? endforeach; ?>

                                                    </div>

                                                    <div class="model-complectations-pagination"></div>

                                                    <div class="js-slider-model-complectations-prev"></div>
                                                    <div class="js-slider-model-complectations-next"></div>
                                                </div>

                                            </div>

                                        <? endif; ?>
                                        
                                    </div>
                                </div>

                            <? endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>


<? endif; ?>