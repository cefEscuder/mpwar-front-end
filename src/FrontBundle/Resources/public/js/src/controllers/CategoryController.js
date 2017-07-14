class CategoryController {
    constructor({tfmModel, timeGraphicView, geoChartView}) {
        this._tfmModel = tfmModel;
        this._timeGraphicView = timeGraphicView;
        this._geoChartView = geoChartView;
        this._categoryName = document.querySelectorAll('[data-category]')[0].getAttribute('data-category');
    }

    start() {
        this._setUpTimeGraphicView();
        this._setUpGeoChartView();

    }

    _setUpTimeGraphicView() {
       const category = document.querySelectorAll('[data-category]')[0].getAttribute('data-category');

       this._tfmModel.getCategoryDocumentsByDate(this._categoryName, (data)=>{
           const dates = [];
           const numberOfDocumentsPerDate = [];

           data.forEach((currentValue) => {
               dates.push(currentValue["key_as_string"]);
               numberOfDocumentsPerDate.push(currentValue["doc_count"]);
           });

           this._timeGraphicView.createLineChart(dates, numberOfDocumentsPerDate);
       });
    }

    _setUpGeoChartView() {
        this._tfmModel.getCategoryDocumentsByLocation(this._categoryName,(data)=>{
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

export default CategoryController