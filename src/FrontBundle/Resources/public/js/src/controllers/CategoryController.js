class CategoryController {
    constructor({tfmModel, timeGraphicView}) {
        this._tfmModel = tfmModel;
        this._timeGraphicView = timeGraphicView;
    }

    start() {
        this._setUpTimeGraphicView();
    }

    _setUpTimeGraphicView() {
       const category = document.querySelectorAll('[data-category]')[0].getAttribute('data-category');
       console.log(category);
       this._tfmModel.getCategoryDocumentsByDate(category, (data)=>{
           const dates = [];
           const numberOfDocumentsPerDate = [];
           data.forEach((currentValue) => {
               dates.push(currentValue["key_as_string"]);
               numberOfDocumentsPerDate.push(currentValue["doc_count"]);
           });
           this._timeGraphicView.createLineChart(dates, numberOfDocumentsPerDate);
       });
    }
}

export default CategoryController