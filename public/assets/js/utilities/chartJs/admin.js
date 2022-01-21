
$.ajax({
  type: "GET",
  url: "/admin/gestao/curso/total-alunos-curso",
  dataType: 'json',
  success: data => {

    let labels = []
    let datas = []

    $.each(data, i => {
        labels.push(data[i].course_name)
        datas.push(data[i].total_studens_course)
      }),

      setTimeout(function () {
        new Chart(
          document.getElementById('studenDivisionChartCourse'), {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Total de alunos',
                backgroundColor: colors['primary'],
                borderColor: '#e5e5e5',
                data: datas
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
  }
})


$.ajax({
  type: "GET",
  url: "/admin/gestao/curso/total-alunos-curso",
  dataType: 'json',
  success: data => {

    let labels = []
    let datas = []

    $.each(data, i => {
        labels.push(data[i].courseName)
        datas.push(data[i].totalStudensCourse)
      }),

      setTimeout(function () {
        new Chart(
          document.getElementById('city'), {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Total de alunos',
                backgroundColor: colors['primary'],
                borderColor: '#e5e5e5',
                data: datas
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
  }
})


$.ajax({
  type: "GET",
  url: "/admin/gestao/home/situacao-alunos-periodo-letivo",
  dataType: 'json',
  success: data => {

    let labels = []
    let datas = []

    $.each(data, i => {
        labels.push(data[i].student_status + 's')
        datas.push(data[i].total)
      }),

      setTimeout(function () {

        new Chart(
          document.getElementById('graphCurrentStudentSituation'), {
            type: 'pie',
            data: {
              labels: labels,
              borderRadius: 50,
              datasets: [{
                data: datas,
                backgroundColor: [
                  colors['info'],
                  colors['success'],
                  colors['danger'] ,
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
  }
})


$.ajax({
  type: "GET",
  url: "/admin/gestao/home/situacao-rematriculas-recebidas",
  dataType: 'json',
  success: data => {

    let labels = []
    let datas = []

    $.each(data, i => {
        labels.push(`Marcaram "${data[i].rematrugAnswer}"`)
        datas.push(data[i].totalAnswer)
      }),

      setTimeout(function () {

        new Chart(
          document.getElementById('graphSituationEngramentesReceived'), {
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

      }, 1500)

  }
})


$.ajax({
  type: "GET",
  url: "/admin/gestao/home/divisao-alunos-sexo",
  dataType: 'json',
  success: data => {

    let labels = []
    let datas = []

    $.each(data, i => {

        labels.push(data[i].sex == 'Feminino' ? 'Mulheres' : 'Homens')
        datas.push(data[i].total)
      }),

      setTimeout(function () {

        new Chart(
          document.getElementById('studentSex'), {
            type: 'doughnut',
            data: {
              labels: labels,
              datasets: [{
                borderRadius: 5,
                data: datas,
                backgroundColor: [
                  colors['primary'],
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
                  text: 'Sexo dos alunos',
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

      }, 1500)

  }
})

