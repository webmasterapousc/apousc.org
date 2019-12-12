/* jQuery Plugins */

/*
 * In-Field Label jQuery Plugin, http://github.com/davist11/In-Field-Labels-jQuery-Plugin
 * (c) 2009 Doug Neiner, Dual licensed under the MIT and GPL licenses: http://docs.jquery.com/License
 * @version 0.1 
 */
;(function($){$.InFieldLabels=function(label,field,options){var base=this;base.$label=$(label);base.$field=$(field);base.$label.data("InFieldLabels",base);base.showing=true;base.init=function(){base.options=$.extend({},$.InFieldLabels.defaultOptions,options);base.$label.css('position','absolute');base.$label.css('margin-left','4px');var fieldPosition=base.$field.position();base.$label.css({'left':fieldPosition.left,'top':fieldPosition.top}).addClass(base.options.labelClass);if(base.$field.val()!==""){base.$label.hide();base.showing=false}
base.$field.focus(function(){base.fadeOnFocus()}).blur(function(){base.checkForEmpty(true)}).bind('keydown.infieldlabel',function(e){base.hideOnChange(e)}).change(function(e){base.checkForEmpty()}).bind('onPropertyChange',function(){base.checkForEmpty()})};base.fadeOnFocus=function(){if(base.showing){base.setOpacity(base.options.fadeOpacity)}};base.setOpacity=function(opacity){base.$label.stop().animate({opacity:opacity},base.options.fadeDuration);base.showing=(opacity>0.0)};base.checkForEmpty=function(blur){if(base.$field.val()===""){base.prepForShow();base.setOpacity(blur?1.0:base.options.fadeOpacity)}else{base.setOpacity(0.0)}};base.prepForShow=function(e){if(!base.showing){base.$label.css({opacity:0.0}).show();base.$field.bind('keydown.infieldlabel',function(e){base.hideOnChange(e)})}};base.hideOnChange=function(e){if((e.keyCode===16)||(e.keyCode===9)){return}
if(base.showing){base.$label.hide();base.showing=false}
base.$field.unbind('keydown.infieldlabel')};base.init()};$.InFieldLabels.defaultOptions={fadeOpacity:0.5,fadeDuration:300,labelClass:'infield'};$.fn.inFieldLabels=function(options){return this.each(function(){var for_attr=$(this).attr('for');if(!for_attr){return}
var $field=$("input#"+for_attr+"[type='text'],"+"input#"+for_attr+"[type='password'],"+"textarea#"+for_attr);if($field.length===0){return}(new $.InFieldLabels(this,$field[0],options))})}})(jQuery);$(function(){$("form.inField label").inFieldLabels();});

/* Email Link Obfuscator, http://www.php-ease.com/functions/email_link.html */
function decode64(input){var keyStr="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";var output="";var chr1,chr2,chr3,enc1,enc2,enc3,enc4="";var i=0;input=input.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(i<input.length){enc1=keyStr.indexOf(input.charAt(i++));enc2=keyStr.indexOf(input.charAt(i++));enc3=keyStr.indexOf(input.charAt(i++));enc4=keyStr.indexOf(input.charAt(i++));chr1=(enc1<<2)|(enc2>>4);chr2=((enc2&15)<<4)|(enc3>>2);chr3=((enc3&3)<<6)|enc4;output=output+String.fromCharCode(chr1);if(enc3!=64)output=output+String.fromCharCode(chr2);if(enc4!=64)output=output+String.fromCharCode(chr3);chr1=chr2=chr3=enc1=enc2=enc3=enc4="";}
return unescape(output);}
(function($){$.fn.nospam=function(){return this.each(function(){if($(this).attr("class").search("show_email")>=0){$(this).text(decode64($(this).text()));}
var href=$(this).attr("href");var title=$(this).attr("title");$(this).hover(function(){$(this).attr({"href":decode64(title),"title":"Click to send email"});},function(){$(this).attr({"href":"#","title":title});});});};})(jQuery);