<?php
/**
 *
 * Partial Name: footer-content
 *
 */
if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
}
$social_networks = get_field("social_networks", "options");
?>
        <style>
            @layer figreset,figoverridable,reset,theme,base,figutils,components,utilities;@layer figreset {
                :root {
                    --100dvw: 100vw;
                    --100dvh: 100vh
                }

                @supports (width: 100dvw) {
                    :root {
                        --100dvw:100dvw;
                        --100dvh: 100dvh
                    }
                }
            }

            @layer figreset {
      
                *,*:before,*:after {
                    box-sizing: border-box
                }

                html {
                    -webkit-text-size-adjust: 100%;
                    -webkit-tap-highlight-color: transparent;
                    -webkit-font-smoothing: antialiased;
                    width: 100%
                }

                html: has(#responsive-scaler) {
                    scrollbar-width:none;
                    -ms-overflow-style: none
                }

                body {
                    margin: 0;
                    width: 100%
                }

                body: has([data-page-overflowx='hidden']) {
                    overflow-x:hidden
                }

                body: has([data-page-overflowx='auto']) {
                    overflow-x:auto
                }

                #container {
                    width: 100%
                }

                a {
                    color: inherit;
                    text-decoration: none
                }

                button {
                    border: none;
                    background: none;
                    padding: 0
                }

                h1,h2,h3,h4,h5,h6,p {
                    font-size: inherit;
                    font-weight: inherit
                }

                blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre {
                    margin: 0
                }

                ol,ul,menu {
                    list-style: none;
                    margin: 0;
                    padding-inline-start:1.5em}

                #container .textContents {
                    color: #ffffff00
                }

                #container .textContents.hangingList > ul,#container .textContents.hangingList > ol {
                    margin-left: -1.5em
                }

                #container .textContents >:not(:last-child) {
                    margin-bottom: var(--paragraph-spacing)
                }

                #container .textContents >:is(ul,ol): not(:last-child):has(+:is(ul,ol)) {
                    margin-bottom:var(--list-spacing)
                }

                #container .textContents li {
                    margin-bottom: var(--list-spacing)
                }

                #container .textContents >:is(ol,ul): is(:last-child,:has(+ div)) > li:last-child,#container .textContents >:is(ol,ul):is(:last-child,:has(+ div)) >:is(ol,ul):last-child > li:last-child,#container .textContents >:is(ol,ul):is(:last-child,:has(+ div)) >:is(ol,ul):last-child >:is(ol,ul):last-child > li:last-child,#container .textContents >:is(ol,ul):is(:last-child,:has(+ div)) >:is(ol,ul):last-child >:is(ol,ul):last-child >:is(ol,ul):last-child > li:last-child,#container .textContents >:is(ol,ul):is(:last-child,:has(+ div)) >:is(ol,ul):last-child >:is(ol,ul):last-child >:is(ol,ul):last-child >:is(ol,ul):last-child > li:last-child {
                    margin-bottom:0
                }

                #container .textClip {
                    background-clip: text;
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent !important
                }

                #container .textClip > * {
                    -webkit-text-fill-color: initial
                }

                #container .embed {
                    border: none
                }

                #container .marquee-container {
                    overflow-x: hidden;
                    display: flex;
                    flex-direction: row;
                    position: relative;
                    width: var(--width);
                    transform: var(--transform);
                    &:hover div {
                        animation-play-state: var(--pause-on-hover)
                    }

                    &:active div {
                        animation-play-state: var(--pause-on-click)
                    }
                }

                #container .marquee {
                    flex: 0 0 auto;
                    min-width: var(--min-width);
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    animation: scroll var(--duration) linear var(--delay) var(--iteration-count);
                    animation-delay: var(--delay);
                    animation-direction: var(--direction);
                    animation-timing-function: var(--timing-function)
                }

                @keyframes scroll {
                    0% {
                        transform: translateX(0%)
                    }

                    100% {
                        transform: translateX(-100%)
                    }
                }

                #container .marquee-initial-child-container {
                    flex: 0 0 auto;
                    display: flex;
                    min-width: auto;
                    flex-direction: row;
                    align-items: center
                }

                #container .marquee-child {
                    transform: var(--transform)
                }

                .code-behavior-wrapper > * {
                    width: 100%;
                    height: 100%
                }
            }

            @layer figutils {
                .textContents ul > li: before {
                    content:'\2022';
                    margin-left: -1.5em;
                    display: inline-block;
                    text-align: center;
                    width: 1.5em;
                    -webkit-background-clip: var(--list-marker-background-clip);
                    -webkit-text-fill-color: var(--list-marker-text-fill-color);
                    background-clip: var(--list-marker-background-clip);
                    background-image: var(--list-marker-background-image);
                    color: var(--list-marker-color);
                    font-size: var(--list-marker-font-size);
                    line-height: var(--list-marker-line-height);
                    mix-blend-mode: var(--list-marker-mix-blend-mode);
                    vertical-align: var(--list-marker-vertical-align)
                }

                .textContents ol > li: :marker {
                    color:var(--list-marker-color);
                    font-size: var(--list-marker-font-size);
                    line-height: var(--list-marker-line-height);
                    vertical-align: var(--list-marker-vertical-align)
                }

                .textContents .adjustLetterSpacing:after {
                    content: '';
                    margin-left: calc(var(--letter-spacing) * -1)
                }
            }
        </style>
        <style id="font-faces-1pb4q7">
            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2.woff2");
                font-display: block
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-english.woff2");
                font-display: block;
                unicode-range: U+0000-00A0,U+00A2-00A9,U+00AC-00AE,U+00B0-00B7,U+00B9-00BA,U+00BC-00BE,U+00D7,U+00F7,U+2000-206F,U+2074,U+20AC,U+2122,U+2190-21BB,U+2212,U+2215,U+F8FF,U+FEFF,U+FFFD
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-rest-latin.woff2");
                font-display: block;
                unicode-range: U+00A1,U+00AA-00AB,U+00AF,U+00B8,U+00BB,U+00BF-00D6,U+00D8-00F6,U+00F8-00FF,U+0131,U+0152-0153,U+02B0-02FF
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-a.woff2");
                font-display: block;
                unicode-range: U+0100-0130,U+0132-0151,U+0154-017F
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-b.woff2");
                font-display: block;
                unicode-range: U+0180-024F
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-additional.woff2");
                font-display: block;
                unicode-range: U+1E00-1EFF
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-rest.woff2");
                font-display: block;
                unicode-range: U+0259,U+0300-03C0,U+2070-2073,U+2075-20AB,U+20AD-2121,U+2123-218F,U+21BC-2211,U+2213-2214,U+2216-F8FE,U+FB01-FB02
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2.woff2");
                font-display: block
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-english.woff2");
                font-display: block;
                unicode-range: U+0000-00A0,U+00A2-00A9,U+00AC-00AE,U+00B0-00B7,U+00B9-00BA,U+00BC-00BE,U+00D7,U+00F7,U+2000-206F,U+2074,U+20AC,U+2122,U+2190-21BB,U+2212,U+2215,U+F8FF,U+FEFF,U+FFFD
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-rest-latin.woff2");
                font-display: block;
                unicode-range: U+00A1,U+00AA-00AB,U+00AF,U+00B8,U+00BB,U+00BF-00D6,U+00D8-00F6,U+00F8-00FF,U+0131,U+0152-0153,U+02B0-02FF
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-a.woff2");
                font-display: block;
                unicode-range: U+0100-0130,U+0132-0151,U+0154-017F
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-b.woff2");
                font-display: block;
                unicode-range: U+0180-024F
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-latin-extended-additional.woff2");
                font-display: block;
                unicode-range: U+1E00-1EFF
            }

            @font-face {
                
                font-style: normal;
                src: url("_woff/v1/Urbanist_wght__2/Urbanist_wght__2-rest.woff2");
                font-display: block;
                unicode-range: U+0259,U+0300-03C0,U+2070-2073,U+2075-20AB,U+20AD-2121,U+2123-218F,U+21BC-2211,U+2213-2214,U+2216-F8FE,U+FB01-FB02
            }
        </style>
        <style id="breakpoint-css">
            @media (width < 1280px) {
                [data-breakpoint-id="node-0_4"] {
                    display: none !important
                }
            }

            @media (width >= 1280px) {
                [data-breakpoint-id="node-0_6"] {
                    display: none !important
                }
            }
        </style>
        <style id="body-background-color">
            @media (max-width: 1279px) {
                body:has([data-breakpoint-id="node-0_6"]) {
                    background-color: #FFF
                }
            }

            @media (min-width: 1280px) {
                body:has([data-breakpoint-id="node-0_4"]) {
                    background-color: #FFF
                }
            }
        </style>
        <style id="ssr-css">
            #container .css-vh2lqg {
                width: var(--viewport-width-scaled);
                min-height: var(--viewport-height-scaled);
                height: 100%;
                top: 0px;
            }

            #container .css-tzn6qh {
                display: block;
                position: absolute;
            }

            #container .css-6gkcj1 {
                transform-origin: top left;
                --max-layout-width: 2048px;
                --min-layout-width: 320px;
                --max-font-size: 288px;
                --min-font-size: 6px;
                --viewport-width-scaled: calc(var(--100dvw) / var(--viewport-scale));
                --viewport-height-scaled: calc(var(--100dvh) / var(--viewport-scale));
                --content-width-scaled: calc(var(--content-width-unscaled) / var(--viewport-scale));
                --content-margin-x-scaled: max(calc((var(--viewport-width) - var(--max-layout-width)) / var(--viewport-scale) / 2), 0px);
            }

            #container .css-ld0hsi {
                display: block;
                position: relative;
            }

            #container .css-j6ldtg {
                min-width: var(--content-min-width);
                width: 100%;
                height: var(--content-min-height);
            }

            #container .css-ys9dmc {
                --content-width: calc(var(--content-width-scaled, 100%) - (var(--content-margin-x-scaled, 0px) * 2));
                --content-margin: 0 var(--content-margin-x-scaled, 0);
                --content-min-width: calc(max(var(--viewport-width-scaled, 100%), 375px) - (var(--content-margin-x-scaled, 0px) * 2));
                --content-min-height: max(var(--viewport-height-scaled, var(--100dvh)), 58rem);
                overflow: clip;
            }

            #container .css-16wy77 {
                width: auto;
                left: 0;
                right: 0;
                top: auto;
                bottom: 0;
            }

            #container .css-trglf0 {
                position: absolute;
            }

            #container .css-vd6a0u {
                background-color: #F5F8FA;
            }

            #container .css-rt1aze {
                border-radius: inherit;
                position: relative;
            }

            #container .css-j9f0op {
                width: 100%;
                height: 100%;
            }

            #container .css-x92lyl {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 90px;
                position: relative;
            }

            #container .css-7js8wp {
                align-content: stretch;
                overflow: visible;
            }

            #container .css-v27th6 {
                width: 100%;
            }

            #container .css-uaaaod {
                position: relative;
                flex-shrink: 0;
                align-self: stretch;
            }

            #container .css-bpd33r {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 31px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-ck97wh {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                gap: 32px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-g3eimm {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                gap: 8px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-5knerd {
                position: relative;
                flex-shrink: 0;
            }

            #container .css-n12bdu {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 11.258623123168945px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-ybmo5z {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 6.103286147117615px;
                position: relative;
                padding: 4.882628917694092px;
            }

            #container .css-gtyprt {
                width: 120.23473709821701px;
                height: 24.41314458847046px;
            }

            #container .css-wc1msa {
                position: relative;
                flex-shrink: 0;
                display: block;
            }

            #container .css-roiesn {
                position: absolute;
                display: block;
            }

            #container .css-wixxpz {
                inset: 0;
            }

            #container .css-gs60ek {
                overflow: visible;
            }

            #container .css-9j6u1t {
                width: 100%;
                height: 100%;
                max-width: none;
            }

            #container .css-8zr56v {
                display: block;
            }

            #container .css-i5hbuo {
                width: 268px;
            }

            #container .css-a3m5wj {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-2ljd5r {
                width: 33.455230712890625px;
                height: 33.455230712890625px;
            }

            #container .css-8kkpf5 {
                display: block;
                position: relative;
                border-radius: inherit;
            }

            #container .css-ardmi {
                width: auto;
                height: auto;
                inset: 0;
            }

            #container .css-1ogtb2 {
                width: auto;
                height: auto;
                inset: 25%;
            }

            #container .css-7ckcc6 {
                width: auto;
                height: auto;
                left: 24.062499403953552%;
                right: 24.06250536441803%;
                top: 24.062499403953552%;
                bottom: 24.06250536441803%;
            }

            #container .css-y6gq72 {
                width: auto;
                height: auto;
                left: 25%;
                right: 25%;
                top: 32.499998807907104%;
                bottom: 32.499998807907104%;
            }

            #container .css-86sg77 {
                width: 33.51377487182617px;
                height: 33.523643493652344px;
            }

            #container .css-bkqry0 {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-tr5aoa {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 16px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-hv01ud {
                position: relative;
                flex-shrink: 0;
                flex: 1 0 0;
            }

            #container .css-5dba7r {
                min-width: 1px;
                min-height: 1px;
            }

            #container .css-lges1h {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-vplhby {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 10px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-myl2ny {
                position: relative;
                flex-shrink: 0;
                flex: 1 0 0;
                display: block;
            }

            #container .css-9wg4zi {
                
                word-break: break-word;
                font-weight: 600;
                font-size: 0px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
            }

            #container .css-qc1st9 {
                font-variation-settings: normal;
                color: #1A1727;
                text-decoration : none;
                --paragraph-spacing: 0px;
                --list-spacing: 0px;
                --letter-spacing: 0.10000000149011612px;
            }
            
            .css-color-gray {
                font-variation-settings: normal;
                color: #5D5C62;
                text-decoration : none;
                --paragraph-spacing: 0px;
                --list-spacing: 0px;
                --letter-spacing: 0.10000000149011612px;
            }

            #container .css-ar07fa {
                white-space: pre-wrap;
                line-height: 1.5;
                font-size: 15px;
                
                word-break: break-word;
                font-weight: 600;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-g9n9cb {
                font-variation-settings: normal;
                cursor: pointer;
            }

            #container .css-59rdls {
                width: min-content;
                min-width: 100%;
            }

            #container .css-1x9ayl {
                
                word-break: break-word;
                font-weight: 400;
                font-size: 13px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
            }

            #container .css-3hwh7f {
                font-variation-settings: normal;
                color: #5D5C62;
                --paragraph-spacing: 0px;
                --list-spacing: 0px;
                --letter-spacing: 0.10000000149011612px;
            }

            #container .css-ydwgaq {
                white-space: pre-wrap;
                line-height: 0.5;
            }

            #container .css-8ul899 {
                border-radius: inherit;
                position: relative;
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            #container .css-sutng4 {
                padding-top: 0px;
                padding-bottom: 0px;
                padding-left: 0px;
                padding-right: 24px;
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                gap: 10px;
                position: relative;
            }

            #container .css-vkpzlc {
                position: relative;
                flex-shrink: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            #container .css-u0y8se {
                white-space: nowrap;
                
                word-break: break-word;
                font-weight: 600;
                font-size: 0px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
            }

            #container .css-az5ltz {
                white-space: pre;
                line-height: 1.5;
                font-size: 13px;
                
                word-break: break-word;
                font-weight: 600;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-6jeswk {
                font-variation-settings: normal;
                color: #1A1727;
                cursor: pointer;
            }

            #container .css-i5gtd1 {
                width: 306px;
            }

            #container .css-fokp20 {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 21px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-qpvddb {
                
                word-break: break-word;
                font-weight: 400;
                font-size: 0px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
                text-decoration: none;
            }

            #container .css-mzqxot {
                white-space: pre-wrap;
                line-height: 1.5;
                font-size: 13px;
                
                word-break: break-word;
                font-weight: 400;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-gpop2m {
                font-variation-settings: normal;
                color: #5D5C62;
                cursor: pointer;
            }
            #footer-wrapper {
                background-color: #f5f8fa;
            }
            
            #container .css-8vmj48 {
                --content-margin: 0 var(--content-margin-x-scaled, 0);
                --content-min-height: 47rem;
                overflow: clip;
                background-color: #f5f8fa;
            }
            #container .css-sa9thz {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 90px;
                position: relative;
            }

            #container .css-l1xxg7 {
                position: relative;
                flex-shrink: 0;
                flex: 1 0 0;
                align-self: stretch;
            }

            #container .css-4sgc {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: flex-start;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-m4mih0 {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-start;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-x7q7ad {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                gap: 7.878458023071289px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-kujjrk {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 11.08757495880127px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-vfwpqw {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 6.010560989379883px;
                position: relative;
                padding: 4.808448791503906px;
            }

            #container .css-opu8dy {
                width: 118.40805149078369px;
                height: 24.04224395751953px;
            }

            #container .css-d034xb {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                gap: 15.9806547164917px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-b0oug5 {
                width: 33.590450286865234px;
                height: 33.590450286865234px;
            }

            #container .css-qnxlx7 {
                width: 33.649234771728516px;
                height: 33.65913772583008px;
            }

            #container .css-j0or7i {
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 16px;
                position: relative;
                border-radius: inherit;
                padding: 0px;
            }

            #container .css-hnt0es {
                white-space: pre-wrap;
                line-height: 1.5;
                font-size: 15px;
                
                word-break: break-word;
                font-weight: 600;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-dnsydh {
                white-space: nowrap;
                
                word-break: break-word;
                font-weight: 400;
                font-size: 15px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
            }

            #container .css-evv1mn {
                white-space: pre;
                line-height: 0.5;
            }

            #container .css-i5gp16 {
                width: 361px;
            }

            #container .css-islyrh {
                box-sizing: border-box;
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: flex-start;
                position: relative;
                border-radius: inherit;
                padding: 0px;
                margin-top : 2rem;
            }

            #container .css-42csuh {
                white-space: pre;
                line-height: 1.5;
                font-size: 15px;
                
                word-break: break-word;
                font-weight: 600;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-i5eubj {
                width: 630px;
            }

            #container .css-owgos1 {
                white-space: pre-wrap;
                line-height: 1.5;
                font-size: 15px;
                
                word-break: break-word;
                font-weight: 400;
                letter-spacing: 0.10000000149011612px;
            }

            #container .css-3pu501 {
                white-space: nowrap;
                
                word-break: break-word;
                font-weight: 400;
                font-size: 0px;
                letter-spacing: 0.10000000149011612px;
                text-align: left;
                line-height: 0;
                text-decoration: none;
            }

            #container .css-ebyb8 {
                white-space: pre;
                line-height: 1.5;
                font-size: 15px;
                
                word-break: break-word;
                font-weight: 400;
                letter-spacing: 0.10000000149011612px;
            }
            .css-vd6a0u  {
                width: 100% !important;
            }
            a:hover {
                color: #6150bd;
            }
        </style>
        <div id="container" class="container">
            <div data-page-overflowx="hidden" data-breakpoint-id="node-0_6" data-breakpoint="true" data-width="375" data-height="1080" class="css-ld0hsi css-j6ldtg css-ys9dmc">
                <div class="css-16wy77 css-trglf0 css-vd6a0u">
                    <div class="css-rt1aze css-j9f0op">
                        <div class="css-x92lyl css-7js8wp css-v27th6">
                            <div class="css-uaaaod">
                                <div class="css-bpd33r css-7js8wp css-v27th6">
                                    <div class="css-uaaaod">
                                        <div class="css-ck97wh css-7js8wp css-v27th6">
                                            <div class="css-uaaaod">
                                                <div class="css-g3eimm css-7js8wp css-v27th6">
                                                    <div class="css-5knerd">
                                                        <div class="css-n12bdu css-7js8wp">
                                                            <div class="css-5knerd">
                                                                <div class="css-rt1aze css-j9f0op">
                                                                    <div class="css-ybmo5z css-7js8wp">
                                                                        <div class="css-gtyprt css-wc1msa" data-isimage="true">
                                                                            <div class="css-roiesn css-wixxpz css-gs60ek">
                                                                                <img src="https://cdn.neivor.com/cdn/mexico/static/neivor-rent/logo/neivor-rent-logo.svg" alt="" class="css-9j6u1t css-8zr56v"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-i5hbuo css-5knerd">
                                                <div class="css-a3m5wj css-7js8wp css-i5hbuo">
                                            <div class="css-d034xb css-7js8wp">
                                                  <?php if (
                                                      $social_networks
                                                  ): ?>
                                                  <?php foreach (
                                                      $social_networks
                                                      as $item
                                                  ): ?>
                                                    <div class="css-b0oug5 css-5knerd">
                                                        <div class="css-8kkpf5 css-gs60ek css-b0oug5">
                                                            <div class="css-ardmi css-roiesn" data-isimage="true">
                                                                <div class="css-roiesn css-wixxpz css-gs60ek">
                                                                  <a style="color:#6150BD" href="<?= $item[
                                                                      "url"
                                                                  ] ?>" target="_blank">
                                                                    <?= $item[
                                                                        "fontawesome_icon"
                                                                    ] ?>
                                                                  </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                  <?php endif; ?>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-uaaaod">
                                        <div class="css-bkqry0 css-7js8wp css-v27th6">
                                            <div class="css-uaaaod">
                                                <div class="css-tr5aoa css-7js8wp css-v27th6">
                                                    <div class="css-hv01ud css-5dba7r">
                                                        <div class="css-lges1h css-7js8wp css-v27th6">
                                                            <div class="css-uaaaod">
                                                                <div class="css-vplhby css-7js8wp css-v27th6">
                                                                    <div class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                        <p class="css-8zr56v css-ar07fa css-g9n9cb adjustLetterSpacing">Soluciones</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/administradores-web/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Administradores / Comité</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-condo-desarrolladores/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Desarrolladores</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-retail/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Preventas y Enganches</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-residenciales/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Residenciales</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-oficinas-bodegas-y-lotes/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Oficinas, bodegas y locales</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-mixtas/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Mixtas</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-multifamily/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Multifamily</p>
                                                                </a>
                                                            </div>

                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/historias-de-exito/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Casos de éxito con Neivor</p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="css-hv01ud css-5dba7r">
                                                        <div class="css-lges1h css-7js8wp css-v27th6">
                                                            <div class="css-uaaaod">
                                                                <div class="css-vplhby css-7js8wp css-v27th6">
                                                                    <div class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                        <p class="css-8zr56v css-ar07fa css-g9n9cb  adjustLetterSpacing">Servicios Financieros</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicos-financieros-depositos-referenciados/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Depósito referenciado</p>
                                                                </a>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-domiciliacion/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Domiciliacion</p>
                                                                </a>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-cobranza-con-tarjeta-de-debito-y-credito/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Pagos T. débito y crédito</p>
                                                                </a>
                                                            </div>
                                                               <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-terminal-virtual/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Terminal Virtual y liga de pagos</p>
                                                                </a>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-cobranza-100/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Cobranza al 100%</p>
                                                                </a>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-gnp-hogar/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Seguros de áreas comunes</p>
                                                                </a>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-gnp-mi-condominio/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Seguros hogar</p>
                                                                </a>
                                                            </div>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-uaaaod">
                                                <div class="css-tr5aoa css-7js8wp css-v27th6">
                                                    <div class="css-hv01ud css-5dba7r">
                                                        <div class="css-lges1h css-7js8wp css-v27th6">
                                                            <div class="css-uaaaod">
                                                                <div class="css-vplhby css-7js8wp css-v27th6">
                                                                    <div class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                        <p class="css-8zr56v css-ar07fa css-g9n9cb  adjustLetterSpacing">Recursos</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" target="_blank" href="https://blog.neivor.com/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Blog</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/neivor-radar-condominal/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Evalua tu condominio</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/plantilla-checklist-mantenimiento-edificios/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Checklist mantenimiento</p>
                                                                </a>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="css-hv01ud css-5dba7r">
                                                        <div class="css-lges1h css-7js8wp css-v27th6">
                                                            <div class="css-uaaaod">
                                                                <div class="css-vplhby css-7js8wp css-v27th6">
                                                                    <div class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                        <p class="css-8zr56v css-ar07fa css-g9n9cb  adjustLetterSpacing">Empresa</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" target="_blank" href="https://www.neivor.com/historias-de-exito/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Historias de Éxito</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/sala-de-prensa/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Sala de prensa</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/sobre-nosotros-2/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Sobre Nosotros</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/distrito-neivor/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Distrito Neivor 2025</p>
                                                                </a>
                                                            </div> 
                                                            <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/agenda-una-demo-asesoria/">
                                                                    <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Contáctanos</p>
                                                                </a>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-5knerd">
                                        <div class="css-lges1h css-7js8wp">
                                            <div class="css-5knerd">
                                                <div class="css-8ul899 css-j9f0op">
                                                    <div class="css-sutng4 css-7js8wp">
                                                        <div class="textContents css-vkpzlc css-u0y8se css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                            <a href="https://cdn.neivor.com/cdn/mexico/static/docs/terminos_y_condiciones_politica_de_privacidad.pdf" style="text-decoration: none;">
                                                                <p class="css-8zr56v css-az5ltz css-6jeswk adjustLetterSpacing">Política de privacidad</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-5knerd">
                                                <div class="css-8ul899 css-j9f0op">
                                                    <div class="css-sutng4 css-7js8wp">
                                                        <div class="textContents css-vkpzlc css-u0y8se css-qc1st9" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                            <a href="https://cdn.neivor.com/cdn/mexico/static/docs/terminos_y_condiciones_politica_de_privacidad.pdf" style="text-decoration: none;">
                                                                <p class="css-8zr56v css-az5ltz css-6jeswk adjustLetterSpacing">Terminos y condiciones</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-i5gtd1 css-5knerd">
                                        <div class="css-fokp20 css-7js8wp css-i5gtd1">
                                            <div class="textContents css-wc1msa css-59rdls css-qpvddb css-3hwh7f" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                <p class="css-8zr56v css-mzqxot css-gpop2m  adjustLetterSpacing"><?= get_field(
                                                    "copyright",
                                                    "option"
                                                ) ?></p>
                                            </div>
                                            <div class="textContents css-wc1msa css-59rdls css-qpvddb css-3hwh7f" role="link" tabindex="0" data-paragraph-spacing="0px" data-list-spacing="0px">
                                            <p class="css-8zr56v css-mzqxot css-gpop2m  adjustLetterSpacing"><?= get_field(
                                                "address",
                                                "option"
                                            ) ?></p>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-page-overflowx="hidden" data-breakpoint-id="node-0_4" data-breakpoint="true" data-width="1280" data-height="1080" class="css-ld0hsi css-j6ldtg css-8vmj48">
                <div class="css-g1qjki css-trglf0 css-vd6a0u">
                    <div class="css-rt1aze css-j9f0op">
                        <div class="css-sa9thz css-7js8wp css-j9f0op">
                            <div class="css-l1xxg7 css-5dba7r">
                                <div class="css-4sgc css-7js8wp css-j9f0op">
                                    <div class="css-uaaaod" style="padding:40px 0px">
                                        <div class="css-m4mih0 css-7js8wp css-v27th6">
                                            <div class="css-5knerd">
                                                <div class="css-x7q7ad css-7js8wp">
                                                    <div class="css-5knerd">
                                                        <div class="css-kujjrk css-7js8wp">
                                                            <div class="css-5knerd">
                                                                <div class="css-rt1aze css-j9f0op">
                                                                    <div class="css-vfwpqw css-7js8wp">
                                                                        <div class="css-opu8dy css-wc1msa" data-isimage="true">
                                                                            <div class="css-roiesn css-wixxpz css-gs60ek">
                                                                                <img src="https://cdn.neivor.com/cdn/mexico/static/neivor-rent/logo/neivor-rent-logo.svg" alt="Neivor logo" class="logo-footer">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-5knerd">
                                                <div class="css-d034xb css-7js8wp">
                                                  <?php if (
                                                      $social_networks
                                                  ): ?>
                                                  <?php foreach (
                                                      $social_networks
                                                      as $item
                                                  ): ?>
                                                    <div class="css-b0oug5 css-5knerd">
                                                        <div class="css-8kkpf5 css-gs60ek css-b0oug5">
                                                            <div class="css-ardmi css-roiesn" data-isimage="true">
                                                                <div class="css-roiesn css-wixxpz css-gs60ek">
                                                                  <a style="color:#6150BD" href="<?= $item[
                                                                      "url"
                                                                  ] ?>" target="_blank">
                                                                    <?= $item[
                                                                        "fontawesome_icon"
                                                                    ] ?>
                                                                  </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                  <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-uaaaod">
                                        <div class="css-m4mih0 css-7js8wp css-v27th6">
                                            <div class="css-hv01ud css-5dba7r">
                                                <div class="css-j0or7i css-7js8wp css-v27th6">
                                                    <div class="css-uaaaod">
                                                        <div class="css-vplhby css-7js8wp css-v27th6">
                                                            <a class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9">
                                                                <p class="css-8zr56v css-hnt0es css-6jeswk  adjustLetterSpacing">Soluciones</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/administradores-web/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Administradores / Comité</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-condo-desarrolladores/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Desarrolladores</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-retail/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Preventas y Enganches</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-residenciales/">    
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Residenciales</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-oficinas-bodegas-y-lotes/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Oficinas, bodegas y locales</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-mixtas/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Mixtas</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/mercados-rentas-multifamily/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Multifamily</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/historias-de-exito/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Casos de éxito con Neivor</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="css-hv01ud css-5dba7r">
                                                <div class="css-j0or7i css-7js8wp css-v27th6">
                                                    <div class="css-uaaaod">
                                                        <div class="css-vplhby css-7js8wp css-v27th6">
                                                            <a class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9">
                                                                <p class="css-8zr56v css-hnt0es css-6jeswk  adjustLetterSpacing">Servicios Financieros</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicos-financieros-depositos-referenciados/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Depósito referenciado</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-domiciliacion/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Domiciliacion</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-cobranza-con-tarjeta-de-debito-y-credito/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Pagos T. débito y crédito</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-terminal-virtual/">    
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Terminal Virtual y liga de pagos</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-cobranza-100/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Cobranza al 100%</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-gnp-hogar/">
                                                            <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Seguros de áreas comunes</p>
                                                        </a>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/servicios-financieros-gnp-mi-condominio/">
                                                            <p class="css-8zr56v css-evv1mn adjustLetterSpacing">Seguros hogar</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>                             
                                            <div class="css-hv01ud css-5dba7r">
                                                <div class="css-j0or7i css-7js8wp css-v27th6">
                                                    <div class="css-uaaaod">
                                                        <div class="css-vplhby css-7js8wp css-v27th6">
                                                            <a class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" href="https://neivor.com/software-administracion-alquileres/" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <p class="css-8zr56v css-hnt0es css-6jeswk  adjustLetterSpacing">Recursos</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" target="_blank" href="https://blog.neivor.com/">
                                                            <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Blog</p>
                                                        </a>
                                                    </div> 
                                                    <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/neivor-radar-condominal/">
                                                            <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Evalua tu condominio</p>
                                                        </a>
                                                    </div> 
                                                    <div class="textContents css-wc1msa css-59rdls css-1x9ayl css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <a class="textContents css-myl2ny css-5dba7r css-color-gray" href="https://www.neivor.com/plantilla-checklist-mantenimiento-edificios/">
                                                            <p class="css-8zr56v css-ydwgaq adjustLetterSpacing">Checklist mantenimiento</p>
                                                        </a>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="css-hv01ud css-5dba7r">
                                                <div class="css-j0or7i css-7js8wp css-v27th6">
                                                    <div class="css-uaaaod">
                                                        <div class="css-vplhby css-7js8wp css-v27th6">
                                                            <a class="textContents css-myl2ny css-5dba7r css-9wg4zi css-qc1st9" href="https://neivor.com/software-administracion-alquileres/" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                                <p class="css-8zr56v css-hnt0es css-6jeswk  adjustLetterSpacing">Empresa</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Nosotros</p>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Sala de prensa</p>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Eventos</p>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Contáctanos</p>
                                                    </div>
                                                    <div class="textContents css-wc1msa css-dnsydh css-3hwh7f" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                        <p class="css-8zr56v css-evv1mn  adjustLetterSpacing">Trabaja con nosotros</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-i5gp16 css-5knerd">
                                        <div class="css-islyrh css-7js8wp css-i5gp16">
                                            <div class="css-5knerd">
                                                <div class="css-8ul899 css-j9f0op">
                                                    <div class="css-sutng4 css-7js8wp">
                                                        <a class="textContents css-vkpzlc css-u0y8se css-qc1st9" href="https://cdn.neivor.com/cdn/mexico/static/docs/terminos_y_condiciones_politica_de_privacidad.pdf" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                            <p class="css-8zr56v css-42csuh css-6jeswk  adjustLetterSpacing">Política de privacidad</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="css-5knerd">
                                                <div class="css-8ul899 css-j9f0op">
                                                    <div class="css-sutng4 css-7js8wp">
                                                        <a class="textContents css-vkpzlc css-u0y8se css-qc1st9" href="https://cdn.neivor.com/cdn/mexico/static/docs/terminos_y_condiciones_politica_de_privacidad.pdf" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                            <p class="css-8zr56v css-42csuh css-6jeswk  adjustLetterSpacing">Terminos y condiciones</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-uaaaod">
                                        <div class="css-m4mih0 css-7js8wp css-v27th6">
                                            <a class="textContents css-i5eubj css-wc1msa css-qpvddb css-3hwh7f" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                <p class="css-8zr56v css-mzqxot css-gpop2m  adjustLetterSpacing"><?= get_field(
                                                    "address",
                                                    "option"
                                                ) ?></p>                                         
                                            </a>
                                            <a class="textContents css-wc1msa css-3pu501 css-3hwh7f" target="_blank" data-paragraph-spacing="0px" data-list-spacing="0px">
                                                <p class="css-8zr56v css-ebyb8 css-gpop2m  adjustLetterSpacing"><?= get_field(
                                                    "copyright",
                                                    "option"
                                                ) ?></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/20854675.js"></script>
<!-- End of HubSpot Embed Code -->
