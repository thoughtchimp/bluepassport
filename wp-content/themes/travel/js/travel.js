var $jq = jQuery.noConflict();
$jq(document).ready(function(){
    $jq('#es_txt_button_pg').val('SUBSCRIBE ME').addClass('btn-subscribe');
    $jq('#es_txt_name_pg').attr("placeholder",'Name');
    $jq('#es_txt_email_pg').attr("placeholder",'Email');
    $jq('.es_button').addClass("col-sm-4");
    $jq('.es_textbox').addClass("col-sm-4");
    $jq('.media-button-select').val();
});

/*========> Twitter script: <========*/
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
 
 
/*========> Facebook HTML5 script: <=========*/
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
 
/*========> Google+ script: <========*/

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();





 
 





