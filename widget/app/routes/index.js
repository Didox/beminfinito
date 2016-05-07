var express = require('express');
var router = express.Router();
var V1Controller = require('../controllers/v1_controller');

router.get('/v1/widget', V1Controller.index);
router.get('/v1/widget/obrigado', V1Controller.obrigado);

module.exports = router;