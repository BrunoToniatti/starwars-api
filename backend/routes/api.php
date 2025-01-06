<?php
class StarWarsAPI {
    private $id;
    private $menu;
    private $conn;

    public function __construct($id, $menu, $conn) {
        $this->id = $id;
        $this->menu = $menu;
        $this->conn = $conn;
    }

    public function fetchData() {
        $api_url = 'https://www.swapi.tech/api/' . $this->menu . '/' . $this->id;

        $detalhe_requisicao = "URL: " . $api_url . " Menu: " . $this->menu . " ID: " . $this->id;
        $this->saveLog($detalhe_requisicao);

        $response = file_get_contents($api_url);
        if ($response === FALSE) {
            echo json_encode(['error' => 'Erro ao acessar a API externa']);
            exit;
        }

        $dados = json_decode($response, true);
        if ($dados === null) {
            echo json_encode(['error' => 'Erro ao decodificar o JSON: ' . json_last_error_msg()]);
            exit;
        }

        // Calcular a idade
        if (isset($dados['result']['properties']['release_date'])) {
            $dataLancamento = $dados['result']['properties']['release_date'];
            $dados['result']['properties']['idade'] = $this->calcularIdade($dataLancamento);
        }

        return $dados;
    }

    private function saveLog($detalheRequisicao) {
        $sql = "INSERT INTO logs (detalhe_requisicao, criado) VALUES (?, NOW())";
        $stmt = mysqli_prepare($this->conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $detalheRequisicao);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            error_log('Erro ao preparar a consulta: ' . mysqli_error($this->conn));
        }
    }

    private function calcularIdade($dataNascimento) {
        $dataAtual = new DateTime();
        $dataNascimento = new DateTime($dataNascimento);
        $intervalo = $dataAtual->diff($dataNascimento);

        return $intervalo->y . ' anos, ' . $intervalo->m . ' meses, ' . $intervalo->d . ' dias';
    }
}
?>
