<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>


        <!-- <input type="button" id="btnBuscar" value="click"> -->
        <canvas id="myChart" width="400" height="150"></canvas>

    <script>
        $('#btnBuscar'),click(function(){
            $.post("<?php ?>",
            function(data){
            var paranMeses = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
            var paranValores = [65, 59, 80, 56, 55, 40];

            var ctx = $('#myChart');

            var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: paranMeses,
                        datasets: [
                            {
                                label: 'hours',
                                fill: false,
                                lineTension: 0.1,
                                backgroundColor: "rgba(75, 192, 192, 0.4)",
                                borderColor: "rgba(75, 192, 192, 1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75, 192, 192, 1)",
                                pointBackgroundColor: '#fff',
                                pointBorderWidth: 10,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
                                pointHoverBorderColor: "rgba(220, 220, 220, 1)",
                                pointHoverBorderWidth: 5,
                                pointRadius: 1,
                                pointHitRadius: 10,
                                data: paranValores,
                                spanGaps: false,
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                });
            })
        
</script>