let studenDivisionChartCourseLabels = []
let studenDivisionChartCourseDatas = []
let studentSituationSchoolYearLabels = []
let studentSituationSchoolYearDatas = []

$.ajax({
  type: "GET",
  url: "/admin/gestao/curso/total-alunos-curso",
  dataType: 'json',
  success: data => {
    $.each(data, i => {
        studenDivisionChartCourseLabels.push(data[i].courseName)
        studenDivisionChartCourseDatas.push(data[i].totalStudensCourse)
      },
      setTimeout(function () {
        new Chart(
          document.getElementById('studenDivisionChartCourse'), {
            type: 'bar',
            data: {
              labels: studenDivisionChartCourseLabels,
              datasets: [{
                label: 'Total de alunos',
                backgroundColor: '#363C90',
                borderColor: '#e5e5e5',
                data: studenDivisionChartCourseDatas
              }]
            },
            options: {
              plugins: {
                title: {
                  display: true,
                  text: 'Divisão de alunos por curso',
                  padding: {
                    top: 10,
                    bottom: 30
                  }
                }
              },
              scales: {
                x: {
                  grid: {
                    display: false
                  }
                },
                y: {
                  grid: {
                    display: false
                  }
                }
              }
            }
          }
        )
      }, 1500)
    )
  }
})


$.ajax({
  type: "GET",
  url: "/admin/gestao/home/situacao-alunos-periodo-letivo",
  dataType: 'json',
  success: data => $.each(data, i => {

    studentSituationSchoolYearLabels.push(data[i].studentStatus + 's')
    studentSituationSchoolYearDatas.push(data[i].total)

    console.log(data)

    setTimeout(function () {

      new Chart(
        document.getElementById('graphCurrentStudentSituation'), {
          type: 'pie',
          data: {
            labels: studentSituationSchoolYearLabels,
            borderRadius: 50,
            datasets: [{
              data:  studentSituationSchoolYearDatas,
              backgroundColor: [
                '#17A2B8',
                '#82E0AA',
                '#BA7844'
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
            cutoutPercentage: 30,
            plugins: {
              title: {
                display: true,
                text: 'Situação dos alunos no ano letivo',
                padding: {
                  top: 10,
                  bottom: 10
                }
              }
            },
            responsive: true,
            maintainAspectRatio: false
          }
        }
      )
    }, 1500)
  })
})










let graphSituationEngramentesReceived = new Chart(
  document.getElementById('graphSituationEngramentesReceived'), {
    type: 'doughnut',
    data: {
      labels: [
        'Marcaram sim',
        'Marcaram não'
      ],
      datasets: [{
        label: 'Total de rematrículas',
        data: [100, 45],
        backgroundColor: [
          '#007BFF',
          '#BA4A00'
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
          text: 'Status das rematrículas recebidas para o ano de 2022',
          padding: {
            top: 10,
            bottom: 10
          }
        }
      },
      responsive: true,
      maintainAspectRatio: false
    }
  })



var myChart = new Chart(document.getElementById('grafico2'), {
  type: 'line',
  data: {
    labels: ["Tokyo", "Mumbai", "Mexico City", "Shanghai", "Sao Paulo", "New York", "Karachi", "Buenos Aires", "Delhi", "Moscow"],
    datasets: [{
      label: 'Series 1',
      data: [500, 50, 2424, 14040, 14141, 4111, 4544, 47, 5555, 6811],
      fill: false,
      borderColor: '#2196f3',
      backgroundColor: '#2196f3',
      borderWidth: 1
    }]
  },
  options: {
    responsive: true, // Instruct chart js to respond nicely.
    maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
  }
});