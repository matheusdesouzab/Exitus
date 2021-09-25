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
  document.getElementById('rematrung'), {
    type: 'doughnut',
    data: {
      labels: [
        'Alunos que marcaram sim',
        'Alunos que marcaram com não'
      ],
      datasets: [{
        label: 'Total de rematrículas',
        data: [127, 4],
        backgroundColor: [
          '#28A745',
          '#4040E7'
        ],
        padding: {
          top: 10,
          bottom: 10
        },
        hoverOffset: 4
      }]
    },
    options: {
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