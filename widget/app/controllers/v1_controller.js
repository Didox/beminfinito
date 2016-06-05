var V1Controller = {
  index: function(request, response) {
  	var imgproduto = request.query.imgproduto;
    response.render('v1/index',{
    	imgproduto:imgproduto
    });
  },
  addProduto: function(request, response) {
    var idProduto = request.query.idProduto;
    var qtd = request.query.qtd;
    var produtos = [];
    if(request.cookies.produtos){
      produtos = JSON.parse(request.cookies.produtos);
      for(var i=0; i<produtos.length; i++){
        if(produtos[i].idProduto == idProduto){
          produtos.pop(produtos[i]);
          break;
        }
      }
    }

    produtos.push({
      idProduto:idProduto,
      qtd:qtd
    });

    response.cookie('produtos', JSON.stringify(produtos));
    console.log(request.cookies.produtos);
    response.send({});
  },
  getProdutos: function(request, response) {
    response.send(JSON.parse(request.cookies.produtos));
  },
  clearProdutos: function(request, response) {
    response.cookie('produtos', JSON.stringify([]));
    response.send({});
  },
  obrigado: function(request, response) {
  	var imgproduto = request.query.imgproduto;
    response.render('v1/obrigado', {
    	quantidade: request.query.quantidade,
    	imgproduto: imgproduto
    });
  }
}

module.exports = V1Controller;