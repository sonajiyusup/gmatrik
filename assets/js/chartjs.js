$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Nilai Rata-rata",
                    data: [61, 62, 86, 58, 64, 62, 63, 81],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Target Jumlah Shalat",
                        data: [33, 33, 23, 35, 34, 35, 35, 23],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }, {
                        label: "Jumlah Shalat",
                        data: [20, 20, 20, 20, 22, 22, 22, 19],
                        borderColor: 'rgba(154,10,222,0.75)',
                        pointBorderColor: 'rgba(154,10,222, 0)',
                        pointBackgroundColor: 'rgba(154,10,222, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}