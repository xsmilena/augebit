<?php
include '../../conexao.php'; // ajusta o caminho conforme sua estrutura
$usuario = "Giovanna";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augebit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="comeco">
    <img class="logo" src="./img/augebit.png" alt="">
    <div class="texto">
      <h1 class="saudacao1">Olá, <?php echo $usuario; ?>!</h1>
      <h1 class="saudacao2">Adicione, atualize ou remova dados bancários dos funcionários</h1>
    </div>
        </div>
<div class="tudo">
    <div class="tudo1">
      <div class="sidebar">
        <a href="" class="menu-item"><span class="icon home"></span></a>
        <div class="icon-circle"><img src="img/people.png" alt="Home icon"></div>
        <a href="" class="menu-item"><span class="icon docs"></span></a>
        <a href="" class="menu-item"><span class="icon chapeu"></span></a>
        <a href="" class="menu-item"><span class="icon grafico"></span></a>
        <a href="" class="menu-item"><span class="icon calendario"></span></a>
      </div>
      <div class="perfil">
        <a class="person" href=""></a>
      </div>
    </div>
        <div class="informacoes">
                <input type="text" class="section-title-input" value="Cursos concluídos e seus resultados:" placeholder="Digite o título da seção...">
                
                <input type="text" class="course-title-input" value="Design de Equipamentos Industriais" placeholder="Digite o nome do curso...">
                
                <div class="completed-section">
                    <div class="progress-circle">
                        <div class="circle-bg">
                            <div class="circle-inner">
                                <input type="number" class="percentage-input" value="90" min="0" max="100">
                                <div class="percentage-label">% de acertos</div>
                            </div>
                        </div>
                    </div>
<div class="section">
                    <div class="results-section">
                        <div class="results-table">
                            <div class="table-header">
                                <input type="text" class="table-header-input" value="Critério" placeholder="Critério">
                                <input type="text" class="table-header-input" value="Resultado" placeholder="Resultado">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Concluído dentro do prazo" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="Sim" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Nota final / Aproveitamento" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="9,5 / aprovado" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Participação em fóruns" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="100% - participou de todas" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Melhora de performance" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="Sim - aumento na eficiência" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Aplicação prática" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="Sim - melhorias na logística" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Feedback do gestor" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="Positivo - mais autônoma e técnica" placeholder="Digite o resultado...">
                            </div>
                            <div class="table-row">
                                <input type="text" class="table-input" value="Relevância do curso" placeholder="Digite o critério...">
                                <input type="text" class="table-input" value="Alta" placeholder="Digite o resultado...">
                            </div>
                        </div>
                    </div>
</div>

     <div class="section">
                    <div class="summary-card">
                        <div class="summary-icon">📋</div>
                        <input type="text" class="summary-title-input" value="Resumo de Avaliação" placeholder="Digite o título...">
                        <textarea class="summary-textarea" placeholder="Digite o resumo da avaliação...">Giovanna, você concluiu o curso dentro do prazo, com excelente aproveitamento e participação ativa em todas as atividades. Aplicou rapidamente os conhecimentos no trabalho, desenvolvendo melhorias em equipamentos e aumentando a eficiência. Seu gestor destacou sua evolução técnica e maior iniciativa. Este curso foi extremamente relevante para suas atividades.</textarea>
                    </div>
                </div>
</div>

            <div class="section">
                <input type="text" class="section-title-input" value="Cursos atuais:" placeholder="Digite o título da seção...">
                <div class="current-courses">
                    <div class="course-card">
                        <div class="course-progress">
                            <input type="number" class="progress-input" value="60" min="0" max="100">%
                        </div>
                        <div class="course-info">
                            <input type="text" class="course-name-input" value="Curso" placeholder="Nome do curso...">
                            <input type="text" class="course-desc-input" value="Modelagem Paramétrica - 60% completo" placeholder="Descrição do curso...">
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-progress">
                            <input type="number" class="progress-input" value="50" min="0" max="100">%
                        </div>
                        <div class="course-info">
                            <input type="text" class="course-name-input" value="Curso" placeholder="Nome do curso...">
                            <input type="text" class="course-desc-input" value="Prototipagem e Impressão 3D - 50% completo" placeholder="Descrição do curso...">
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-progress">
                            <input type="number" class="progress-input" value="30" min="0" max="100">%
                        </div>
                        <div class="course-info">
                            <input type="text" class="course-name-input" value="Curso" placeholder="Nome do curso...">
                            <input type="text" class="course-desc-input" value="Desenho Técnico Mecânico - 30% completo" placeholder="Descrição do curso...">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <input type="text" class="section-title-input" value="Cursos pendentes:" placeholder="Digite o título da seção...">
                <div class="pending-courses">
                    <div class="pending-card">
                        <div class="pending-content">
                            <input type="text" class="pending-title-input" value="Design Centrado no Usuário (UX para produtos industriais)" placeholder="Nome do curso...">
                            <textarea class="pending-desc-textarea" placeholder="Descrição do curso...">Curso que ensina a aplicar UX no desenvolvimento de produtos industriais mais intuitivos e eficientes.</textarea>
                        </div>
                        <div class="pending-illustration">💻</div>
                    </div>
                    
                    <div class="pending-card">
                        <div class="pending-content">
                            <input type="text" class="pending-title-input" value="Ergonomia no Design de Produtos" placeholder="Nome do curso...">
                            <textarea class="pending-desc-textarea" placeholder="Descrição do curso...">Curso que aborda como tornar produtos mais confortáveis e seguros para o uso humano.</textarea>
                        </div>
                        <div class="pending-illustration">📱</div>
                    </div>
                    
                    <div class="pending-card">
                        <div class="pending-content">
                            <input type="text" class="pending-title-input" value="Desenho Técnico Mecânico" placeholder="Nome do curso...">
                            <textarea class="pending-desc-textarea" placeholder="Descrição do curso...">Curso que ensina a criar e interpretar desenhos técnicos para projetos mecânicos.</textarea>
                        </div>
                        <div class="pending-illustration">👨‍💼</div>
                    </div>
                    
                    <div class="pending-card">
                        <div class="pending-content">
                            <input type="text" class="pending-title-input" value="Materiais Industriais e Sustentáveis" placeholder="Nome do curso...">
                            <textarea class="pending-desc-textarea" placeholder="Descrição do curso...">Curso sobre escolha e aplicação de materiais eficientes e ecológicos na indústria.</textarea>
                        </div>
                        <div class="pending-illustration">📊</div>
                    </div>
                </div>
            </div>

            <button class="save-button" onclick="saveData()">💾 Salvar Todas as Alterações</button>
        </div>
</body>
</html>