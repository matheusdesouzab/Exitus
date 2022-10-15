
INSERT INTO situacao_periodo_letivo(situacao_periodo_letivo) values ('Ativo'),('Finalizado'),('Agendado');

insert into periodo_disponivel(ano_letivo) values ('2021'),('2022'),('2023'),('2024'),('2025'),('2026'),('2027'),('2028'),('2029'),('2030'),('2031'),('2032'),('2033'),('2034'),('2035'),('2036'),('2037'),('2038'),('2039'),('2040'),('2041'),('2042'),('2043'),('2044'),('2045'),('2046'),('2047'),('2048'),('2049'),('2050');

insert into numero_sala_aula (numero_sala_aula) values (01),(02),(03),(04),(05),(06),(07),(08),(09),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36),(37),(38),(39),(40);

insert into serie(nome,sigla) values ('Primeira','1'),('Segunda','2'),('Terceira','3');

insert into unidade(unidade) values ('1'),('2'),('3');

insert into turno(nome_turno) values ('Matutino'),('Vespertino'),('Noturno');

insert into modalidade_disciplina(modalidade_disciplina) values ('Ensino Técnico'),('Ensino Médio');

insert into cedula_turma (cedula) values ('A'),('B'),('C'),('D'),('E'),('F');

insert into sexo (sexo) values ('Masculino'),('Feminino');

insert into pcd (pcd) values ('Não'),('Sim');

insert into tipo_sanguineo(tipo_sanguineo) values ('Não informado'),('AB+'),('AB-'),('A+'),('A-'),('B+'),('B-'),('O+'),('O-');

insert into situacao_aluno_ano_letivo (situacao_aluno) values ('Matriculado'),('Aprovado'),('Reprovado'),('Mudou de turma');

INSERT INTO situacao_geral_aluno (`situacao_geral`) VALUES ('Matriculado'),('Desistente'),('Concluído');

insert into hierarquia_funcao(hierarquia_funcao) values ('Administrador'),('Co-administrador'),('Docente'),('Aluno');

INSERT INTO telefone (numero_telefone) VALUES (75988787643);

INSERT INTO endereco (cep , bairro , endereco , municipio , uf) VALUES (48601340 , 'Centro' , 'Rua São Jorge n 100' , 'Paulo Afonso' , 'BA');

INSERT INTO situacao_conta (situacao_conta) VALUES ('Ativa'),('Desativada');

INSERT INTO administrador(codigo_acesso , cpf_administrador , data_nascimento_administrador , email_administrador , nacionalidade_administrador , naturalidade_administrador , nome_administrador , foto_perfil_administrador , fk_id_tipo_sanguineo_administrador , fk_id_sexo_administrador , fk_id_pcd_administrador , fk_id_telefone_administrador , fk_id_endereco_administrador , fk_id_administrador_hierarquia_funcao, fk_id_situacao_conta_administrador) VALUES (867532 , 73893245723 , '2001-10-09' , 'usuariopadrao@gmail.com' , 'Brasileiro' , 'Paulo Afonso' , 'Usuário Padrão' , 'foto-vazia.jpg' , 1 , 1 , 1 , 1 , 1 , 1 , 1);

INSERT INTO legenda(legenda, sigla) VALUES ('Aprovado', 'AP'),('Reprovado', 'RP'),('Regime de Progressão Parcial', 'RPP'),('Reprovado por Falta', 'RPF'),('Recuperação Final', 'RF');

INSERT INTO controle_rematricula(situacao) VALUE ('Aberta'),('Fechada');

INSERT INTO controle_unidade(situacao)VALUES("Somente a Primeira"),("Primeira e Segunda"),("Todas");

INSERT INTO situacao_rematricula(situacao)VALUES('Sim'),('Não');

INSERT INTO configuracao(fk_id_controle_unidade , fk_id_controle_rematricula) VALUES (1, 2);

INSERT INTO `modalidade_curso` (`modalidade_curso`, `modalidade_curso_sigla`) VALUES ('Ensino Médio', 'EM'), ('Ensino Profissional, médio integrado', 'ET');









