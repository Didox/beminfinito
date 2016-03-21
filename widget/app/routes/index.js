var express = require('express');
var router = express.Router();
var V1Controller = require('../controllers/v1_controller');

router.get('/v1/widget', V1Controller.index);

module.exports = router;