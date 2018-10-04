define({
  "name": "OBS documentation",
  "version": "0.0.0",
  "description": "API services for OBS application<style>pre,pre.language-html:before{border-radius:0}.sidenav{background-color:#fff}.container1>div,.container2>div,.container3>div,.sidenav>li.nav-header.active>a{background-color:#4b8a83}pre{background-color:rgba(0,0,0,.8);margin-top:0}a{color:#4b8a83}.nav-list>.active>a,.nav-list>.active>a:focus,.nav-list>.active>a:hover{background-color:#4b8a83}a:focus,a:hover{color:#346d65}.btn-group>.btn:last-child,.btn-group>.dropdown-toggle{border-radius:0!important;background-image:none}.btn,.dropdown-menu,.input-append .add-on:last-child,.input-append .btn-group:last-child>.dropdown-toggle,.input-append .btn:last-child,.input-append .uneditable-input,.input-append input,.input-append select,.input-prepend .add-on:first-child,.input-prepend .btn:first-child,.input-prepend input,.label,.nav-tabs>li>a,code,pre{border-radius:0}.btn-group.open .dropdown-toggle,.btn.active,.btn:active{box-shadow:inset 0 0 2px rgba(0,0,0,.1)}.btn,input[type=text],textarea{box-shadow:none}.dropdown-menu>li>a:focus,.dropdown-menu>li>a:hover,.dropdown-submenu:focus>a,.dropdown-submenu:hover>a{background:#4b8a83}.btn{background:#f5f5f5;border-color:#e6e6e6}.btn:focus,.btn:hover{background-image:none}input[type=text]:focus,textarea:focus{border-color:#9d9898;outline:0;box-shadow:none}.btn-group>.btn:first-child{border-bottom-left-radius:0;border-top-left-radius:0}.sidenav.nav-list,body{overflow-y:scroll;margin-bottom:10px}.sidenav.nav-list::-webkit-scrollbar-track,body::-webkit-scrollbar-track{-webkit-box-shadow:inset 0 0 1px rgba(0,0,0,.2);background-color:#F5F5F5}.sidenav.nav-list::-webkit-scrollbar,body::-webkit-scrollbar{width:6px;background-color:#F5F5F5}.sidenav.nav-list::-webkit-scrollbar-thumb,body::-webkit-scrollbar-thumb{background-color:rgba(0,0,0,.2);border-radius:4px}code,pre{font-family:sans-serif}pre.language-html.prettyprint{background-color:rgba(0,0,0,.75)}pre.language-html.prettyprint:before{position:absolute;top:-1px;left:-1px;padding:12px 20px;height:19px}pre.language-html.prettyprint code{display:inline-block;margin-left:80px}.del,.del p,.ins,.ins p{color:#000}.btn-group>.btn+.dropdown-toggle{background-color:#736e6e}pre.language-html[data-type='delete']:before{background-color: hsl(0, 81%, 46%);}.sidenav li {display: none;}.sidenav>li.nav-header{display: block;}</style><script type='application/javascript'>$(document).ready(function(){$('body').on('click','.sidenav li.nav-header',function(e){e.preventDefault();var data_group = $(this).attr('data-group');if($(this).attr('ex')=='ex'){$(this).removeAttr('ex');$('.sidenav>li[data-group=\"'+data_group+'\"]').not('.nav-header').slideUp('fast');return false;}else{$('.nav-header').removeAttr('ex');$(this).attr('ex','ex');$('.sidenav > li').not('.nav-header').slideUp('fast');$('.sidenav>li[data-group=\"'+data_group+'\"]').not('.nav-header').not('.hide').slideDown('fast');return false;}});setInterval(function(){var already_opened=$('.sidenav>li.active').not('.nav-header').attr('data-group');if($('.sidenav>li.nav-header[data-group=\"'+already_opened+'\"]').attr('ex')!='ex'){$('.sidenav>li.nav-header[data-group=\"'+already_opened+'\"]').trigger('click');}},1000);});</script>",
  "title": "OBS API Documentation",
  "url": "http://52.203.78.55:9980/",
  "sampleUrl": "http://52.203.78.55:9980/",
  "order": [
    "GetXcSRF",
    "UserLogin",
    "RefreshAccessToken"
  ],
  "template": {
    "withCompare": true,
    "withGenerator": false
  },
  "defaultVersion": "0.0.0",
  "apidoc": "0.3.0",
  "generator": {
    "name": "apidoc",
    "time": "2018-07-02T09:21:30.337Z",
    "url": "http://apidocjs.com",
    "version": "0.17.6"
  }
});
