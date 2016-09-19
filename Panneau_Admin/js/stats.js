function start()
{
    Pizza.init();

    /******************/
    alert("haha");
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Web Development Languages Usage'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Web Development Languages Usage',
            data: [
    <?php $query = mysql_query("SELECT title, value FROM weblang");
    $numrows=mysql_num_rows($query);
    while($row = mysql_fetch_array($query)){
    $data[0] = $row['title'];
    $data[1] = $row['value'];
    echo "['".$data[0]."', ".$data[1]."],";
    }
    ?>
            ]
        }]
    });

}