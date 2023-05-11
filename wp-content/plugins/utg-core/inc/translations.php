<?php

add_filter( 'gettext', 'utg_core_translations', 10, 3 );

function utg_core_translations( $translated, $original, $domain ) {
	$lang = function_exists( 'qtranxf_getLanguage' ) ? qtranxf_getLanguage() : 'en';
	if ( $lang == 'ru' ) {
		if ( $domain == UTG_CORE_DOMAIN ) {
			switch ( $original ) {
                case 'Search':
                    $translated = 'Найти';
                    break;
                case 'Commercial':
                    $translated = 'Комерческая';
                    break;
                case 'Office':
                    $translated = 'Офисная';
                    break;
                case 'Living':
                    $translated = 'Жилая';
                    break;
                case 'Region':
                    $translated = 'Область';
                    break;
                case 'City':
                    $translated = 'Город';
                    break;
                case 'Launch year':
                    $translated = 'Год запуска';
                    break;
                case 'Work type':
                    $translated = 'Тип работ';
                    break;
                case 'Estate type':
                    $translated = 'Тип недивжимости';
                    break;
                case 'All years':
                    $translated = 'Все года';
                    break;
                case 'All':
                    $translated = 'Все';
                    break;
				case 'Phone':
					$translated = 'Телефон';
					break;
                case 'For renting premises and participating in this project, please contact:':
                    $translated = 'По вопросам аренды помещений и участия в данном проекте обращайтесь:';
                    break;
				case 'Mail':
					$translated = 'Почта';
					break;
				case 'Address':
					$translated = 'Адрес';
					break;
				case 'Contacts':
					$translated = 'Контакты';
					break;
				case 'Site Options':
					$translated = 'Опции сайта';
					break;
                case 'Projects Options':
                    $translated = 'Опции проекта';
                    break;
				case 'Project':
					$translated = 'Проект';
					break;
				case 'Projects':
					$translated = 'Проекты';
					break;
				case 'Team UTG':
					$translated = 'Команда UTG';
					break;
			}
		}
	}
	else if ( $lang == 'uk' ) {
        if ( $domain == UTG_CORE_DOMAIN ) {
            switch ( $original ) {
                case 'Search':
                    $translated = 'Шукати';
                    break;
                case 'Commercial':
                    $translated = 'Комерційна';
                    break;
                case 'Office':
                    $translated = 'Офісна';
                    break;
                case 'Living':
                    $translated = 'Житлова';
                    break;
                case 'Region':
                    $translated = 'Область';
                    break;
                case 'City':
                    $translated = 'Місто';
                    break;
                case 'Launch year':
                    $translated = 'Рік запуску';
                    break;
                case 'Work type':
                    $translated = 'Тип робіт';
                    break;
                case 'Estate type':
                    $translated = 'Тип нерухомості';
                    break;
                case 'All years':
                    $translated = 'Всі роки';
                    break;
                case 'All':
                    $translated = 'Всі';
                    break;
                case 'Phone':
                    $translated = 'Телефон';
                    break;
                case 'For renting premises and participating in this project, please contact:':
                    $translated = 'З питань оренди приміщень та участі у даном проєкті звертайтесь:';
                    break;
                case 'Mail':
                    $translated = 'Пошта';
                    break;
                case 'Address':
                    $translated = 'Адреса';
                    break;
                case 'Contacts':
                    $translated = 'Контакти';
                    break;
                case 'Site Options':
                    $translated = 'Опції сайту';
                    break;
                case 'Projects Options':
                    $translated = 'Опції проєкту';
                    break;
                case 'Project':
                    $translated = 'Проєкт';
                    break;
                case 'Projects':
                    $translated = 'Проєкти';
                    break;
                case 'Team UTG':
                    $translated = 'Команда UTG';
                    break;
            }
        }
    }
	return $translated;
}