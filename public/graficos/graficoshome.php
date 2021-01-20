<script>
    
    var chart = Highcharts.chart('aluno_curso_xl', {
        chart: {
            height: (6 / 10 * 100) + '%',
        },

        title: {
            text: 'Aluno por curso',
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                color: '#3f286e'
            }
        },

        credits: {
            enabled: false
        },

        xAxis: {
            categories: ['UX Design', 'Analista de Dados', 'Info.B'],
            lineWidth: 0,
            minorGridLineWidth: 0,
            lineColor: "transparent",
        },
        plotOptions: {
            series: {
                borderWidth: 9,
                borderRadius: 8,
                pointPadding: 0.4,
                groupPadding: 0
            }

        },
        yAxis: {
            title: {
                text: ' '
            },
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            visible: false
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: [<?= $UX ?>, <?= $analista ?>, <?= $info ?>],
            showInLegend: false,

        }]

    });

    
   
    Highcharts.chart('taxa_crescimento_xl', {       
        chart: {
            type: 'line',
            height: (6 / 10 * 100) + '%',         

        },
        title: {
            text: 'Matriculas nos ultimos 5 dias',
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                
            }
        },
        credits: {
            enabled: false
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?= $quatroDias ?>, <?= $tresDias ?>, <?= $doisDias ?>, <?= $ontem ?>, <?= $hoje ?>],
            lineWidth: 0,
            minorGridLineWidth: 0,
            style: {
        color: 'red'
      },
        },
        yAxis: {
            title: {
                text: ' ',

            },
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            visible: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Total Alunos',
            data: [<?= $matriculasRealizadasQuatroDiasAtras ?>,
                <?= $matriculasRealizadasTresDiasAtras ?>,
                <?= $matriculasRealizadasDoisDiasAtras ?>,
                <?= $matriculasRealizadasOntem ?>,
                <?= $matriculasRealizadasHoje ?>
            ],
           color: 'blue',

            
        
        }, ]
    });
    var chart = Highcharts.chart('aluno_curso_lg', {
        chart: {
            height: (8 / 10 * 100) + '%',
        },

        title: {
            text: 'Aluno por curso',
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                color: '#3f286e'
            }
        },
        credits: {
            enabled: false
        },

        xAxis: {
            categories: ['UX.Des', 'Analista', 'Info.B'],
            lineWidth: 0,
            minorGridLineWidth: 0,
            lineColor: "transparent",
        },
        plotOptions: {
            series: {
                borderWidth: 9,
                borderRadius: 8,
                pointPadding: 0.4,
                groupPadding: 0
            }

        },
        yAxis: {
            title: {
                text: ' '
            },
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            visible: false
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: [<?= $UX ?>, <?= $analista ?>, <?= $info ?>],
            showInLegend: false,
            style:{
                color: '#3f286e'
            }
        }]

    });
    Highcharts.chart('taxa_crescimento_lg', {
        chart: {
            type: 'line',
            height: (8 / 10 * 100) + '%',

        },
        title: {
            text: 'Matriculas nos ultimos 5 dias',
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                color: '#3f286e'
            }
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?= $quatroDias ?>, <?= $tresDias ?>, <?= $doisDias ?>, <?= $ontem ?>, <?= $hoje ?>],
            lineWidth: 0,
            minorGridLineWidth: 0,
        },
        yAxis: {
            title: {
                text: ' ',

            },
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            visible: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total Alunos',
            data: [<?= $matriculasRealizadasQuatroDiasAtras ?>,
                <?= $matriculasRealizadasTresDiasAtras ?>,
                <?= $matriculasRealizadasDoisDiasAtras ?>,
                <?= $matriculasRealizadasOntem ?>,
                <?= $matriculasRealizadasHoje ?>
            ],
            style:{
                color: 'red'
            }
        }]
    });

   




</script>