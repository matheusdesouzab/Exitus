<script>
     
        var categories = [
            '14 a 18', '19 a 25', '26 a 30', '31 a 40',
            '41+'
        ];


        $(function() {
            $('#idadeAlunos').highcharts({
                chart: {
                    type: 'bar',
                    height: (10 / 10 * 100) + '%',
                },
                title: {
                    text: 'Média de idade dos alunos',
                    style: {
                    fontWeight: 'bold',
                    fontSize: '15px'
                }
                },

                accessibility: {
                    point: {
                        valueDescriptionFormat: '{index}. Age {xDescription}, {value}%.'
                    }
                },
                credits: {
            enabled: false
        },

                xAxis: [{
                    categories: categories,
                    reversed: false,
                    labels: {
                        step: 1,
                        
                    },
                    accessibility: {
                        description: 'Age (male)'
                    }
                }, { // mirror axis on right side
                    opposite: true,
                    reversed: false,
                    categories: categories,
                    linkedTo: 0,
                    labels: {
                        step: 1
                    },
                    accessibility: {
                        description: 'Age (female)'
                    }
                }],
                yAxis: {
                    title: {
                        text: null
                    },
                    labels: {
                        formatter: function() {
                            return Math.abs(this.value) + '%';
                        }
                    },
                    accessibility: {
                        description: 'Percentage population',
                        rangeDescription: 'Range: 0 to 5%'
                    }
                },

                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },

                tooltip: {
                    formatter: function() {
                        return '<b>' + this.series.name + ', com ' + this.point.category + ' anos</b><br/>' +
                            'Porcentagem: ' + Highcharts.numberFormat(Math.abs(this.point.y), 1) + '%';
                    }
                },

                series: [{
                    name: 'Homens',
                    data: [
                        <?= $idade14a18anosHomens ?>, <?= $idade19a25anosHomens ?>, <?= $idade26a30anosHomens ?>, <?= $idade31a40anosHomens ?>, <?= $idade41anosHomens ?>

                    ]
                }, {
                    name: 'Mulheres',
                    data: [
                        <?= $idade14a18anosMulheres ?>, <?= $idade19a25anosMulheres ?>, <?= $idade26a30anosMulheres ?>, <?= $idade31a40anosMulheres ?>, <?= $idade41anosMulheres ?>
                    ]
                }]
            });

        });
        Highcharts.chart('Crescimento', {
            chart: {
            type: 'line',
            height: (10 / 10 * 100) + '%',

        },
        title: {
            text: 'Matriculas nos ultimos 5 dias',
            style: {
                fontSize: '15px',
                fontWeight: 'bold',
                color: '#3f286e'
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
            ]
        }, ]
        });
        var chart = Highcharts.chart('aluno_curso', {
        chart: {
            height: (10 / 10 * 100) + '%',
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
            showInLegend: false
        }]

    });

    Highcharts.chart('sexo', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: (10 / 10 * 100) + '%',
    },
    title: {
        text: 'Sexo',
        align: 'center',
        verticalAlign: 'middle',
        y: 60,
        style: {
                fontSize: '15px',
                fontWeight: 'bold',
                color: '#3f286e'
            }
    },
    credits: {
            enabled: false
        },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'white'
                }
            },
            startAngle: -90,
            endAngle: 90,
            center: ['50%', '75%'],
            size: '110%'
        }
    },
    series: [{
        type: 'pie',
        name: 'Porcentagem',
        innerSize: '50%',
        data: [
            ['Mulheres', <?=count($idadeMulheres)?>],
            ['Homens',  <?=count($idadeHomens)?>],
            
            
        ]
    }]
});

</script>