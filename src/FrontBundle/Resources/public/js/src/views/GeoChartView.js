class GeoChartView{
    constructor({element}) {
        this._element = element;
    }

    createGeoChart(data){
        google.charts.load('current', {'packages':['geochart']});
        google.charts.setOnLoadCallback(()=>{
               this._drawVisualization(data,this._element);
        });
    }

    _drawVisualization(data,element){

        var formatedData = google.visualization.arrayToDataTable(data);

        var options = {
            colorAxis: {colors: ['#9dff6c', '#1d6700']},
            datalessRegionColor: 'white',
            backgroundColor: '#D8D8D8'
        };

        var chart = new google.visualization.GeoChart(element);

        chart.draw(formatedData, options);
    }
}
export default GeoChartView