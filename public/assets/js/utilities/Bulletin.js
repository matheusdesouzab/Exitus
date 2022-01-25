$(document).on("click", "#printBuleetin", function (e) {

    let studentName = $('#accordion-data-student form input#name').val() || $('#studentPortal #bulletin #name').val()
    let courseModality = $('#accordion-data-student form input#courseModality').val() || $('#studentPortal #bulletin #courseModality').val()
    let series = $('#accordion-data-student form input#series').val() || $('#studentPortal #bulletin #series').val()
    let schoolYear = $('#accordion-data-student form input#schoolYear').val() || $('#studentPortal #bulletin #schoolYear').val()
    let classroom_number = $('#accordion-data-student form input#classroom_number').val() || $('#studentPortal #bulletin #numberClassroom').val()
    let class_data = $('.class-data').text() || $('#studentPortal #bulletin #classData').val()

    class_data = class_data.split('-')

    let myTable = document.getElementById('table-bulletin-print').innerHTML
    let win = window.open()
    let now = new Date
    let mes = (now.getMonth() + 1).toString()

    mes = mes.length == 1 ? `0${mes}` : mes

    win.document.write(`
        <html>

            <head>
                <title>Boletim - ${studentName}</title>
                <meta charset="utf-8">
                <link href="/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="/assets/css/stylesheet.css">
            </head>

            <body id="table-print">

                <div class="col-lg-12 p-5">

                    <div class="row d-flex justify-content-between align-items-center mb-3 header">

                        <div class="col-3 p-0"><img class="logo-site" src="/assets/img/logo-components/logo-full.png"></div>

                        <div class="col-6">

                            <div class="row d-flex justify-content-center">

                                <h4 class="text-center col-lg-12">Boletim Escolar</h4>
                                <h5 class="text-center col-lg-12">Centro Teritorial de Educação Profissional de Itaparica - ${schoolYear}</h5>

                            </div>
                        
                        </div>

                        <div class="col-3"><img class="logo-school d-block mx-auto" src="/assets/img/cetepi-logo.jpg"></div>

                    </div>

                    <div class="row sub-header">

                        <div class="col-lg-12 p-0">

                            <p><span>Aluno(a):</span> ${studentName}</p>
                            <p><span>Nível / Modalidade de ensino:</span> ${courseModality}</p>

                            <div class="row p-0">

                                <div class="col-4"><span>Série:</span>  ${series}</div>
                                <div class="col-3 text-center"><span>Classe:</span>  ${class_data[0]} - ${class_data[1]}</div>
                                <div class="col-3 text-center"><span>Período do dia:</span>  ${class_data[2]}</div>
                                <div class="col-2 text-center"><span>Sala:</span> ${classroom_number}</div>

                            </div>

                        </div>

                    </div>

                    <div class="row main">
                        ${myTable}
                    </div>

                    <div class="row">

                        <small class="mt-2 p-0">Emitido em ${now.getDate()}/${mes} ás ${now.getHours()}:${now.getMinutes()}</small>
                    
                    </div>

                </div> 
            
            </body> 

        </html>`)

    win.document.close()

})