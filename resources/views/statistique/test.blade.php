
<script type="text/javascript">
    Highcharts.chart( {
            title: {
                "text": "Voting ballon d`or 2018"
            }
            , subtitle: {
                "text": "This Subtitle"
            }
            , yAxis: {
                "text": "This Y Axis"
            }
            , xAxis: {
                "categories":["Messi", "CR7", "Bambang Pamungkas", "Del Piero"], "labels": {
                    "rotation":15, "align":"top", "formatter":function() {
                        return this.value + " (Footbal Player)"
                    }
                }
            }
            , legend: {
                "layout": "vertikal", "align": "right", "verticalAlign": "middle"
            }
            , series: [ {
                "name": "Voting", "data": [43934, 52503, 57177, 69658]
            }
            ], chart: {
                "type": "line", "renderTo": "chart1"
            }
            , colors: ["#0c2959"], credits:false
        }

    );
</script>