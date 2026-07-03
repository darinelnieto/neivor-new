$(()=>{
    var items = $('.related-posts .related-post-item');
    var loop = false;
    if(items.length > 3){
        loop = true;
    }
    $('.related-posts').owlCarousel({
        autoplay: loop,
        loop: loop,
        margin: 40,
        nav: false,
        navText: [
            `<svg width="45" height="56" viewBox="0 0 45 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_dd_548_11588)">
                <rect x="5" y="8" width="24" height="24" rx="12" fill="white" fill-opacity="0.5"/>
                <path d="M19 16L15 20L19 24" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                <filter id="filter0_dd_548_11588" x="-11" y="0" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="8"/>
                <feGaussianBlur stdDeviation="8"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_548_11588"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset/>
                <feGaussianBlur stdDeviation="2"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                <feBlend mode="normal" in2="effect1_dropShadow_548_11588" result="effect2_dropShadow_548_11588"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_548_11588" result="shape"/>
                </filter>
                </defs>
            </svg>`,
            `<svg width="45" height="56" viewBox="0 0 45 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_dd_548_11592)">
                <rect x="40" y="32" width="24" height="24" rx="12" transform="rotate(180 40 32)" fill="white" fill-opacity="0.5"/>
                <path d="M26 24L30 20L26 16" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                <filter id="filter0_dd_548_11592" x="0" y="0" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="8"/>
                <feGaussianBlur stdDeviation="8"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_548_11592"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset/>
                <feGaussianBlur stdDeviation="2"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                <feBlend mode="normal" in2="effect1_dropShadow_548_11592" result="effect2_dropShadow_548_11592"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_548_11592" result="shape"/>
                </filter>
                </defs>
            </svg>`
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
                nav: true,
                dots: true
            },
            600: {
                items: 2,
                nav: true,
                dots: true
            },
            1000: {
                items: 3
            }
        }
    });
})