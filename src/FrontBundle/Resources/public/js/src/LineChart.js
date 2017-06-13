/**
 * Created by Carles on 26/04/2017.
 */
const data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "Evolution Over Time",
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
            data: [65, 59, 80, 81, 56, 55, 40],
            spanGaps: false
        }
    ]
};

const ctx1 = document.getElementById("timeEvolution");

var myLineChart = new Chart(ctx1, {
    type: 'line',
    data: data
});