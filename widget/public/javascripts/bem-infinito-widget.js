// ============================== BemInfinitoWidget =====================================
var BemInfinitoWidget = (function (module, $) {
  var Helper = function(){
    this.writeHtml = function(data, selectorForRender){
      if(selectorForRender){
        $(selectorForRender).html(data);
      }else{
        document.write(data);
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
    module.Helper.ajaxCall('/v1/widget', options.selectorForRender, callback);
  };

  return module;
}(BemInfinitoWidget || {}, $));
