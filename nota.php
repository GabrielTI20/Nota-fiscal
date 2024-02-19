<?php
class NotaFiscal {
    private $nomeEmpresa;
    private $localEmpresa;
    private $dataHora;
    private $tipoPagamento;

    public function __construct($nomeEmpresa, $localEmpresa, $tipoPagamento) {
        $this->nomeEmpresa = $nomeEmpresa;
        $this->localEmpresa = $localEmpresa;
        date_default_timezone_set('America/Sao_Paulo'); // Definindo o fuso horário para o Brasil
        $this->dataHora = date('Y-m-d H:i:s'); // Data e hora atuais no fuso horário do Brasil
        $this->tipoPagamento = $tipoPagamento;
    }

    public function gerarNotaFiscalHTML() {
        $html = "<!DOCTYPE html>
                    <html lang='pt-br'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Nota Fiscal</title>
                        <style>
                            body {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                                margin: 0;
                                background-color: #f0f0f0;
                            }
                            .nota-fiscal {
                                border: 1px solid #000;
                                padding: 20px;
                                width: 300px;
                                background-color: bisque;
                                text-align: center;
                            }
                            .nota-fiscal p {
                                margin: 5px 0;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='nota-fiscal'>
                            <p>----- Nota Fiscal -----</p>
                            <br>
                            <p>{$this->nomeEmpresa}</p>
                            <p>Local: {$this->localEmpresa}</p>
                            <p>Data e Hora: {$this->dataHora}</p>
                            <p>-------------------------------------</p>    
                            <p>Tipo de Pagamento: {$this->tipoPagamento}</p>
                        </div>
                    </body>
                    </html>";

        return $html;
    }
}

// Exemplo de uso
$nomeEmpresa = "<H1>Bem Barato</H1>";
$localEmpresa = "Cidade Exemplo, Estado Exemplo";
$tipoPagamento = "Cartão de Crédito"; // Pode ser alterado para "Cartão de Débito", "Dinheiro" ou "Pix"

$nota = new NotaFiscal($nomeEmpresa, $localEmpresa, $tipoPagamento);
echo $nota->gerarNotaFiscalHTML();
?>
