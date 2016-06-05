// ============================== BemInfinitoAcoes =====================================
BemInfinito = {}
BemInfinito.Host = "http://beminfinito-widget.herokuapp.com";
BemInfinito.Doacao = {}
BemInfinito.Doacao.add = function(valor, url){
  
  $(".product-thumbnail img").each(function(){
    if($(this).attr("src") == url){
      var qtd = parseInt($("#quantidade").val());

      qtd += valor;

      if(qtd < 1){
        qtd = 0;
      }

      $("#quantidade").val(qtd);
      
      $(this).parents(".cart_item").find(".product-donate label span").html(qtd);

      var idProduto = $(this).parents(".cart_item").find(".product-remove a").data("product_id");

      $.ajax({
        url: BemInfinito.Host + "/v1/widget/add-produto?idProduto=" + idProduto + "&qtd=" + qtd,
        timeout: 20000
      }).done(function(data) { });

      return;
    }
  });


  //var qtdOriginal = parseInt(BemInfinito.Doacao.oldValueInput);
  //var input = $(BemInfinito.Doacao.doarButton).parents("tr").find(".product-quantity input");
  //input.val(qtdOriginal + qtd);
}

BemInfinito.Doacao.remover = function(self){
  $(self).parents(".product-donate").find("label span").html("0");
}

BemInfinito.Doacao.enviar = function(){
  $("#widgetBem").hide();
  //$("table.cart .actions input[name=update_cart]").trigger("click");
}

BemInfinito.Doacao.updateItensDoados = function(){
  $(".cart_item").each(function(){
    var input = $(this).find(".product-quantity input");
    var doado = $(this).find(".product-donate label span").text();
    doado = parseInt(doado);

    var item = parseInt(input.val());
    input.val(doado + item);
  });
}

BemInfinito.Doacao.doarButton = null;
BemInfinito.Doacao.oldValueInput = null;


// ============================== BemInfinitoWidget =====================================
var BemInfinitoWidget = (function (module, $) {
  var Helper = function(){
    this.writeHtml = function(data, selectorForRender){
      if(selectorForRender){
        $(selectorForRender).html(data);

        $(".beminfinito-donate").on("click", function(e){
          var self = this;
          BemInfinito.Doacao.doarButton = this;

          var input = $(BemInfinito.Doacao.doarButton).parents("tr").find(".product-quantity input");
          BemInfinito.Doacao.oldValueInput = input.val();

          var imgproduto = encodeURI($(this).parents("tr").find(".product-thumbnail img").attr("src"));
          $.ajax({
            url: module.Helper.host + "/v1/widget/?imgproduto=" + imgproduto,
            timeout: 20000 // 20 segundos
          }).done(function(data) {
            $("#bemInfinito-content").html(data);
            $("#widgetBem").show();
            $("#widgetBem").css({
              'position':'absolute',
              'top': $(self).offset().top - 250,
              'left': $(self).offset().left  - 155
            });

            $(".product-thumbnail img").each(function(){
              if($(this).attr("src") == imgproduto){
                var valor = $(this).parents(".cart_item").find(".product-donate label span").html();
                $(".acoes .nI").val(valor);
                return;
              }
            });
            
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

    this.host = BemInfinito.Host;

    this.iframe = function(url, container, callback){
      $("tbody .product-donate").html('');
      $("tbody .product-donate").append('<label>Quantidade doado: <span>0</span></label><br>');
      $("tbody .product-donate").append('<input type="button" class="button beminfinito-donate" name="donate" value="Doar"><br><br>');
      $("tbody .product-donate").append('<input type="button" class="button beminfinito-donate-remove" name="donate" onclick="BemInfinito.Doacao.remover(this);" value="Remover doados">');

      module.Helper.writeHtml('<div id="widgetBem">'+
                              // '  <a href="javascript:$(\'.bem-infinito-add-item iframe\').attr(\'src\', \'\');$(\'#widgetBem\').hide();" class="bem-infinito-add-fechar">Fechar</a>'+
                              //'  <a href="javascript:$(\'#widgetBem\').hide();" class="bem-infinito-add-fechar">Fechar</a>'+
                              '  <div class="bem-infinito-add-item">'+
                              '    <div class="container" id="bemInfinito-content"> ' + 
                              //'      <iframe id="bemInfinito-iframe" src="" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>'+ 
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
    $(document).ready(function(){
      module.Helper.iframe('/v1/widget', options.selectorForRender, callback);

      $(".actions input[name=update_cart]").click(function(){
        BemInfinito.Doacao.updateItensDoados();
      });
    })
  };

  return module;
}(BemInfinitoWidget || {}, $));
