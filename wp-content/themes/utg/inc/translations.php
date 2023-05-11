<?php

add_filter( 'gettext', 'utg_translations', 10, 3 );

function utg_translations( $translated, $original, $domain ) {
	$lang = function_exists( 'qtranxf_getLanguage' ) ? qtranxf_getLanguage() : 'en';
	if ( $lang == 'ru' ) {
		if ( $domain == 'utg' ) {
			switch ( $original ) {
				case 'Read More':
					$translated = 'Подробнее';
					break;
				case 'For renting premises and participating in this project, please contact:':
					$translated = 'По вопросам аренды помещений и участия в данном проекте обращайтесь:';
					break;
				case 'sq.m':
					$translated = 'кв.м';
					break;
				case 'Total Area sq.m:':
					$translated = 'Общая пл. кв.м:';
					break;
				case 'Rent Area sq.m:':
					$translated = 'Арендная пл. кв.м:';
					break;
				case 'GLA (Gross Leasable Area):':
					$translated = 'GLA (арендная площадь):';
					break;
				case 'GBA (Gross Building Area):':
					$translated = 'GBA (общая площадь):';
					break;
				case 'Launch:':
					$translated = 'Запуск:';
					break;
                case 'Status:':
                    $translated = 'Статус:';
                    break;
				case 'Participation:':
					$translated = 'Участие в проекте:';
					break;
				case 'Property type':
					$translated = 'Тип недвижимости';
					break;
				case 'Service type':
					$translated = 'Вид услуг';
					break;
				case 'Object format':
					$translated = 'Формат обьекта';
					break;
				case 'Property class':
					$translated = 'Класс недвижимости';
					break;
				case 'Number of parking spaces':
					$translated = 'Количество паркомест';
					break;
				case 'Number of stores':
					$translated = 'Количество магазинов';
					break;
                case 'project':
                    $translated = 'Проект';
                    break;
                case 'post':
                    $translated = 'Новости';
                    break;
                case 'team':
                    $translated = 'Команда';
                    break;
			}
		}
	}
    else if ( $lang == 'uk' ) {
        if ( $domain == 'utg' ) {
            switch ( $original ) {
                case 'Read More':
                    $translated = 'Детальніше';
                    break;
                case 'For renting premises and participating in this project, please contact:':
                    $translated = 'З питань оренди приміщень та участі у даном проєкті звертайтесь:';
                    break;
                case 'sq.m':
                    $translated = 'кв.м';
                    break;
                case 'Total Area sq.m:':
                    $translated = 'Загальна пл. кв.м:';
                    break;
                case 'Rent Area sq.m:':
                    $translated = 'Арендна пл. кв.м:';
                    break;
                case 'GLA (Gross Leasable Area):':
                    $translated = 'GLA (арендна площа):';
                    break;
                case 'GBA (Gross Building Area):':
                    $translated = 'GBA (загальна площа):';
                    break;
                case 'Launch:':
                    $translated = 'Запуск:';
                    break;
                case 'Status:':
                    $translated = 'Статус:';
                    break;
                case 'Participation:':
                    $translated = 'Участь у проекті:';
                    break;
                case 'Property type':
                    $translated = 'Тип нерухомості';
                    break;
                case 'Service type':
                    $translated = 'Вид послуг';
                    break;
                case 'Object format':
                    $translated = 'Формат об\'єкта';
                    break;
                case 'Property class':
                    $translated = 'Класс нерухомості';
                    break;
                case 'Number of parking spaces':
                    $translated = 'Кількість паркомісць';
                    break;
                case 'Number of stores':
                    $translated = 'Кількість магазинів';
                    break;
                case 'project':
                    $translated = 'Проєкт';
                    break;
                case 'post':
                    $translated = 'Новини';
                    break;
                case 'team':
                    $translated = 'Команда';
                    break;
            }
        }
    }

	return $translated;
}