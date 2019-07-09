<div id="{{ $idChart }}" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


<script type="text/javascript">
    Highcharts.chart('{!! $idChart !!}', {
        chart: {
            type: '{!! $type !!}'
        },
        title: {
            text: '{!! $titre !!}'
        },
        subtitle: {
            text: 'REMPLIR'
        },
        xAxis: {
            categories: [{!! json_encode($categories) !!}][0],
            labels: {enabled: true },
            title: { text: null }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nombre de personne'
            },
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            // Permet de faire apparait les données sur le graphe
            series: {
                dataLabels: {
                    enabled: true
                }
            }
        },

        legend: {
            enabled: false
        },

        credits: {
            enabled: false
        },

        /*
                series: [{
                    name: 'Femme',
                    data: [89]

                }, {
                    name: 'Homme',
                    data: [47]

                }],
                */
        series: [{
            data: [{!! json_encode($values) !!}][0],
        }],
        /*disable hover on chart*/
        tooltip: { enabled: false }

    });
</script>