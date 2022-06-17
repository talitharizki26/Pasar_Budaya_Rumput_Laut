<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
</figure>

<script type="text/javascript">
    var pendapatan = <?php echo json_encode($total_pesanan) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('container', {

        title: {
            text: 'Logarithmic axis demo'
        },

        xAxis: {
            categories: bulan
        },

        yAxis: {
            title: {
                text: 'nominal pendapatan'
            }
        },

        series: [{
            data: pendapatan,
            name: 'nominal',
        }]
    });
</script>