import IndexController from './controllers/IndexController';
import tfmModel from './models/TfmModel';
import LineChartView from './views/LineChartView';
import BarChartView from './views/BarChartView'

const timeGraphicViewCanvas = document.getElementById("timeEvolution");
const timeGraphicView = new LineChartView({element: timeGraphicViewCanvas});

const categoryBarChartCanvas = document.getElementById("categoryBarChart");
const categoryBarChartView = new BarChartView({element: categoryBarChartCanvas});

const indexController = new IndexController({
    tfmModel,
    timeGraphicView,
    categoryBarChartView
});

indexController.start();




