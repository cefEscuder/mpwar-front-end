/**
 * Created by Carles on 26/04/2017.
 */
var data1 = {
    labels: [
        "All Tweets",
        "Category tweets",
    ],
    datasets: [
        {
            data: [300,100],
            backgroundColor: [
                "#28a900",
                "#6edd4c"
            ],
            hoverBackgroundColor: [
                "#28a900",
                "#6edd4c"
            ]
        }]
};
const ctx = document.getElementsByClassName("donutChart");

for (var i = 0; i < ctx.length; i++){
    var myLineChart = new Chart(ctx[i], {
        type: 'doughnut',
        data: data1
    });
}














