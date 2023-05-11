"use strict";
jQuery(document).ready(function () {
    slider();
    magnific();
    // header_search();
    teamTabDesktop();
    itemWithSubmenu();
    projectAutoFilter();
    regularTab();
    accordion();
    archiveSubTabs();
    desktopSearchFieldTrigger();
    menuLayer();
    langTrigger();
    mobileMenuListTrigger();
    mobileMenuTrigger();
    mobileFilterPopUpTrigger();
    teamTabMobile();
    animation();
    counter();
});

function slider() {
    jQuery('.slick-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>'
    });

    jQuery('.section-projects .archive-project.type-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        centerMode: true,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    arrows: true,
                },

            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                    variableWidth: true,
                    padding: '15px'
                }
            }
        ]
    }).on('init reInit afterChange', function(event, slick, currentSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.section-projects .gallery-counter').find('.slide-current').html(i);
    });


    jQuery('.section-awards .archive-project.type-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: false,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                    variableWidth: true,
                    padding: '15px'
                }
            }
        ]
    }).on('init reInit afterChange', function(event, slick, currentSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.section-awards .gallery-counter').find('.slide-current').html(i);
    });

    jQuery('.project-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                },

            },
        ],
        appendArrows: jQuery('.project-main .gallery-arrows')
    }).on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.gallery-nav .gallery-counter').find('.slide-current').html(i);
    });

    jQuery('.item-actual .archive-actual-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
    });

    jQuery('.schemes-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            }
        ]
    }).on('init reInit afterChange', function(event, slick, currentSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.scheme-nav .gallery-counter').find('.slide-current').html(i);
    });

    jQuery('.gallery-section .gallery-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '10.5%',
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="gallery-slider slick-prev"></button>',
        nextArrow: '<button type="button" class="gallery-slider slick-next"></button>',
        appendArrows: jQuery('.gallery-section .gallery-nav'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    centerPadding: '5%',
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: false,
                    variableWidth: true,
                    padding: '15px'
                }
            }
        ]
    }).on('init reInit afterChange', function(event, slick, currentSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.gallery-section .gallery-counter').find('.slide-current').html(i);
    });

    jQuery('.brochures-slider-section .brochures-slider').slick({
        infinite: true,
        autoplay: false,
        autoplaySpeed: 4500,
        pauseOnHover:false,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button type="button" class="brochures-slider slick-prev"></button>',
        nextArrow: '<button type="button" class="brochures-slider slick-next"></button>',
        appendArrows: jQuery('.brochures-slider-section .gallery-nav'),
        responsive: [
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: false,
                    variableWidth: true,
                    padding: '15px'
                }
            }
        ]
    }).on('init reInit afterChange', function(event, slick, currentSlide){
        let i = (currentSlide ? currentSlide : 0) + 1;
        jQuery('.brochures-slider-section .gallery-counter').find('.slide-current').html(i);
    });


}

function magnific() {
    jQuery('.open-popup-link').magnificPopup({
        type: 'inline',
        midClick: true
    });
    jQuery('.magnific-gallery a').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            arrowMarkup: '<button type="button" class="slick-arrow slick-%dir%"><i class="fas fa-chevron-%dir%"></i></button>'
        },
        closeOnBgClick: false,
        closeBtnInside: false
    });
    jQuery('.open-team-post').magnificPopup({
        type:'ajax',
        mainClass: 'team-post-popup',
        fixedContentPos: true,
        fixedBgPos: true,
        closeBtnInside: true,
        closeOnBgClick: false,
        midClick: true,
    });
    jQuery('.open-award-post').magnificPopup({
        type:'ajax',
        mainClass: 'award-post-popup',
        fixedContentPos: true,
        fixedBgPos: true,
        closeBtnInside: true,
        closeOnBgClick: false,
        midClick: true,
    });

}

function header_search() {
    let header = jQuery('.site-header');
    header.find('.search-icon').on('click', function () {
        header.find('.header-search').slideToggle('fast');
    });
}

//Tabs in team page
const teamTabDesktop = () => {
    try{
        let tabs = document.querySelectorAll('.department_filter .filter_el');
        let startTab = document.querySelectorAll('.department_filter .filter_el span')[0].className;
        let posts = document.querySelectorAll('.team-page-item');

        //Start page
        tabs[0].classList.add('active');
        posts.forEach(post => {
            post.querySelector('article').classList.contains(startTab) ? post.classList.add('visible'): post.classList.remove('visible');
        });
        try{
            Array.from(document.querySelectorAll('.team-page-item.visible')).shift().classList.add('first');
        }catch (e) {
            console.log('empty start tab')
        }

        //Click tab
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(tab => tab.classList.remove('active'));
                tab.classList.add('active');
                posts.forEach(post => {
                    post.classList.remove('first');
                    if (post.querySelector('article').classList.contains(tab.querySelector('span').className)) {
                        post.classList.add('visible');
                    } else {
                        post.classList.remove('visible');
                    }
                });
                try{
                    Array.from(document.querySelectorAll('.team-page-item.visible')).shift().classList.add('first');
                }catch (e) {
                    console.log('empty tab')
                }
            })
        })
    }catch(e){
        console.log('team desktop tabs is absent');
    }
};

const teamTabMobile = () => {
    try {
        let posts = Array.from(document.querySelectorAll('.team-page-item'));
        let selector = document.querySelector('.department_filter');
        let selectedOptionClass = document.querySelector('.department_filter option:checked').className;

        posts.forEach(post => {
            if (post.querySelector('article').classList.contains(selectedOptionClass)) {
                post.classList.add('visible');
            } else {
                post.classList.remove('visible');
            }
        });


        selector.addEventListener('change', () => {
            selectedOptionClass = document.querySelector('.department_filter option:checked').className;

            posts.forEach(post => {
                if (post.querySelector('article').classList.contains(selectedOptionClass)) {
                    post.classList.add('visible');
                } else {
                    post.classList.remove('visible');
                }
            });


        });

        let selectInTab = document.querySelectorAll('.department_filter .option')[0].className;
    }catch (e) {
        console.log('team mobile tabs is absent');
    }
};

//utg-autofilter
const projectAutoFilter = () => {
    try{
        let form = document.querySelector('.utg-filter-form');
        let formActivation = form.querySelectorAll('input, select');
        let submitButton = form.querySelector('button[type=submit]');
        if(document.querySelector('body:not(.term-developed)')){
            formActivation.forEach(el => el.addEventListener('input', projectFilter));
        }else{
            submitButton.addEventListener('click',event =>{
                event.preventDefault();
                projectFilter();
            })
        }
    }catch (e) {
        console.log(`page hasn't auto selected fields filtering`)
    }
};

//utg-filter
const projectFilter = () => {
    let form = document.querySelector('.utg-filter-form');
    let formFields = Array.from(form.querySelectorAll('input:not([type=radio]), select, input[type=radio]:checked'));
    let querySearch = formFields.map(el => `${el.name}=${el.value}`).join('&');
    let pathName = document.location.pathname;
    let path = !RegExp('/page/').test(pathName)? pathName : pathName.split('/page/').shift();
    document.location.href = `${path}?${querySearch}`;
};

// Stop click on menu item with sub menu
const itemWithSubmenu = () => {
    document.querySelectorAll('ul li.menu-item-has-children > a').forEach(el => {
        el.addEventListener('click', event => event.preventDefault())
    })
};

// Developer circle tab
const regularTab = () => {
    try{
        let tabSelector = document.querySelectorAll('.tab-selector'),
            tabBlock = document.querySelectorAll('.tab-content');

        tabSelector.forEach((el,index) => {
            el.addEventListener('click', () => {
                tabSelector.forEach(tabEl => tabEl.classList.remove('active'));
                tabBlock.forEach(contentEl => contentEl.classList.remove('active'));
                el.classList.add('active');
                tabBlock[index].classList.add('active');
            })
        })
    }catch (e) {
        console.log('circle tab is out on page or destroyed');
    }


};

//Accordion
const accordion = () => {
    try{
        let accordionStartBtn = document.querySelectorAll('.accordion-selector');
        let accordionBlockContent = document.querySelectorAll('.accordion-content');

        accordionStartBtn.forEach(btn => {
            console.log('test')
            btn.addEventListener('click', () => {
                btn.classList.toggle('active')
                btn.nextElementSibling.classList.toggle('active');
            })
        })

    }catch (e) {
        console.log('accordion is out on page or destroyed');
    }
}

// Archive page subcategory tabs
const archiveSubTabs = () =>{
    try{
        let pageBodyClass = document.querySelector('body').className;
        let tabList = document.querySelectorAll('.tab-selector a');
        tabList.forEach(el => {
            new RegExp(el.className).test(pageBodyClass)? el.classList.add('active'):el.classList.remove('active')
        })
    } catch (e) {
        console.log('archiveSubTabs func is destroyed')
    }
};

//Desktop search field trigger
const desktopSearchFieldTrigger = () => {
    try{
        let searchForm = document.querySelector('.search-wrapper');
        let loopIcon = searchForm.querySelector('.search-icon');
        let closeIcon = searchForm.querySelector('.close-icon');
        let formField = searchForm.querySelector('.search-form');
        let headerField = document.querySelector('.site-header .inner');

        if(window.innerWidth > 1000){
            [loopIcon,closeIcon].forEach(el => {
                el.addEventListener('click', () => {
                    loopIcon.classList.toggle('active');
                    closeIcon.classList.toggle('active');
                    formField.classList.toggle('active');
                })
            })
        }
        else if(window.innerWidth < 1000){
            [loopIcon,closeIcon].forEach(el => {
                el.addEventListener('click', () => {
                    closeIcon.classList.toggle('active');
                    formField.classList.toggle('active');
                    headerField.classList.toggle('active');
                })
            })
        }

    }catch (e) {
        console.log('function desktopSearchFieldTrigger is destroyed');
    }

};

//Menu layer
const menuLayer = () => {
    try{
        let activeMenuItems = document.querySelectorAll('.site-header .menu-item-has-children');
        let layer = document.querySelector('.menu-wrapper');

        if(window.innerWidth > 600){
                activeMenuItems.forEach(item => {
                item.addEventListener('mouseover', () => layer.classList.add('active'));
                item.addEventListener('mouseout', () => layer.classList.remove('active'));
            })
        }
    }catch (e) {
        console.log('function menuLayer is destroyed');
    }
};

//Language trigger
const langTrigger = () => {
    try {
        let langblock = document.querySelectorAll('.language-selector');

        langblock.forEach(langBlockEl => {

            let activeLangFieldLang = langBlockEl.querySelector('.language-selector .language-current .lang');
            let activeLangField = langBlockEl.querySelector('.language-current');
            let activeLang = langBlockEl.querySelector('.language-selector .language-chooser .active a span');
            let langList = langBlockEl.querySelector('.language-selector .language-chooser');


            activeLangFieldLang.innerText = activeLang.innerText;
            activeLangField.addEventListener('click',() => {
                langList.classList.toggle('active');
                activeLangFieldLang.classList.toggle('active');
            })
        })
    }catch (e) {
        console.log('function langTrigger is destroyed');
    }
};

//Mobile menu list trigger
const mobileMenuListTrigger = () => {
    try{
        let mobileMenuParentList = document.querySelectorAll('.mobile-menu .menu-item-has-children');

        mobileMenuParentList.forEach(listEl => {
            listEl.addEventListener('click', () => {
                if(listEl.classList.contains('active')){
                    listEl.classList.remove('active');
                }
                else{
                    mobileMenuParentList.forEach(el => el.classList.remove('active'));
                    listEl.classList.add('active');
                }
            })
        })
    }catch (e) {
        console.log('function mobileMenuListTrigger is destroyed');
    }
};

//Mobile menu trigger
const mobileMenuTrigger = () =>{
    try{
        let mobileMenuTriggerBtn = document.querySelectorAll('.mobile-menu-trigger');
        let mobileMenu = document.querySelector('.mobile-menu');
        let body = document.querySelector('body');
        let layer = document.querySelector('.menu-wrapper');

        mobileMenuTriggerBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                mobileMenu.classList.toggle('active');
                body.classList.toggle('fixed');
                layer.classList.toggle('active');
            });
        })

    }catch (e) {
        console.log('function mobileMenuTrigger is destroyed');
    }
};

//Mobile pop up filter trigger on developed projects

const mobileFilterPopUpTrigger = () => {
    let filterPopUpTriggerBtns = document.querySelectorAll('.header-wrapper .filter-trigger');
    let filterPopUp = document.querySelector('.header-wrapper .mobile-filter-popup');

    try{
        filterPopUpTriggerBtns.forEach(btn => {
            btn.addEventListener('click', () => filterPopUp.classList.toggle('active'))
        })
    }catch (e) {
        console.log('function mobileFilterPopUpTrigger is destroyed');
    }
};

//Check in window

const animation = () => {
    window.addEventListener('scroll', () => {
        let animatedEl = document.querySelectorAll('.pseudoAnimateLeft, .pseudoAnimateRight, .pseudoAnimateRightRight, .pseudoAnimateDouble, .pseudoAnimateBottom, .pseudoAnimateOpacity, .animateBlock');
        try {
            animatedEl.forEach(el => {
                (el.getBoundingClientRect().top + 250) < window.innerHeight ? el.classList.remove('pseudoAnimateLeft', 'pseudoAnimateRight', 'pseudoAnimateRightRight', 'pseudoAnimateDouble' ,'pseudoAnimateBottom', 'pseudoAnimateOpacity', 'animateBlock') : null;
            })
        } catch (e) {
            console.log('function animation is destroyed or absent');
        }
    })
};
//Live counter
const counter = () => {
    window.addEventListener('scroll', () => {
        let spincrement = document.querySelector('.section-home .counter-wrap.spin-start');
        try {
            if ((spincrement.getBoundingClientRect().top + 250) < window.innerHeight) {
                jQuery('.spincrement').spincrement({
                    duration: 1000,
                    decimalPoint: '.',
                    thousandSeparator: ''
                })
                spincrement.classList.remove('spin-start');
            }
        } catch (e) {
            console.log('function counter is destroyed or absent');
        }
    })
};