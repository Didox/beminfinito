var V1Controller = {
  index: function(request, response) {
    response.render('v1/index');
  },
  obrigado: function(request, response) {
    response.render('v1/obrigado', {
    	quantidade: request.query.quantidade
    });
  }
}

module.exports = V1Controller;