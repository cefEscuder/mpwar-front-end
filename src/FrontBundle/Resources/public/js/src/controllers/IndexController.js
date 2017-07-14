class IndexController {
    constructor({tfmModel, timeGraphicView, categoryBarChartView, geoChartView}) {
        this._tfmModel = tfmModel;
        this._timeGraphicView = timeGraphicView;
        this._categoryBarChartView = categoryBarChartView;
        this._geoChartView = geoChartView;
    }

    start() {
        this._setUpTimeGraphicView();
        this._setUpCategoryPanelView();
        this._setUpGeoChartView();

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

            this._categoryBarChartView.createBarChart(categories, numberOfDocumentsPerCategory);

            this._categoryBarChartView.on('clickInBar', (data)=>{
                $(location).attr('href', '/Category/'+data.activePoints[0]._model.label);
            });
        });
    }

    _setUpGeoChartView() {
        this._tfmModel.getDocumentsByLocation((data)=>{
                const geoChartData = [['Country', 'Number of Documents']];
                data.forEach((currentValue)=>{
                    if(currentValue.key !== "undefined"){
                        geoChartData.push([currentValue.key,currentValue.doc_count]);
                    }
                });

                this._geoChartView.createGeoChart(geoChartData);
        });

    }
}

export default IndexController;