select * from professor;
select * from turma;
select * from diario;
select * from periodoRegime;
select * from aula;
select * from aluno;
select * from chamada;
select * from avaliacao;

SELECT diTu.id, escola, disciplina, modalidade, serie, turma
FROM PeriodoRegime INNER JOIN
(SELECT Diario.id, escola, disciplina, modalidade, serie, nome AS turma
		FROM Diario INNER JOIN Turma
		ON Turma_id = Turma.id WHERE Diario.id = 2) AS diTu
ON Diario_id = diTu.id
GROUP BY diTu.id;