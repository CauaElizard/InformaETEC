CREATE DATABASE  IF NOT EXISTS `etec_site` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `etec_site`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: etec_site
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `descricao` text,
  `duracao` varchar(50) DEFAULT NULL,
  `modalidade` varchar(50) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `competencias` text,
  `sobre` text,
  `coordenador` varchar(150) DEFAULT NULL,
  `email_coordenador` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Desenvolvimento de Sistemas','Curso voltado para programação, bancos de dados e desenvolvimento web.','3 anos','Presencial','assets/img/ds.png','Lógica de programação, Desenvolvimento Web, Banco de dados, Projetos','Curso técnico focado na criação de sistemas modernos.','Isabel Gaiozo','isabel.gaioso@etec.sp.gov.br'),(2,'Administração','Curso focado em gestão empresarial e finanças.','1 ano e meio','Semi Presencial','assets/img/adm.jpg','Gestão, Liderança, Empreendedorismo','O curso de Administração abrange a gestão de empresas e rotinas administrativas, com aulas teóricas e práticas sobre finanças, empreendedorismo, recursos humanos e atendimento ao cliente. O aluno trabalha com planilhas, documentos, simulações empresariais e projetos de gestão. As disciplinas incluem Administração Geral, Contabilidade, Recursos Humanos, Marketing, Legislação, Empreendedorismo e Comunicação Empresarial. Entre as competências desenvolvidas estão organização de processos, elaboração de relatórios, controle financeiro básico, liderança e atendimento profissional.','João Ribeiro','joao.ribeiro@etec.com'),(3,'Marketing','Curso voltado para estratégias de divulgação, comportamento do consumidor e gestão de marcas.','3 anos','Presencial','assets/img/mkt.png','Comunicação, criatividade, análise de dados e planejamento de campanhas.','No curso de Desenvolvimento de Sistemas, o aluno aprende programação, criação de aplicativos, modelagem de bancos de dados e desenvolvimento web. A maioria das aulas ocorre em laboratório de informática, onde são realizados projetos práticos e sistemas completos. Entre as matérias estão Programação Web (HTML, CSS, JS), Programação Orientada a Objetos, Banco de Dados SQL, Engenharia de Software, Testes e Versionamento. Ao concluir o curso, o estudante domina linguagens de programação, cria interfaces, modela banco de dados, testa sistemas e utiliza ferramentas como Git.','Simone','simone.juliao@etec.sp.gov.br'),(4,'Nutrição','Curso voltado para planejamento alimentar, avaliação nutricional e promoção da saúde.','3 anos','Presencial','assets/img/nutri.png','Interpretação de exames, elaboração de dietas, orientação ao público e higiene alimentar.','No curso de Nutrição, o foco está na segurança alimentar, no controle de qualidade e na organização de serviços de alimentação. O aluno tem contato com laboratórios de alimentos, práticas de técnica dietética, preparo seguro e análise sensorial. As disciplinas incluem Nutrição Básica, Microbiologia de Alimentos, Higiene e Segurança Alimentar, Alimentação Coletiva, Controle de Qualidade e Rotulagem. Ao longo do curso, desenvolvem-se competências como manipulação correta dos alimentos, elaboração de cardápios, interpretação de rótulos e organização de unidades de alimentação.','Ruama','ruama3@hotmail.com'),(5,'Logistíca','Curso voltado para gestão de estoques, transporte de mercadorias e organização da cadeia de suprimentos.','3 anos','Presencial','assets/img/log.png','Controle de estoque, roteirização, organização, operação de sistemas e resolução de problemas.','O curso de Logística prepara o estudante para atuar na movimentação de materiais, armazenagem, controle de estoques e transporte. As aulas envolvem simulações de processos logísticos, uso de softwares de gestão, estudos sobre legislação de transporte e visitas a centros de distribuição. As disciplinas mais comuns incluem Gestão de Estoques, Armazenagem, Cadeia de Suprimentos, Transporte e Distribuição, Processos Operacionais e Sistemas de Informação. O curso desenvolve habilidades como organização de armazéns, conferência de mercadorias, roteirização e operação de sistemas logísticos.','Simone','simone.juliao@etec.sp.gov.br'),(6,'Edificações','Curso voltado para projetos arquitetônicos, técnicas construtivas e acompanhamento de obras.','3 anos','Presencial','assets/img/edif.png','Leitura de plantas, organização, cálculo básico e supervisão de processos.','O curso de Edificações prepara o aluno para atuar na construção civil, desde o planejamento até o acompanhamento de obras. As aulas incluem desenho técnico em prancheta e softwares como AutoCAD, práticas de topografia, visitas técnicas e estudos de materiais de construção. As matérias mais frequentes são Desenho Arquitetônico, Materiais de Construção, Técnicas de Construção, Instalações Elétricas e Hidráulicas, Segurança do Trabalho e Orçamentos. Esse curso desenvolve habilidades como leitura de plantas, elaboração de projetos, cálculo de materiais e aplicação de normas técnicas.','Simone','simone.juliao@etec.sp.gov.br'),(7,'Mecânica','Curso voltado para manutenção de máquinas, sistemas automotivos e análise de componentes mecânicos.','3 anos','Presencial','assets/img/mec.png','Diagnóstico de falhas, uso de ferramentas, montagem e manutenção preventiva.','O curso de Mecânica tem como objetivo formar profissionais capazes de compreender, operar e manter máquinas e sistemas mecânicos. As aulas práticas ocorrem em oficinas e laboratórios, com uso de ferramentas, medições e práticas de montagem e desmontagem. As principais matérias são Desenho Mecânico, Metrologia, Máquinas e Ferramentas, Sistemas Automotivos, Pneumática, Hidráulica e Eletricidade Aplicada. Entre as competências desenvolvidas estão interpretação de diagramas, diagnóstico de falhas, manutenção preventiva e operação de instrumentos de medição.','Isabel Gaiozo','isabel.gaioso@etec.sp.gov.br'),(8,'Informatica','Curso voltado para manutenção de computadores, redes, sistemas operacionais e suporte técnico.','1 ano e meio','Presencial','assets/img/info.png','Capacidade de montar e configurar computadores, instalar e manter sistemas operacionais, configurar redes locais, diagnosticar falhas, utilizar ferramentas de suporte e oferecer atendimento técnico eficiente ao usuário.','O curso técnico de Informática prepara o estudante para trabalhar com manutenção de equipamentos, configuração de redes e suporte a usuários. As aulas acontecem em laboratórios, onde o aluno aprende a montar máquinas, substituir peças, instalar sistemas, configurar redes e usar softwares essenciais. O curso também aborda segurança digital, backups, virtualização e aplicativos de escritório. Entre as disciplinas mais comuns estão Hardware e Manutenção, Redes de Computadores, Sistemas Operacionais, Segurança da Informação e Suporte Técnico. Durante a formação, o aluno desenvolve habilidades práticas de diagnóstico, organização, resolução de problemas, além de aprender a atender usuários e documentar processos com clareza','Fabiano','fabiano.damasceno@etec.sp.gov.br'),(9,'Gastronomia','Curso voltado para técnicas culinárias, preparo de alimentos, organização de cozinhas e criação de cardápios.','1 ano e meio','Presencial','assets/img/gast.png','Domínio de técnicas de corte e cocção, manipulação segura dos alimentos, organização de cozinhas profissionais, criatividade na montagem dos pratos, trabalho em equipe e noções de gestão de produção e custos.','O curso técnico de Gastronomia forma profissionais capazes de atuar em cozinhas profissionais, restaurantes e serviços de alimentação. As aulas mesclam fundamentos teóricos sobre alimentos, cultura gastronômica e higiene com práticas intensas em laboratórios equipados. O aluno aprende técnicas de cocção, cortes, panificação, confeitaria, harmonização e montagem de pratos. Também estuda boas práticas de manipulação, nutrição aplicada e organização de uma cozinha profissional. Entre as matérias mais comuns estão Técnica Culinária, Cozinha Quente e Fria, Confeitaria, Higiene Alimentar, Nutrição Básica e Gestão de Cozinha. Ao final, o estudante desenvolve precisão, criatividade, segurança na manipulação de alimentos e capacidade de trabalhar em ambientes de alta demanda.','Joana','joana@etec.com'),(10,'Ciências da Natureza','Curso voltado para o estudo integrado de Biologia, Química e Física, com foco em análise científica e experimentação.','3 anos','Presencial','assets/img/cnt.png','Aplicação do método científico, realização segura de experimentos, análise de dados, interpretação de fenômenos físicos, químicos e biológicos, raciocínio lógico, resolução de problemas e comunicação científica.','O Ensino Médio com Itinerário Formativo de Ciências da Natureza e suas Tecnologias oferece uma formação completa voltada ao entendimento dos fenômenos naturais por meio da integração entre Química, Física e Biologia. O estudante participa de aulas práticas frequentes em laboratório, realizando experimentos, medições, análises e relatórios. Entre as disciplinas estão Química Geral e Orgânica, Física Aplicada, Biologia Celular, Ecologia, Microbiologia, Termodinâmica, Reações Químicas e Métodos de Pesquisa. O curso desenvolve no aluno a capacidade de investigar problemas, interpretar gráficos e tabelas, aplicar conceitos científicos e compreender como a ciência se relaciona com tecnologia, meio ambiente e saúde. É uma formação que fortalece pensamento crítico e habilidades experimentais.','Ruama','ruama3@hotmail.com');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `professores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `biografia` text,
  `materia` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (1,'Prof. Fabiano','Professor experiente em tecnologia e inovação.','Desenvolvimento de Sistemas','fabiano.damasceno@etec.sp.gov.br','assets/img/professor-fabiano.jpg'),(2,'Prof. Ana Clara','Especialista em gestão e marketing.','Administração','ana.clara@etec.com','assets/img/professor-anaclara.jpg'),(3,'Prof. Benedito','Professor de redes e segurança','Redes e Teste de Software','benedito.santos21@etec.sp.gov.br','assets/img/professor-benedito.jpg'),(4,'Prof. Marize','Professora especialista de aplicações moblie e C#','C#','marize.simoes@etec.sp.gov.br','assets/img/professor-marize.jpg'),(5,'Prof. Audrey','Especialista de marketing de pessoas','mkt','audrey.oliveira1@terra.com.br','assets/img/professor-audrey.jpg'),(6,'Prof. Leonardo','Professor de edificações','edif','leonardo@etec.sp.gov.br','assets/img/professor-leo.jpg'),(7,'Prof. Ana Josefina','Professora ...','...','ana.lombardi@etec.sp.gov.br','assets/img/professor-anajosefina.jpg'),(8,'Prof. Jessé','Professor de introdução a programação e mobile','Portugol','jesse.carvalho1@etec.sp.gov.br','assets/img/professor-jesse.jpg'),(9,'Prof. José Carlos','Professor de Matemática e Fisíca','Matemática e Fisíca','jose.santos2@etec.sp.gov.br','assets/img/professor-josecarlos.jpg'),(10,'Prof. Rosangela ','Professora de Português ','Português ','rosangela.silva96@etec.sp.gov.br','assets/img/professor-rosangela.jpg'),(11,'Prof. Edison','Professor de Matemática','Matemática','edison.jr@etec.sp.gov.br','assets/img/professor-edison.jpg'),(12,'Prof. Eduardo','Professor de Quimíca','Quimíca','eduardo.nunes22@etec.sp.gov.br','assets/img/professor-eduardo.jpg'),(13,'Prof. Luiz Eduardo','Professor de Geografia','Geografia','luiz.monteiro27@etec.sp.gov.br','assets/img/professor-luizeduado.jpg'),(14,'Prof. Pardal','Professor de Biologia','Biologia','pardal@etec.sp.gov.br','assets/img/professor-pardal.jpg'),(15,'Prof. Isabel','Professora e Coordenadora','Coordenadora','isabel.gaioso@etec.sp.gov.br','assets/img/professor-isabel.jpg'),(16,'Prof. Paulo','Professor de Biologia','Biologia','paulo.carmieletto@etec.sp.gov.br','assets/img/professor-paulo.jpg'),(17,'Prof. Dauri','Professor de História e Sociologia','História e Sociologia','dauri.pimentel@etec.sp.gov.br','assets/img/professor-dauri.jpg'),(18,'Prof. Rosenil','Professor','Marketing Institucional','rosenil.melo2@etec.sp.gov.br','assets/img/professor-rosenil.jpg'),(19,'Prof. Geraldo','Professor de Etíca e Sociologia','Etíca e Sociologia','geraldo.souza4@etec.sp.gov.br','assets/img/professor-geraldo.jpg'),(20,'Prof. Benedita','Professora de Português','Português','benedita.reis@etec.sp.gov.br','assets/img/professor-benedita.jpg'),(21,'Prof. Andreia','Professora de Português','Português','andreia.toledo@etec.sp.gov.br','assets/img/professor-andreia.jpg'),(22,'Prof. Gabriela','Professora de Inglês','Inglês','gabriela.dalessio@etec.sp.gov.br','assets/img/professor-gabidalessio.jpg'),(23,'Prof. Lucilene','Professora de Matemática','Matemática','lucilene.silva@etec.sp.gov.brlucilene.silva@etec.sp.gov.br','assets/img/professor-lucilene.jpg'),(24,'Prof. Sandra','Professora de Inglês','Inglês','sandra.nogueira2@etec.sp.gov.br','assets/img/professor-sandra.jpg'),(25,'Prof. Pollyana','Professora de Matemática e Fisíca','Matemática e Fisíca','pollyana.barros@etec.sp.gov.br','assets/img/professor-pollyana.jpg'),(26,'Prof. Robson','Professor de marktiifng','mkt','robson.cardoso14@etec.sp.gov.br','assets/img/professor-robson.jpg'),(27,'Prof. Simone','Professora e Coordenadora','Coordenadora','simone.juliao@etec.sp.gov.br','assets/img/professor-simone.jpg'),(28,'Prof. Ruama','Professora e Coordenadora','Coordenadora','ruama3@hotmail.com','assets/img/professor-ruama.jpg'),(29,'Prof. João Bosco','Professor de ...','...','joao.melo57@etec.sp.gov.br','assets/img/professor-bosco.jpg');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-27 23:21:04
