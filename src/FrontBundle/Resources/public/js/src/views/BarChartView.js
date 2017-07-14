import { EventEmitter } from 'events';
import Chart from 'chart.js'

class BarChartView extends EventEmitter{

    constructor({element}){
        super();
        this._element = element;
    }

    createBarChart(labels,data){
        const barChartData = {
            labels: labels,
            datasets: [{
                label: 'number of documents',
                data: data,
                backgroundColor:"#6edd4c",
                borderColor: "#6edd4c",
                borderWidth: 1
            }]
        };
        const myChart = new Chart(this._element,{
            type: 'bar',
            data: barChartData,
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

        $('#'+this._element.id).click((evt)=>{
            evt.preventDefault();
            const activePoints =  myChart.getElementsAtEvent(evt);
            if(activePoints[0]){
                this.emit('clickInBar', {activePoints});
            }
         });
    }
}

export default BarChartView
