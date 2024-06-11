let studentsTotal;
let colorLabels = localStorage.getItem('nightModeAdmin') ? '#fff' : '#000';

function createBarChart(elementId, labels, datas) {
    let ctx = document.getElementById(elementId);
    if (ctx) {
        if (studentsTotal instanceof Chart) {
            studentsTotal.destroy();
        }
        studentsTotal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de alunos',
                    backgroundColor: colors['primary'],
                    borderColor: '#e5e5e5',
                    color: colorLabels,
                    data: datas
                }]
            },
            options: {        
                plugins: {
                    title: {
                        display: true,
                        text: 'Divisão de alunos por curso',
                        color: colorLabels,
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    legend: {
                        labels: {
                            color: colorLabels
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: colorLabels,
                            beginAtZero: true
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: colorLabels,
                            beginAtZero: true
                        }
                    }
                }
            }
        });
    }
}

function createPieChart(elementId, labels, datas) {
    let ctx = document.getElementById(elementId);
    if (ctx) {
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: datas,
                    backgroundColor: [
                        colors['info'],
                        colors['success'],
                        colors['danger'],
                        colors['warning']
                    ],
                    borderRadius: 5,
                    padding: {
                        top: 10,
                        bottom: 10
                    },
                    hoverOffset: 4
                }]
            },
            options: {
                legend: {
                    position: "bottom"
                },
                cutoutPercentage: 30,
                plugins: {
                    title: {
                        display: true,
                        text: 'Situação dos alunos no ano letivo',
                        color: colorLabels,
                        padding: {
                            top: 10,
                            bottom: 10
                        }
                    },
                    legend: {
                        labels: {
                            color: colorLabels
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
}

function createDoughnutChart(elementId, labels, datas) {
    let ctx = document.getElementById(elementId);
    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de rematrículas',
                    borderRadius: 5,
                    data: datas,
                    backgroundColor: [
                        colors['success'],
                        colors['danger']
                    ],
                    padding: {
                        top: 10,
                        bottom: 10
                    },
                    hoverOffset: 4
                }]
            },
            options: {
                cutoutPercentage: 30,
                plugins: {
                    title: {
                        display: true,
                        text: 'Status das solicitações de rematrículas recebidas',
                        color: colorLabels,
                        padding: {
                            top: 10,
                            bottom: 10
                        }
                    },
                    legend: {
                        labels: {
                            color: colorLabels
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
}

$.ajax({
    type: "GET",
    url: "/admin/gestao/curso/total-alunos-curso",
    dataType: 'json',
    success: data => {
        let labels = [];
        let datas = [];
        $.each(data, (i, item) => {
            labels.push(item.course_name);
            datas.push(item.total_studens_course);
        });
        setTimeout(() => createBarChart('studenDivisionChartCourse', labels, datas), 1500);
    }
});

$.ajax({
    type: "GET",
    url: "/admin/gestao/home/situacao-alunos-periodo-letivo",
    dataType: 'json',
    success: data => {
        let labels = [];
        let datas = [];
        $.each(data, (i, item) => {
            labels.push(item.student_status + 's');
            datas.push(item.total);
        });
        setTimeout(() => createPieChart('graphCurrentStudentSituation', labels, datas), 1500);
    }
});

$.ajax({
    type: "GET",
    url: "/admin/gestao/home/situacao-rematriculas-recebidas",
    dataType: 'json',
    success: data => {
        let labels = [];
        let datas = [];
        $.each(data, (i, item) => {
            labels.push(`Marcaram "${item.rematrugAnswer}"`);
            datas.push(item.totalAnswer);
        });
        setTimeout(() => createDoughnutChart('graphSituationEngramentesReceived', labels, datas), 1500);
    }
});
