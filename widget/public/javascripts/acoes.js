// ============================== BemInfinitoAcoes =====================================
BemInfinito = {}
BemInfinito.Doacao = {}
BemInfinito.Doacao.add = function(valor){
  var qtd = parseInt($("#quantidade").val());

  qtd += valor;

  if(qtd < 1){
    qtd = 1;
  }

  $("#quantidade").val(qtd);

}

BemInfinito.Doacao.enviar = function(){
  window.location.href = "/v1/widget/obrigado?quantidade=" + $("#quantidade").val() + "&imgproduto=" + $(".produto").attr("src");
}

