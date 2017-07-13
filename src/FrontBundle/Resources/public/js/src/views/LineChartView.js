import Chart from 'chart.js'

class LineChartView {

    constructor({element}) {
        this._element = element;
    }

    createLineChart(labels, data) {
        const lineChart = {
            labels: labels,
            datasets: [
                {
                    label: "Number of Documents",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#6edd4c",
                    borderColor: "#6edd4c",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "#6edd4c",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "#6edd4c",
                    pointHoverBorderColor: "#6edd4c",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: data,
                    spanGaps: false
                }
            ]
        };

        const myLineChart = new Chart(this._element, {
            type: 'line',
            data: lineChart,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }
}

export default LineChartView
