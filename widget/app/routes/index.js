var express = require('express');
var router = express.Router();
var V1Controller = require('../controllers/v1_controller');

router.get('/v1/widget', V1Controller.index);
router.get('/v1/widget/add-produto', V1Controller.addProduto);
router.get('/v1/widget/get-produtos', V1Controller.getProdutos);
router.get('/v1/widget/clear-produtos', V1Controller.clearProdutos);
router.get('/v1/widget/obrigado', V1Controller.obrigado);

module.exports = router;