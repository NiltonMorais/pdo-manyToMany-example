<?php
require_once("conexao.php");


echo "### EXECUTANDO FIXTURES ###\n";

echo "### Removendo Tabela pessoa ###\n";
$conexao->query("DROP TABLE IF EXISTS pessoa;");
echo "Ok\n";

echo "### Removendo Tabela profissao ###\n";
$conexao->query("DROP TABLE IF EXISTS profissao;");
echo "Ok\n";

echo "### Removendo Tabela pessoa_profissao ###\n";
$conexao->query("DROP TABLE IF EXISTS pessoa_profissao;");
echo "Ok\n";



echo "### Criando Tabela pessoa ###\n";
$conexao->query("CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;");
echo "Ok\n";


echo "### Criando Tabela profissao ###\n";
$conexao->query("CREATE TABLE `profissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profissao` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;");
echo "Ok\n";


echo "### Criando Tabela pessoa_profissao ###\n";
$conexao->query("CREATE TABLE `pessoa_profissao` (
  `pessoa_id` int(11) NOT NULL,
  `profissao_id` int(11) NOT NULL,
  KEY `fk_pessoa_profissao_pessoa_idx` (`pessoa_id`),
  KEY `fk_pessoa_profissao_profissao1_idx` (`profissao_id`),
  CONSTRAINT `fk_pessoa_profissao_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_profissao_profissao1` FOREIGN KEY (`profissao_id`) REFERENCES `profissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
echo "Ok\n";


echo "### Inserindo os Dados da Tabela pessoa ###\n";
$conexao->query("INSERT INTO `pessoa`
(`id`,`pessoa`)
VALUES (1, 'João')");
$conexao->query("INSERT INTO `pessoa`
(`id`,`pessoa`)
VALUES (2, 'Maria')");
$conexao->query("INSERT INTO `pessoa`
(`id`,`pessoa`)
VALUES (3, 'José')");
echo "Ok\n";


echo "### Inserindo os Dados da Tabela profissao ###\n";
$conexao->query("INSERT INTO `profissao`
(`id`,`profissao`)
VALUES (1, 'Médico')");
$conexao->query("INSERT INTO `profissao`
(`id`,`profissao`)
VALUES (2, 'Engenheiro')");
$conexao->query("INSERT INTO `profissao`
(`id`,`profissao`)
VALUES (3, 'Advogado')");
echo "Ok\n";

echo "### Inserindo os Dados da Tabela pessoa_profissao ###\n";
$conexao->query("INSERT INTO `pessoa_profissao`
(`pessoa_id`,`profissao_id` )
VALUES (1, 1)");
$conexao->query("INSERT INTO `pessoa_profissao`
(`pessoa_id`,`profissao_id` )
VALUES (1, 2)");
$conexao->query("INSERT INTO `pessoa_profissao`
(`pessoa_id`,`profissao_id` )
VALUES (1, 3)");
$conexao->query("INSERT INTO `pessoa_profissao`
(`pessoa_id`,`profissao_id` )
VALUES (2, 2)");
echo "Ok\n";
echo "## FIM DAS FIXTURES ## \n";

?>
<br><br><br>
<a href="index.php">Voltar para o index</a>
