<div id="painel-left" class="col-sm-2  d-flex justify-content-center">

    <ul class="side-bar">

        <div class="logo">
            <img src="/assets/img/logo-completo.png" alt="">
        </div>

        <li class="link-collapse link-return">
            <a class="bars-xs" href="#">
                <i class="fas fa-chevron-circle-left mr-2"></i> <span>Retorna</span>
            </a>
        </li>



        <li class="link-collapse">
            <a href="/home"><i class="fas fa-globe mr-2"></i> <span>Visão Geral</span>
            </a>
        </li>

        <li class="link-collapse">
            <a href='/admin/gestao'>
                <i class="fab fa-buffer mr-2"></i><span> Gestão</span>
            </a>
        </li>

        <li data-toggle="collapse" href="#alunos" role="button" aria-expanded="false" aria-controls="alunos" class="active link-collapse"><a><i class="fas fa-users mr-2"></i> <span class="mr-5">Alunos</span><i class="fas fa-angle-right ml-5"></i></a></li>

        <div class="collapse" id="alunos">
            <li><a href='/admin/aluno/cadastro'><span>Cadastra aluno</span></a></li>
            <li><a href='/admin/aluno/lista'><span>Lista de alunos</span></a></li>
        </div>

        <li data-toggle="collapse" href="#professores" role="button" aria-expanded="false" aria-controls="professores" class="active link-collapse"><a><i class="fas fa-id-card-alt mr-2"></i> <span class="mr-3">Professores</span> <i class="fas fa-angle-right" style="margin-left: 52px;"></i></a></li>

        <div class="collapse" id="professores">
            <li><a href='/admin/professor/cadastro'><span>Cadastra professor(a)</span></a></li>
            <li><a href='/admin/professor/lista'><span>Lista professor</span></a></li>
        </div>


        <h5 class="mb-3 mt-3">Controle de dados</h5>

        <li class="link-collapse"><a href=""><i class="fas fa-chart-pie mr-2"></i> <span>Analise de dados</span></a></li>

        <li class="link-collapse"><a href=""><i class="fas fa-cog mr-2"></i> <span>Configurações</span> </a></li>

    </ul>

</div>