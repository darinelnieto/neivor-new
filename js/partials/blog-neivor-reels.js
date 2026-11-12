$(()=>{
    $('.blog-neivor-reels-partial-2ad27e .reels-slide').owlCarousel({
        autoplay:false,
        loop:false,
        nav:true,
        navText:[
            `<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12V12" fill="#2C2F30"/>
            </svg>`,
            `<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.6 6L0 1.4L1.4 0L7.4 6L1.4 12L0 10.6L4.6 6V6" fill="#2C2F30"/>
            </svg>`
        ],
        dots:false,
        margin:24,
        responsive:{
            0:{
                items:1,
                dots:true
            },
            640:{
                items:2,
                dots:true
            },
            991:{
                items:4
            },
            1200:{
                items:5
            }
        }
    }).css({'opacity':1});
})