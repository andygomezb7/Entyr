// ripples
!function(a,b,c,d){"use strict";function e(b,c){g=this,this.element=a(b),this.options=a.extend({},h,c),this._defaults=h,this._name=f,this.init()}var f="ripples",g=null,h={};e.prototype.init=function(){var c=this.element;c.on("mousedown touchstart",function(d){if(!g.isTouch()||"mousedown"!==d.type){c.find(".ripple-container").length||c.append('<div class="ripple-container"></div>');var e=c.children(".ripple-container"),f=g.getRelY(e,d),h=g.getRelX(e,d);if(f||h){var i=g.getRipplesColor(c),j=a("<div></div>");j.addClass("ripple").css({left:h,top:f,"background-color":i}),e.append(j),function(){return b.getComputedStyle(j[0]).opacity}(),g.rippleOn(c,j),setTimeout(function(){g.rippleEnd(j)},500),c.on("mouseup mouseleave touchend",function(){j.data("mousedown","off"),"off"===j.data("animating")&&g.rippleOut(j)})}}})},e.prototype.getNewSize=function(a,b){return Math.max(a.outerWidth(),a.outerHeight())/b.outerWidth()*2.5},e.prototype.getRelX=function(a,b){var c=a.offset();return g.isTouch()?(b=b.originalEvent,1===b.touches.length?b.touches[0].pageX-c.left:!1):b.pageX-c.left},e.prototype.getRelY=function(a,b){var c=a.offset();return g.isTouch()?(b=b.originalEvent,1===b.touches.length?b.touches[0].pageY-c.top:!1):b.pageY-c.top},e.prototype.getRipplesColor=function(a){var c=a.data("ripple-color")?a.data("ripple-color"):b.getComputedStyle(a[0]).color;return c},e.prototype.hasTransitionSupport=function(){var a=c.body||c.documentElement,b=a.style,e=b.transition!==d||b.WebkitTransition!==d||b.MozTransition!==d||b.MsTransition!==d||b.OTransition!==d;return e},e.prototype.isTouch=function(){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)},e.prototype.rippleEnd=function(a){a.data("animating","off"),"off"===a.data("mousedown")&&g.rippleOut(a)},e.prototype.rippleOut=function(a){a.off(),g.hasTransitionSupport()?a.addClass("ripple-out"):a.animate({opacity:0},100,function(){a.trigger("transitionend")}),a.on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",function(){a.remove()})},e.prototype.rippleOn=function(a,b){var c=g.getNewSize(a,b);g.hasTransitionSupport()?b.css({"-ms-transform":"scale("+c+")","-moz-transform":"scale("+c+")","-webkit-transform":"scale("+c+")",transform:"scale("+c+")"}).addClass("ripple-on").data("animating","on").data("mousedown","on"):b.animate({width:2*Math.max(a.outerWidth(),a.outerHeight()),height:2*Math.max(a.outerWidth(),a.outerHeight()),"margin-left":-1*Math.max(a.outerWidth(),a.outerHeight()),"margin-top":-1*Math.max(a.outerWidth(),a.outerHeight()),opacity:.2},500,function(){b.trigger("transitionend")})},a.fn.ripples=function(b){return this.each(function(){a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))})}}(jQuery,window,document);
// design
!function(a){function b(a){return"undefined"==typeof a.which?!0:"number"==typeof a.which&&a.which>0?!a.ctrlKey&&!a.metaKey&&!a.altKey&&8!=a.which&&9!=a.which&&13!=a.which&&16!=a.which&&17!=a.which&&20!=a.which&&27!=a.which:!1}function c(b){var c=a(b);c.prop("disabled")||c.closest(".form-group").addClass("is-focused")}function d(b){b.closest("label").hover(function(){var b=a(this).find("input");b.prop("disabled")||c(b)},function(){e(a(this).find("input"))})}function e(b){a(b).closest(".form-group").removeClass("is-focused")}a.expr[":"].notmdproc=function(b){return a(b).data("mdproc")?!1:!0},a.material={options:{validate:!0,input:!0,ripples:!0,checkbox:!0,togglebutton:!0,radio:!0,arrive:!0,autofill:!1,withRipples:[".btn:not(.btn-link)",".card-image",".navbar a:not(.withoutripple)",".dropdown-menu a",".nav-tabs a:not(.withoutripple)",".withripple",".pagination li:not(.active):not(.disabled) a:not(.withoutripple)"].join(","),inputElements:"input.form-control, textarea.form-control, select.form-control",checkboxElements:".checkbox > label > input[type=checkbox]",togglebuttonElements:".togglebutton > label > input[type=checkbox]",radioElements:".radio > label > input[type=radio]"},checkbox:function(b){var c=a(b?b:this.options.checkboxElements).filter(":notmdproc").data("mdproc",!0).after("<span class='checkbox-material'><span class='check'></span></span>");d(c)},togglebutton:function(b){var c=a(b?b:this.options.togglebuttonElements).filter(":notmdproc").data("mdproc",!0).after("<span class='toggle'></span>");d(c)},radio:function(b){var c=a(b?b:this.options.radioElements).filter(":notmdproc").data("mdproc",!0).after("<span class='circle'></span><span class='check'></span>");d(c)},input:function(b){a(b?b:this.options.inputElements).filter(":notmdproc").data("mdproc",!0).each(function(){var b=a(this),c=b.closest(".form-group");0===c.length&&(b.wrap("<div class='form-group'></div>"),c=b.closest(".form-group")),b.attr("data-hint")&&(b.after("<p class='help-block'>"+b.attr("data-hint")+"</p>"),b.removeAttr("data-hint"));var d={"input-lg":"form-group-lg","input-sm":"form-group-sm"};if(a.each(d,function(a,d){b.hasClass(a)&&(b.removeClass(a),c.addClass(d))}),b.hasClass("floating-label")){var e=b.attr("placeholder");b.attr("placeholder",null).removeClass("floating-label");var f=b.attr("id"),g="";f&&(g="for='"+f+"'"),c.addClass("label-floating"),b.after("<label "+g+"class='control-label'>"+e+"</label>")}(null===b.val()||"undefined"==b.val()||""===b.val())&&c.addClass("is-empty"),c.append("<span class='material-input'></span>"),c.find("input[type=file]").length>0&&c.addClass("is-fileinput")})},attachInputEventHandlers:function(){var d=this.options.validate;a(document).on("change",".checkbox input[type=checkbox]",function(){a(this).blur()}).on("keydown paste",".form-control",function(c){b(c)&&a(this).closest(".form-group").removeClass("is-empty")}).on("keyup change",".form-control",function(){var b=a(this),c=b.closest(".form-group"),e="undefined"==typeof b[0].checkValidity||b[0].checkValidity();""===b.val()?c.addClass("is-empty"):c.removeClass("is-empty"),d&&(e?c.removeClass("has-error"):c.addClass("has-error"))}).on("focus",".form-control, .form-group.is-fileinput",function(){c(this)}).on("blur",".form-control, .form-group.is-fileinput",function(){e(this)}).on("change",".form-group input",function(){var b=a(this);if("file"!=b.attr("type")){var c=b.closest(".form-group"),d=b.val();d?c.removeClass("is-empty"):c.addClass("is-empty")}}).on("change",".form-group.is-fileinput input[type='file']",function(){var b=a(this),c=b.closest(".form-group"),d="";a.each(this.files,function(a,b){d+=b.name+", "}),d=d.substring(0,d.length-2),d?c.removeClass("is-empty"):c.addClass("is-empty"),c.find("input.form-control[readonly]").val(d)})},ripples:function(b){a(b?b:this.options.withRipples).ripples()},autofill:function(){var b=setInterval(function(){a("input[type!=checkbox]").each(function(){var b=a(this);b.val()&&b.val()!==b.attr("value")&&b.trigger("change")})},100);setTimeout(function(){clearInterval(b)},1e4)},attachAutofillEventHandlers:function(){var b;a(document).on("focus","input",function(){var c=a(this).parents("form").find("input").not("[type=file]");b=setInterval(function(){c.each(function(){var b=a(this);b.val()!==b.attr("value")&&b.trigger("change")})},100)}).on("blur",".form-group input",function(){clearInterval(b)})},init:function(b){this.options=a.extend({},this.options,b);var c=a(document);a.fn.ripples&&this.options.ripples&&this.ripples(),this.options.input&&(this.input(),this.attachInputEventHandlers()),this.options.checkbox&&this.checkbox(),this.options.togglebutton&&this.togglebutton(),this.options.radio&&this.radio(),this.options.autofill&&(this.autofill(),this.attachAutofillEventHandlers()),document.arrive&&this.options.arrive&&(a.fn.ripples&&this.options.ripples&&c.arrive(this.options.withRipples,function(){a.material.ripples(a(this))}),this.options.input&&c.arrive(this.options.inputElements,function(){a.material.input(a(this))}),this.options.checkbox&&c.arrive(this.options.checkboxElements,function(){a.material.checkbox(a(this))}),this.options.radio&&c.arrive(this.options.radioElements,function(){a.material.radio(a(this))}),this.options.togglebutton&&c.arrive(this.options.togglebuttonElements,function(){a.material.togglebutton(a(this))}))}}}(jQuery);
//# sourceMappingURL=material.min.js.map
// snack
(function(c){function d(a){return"undefined"!==typeof a&&null!==a?!0:!1}c(document).ready(function(){c("body").append("<div id=snackbar-container/>")});c(document).on("click","[data-toggle=snackbar]",function(){c(this).snackbar("toggle")}).on("click","#snackbar-container .snackbar",function(){c(this).snackbar("hide")});c.snackbar=function(a){if(d(a)&&a===Object(a)){var b;b=d(a.id)?c("#"+a.id):c("<div/>").attr("id","snackbar"+Date.now()).attr("class","snackbar");var g=b.hasClass("snackbar-opened");d(a.style)?b.attr("class","snackbar "+a.style):b.attr("class","snackbar");a.timeout=d(a.timeout)?a.timeout:3E3;d(a.content)&&(b.find(".snackbar-content").length?b.find(".snackbar-content").text(a.content):b.prepend("<span class=snackbar-content>"+a.content+"</span>"));d(a.id)?b.insertAfter("#snackbar-container .snackbar:last-child"):b.appendTo("#snackbar-container");d(a.action)&&"toggle"==a.action&&(a.action=g?"hide":"show");var e=Date.now();b.data("animationId1",e);setTimeout(function(){b.data("animationId1")===e&&(d(a.action)&&"show"!=a.action?d(a.action)&&"hide"==a.action&&b.removeClass("snackbar-opened"):b.addClass("snackbar-opened"))},50);var f=Date.now();b.data("animationId2",f);0!==a.timeout&&setTimeout(function(){b.data("animationId2")===f&&b.removeClass("snackbar-opened")},a.timeout);return b}return!1};c.fn.snackbar=function(a){var b={};if(this.hasClass("snackbar")){b.id=this.attr("id");if("show"===a||"hide"===a||"toggle"==a)b.action=a;return c.snackbar(b)}d(a)&&"show"!==a&&"hide"!==a&&"toggle"!=a||(b={content:c(this).attr("data-content"),style:c(this).attr("data-style"),timeout:c(this).attr("data-timeout")});d(a)&&(b.id=this.attr("data-snackbar-id"),"show"===a||"hide"===a||"toggle"==a)&&(b.action=a);a=c.snackbar(b);this.attr("data-snackbar-id",a.attr("id"));return a}})(jQuery);