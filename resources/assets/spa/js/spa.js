import LocalStorage from './services/localStorage';
import appConfig from './services/appConfig';

require('materialize-css');
window.Vue = require('vue');
require('vue-resource');

//Endereço da API
Vue.http.options.root = appConfig.api_url;

require('./services/interceptors');
require('./router');

