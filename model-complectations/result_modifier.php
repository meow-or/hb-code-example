<?

    $complectations = [];

    foreach ($arResult['ITEMS'] as $arItem) 
    {
        $complectation_section_ids[] = $arItem['PROPERTIES']['COMPLECTATIONS']['VALUE'];
    }


    $q = CIBlockElement::GetList(
        Array("SORT" => "ASC"),
        Array(
                "SECTION_ID" => $complectation_section_ids, 
                "ACTIVE"=>"Y", 
                "IBLOCK_ID" => $arResult['ITEMS'][0]['PROPERTIES']['COMPLECTATIONS']['LINK_IBLOCK_ID']
            ),
        false,
        false,
        Array("ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_ENGINE", "PROPERTY_TRANSMISSION", "PROPERTY_PRICE")
    );

    while($ob = $q->GetNextElement()) 
    {
        $complectationsArr = $ob->GetFields();
        $complectations[] = $complectationsArr;
    }

    foreach ($arResult['ITEMS'] as &$arItem) 
    {
        $tmpCompl = [];

        foreach ($complectations as $el) 
        {
            if( $el['IBLOCK_SECTION_ID'] == $arItem['PROPERTIES']['COMPLECTATIONS']['VALUE']) 
            
                //$tmpCompl[ $el['IBLOCK_SECTION_ID'] ][] = $el;
                $tmpCompl[] = $el;
        }

        $arItem['COMPLECTATIONS'] = $tmpCompl;
    }

    unset($arItem);


    foreach ($arResult['ITEMS'] as &$arItem) 
    {

        $carColors = [];

        if ($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['DESCRIPTION']) {
            for ($i = 0, $iMax = count($arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['DESCRIPTION']); $i < $iMax; $i++) {

                $carColors[] = array(
                    'NAME' => trim(explode('#', $arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['DESCRIPTION'][$i])[0]),
                    'COLOR' => '#' . explode('#', $arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['DESCRIPTION'][$i])[1],
                    'IMAGE' => $arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['FILE_VALUE'][$i]["SRC"]
                );
            }
        }

        if ( count ( $carColors ) )
        {

            $svgMap = [

                [
                    '<g style="transform-origin: 41.9211px 107.399px;"><rect width="34" height="20" rx="10" transform="matrix(-0.93017 -0.367129 -0.367129 0.93017 61.4053 104.338)" fill="#CAR_COLOR#"></rect></g>',
                    '<g style="transform-origin: 83.0505px 120.073px;"><rect width="34" height="20" rx="10" transform="matrix(-0.970799 -0.239894 -0.239894 0.970799 101.953 114.443)" fill="#CAR_COLOR#"></rect></g>',
                    '<g style="transform-origin: 126.898px 129.083px;"><rect width="34" height="20" rx="10" transform="matrix(-0.98565 -0.168801 -0.168801 0.98565 145.342 122.096)" fill="#CAR_COLOR#""></rect></g>',
                    '<g style="transform-origin: 171.252px 135.451px;"><rect width="34" height="20" rx="10" transform="matrix(-0.992867 -0.119226 -0.119226 0.992867 189.323 127.549)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 215.281px 139.794px;"><rect width="34" height="20" rx="10" transform="matrix(-0.996792 -0.0800337 -0.0800337 0.996792 233.027 131.187)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 258.253px 142.481px;"><rect width="34" height="20" rx="10" transform="matrix(-0.998913 -0.0466056 -0.0466056 0.998913 275.701 133.284)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 303.136px 143.841px;"><rect width="34" height="20" rx="10" transform="matrix(-0.999881 -0.0154066 -0.0154066 0.999881 320.288 134.104)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 346.864px 143.841px;"><rect x="329.712" y="134.104" width="34" height="20" rx="10" transform="rotate(-0.88277 329.712 134.104)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 391.747px 142.481px;"><rect x="374.299" y="133.284" width="34" height="20" rx="10" transform="rotate(-2.67127 374.299 133.284)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 434.719px 139.794px;"><rect x="416.973" y="131.187" width="34" height="20" rx="10" transform="rotate(-4.5905 416.973 131.187)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 478.748px 135.451px;"><rect x="460.677" y="127.549" width="34" height="20" rx="10" transform="rotate(-6.84741 460.677 127.549)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 523.102px 129.083px;"><rect x="504.658" y="122.096" width="34" height="20" rx="10" transform="rotate(-9.71811 504.658 122.096)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 566.95px 120.073px;"><rect x="548.047" y="114.443" width="34" height="20" rx="10" transform="rotate(-13.8803 548.047 114.443)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 608.079px 107.399px;"><rect x="588.595" y="104.338" width="34" height="20" rx="10" transform="rotate(-21.5386 588.595 104.338)" fill="#CAR_COLOR#"/></g>'                          
                ],
                [
                    '<g style="transform-origin: 22.6594px 98.465px;"><rect x="32.627" y="115.484" width="34" height="20" rx="10" transform="rotate(-150.822 32.627 115.484)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 63.4536px 114.747px;"><rect x="76.8945" y="129.181" width="34" height="20" rx="10" transform="rotate(-163.425 76.8945 129.181)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 106.146px 125.228px;"><rect x="120.835" y="138.39" width="34" height="20" rx="10" transform="rotate(-168.605 120.835 138.39)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 149.514px 132.612px;"><rect x="164.938" y="144.904" width="34" height="20" rx="10" transform="rotate(-171.912 164.938 144.904)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 193.2px 137.833px;"><rect x="209.148" y="149.438" width="34" height="20" rx="10" transform="rotate(-174.424 209.148 149.438)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 237.055px 141.333px;"><rect x="253.405" y="152.363" width="34" height="20" rx="10" transform="rotate(-176.461 253.405 152.363)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 281.007px 143.346px;"><rect x="297.708" y="153.838" width="34" height="20" rx="10" transform="rotate(-178.328 297.708 153.838)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 325px 144px;"><rect x="308" y="134" width="34" height="20" rx="10" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 368.993px 143.346px;"><rect width="34" height="20" rx="10" transform="matrix(0.999574 -0.029176 -0.029176 -0.999574 352.292 153.838)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 412.945px 141.333px;"><rect width="34" height="20" rx="10" transform="matrix(0.998093 -0.0617248 -0.0617248 -0.998093 396.595 152.363)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 456.8px 137.834px;"><rect width="34" height="20" rx="10" transform="matrix(0.995268 -0.097164 -0.097164 -0.995268 440.852 149.438)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 500.486px 132.612px;"><rect width="34" height="20" rx="10" transform="matrix(0.990054 -0.140689 -0.140689 -0.990054 485.062 144.904)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 543.854px 125.228px;"><rect width="34" height="20" rx="10" transform="matrix(0.98029 -0.197565 -0.197565 -0.98029 529.165 138.39)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 586.546px 114.747px;"><rect width="34" height="20" rx="10" transform="matrix(0.958445 -0.285277 -0.285277 -0.958445 573.105 129.181)" fill="#CAR_COLOR#"/></g>',
                    '<g style="transform-origin: 627.341px 98.465px;"><rect width="34" height="20" rx="10" transform="matrix(0.873112 -0.48752 -0.48752 -0.873112 617.373 115.484)" fill="#CAR_COLOR#"/></g>',                     
                ]
            ];


            $offsetIndex = ( count( $svgMap[count($carColors) % 2] ) - count($carColors) ) / 2; 
            $svgMapSlice = array_slice( $svgMap[count($carColors) % 2], $offsetIndex, count($carColors) );

            for ($i=0; $i < count ( $svgMapSlice ); $i++) 
            { 
                $carColors[$i]['SVG_G'] = preg_replace('/#CAR_COLOR#/', $carColors[$i]["COLOR"] , $svgMapSlice[$i]);
            }

            $arItem['DISPLAY_PROPERTIES']['PHOTO_BY_COLOR']['COLORS'] =  $carColors;
        }
    }

    unset($arItem);

?>
