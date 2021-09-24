let labelsTotalStudentsCourse = Array();
let dataTotalStudentsCourse = Array();

$.ajax({
  type: "GET",
  url: "/admin/gestao/curso/total-alunos-curso",
  dataType: 'json',
  success: data => $.each(data, i => {

    labelsTotalStudentsCourse.push(data[i].courseName)
    dataTotalStudentsCourse.push(data[i].totalStudensCourse)

    setTimeout(function () {

      new Chart(
        document.getElementById('myChart'), {
          type: 'bar',
          data: {
            labels: labelsTotalStudentsCourse,
            datasets: [{
              label: 'Total de alunos',
              backgroundColor: '#363C90',
              borderColor: '#e5e5e5',
              data: dataTotalStudentsCourse
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
  })
})




















let grafico2 = new Chart(
  document.getElementById('grafico2'), {
    type: 'doughnut',
    data: {
      labels: [
        'Ótimo',
        'Bom',
        'Ruim'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [8, 12, 7],
        backgroundColor: [
          '#28A745',
          '#4040E7',
          '#E74040'
        ],
        hoverOffset: 4
      }]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Indíce de reaproveitamento das turmas',
          padding: {
            top: 10,
            bottom: 10
          }
        }
      }
    }
  })