$(document).ready(function () {
    $('.events-slide').owlCarousel({
        autoplay:false,
        loop:false,
        nav:true,
        navText:[
            `<svg width="71" height="73" viewBox="0 0 71 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_di_2154_181780)">
                    <rect x="56" y="53.1687" width="41" height="42" rx="20.5" transform="rotate(-180 56 53.1687)" fill="white"/>
                    <path d="M37.95 27.2687L33.05 32.1687L37.95 37.0687" stroke="#323232" stroke-width="1.8375" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_di_2154_181780" x="0" y="0.168701" width="71" height="72" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2154_181780"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2154_181780" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="shape" result="effect2_innerShadow_2154_181780"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_di_2154_181782)">
                    <rect x="15" y="11.1687" width="42" height="42" rx="21" fill="white"/>
                    <path d="M33.55 37.0687L38.45 32.1687L33.55 27.2687" stroke="#323232" stroke-width="1.8375" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_di_2154_181782" x="0" y="0.168701" width="72" height="72" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2154_181782"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2154_181782" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="shape" result="effect2_innerShadow_2154_181782"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:false,
        margin:30,
        responsive:{
            0:{
                items:1,
                nav:false,
                dots:true
            },
            640:{
                items:2,
                nav:false,
                dots:true
            },
            991:{
                items:3
            },
            1200:{
                items:4
            }
        }
    }).css({'opacity':1});
});
