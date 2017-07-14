import tfmModel from './models/TfmModel';
import LineChartView from './views/LineChartView';
import CategoryController from './controllers/CategoryController';
import GeoChartView from './views/GeoChartView';

const timeGraphicViewCanvas = document.getElementById("timeEvolution");
const timeGraphicView = new LineChartView({element: timeGraphicViewCanvas});

const geoChartCanvas = document.getElementById("map");
const geoChartView = new GeoChartView({element: geoChartCanvas});

const categoryController = new CategoryController({
    tfmModel,
    timeGraphicView,
    geoChartView
});

categoryController.start();