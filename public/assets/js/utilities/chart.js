let myChart = new Chart(
  document.getElementById('myChart'), {
    type: 'bar',
    data: {
      labels: ['Informática',
        'Segurança do Trabalho',
        'Mecatrônica'
      ],
      datasets: [{
        label: 'Total de alunos',
        backgroundColor: '#363C90',
        borderColor: '#e5e5e5',
        data: [120, 46, 128]
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
          '#273469',
          '#F2DCD6'
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