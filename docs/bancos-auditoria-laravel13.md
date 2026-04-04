# Auditoria de bases bancarias - upgrade Laravel 13 / PHP 8.4

Data de referencia: 2026-04-03

## Inventario de cobertura por banco

| Banco | Boleto | Rem240 | Ret240 | Rem400 | Ret400 | Manual local | Risco inicial | Acao recomendada |
|---|---|---|---|---|---|---|---|---|
| Abc | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Validar se CNAB240 e necessario para roadmap; manter regressao CNAB400. |
| Ailos | Sim | Sim | Sim | Nao | Nao | Sim | Medio | Revalidar layouts 240 e confirmar escopo sem CNAB400. |
| Bancoob | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Banrisul | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Bb | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Bnb | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar obrigatoriedade de 240 e validar regras de DV/ocorrencias 400. |
| Bradesco | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Btg | Sim | Sim | Sim | Nao | Nao | Sim | Medio | Revalidar layouts 240 e confirmar escopo sem CNAB400. |
| Bv | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| C6 | Sim | Nao | Nao | Sim | Sim | Nao | Alto | Coletar manual oficial atual, criar fixtures e revisar campo a campo do CNAB400. |
| Caixa | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Cresol | Sim | Nao | Sim | Sim | Sim | Sim | Medio | Validar assimetria Rem240 x Ret240 e completar cobertura de remessa se necessario. |
| Daycoval | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Delbank | Sim | Nao | Nao | Sim | Sim | Nao | Alto | Coletar manual oficial atual, criar fixtures e revisar campo a campo do CNAB400. |
| Fibra | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Grafeno | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Hsbc | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Inter | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Itau | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Ourinvest | Sim | Nao | Nao | Sim | Sim | Nao | Alto | Coletar manual oficial atual, criar fixtures e revisar campo a campo do CNAB400. |
| Pine | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Rendimento | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Santander | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Sicredi | Sim | Sim | Sim | Sim | Sim | Sim | Baixo | Revisao de rotina e atualizacao de fixtures conforme manuais locais. |
| Sisprime | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |
| Unicred | Sim | Nao | Nao | Sim | Sim | Sim | Medio | Revisar necessidade de 240 e atualizar fixtures de retorno/remessa 400. |

## Itens obrigatorios para fechamento da auditoria

1. Consolidar manuais oficiais mais recentes para C6, Delbank e Ourinvest.
2. Atualizar fixtures `tests/Remessa/files` e `tests/Retorno/files` para bancos com risco alto/medio.
3. Reprocessar testes de regressao por banco apos atualizacao de layout (DV, campos, ocorrencias, Pix).
4. Registrar changelog bancario por banco com data do manual utilizado.
