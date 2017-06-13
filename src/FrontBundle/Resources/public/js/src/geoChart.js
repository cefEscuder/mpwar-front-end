/**
 * Created by Carles on 25/04/2017.
 */
google.charts.load('current', {'packages':['geochart']});
google.charts.setOnLoadCallback(drawRegionsMap);

function drawRegionsMap() {

    var data = google.visualization.arrayToDataTable([
        ['Country', 'Popularity'],
        ['Germany', 200],
        ['United States', 300],
        ['Brazil', 400],
        ['Canada', 500],
        ['France', 600],
        ['RU', 700]
    ]);

    var options = {
        colorAxis: {colors: ['#9dff6c', '#1d6700']},
        datalessRegionColor: 'white',
        backgroundColor: '#D8D8D8'
    };

    var chart = new google.visualization.GeoChart(document.getElementById('map'));

    chart.draw(data, options);
}
