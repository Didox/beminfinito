// ============================== BemInfinitoWidget =====================================
var BemInfinitoWidget = (function (module, $) {
  var Helper = function(){
    this.writeHtml = function(data, selectorForRender){
      if(selectorForRender){
        $(selectorForRender).html(data);
        $(".produtos a").click(function(){
          $("#widgetBem").show();
          $("#widgetBem").css({
            'position':'absolute',
            'top': $(this).offset().top - 200,
            'left': $(this).offset().left  - 155
          });
        });
      }else{
        console.log("Faltou definir o elemento render");
      }
    };

    this.ajaxCall = function(url, container, callback){
      $.ajax({
        url: url,
        timeout: 20000 // 20 segundos
      }).done(function(data) {
        module.Helper.writeHtml(data, container);
        if(callback) {
          callback.call(null, data);
        }
      }).fail(function(jqXHR, textStatus) {
        module.Logger.log("Erro ao renderizar widget: " + textStatus, container);
      });
    };

    this.iframe = function(url, container, callback){
      module.Helper.writeHtml('<div id="widgetBem">'+
                              '  <div class="bem-infinito-add-item">'+
                              '    <div class="container"> ' + 
                              '      <iframe src="' + url + '" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>'+ 
                              '    </div>'+
                              '   </div>'+
                              ' </div>', container);
      if(callback) {
        callback.call();
      }
    };

    this.ajaxCallWithCallBack = function(url, callback){
      $.ajax({
        url: url,
        timeout: 20000 // 20 segundos
      }).done(function(data) {
        callback.call(null, data);
      }).fail(function(jqXHR, textStatus) {
        module.Logger.log("Erro ao renderizar widget: " + textStatus, callback);
      });
    };
  };

  // Initialize Helpers
  module.Helper = new Helper();

  // Module Initializer
  module.init = function(options){
  };

  // Render News Widget
  module.render = function(options, callback){
    //module.Helper.ajaxCall('/v1/widget', options.selectorForRender, callback);
    module.Helper.iframe('/v1/widget', options.selectorForRender, callback);
  };

  return module;
}(BemInfinitoWidget || {}, $));
