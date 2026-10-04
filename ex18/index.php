<?php
function ordenarPorHorario($consultas) {
    usort($consultas, function($a, $b) {
        return strcmp($a['horario'], $b['horario']);
    });
    return $consultas;
}
function contarPacientesUnicos($consultas) {
    $pacientes = [];
    for ($i = 0; $i < count($consultas); $i++) {
        $nome = $consultas[$i]['paciente'];
        if (!in_array($nome, $pacientes)) {
            $pacientes[] = $nome;
        }
    }
    return count($pacientes);
}
function contarPorEspecialidade($consultas) {
    $especialidades = [];
    for ($i = 0; $i < count($consultas); $i++) {
        $esp = $consultas[$i]['especialidade'];
        if (!isset($especialidades[$esp])) {
            $especialidades[$esp] = 1;
        } else {
            $especialidades[$esp]++;
        }
    }
    return $especialidades;
}
function obterPrimeiroEUltimo($consultasOrdenadas) {
    $total = count($consultasOrdenadas);
    if ($total == 0) {
        return ['primeiro' => null, 'ultimo' => null];
    }
    return [
        'primeiro' => $consultasOrdenadas[0],
        'ultimo'   => $consultasOrdenadas[$total - 1]
    ];
}
function pesquisarPaciente($consultas, $nomeBuscado) {
    $encontrados = [];
    for ($i = 0; $i < count($consultas); $i++) {
        if (strtolower($consultas[$i]['paciente']) == strtolower($nomeBuscado)) {
            $encontrados[] = $consultas[$i];
        }
    }
    return $encontrados;
}
function verificarHorariosDuplicados($consultas) {
    $horarios = [];
    for ($i = 0; $i < count($consultas); $i++) {
        $chave = $consultas[$i]['data'] . ' ' . $consultas[$i]['horario'];
        if (in_array($chave, $horarios)) {
            return true;
        }
        $horarios[] = $chave;
    }
    return false;
}

function organizarAgenda($consultas, $pacientePesquisado = "") {
    $consultasOrdenadas = ordenarPorHorario($consultas);
    $extremos           = obterPrimeiroEUltimo($consultasOrdenadas);

    return [
        'total_consultas'      => count($consultas),
        'pacientes_diferentes' => contarPacientesUnicos($consultas),
        'por_especialidade'    => contarPorEspecialidade($consultas),
        'primeiro_atendimento' => $extremos['primeiro'],
        'ultimo_atendimento'   => $extremos['ultimo'],
        'lista_ordenada'       => $consultasOrdenadas,
        'pesquisa_paciente'    => pesquisarPaciente($consultas, $pacientePesquisado),
        'horarios_duplicados'  => verificarHorariosDuplicados($consultas) ? "Sim" : "Não"
    ];
}
$agenda = [
    ['paciente' => 'Carlos',  'especialidade' => 'Cardiologia', 'data' => '2026-10-05', 'horario' => '10:00'],
    ['paciente' => 'Ana',     'especialidade' => 'Pediatria',   'data' => '2026-10-05', 'horario' => '08:00'],
    ['paciente' => 'Carlos',  'especialidade' => 'Ortopedia',   'data' => '2026-10-05', 'horario' => '14:00'],
    ['paciente' => 'Mariana', 'especialidade' => 'Cardiologia', 'data' => '2026-10-05', 'horario' => '11:30']
];

$relatorio = organizarAgenda($agenda, "Carlos");

echo "Total de consultas: " . $relatorio['total_consultas'] . "<br>";
echo "Pacientes diferentes: " . $relatorio['pacientes_diferentes'] . "<br>";
echo "Primeiro atendimento: " . $relatorio['primeiro_atendimento']['paciente'] . " às " . $relatorio['primeiro_atendimento']['horario'] . "<br>";
echo "Último atendimento: " . $relatorio['ultimo_atendimento']['paciente'] . " às " . $relatorio['ultimo_atendimento']['horario'] . "<br>";
echo "Horários duplicados: " . $relatorio['horarios_duplicados'] . "<br><br>";

echo "Consultas do paciente Carlos encontradas: " . count($relatorio['pesquisa_paciente']) . "<br>";

?>