$(document).ready(function () {
    $('.slide-stories').owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        navText:[
            `<svg xmlns="http://www.w3.org/2000/svg" width="52" height="57" viewBox="0 0 52 57" fill="none">
                <g filter="url(#filter0_dd_467_16333)">
                    <rect x="12" y="8.30811" width="24" height="24" rx="12" fill="white"/>
                    <path d="M26 16.3081L22 20.3081L26 24.3081" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_467_16333" x="-4" y="0.308105" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_467_16333"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_467_16333" result="effect2_dropShadow_467_16333"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_467_16333" result="shape"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg xmlns="http://www.w3.org/2000/svg" width="54" height="57" viewBox="0 0 54 57" fill="none">
                <g filter="url(#filter0_dd_467_16337)">
                    <rect x="40" y="32.3081" width="24" height="24" rx="12" transform="rotate(180 40 32.3081)" fill="white"/>
                    <path d="M26 24.3081L30 20.3081L26 16.3081" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_467_16337" x="0" y="0.308105" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_467_16337"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_467_16337" result="effect2_dropShadow_467_16337"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_467_16337" result="shape"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:false,
        margin:50,
        responsive:{
            0:{
                items:1,
                dots:true,
                nav:true,
            },
            600:{
                items:2,
                dots:true,
                nav:true
            },
            991:{
                items:3
            }
        }
    }).css({'opacity':1});
});
