import tfmModel from './models/TfmModel';
import LineChartView from './views/LineChartView';
import CategoryController from './controllers/CategoryController';

const timeGraphicViewCanvas = document.getElementById("timeEvolution");
const timeGraphicView = new LineChartView({element: timeGraphicViewCanvas});

const categoryController = new CategoryController({
    tfmModel,
    timeGraphicView
});

categoryController.start();