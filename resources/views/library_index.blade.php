<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aivet Library</title>
        <link href="{{asset('/')}}/public/backStyle/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{asset('/')}}/public/backStyle/fontawesome.min.css" rel="stylesheet" type="text/css"/>
        <style>
            :root{
                --main:#006633;
                --second:#CC3333;
                --bg:#fff;
                --content:#999;
                --font: sans-serif;
            }
            *{
                padding: 0;
                margin: 0;
                list-style-type: none;
                box-sizing: border-box;
                text-decoration: none;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            .navmenu{
                position: fixed;
                top:0;
                left: 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-direction: row;
                width: 100%;
                height: 50px;
                background: linear-gradient(180deg,var(--main),#00994d);
                box-shadow: 1px 0px 2px #333,1px 0px 8px #333;
                z-index: 100;
            }
            .logoname a{
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-direction: row;
                padding:10px;
                font-size: 16px;
                font-weight: 1000;
                font-family: var(--font);
                color:var(--bg);
            }
            .logoname a svg:nth-child(1){
                width:30px;
                /*display: none;*/
                transition: .3s;
                margin-right: 10px;
                fill:var(--bg);
            }
            .logoname a svg:nth-child(2){
                width:30px;
                display: none;
                transition: .3s;
                margin-right: 10px;
                background: var(--bg);
            }

            .navs ul{
                display: flex;
                flex-direction: row;
                justify-content: space-around;
            }
            .navs ul li{
                padding: 15px 20px;
                position: relative;
                background: linear-gradient(180deg,var(--main),#00994d);
                display: flex;
                justify-content: center;
                flex-direction: column;
                transition: .5s;
            }
            .navs ul li:hover{
                background: linear-gradient(180deg,var(--second),#f73e3e);
                border-radius: 15px;
            }

            .navs ul li a{
                font-family: var(--font);
                font-size: 17px;
                color:var(--bg);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .navs ul li ul.subul{
                visibility: hidden;
                position: absolute;
                top:50px;
                display: flex;
                flex-direction: column;
                justify-content:flex-start;
                transition: .5s;
                z-index: 0;
                height: 0;
                width: 100%;
            }
            .navs ul li:hover ul.subul{
                transition: .5s;
                visibility:visible;
                top:50px;
                transition-delay: .2s;
                height: 300px;
                overflow: auto;

            }
            ::-webkit-scrollbar{
                display: none;
            }
            .navs ul li:hover ul.subul li{
                transition: 1s;
                height: 30px;

            }
            .navs ul li ul.subul li {
                transition: .3s;
                z-index: 10;
                height: 30px;
                width: 100%;
                border-radius: 15px;
            }

            .navs ul li ul li a{
                font-size: 17px;
                transition: .2s;
            }
            .navs ul li ul.subul li:hover{

                font-size: 30px;
                height: 50px;
            }
            .navs ul li ul li:hover a{
                font-size: 30px;
            }

            .navbtn{
                padding:10px 20px;

            }
            .navbtn:hover a{
                color:#111;
                font-size: 40px;
            }
            .navbtn a{
                color:var(--bg);
                font-size: 30px;
                transition: .3s;
            }
            .banner{
                flex-direction: row;
                margin-top: 50px;
                background: #e8e8e8;
                background-size: cover;
                background-repeat: no-repeat;
                width: 100%;
                box-shadow: 1px 0px 2px #333,1px 0px 8px #333;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 50px 0;
/*                height: 70vh;*/
            }
            .banner .banner-txt{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
/*                width:40%;*/
                margin-right: 5%;
                padding: 100px 0;
                height:100%;
            }
            .banner .banner-txt h2{
                font-family: var(--font);
                color:var(--second);
                font-size: 50px;
                text-shadow:1px 1px 2px #666,1px 1px 5px #666;
                text-align: center;
                padding-bottom: 10px;
            }
            .banner .banner-txt p{
                font-family: var(--font);
                color:var(--second);
                font-size: 17px;
                text-shadow: 1px 1px 2px #666,2px 2px 5px #666;
                display: flex;
                text-align: center;
                width: 100%;
                padding:0 100px;

            }
            .banner .banner-book{
/*                width:20%;*/
                display: flex;
                justify-content: center;
                align-items: center;
                /*background:green;*/
                height:100%;
            }
            .banner .banner-book .book-div{
                background:#966;
                background-repeat: no-repeat;
                background-size: cover;
                box-shadow: 7px 4px 2px #333,7px 4px 5px #333;
                /*                border-top:2px solid #999;
                                border-left:2px solid #999;*/
                border-radius: 8px;
                width:90%;
                height: 95%;
                display: flex;
                justify-content:flex-start;
                align-items: center;
                flex-direction: column;
            }
            .banner .banner-book .book-div h2{
                margin-top: 30%;
                font-family: var(--font);
                color:var(--bg);
                text-shadow: 1px 1px 2px #666,1px 1px 5px #666; 
                font-size: 30px;

            }
            .banner .banner-book .book-div p{
                margin-top: 10px;
                font-family: var(--font);
                color:#222;
                font-weight: 1000;
                font-size: 20px;
            }

            .mainl{
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            .mainl .mainl-header h2{
                padding:20px;
                font-family: var(--font);
                color:var(--main);
                text-shadow: 1px 1px 2px #999,1px 1px 5px #999; 
                font-size: 30px;
            }
            .mainl-all{
                display: flex;
                flex-wrap: wrap;
                padding: 20px;
                width: 100%;
                justify-content:space-around;
                align-items:center;
            }
            .mainl-all .book-card{
                width:200px;
                height:300px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                margin: 10px;
            }

            .thebannerbook{
                display: flex;
                align-items:flex-start;
                background: #999;
                width:240px;
                height:360px;
                border-radius: 5px;
                box-shadow: 2px 2px 2px #333 , 2px 2px 5px #333;
                position: relative;

                perspective: 1000px;
                transition: 1s;

            }
            .thebook{
                display: flex;
                align-items:flex-start;
                background: #999;
                width:120px;
                height:180px;
                border-radius: 5px;
                box-shadow: 2px 2px 2px #333 , 2px 2px 5px #333;
                position: relative;

                perspective: 1000px;
                transition: 1s;

            }
            .thebannerbook:hover,
            .thebook:hover{
                box-shadow: inset 20px 0 50px #333 , 2px 2px 12px #999 , 2px 2px 18px #999;
                z-index: 90;
            }
            .thebannerbook:hover .bannerbook-cover,
            .thebook:hover .book-cover{
                transform-style: preserve-3d;
                transform: rotateY(-50deg);  
                box-shadow: 2px 1px 2px #999;
            }
            .thebannerbook:hover .bannerback-page,
            .thebook:hover .back-page{
                transform-style: preserve-3d;
                transform: rotateY(-30deg);
                box-shadow: inset 10px 0px 50px #999;
            }
            .thebannerbook:hover .bannerback-page1,
            .thebook:hover .back-page1{
                transform-style: preserve-3d;
                transform: rotateY(-20deg);
                box-shadow: inset 20px 0px 200px #999;
            }
            .thebannerbook:hover .bannerback-page2,
            .thebook:hover .back-page2{
                transform-style: preserve-3d;
                transform: rotateY(-10deg);
                box-shadow: inset 50px 0px 300px #888;
            }
            .bannerbook-cover ,.bannerback-page ,.bannerback-page1 ,.bannerback-page2,
            .book-cover ,.back-page ,.back-page1 ,.back-page2{
                width: 100%;
                height: 100%;
                position: absolute;
                top:0;
                left:0;
                transition: 1s;
                transform-origin:left;
                border-radius: 5px; 
                background: #EEEEDD;
            }

            .bannerbook-cover,
            .book-cover{
                z-index: 90;
                transform: rotateY(0deg);
                /*backface-visibility: hidden;*/
            }
            .bannerbook-cover img,
            .book-cover img{
                width: 100%;
                height: 100%;
                border-radius: 5px; 
            }
            .bannerback-page,
            .back-page{
                z-index: 88;
                transform: rotateY(0deg);
                /*backface-visibility: visible;*/

            }
            .bannerback-page1,
            .back-page1{
                transform: rotateY(0deg);

                z-index: 85;
            }
            .bannerback-page2,
            .back-page2{
                transform: rotateY(0deg);

                z-index: 83;

            }



            /*---------------------------------<*/
            /*---------------------------------<*/
            .thebook-txt{
                text-align: center;
            }
            .thebook-txt h3{
                margin-top: 10px;
                font-family: var(--font);
                color:var(--main);
                font-weight: 700;
                font-size: 17px;
            }
            .thebook-txt h5{
                margin-top: 5px;
                font-family: var(--font);
                color:var(--second);
                font-weight: 500;
                font-size: 17px;
            }
            .thebook-txt p{
                margin-top: 5px;
                font-family: var(--font);
                color:#222;
                font-weight: 500;
                font-size: 14px;
            }
            .footer{
                height:50px;
                background: var(--main);
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .footer p{
                color:var(--bg);
                font-weight: 1000;
                font-size: 12px;
                text-align: center;
            }

            @media only screen and (max-width:800px) {
                .banner{
                    flex-direction: column-reverse;
                }
                .banner .banner-txt{
                    padding-top: 20px;
                }
                .footer p{
                    font-weight: 700;
                    font-size: 11px;
                }
            }

        </style>


    </head>
    <body>
        <div class="navmenu">
            <div class="logoname">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 185 221.53"><title>Asset 3</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M184.5,21.49C146,21.32,117.37,0,117.37,0H67.64S39,21.32.5,21.49V32h184Z"/><path d="M23.63,56.58c-.65-2.15-1.29-4.84-1.83-7H21.7c-.54,2.15-1.08,4.9-1.67,7l-2.15,7.69h8Z"/><path d="M185,83.41V37.5H0V177.34l53.22,44.19h78.56l53-44,.18-.15Zm-34.68-40h27.87v6.89h-9.9V79.72h-8.23V50.34h-9.74Zm-26.25,0h22.38v6.73H132.3v7.53h13.34v6.67H132.3V73h14.9v6.73H124.07Zm-28.3,0,4.41,15.33c1.24,4.3,2.37,8.45,3.23,13h.16c.91-4.36,2-8.66,3.28-12.8l4.63-15.5h8.72L108,79.72H98.41L86.79,43.46Zm-39.65,0H84v6.89H74.1V79.72H65.86V50.34H56.13Zm-12.59,0h8.23V79.72H43.54Zm-26.84,0H27.45L38.7,79.72H29.88l-2.8-9.31H16.69l-2.58,9.31H5.61ZM131.42,220.53H53.58L1,176.87V84.41H184v92.46Z"/><path d="M148.43,136.33l-1.52-3.83h-6.32l-16.23,3.66a23.23,23.23,0,0,1,3.44,12.06C127.79,163.58,112.2,176,93,176s-34.83-12.44-34.83-27.79a23.23,23.23,0,0,1,3.44-12.06L45.34,132.5H39l-1.53,3.81a39.09,39.09,0,0,0-1.33,3.89l-19.74-1.77v24.71l20-1.79a42,42,0,0,0,7.15,13.59L27.76,185l21.9,17.47,12.58-12.59a67,67,0,0,0,17,5.7L77,211.49h31l-2.22-15.76a67.09,67.09,0,0,0,17.31-5.57l12.27,12.29L157.24,185l-15.17-9.65a42,42,0,0,0,7.43-13.9l19.06,1.71V138.43l-18.85,1.69C149.35,138.85,148.92,137.58,148.43,136.33Z"/><polygon points="80.78 163.44 80.78 151.34 78.43 151.34 75.22 152.82 75.69 154.95 78 153.85 78.04 153.85 78.04 163.44 80.78 163.44"/><path d="M89.27,160.65a4.86,4.86,0,0,1-2.38.75,6.53,6.53,0,0,1-1.23,0v2.22a9.82,9.82,0,0,0,1.29,0,6.57,6.57,0,0,0,6.74-7.27c0-2.83-1.47-5.22-4.58-5.22a4.4,4.4,0,0,0-4.56,4.36,3.65,3.65,0,0,0,3.78,3.78,3.2,3.2,0,0,0,2.42-.87l.05,0A3.75,3.75,0,0,1,89.27,160.65Zm1.38-4.19a1.79,1.79,0,0,1-1.56.8,1.73,1.73,0,0,1-1.71-1.94c0-1.27.69-2.12,1.66-2.12,1.29,0,1.77,1.27,1.77,2.55A1.33,1.33,0,0,1,90.65,156.46Z"/><path d="M99.61,160.65a4.86,4.86,0,0,1-2.38.75,6.52,6.52,0,0,1-1.23,0v2.22a9.81,9.81,0,0,0,1.29,0,6.57,6.57,0,0,0,6.74-7.27c0-2.83-1.47-5.22-4.58-5.22a4.4,4.4,0,0,0-4.56,4.36,3.65,3.65,0,0,0,3.78,3.78,3.2,3.2,0,0,0,2.42-.87l.06,0A3.76,3.76,0,0,1,99.61,160.65Zm1.38-4.19a1.78,1.78,0,0,1-1.56.8,1.73,1.73,0,0,1-1.71-1.94c0-1.27.69-2.12,1.66-2.12,1.29,0,1.77,1.27,1.77,2.55A1.33,1.33,0,0,1,101,156.46Z"/><path d="M108.69,161.43a7,7,0,0,1-2.74-.6l-.5,2.12a7.7,7.7,0,0,0,3.37.69c3.26,0,5.2-2,5.2-4.25a3.45,3.45,0,0,0-1.47-3,5.54,5.54,0,0,0-3.19-.87,5.27,5.27,0,0,0-.78,0l.26-1.86h4.7v-2.33h-6.67l-.8,6.35a10.49,10.49,0,0,1,1.64-.11c2.42,0,3.41.76,3.41,2S109.86,161.43,108.69,161.43Z"/><polygon points="163.4 117.39 154.93 107.92 92.51 125.14 30.09 107.92 21.62 117.39 92.51 135.47 163.4 117.39"/><polygon points="92.5 140.15 17.04 121.23 14.81 123.12 92.5 142.05 170.21 123.12 167.99 121.23 92.5 140.15"/><polygon points="166.64 120.28 164.43 118.39 92.5 137.32 20.59 118.39 18.38 120.28 92.5 139.21 166.64 120.28"/><path d="M90.93,118.91h2.59C99.8,114.7,95,105,94.63,104c-1.11-3.24,1.11-6.81,1.11-6.81a17.61,17.61,0,0,0-9.24,9.08C83.54,113.07,90.93,118.91,90.93,118.91Z"/><polygon points="103.07 91.8 97.04 89.61 96.29 95.58 98.78 96.49 103.07 91.8"/><polygon points="104.03 111.72 109.38 115.48 111.88 110.2 105.07 109.54 104.03 111.72"/><polygon points="81.26 101.04 75.91 97.28 73.42 102.57 80.23 103.23 81.26 101.04"/><polygon points="88.95 95.59 88.2 89.62 82.17 91.81 86.46 96.5 88.95 95.59"/><polygon points="104.99 103.23 111.81 102.57 109.31 97.29 103.96 101.05 104.99 103.23"/><polygon points="75.93 115.61 81.28 111.85 80.24 109.66 73.43 110.32 75.93 115.61"/><polygon points="84.03 98.06 82.18 95.1 79.59 97.37 82.96 98.99 84.03 98.06"/><polygon points="101.12 97.97 102.19 98.91 105.55 97.29 102.97 95.02 101.12 97.97"/><polygon points="105.46 105.84 105.46 107.17 109.15 108.11 109.15 104.9 105.46 105.84"/><polygon points="76.03 104.92 76.03 108.12 79.72 107.18 79.72 105.86 76.03 104.92"/><polygon points="93.44 95.19 94.51 91.95 90.86 91.95 91.93 95.19 93.44 95.19"/></g></g></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 185 221.52"><defs><style>.cls-1,.cls-5,.cls-6{fill:red;}.cls-2{fill:#063;}.cls-3{fill:none;stroke:#000;stroke-width:0.97px;}.cls-3,.cls-5,.cls-6{stroke-miterlimit:10;}.cls-4{font-size:18.63px;font-family:MyriadPro-Bold, Myriad Pro;font-weight:700;}.cls-5,.cls-6{stroke:#966;}.cls-5{stroke-width:0.16px;}.cls-6{stroke-width:0.09px;}</style></defs><title>Asset 4</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M21.8,49.59h-.11c-.54,2.15-1.08,4.9-1.67,7l-2.15,7.69h8l-2.26-7.69C23,54.43,22.34,51.74,21.8,49.59Z"/><path class="cls-1" d="M0,37.5v46H185v-46ZM29.87,79.72l-2.8-9.31H16.69l-2.58,9.31H5.61L16.69,43.46H27.45L38.7,79.72Zm21.89,0H43.54V43.46h8.23ZM84,50.34h-9.9V79.72H65.86V50.34H56.12V43.46H84Zm24,29.38H98.41L86.79,43.46h9l4.41,15.33c1.24,4.3,2.37,8.45,3.23,13h.16c.91-4.36,2-8.66,3.28-12.8l4.63-15.5h8.72Zm39.22,0H124.07V43.46h22.38v6.73H132.3v7.53h13.34v6.67H132.3V73h14.9Zm31-29.38h-9.9V79.72h-8.23V50.34h-9.74V43.46h27.87Z"/><path class="cls-2" d="M184.5,21.49V32H.5V21.49C39,21.32,67.63,0,67.63,0h49.73S146,21.32,184.5,21.49Z"/><polygon class="cls-3" points="184.5 116.95 184.5 83.91 0.5 83.91 0.5 116.95 0.5 116.95 0.5 177.1 53.4 221.03 131.6 221.03 184.5 177.1 184.5 116.95 184.5 116.95"/><path d="M168.57,163.14V138.43l-18.85,1.69c-.37-1.27-.8-2.55-1.29-3.8l-1.52-3.83h-6.32l-16.23,3.66a23.23,23.23,0,0,1,3.44,12.06C127.79,163.58,112.2,176,93,176s-34.83-12.44-34.83-27.79a23.23,23.23,0,0,1,3.44-12.06L45.34,132.5H39l-1.53,3.81a39.1,39.1,0,0,0-1.33,3.89l-19.74-1.77v24.71l20-1.79a42,42,0,0,0,7.15,13.59L27.76,185l21.9,17.47,12.58-12.59a67,67,0,0,0,17,5.7L77,211.49h31l-2.22-15.76a67.09,67.09,0,0,0,17.31-5.57l12.27,12.29L157.24,185l-15.17-9.65a42,42,0,0,0,7.43-13.9Z"/><text class="cls-4" transform="translate(73.64 163.45)">1995</text><polygon points="163.4 117.39 154.93 107.92 92.51 125.14 30.08 107.92 21.62 117.39 92.51 135.47 163.4 117.39"/><polygon points="167.98 121.23 92.5 140.15 17.03 121.23 14.81 123.12 92.5 142.05 170.2 123.12 167.98 121.23"/><polygon points="166.64 120.28 164.43 118.39 92.5 137.32 20.59 118.39 18.38 120.28 92.5 139.21 166.64 120.28"/><path class="cls-1" d="M90.93,118.91s-7.39-5.84-4.44-12.64a17.61,17.61,0,0,1,9.24-9.08s-2.22,3.57-1.11,6.81c.34,1,5.18,10.7-1.11,14.91Z"/><polygon class="cls-5" points="103.06 91.8 98.78 96.49 96.29 95.58 97.04 89.61 103.06 91.8"/><polygon class="cls-5" points="111.88 110.2 109.38 115.48 104.03 111.72 105.07 109.54 111.88 110.2"/><polygon class="cls-5" points="75.91 97.28 81.26 101.04 80.23 103.23 73.42 102.57 75.91 97.28"/><polygon class="cls-5" points="88.2 89.62 88.95 95.59 86.46 96.5 82.17 91.81 88.2 89.62"/><polygon class="cls-5" points="109.31 97.29 111.8 102.57 104.99 103.23 103.96 101.05 109.31 97.29"/><polygon class="cls-5" points="73.43 110.32 80.24 109.66 81.27 111.85 75.92 115.61 73.43 110.32"/><polygon class="cls-6" points="82.17 95.1 84.03 98.06 82.95 98.99 79.59 97.37 82.17 95.1"/><polygon class="cls-6" points="102.97 95.02 105.55 97.29 102.19 98.91 101.11 97.97 102.97 95.02"/><polygon class="cls-6" points="109.14 104.9 109.14 108.11 105.46 107.17 105.46 105.84 109.14 104.9"/><polygon class="cls-6" points="76.03 104.92 79.71 105.86 79.71 107.18 76.03 108.12 76.03 104.92"/><polygon class="cls-6" points="90.85 91.95 94.51 91.95 93.44 95.19 91.92 95.19 90.85 91.95"/></g></g></svg>
                    <h2>AITVET Library</h2>
                </a>
            </div>
            <!--            <div class="navs">
                            <ul>
                                <li><a href="#">Authors</a></li>
                                <li>
                                    <a href="#">Categorys<i class="fas fa-angle-down"></i></a>
                                    <ul class="subul">
                                        <li><a href="#">first</a></li>
                                        <li><a href="#">first</a></li>
                                        <li><a href="#">first</a></li>
                                        <li><a href="#">first</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">About</a></li>
                            </ul>
                        </div>-->
            <!--            <div class="navbtn">
                            <a href="#"><i class="fas fa-bars"></i></a>
                        </div>-->
        </div>
        <div class="banner">
            <div class="banner-txt">
                <h2>{{$banner->bookname}}</h2>
                <p>{{$banner->bookinfo}}</p>
            </div>
            <div class="banner-book">
                <div class="thebannerbook">
                    <div class="bannerbook-cover">
                        <img src="{{$banner->bookimage}}" alt=""/>
                    </div>
                    <div class="bannerback-page"></div>
                    <div class="bannerback-page1"></div>
                    <div class="bannerback-page2"></div>
                </div>
            </div>

        </div>
        <div class="mainl">
            <div class="mainl-header">
                <h2>All Books</h2>
            </div>
            <div class="mainl-all">
                @foreach($books as $v_books)
                <div class="book-card">
                    <div class="thebook">
                        <div class="book-cover">
                            <img src="{{$v_books->bookimage}}" alt=""/>
                        </div>
                        <div class="back-page"></div>
                        <div class="back-page1"></div>
                        <div class="back-page2"></div>
                    </div>
                    <div class="thebook-txt">
                        <h3>{{$v_books->bookname}}</h3>
                        <h5>{{$v_books->authorname}}</h5>
                        <p>{{$v_books->available}} Available</p>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        <!--        <div class="authors">
                    <div class="authors-header">
                        <h2>All authors</h2>
                    </div>
                    <div class="all-author">
                        
                    </div>
                </div>-->
        <div class="footer"><p>© 2021 Copyright, Design & Developed By <span style="color:#ff6767;">MD Rakibul Hasan</span></p></div>
        <script src="{{asset('/')}}/public/backStyle/all.min.js" type="text/javascript"></script>
    </body>
</html>