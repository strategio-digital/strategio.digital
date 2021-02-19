/**
 * Copyright (c) 2020 Wakers.cz
 * @author Jiří Zapletal (http://www.wakers.cz, zapletal@wakers.cz)
 */

// Google tag manager
(function (d) {
    var e = d.createElement('script');
    var h = d.getElementsByTagName('head')[0];
    e.async = true; e.src = 'https://www.googletagmanager.com/gtag/js'; e.type = 'text/javascript';
    h.appendChild(e, h);
})(document);

window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}

// Facebook Pixel
/*!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)
}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js');
*/

// HotJar
/*(function(h,o,t,j,a,r){
    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
    h._hjSettings={hjid:1726145,hjsv:6};
    a=o.getElementsByTagName('head')[0];
    r=o.createElement('script');r.async=1;
    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
    a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');*/

// Live Agent
/*(function(d, src, c) {
    var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');
    s.id='la_x2s6df8d';s.async=true;s.src=src;
    s.onload=s.onreadystatechange=function(){var rs=this.readyState;
    if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};
    t.parentElement.insertBefore(s,t.nextSibling);
})(document, 'https://wakers.ladesk.com/scripts/track.js', function(e){ LiveAgent.createButton('zz5jigtg', e);});*/

// Smart-Look
/*window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
})(document);
*/


// Smart-look init
//smartlook('init', 'd5715aa70535b23aeb84608f24d00e2988473675');

// GTM Init
gtag('js', new Date());

// Google Analytics init
gtag('config', 'G-EGGMLHX7ZE');

// Google Ads init
//gtag('config', 'AW-677388384');

// Facebook pixel init
//fbq('init', '1352171591614703');

// Facebook pixel track page-view
//fbq('track', 'PageView');
