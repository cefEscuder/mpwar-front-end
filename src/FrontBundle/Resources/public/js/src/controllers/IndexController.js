class IndexController {
    constructor({tfmModel, timeGraphicView, categoryBarChartView}) {
        this._tfmModel = tfmModel;
        this._timeGraphicView = timeGraphicView;
        this._categoryBarChartView = categoryBarChartView;
    }

    start() {
        this._setUpTimeGraphicView();
        this._setUpCategoryPanelView();

    }

    _setUpTimeGraphicView() {
        this._tfmModel.getDocumentsByDate((data) => {
            const dates = [];
            const numberOfDocumentsPerDate = [];
            data.forEach((currentValue) => {
                dates.push(currentValue["key_as_string"]);
                numberOfDocumentsPerDate.push(currentValue["doc_count"]);
            });
            this._timeGraphicView.createLineChart(dates, numberOfDocumentsPerDate);
        });
    }

    _setUpCategoryPanelView() {
        this._tfmModel.getDocumentsByCategory((data) => {
            const categories = [];
            const numberOfDocumentsPerCategory = [];
            data.forEach((currentValue)=>{
                categories.push(currentValue.key);
                numberOfDocumentsPerCategory.push(currentValue.doc_count)
            });
            this._categoryBarChartView.start(categories, numberOfDocumentsPerCategory);
            this._categoryBarChartView.on('clickInBar', (data)=>{
                console.log(data);
                $(location).attr('href', '/Category/'+data.activePoints[0]._model.label);
            });
        });
    }
}

export default IndexController;