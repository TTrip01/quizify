-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 26, 2024 alle 20:01
-- Versione del server: 10.4.20-MariaDB
-- Versione PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz-app`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `card-quiz`
--

CREATE TABLE `card-quiz` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `card-quiz`
--

INSERT INTO `card-quiz` (`ID`, `nome`, `img`) VALUES
(1, 'Blockchain', 'https://sardalavoro.it/images/notizie/bitcoin.jpg'),
(2, 'Cyber Security', 'https://wallpapers.com/images/hd/cyber-security-codes-and-padlocks-louj44tbnhinx0e4.jpg'),
(3, 'Sistemi e reti', 'https://sliitinternational.lk/wp-content/uploads/2020/12/SLIIT-International-Curtin-degree-Computer-Systems-Networking-banner.jpg'),
(4, 'Database', 'https://wallpapers.com/images/hd/blue-light-database-center-11bvvcqf9b6ej24u.jpg'),
(5, 'Intelligenza Artificiale', 'https://www.pcprofessionale.it/wp-content/uploads/2016/11/mit-intelligenza-artificiale-crea-video-del-futuro.jpg'),
(6, 'Progettazione Web', 'https://img.freepik.com/free-photo/programming-background-with-person-working-with-codes-computer_23-2150010125.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `ID` int(11) NOT NULL,
  `n-domanda` int(11) NOT NULL,
  `argomento` varchar(30) NOT NULL,
  `testo` varchar(150) NOT NULL,
  `risposta-esatta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `domande`
--

INSERT INTO `domande` (`ID`, `n-domanda`, `argomento`, `testo`, `risposta-esatta`) VALUES
(1, 1, 'Blockchain', 'Le blockchain sono decentralizzate, il che significa che non esiste un\'unica autorità centrale che controlla la rete.', 'V'),
(2, 2, 'Blockchain', 'Le transazioni in una blockchain sono immutabili, il che significa che una volta registrate non possono essere modificate. ', 'V'),
(3, 3, 'Blockchain', 'Le blockchain possono essere utilizzate solo per transazioni finanziarie come Bitcoin e altre criptovalute.', 'F'),
(4, 4, 'Blockchain', 'Ogni blocco in una blockchain contiene un hash del blocco precedente, formando così una catena di blocchi concatenati.', 'V'),
(5, 5, 'Blockchain', 'Le blockchain sono sempre pubbliche e trasparenti, consentendo a chiunque di vedere tutte le transazioni effettuate.', 'V'),
(6, 6, 'Blockchain', 'Le blockchain possono essere facilmente modificate da un singolo utente senza il consenso della maggioranza della rete.', 'F'),
(7, 7, 'Blockchain', 'Le blockchain private sono accessibili solo a un numero limitato di persone o organizzazioni autorizzate. ', 'V'),
(8, 8, 'Blockchain', 'Le blockchain possono garantire la privacy completa delle transazioni, nascondendo completamente i dettagli agli osservatori esterni.', 'F'),
(9, 9, 'Blockchain', 'I token non fungibili (NFT) sono un tipo di asset digitale che può essere scambiato solo tramite blockchain.', 'V'),
(10, 10, 'Blockchain', 'Le blockchain sono vulnerabili agli attacchi informatici, come il 51% attack, che possono compromettere la sicurezza della rete.', 'V'),
(41, 1, 'Database', 'Un database relazionale organizza i dati in tabelle che possono essere correlate tra loro.', 'V'),
(42, 2, 'Database', 'SQL (Structured Query Language) è un linguaggio utilizzato per interagire con i database NoSQL.', 'F'),
(43, 3, 'Database', 'NoSQL sono solitamente più adatti per applicazioni che richiedono alta scalabilità e flessibilità nei dati.', 'V'),
(44, 4, 'Database', 'Un indice in un database relazionale può migliorare significativamente le prestazioni delle query di ricerca.', 'V'),
(45, 5, 'Database', 'La normalizzazione in un database relazionale è il processo di ridurre la ridondanza e migliorare l\'integrità dei dati.', 'V'),
(46, 6, 'Database', 'In un database distribuito, i dati sono memorizzati in un unico server centrale per migliorare la sicurezza e le prestazioni.', 'F'),
(47, 7, 'Database', 'ACID è un acronimo che rappresenta le proprietà di Atomicità, Consistenza, Isolamento e Durabilità nei database transazionali.', 'V'),
(48, 8, 'Database', 'In un database relazionale, le tabelle possono contenere dati non strutturati come file audio e video.', 'V'),
(49, 9, 'Database', 'La denormalizzazione è una tecnica utilizzata per ottimizzare la lettura dei dati, riducendo il numero di join necessari.', 'V'),
(50, 10, 'Database', 'In un database, una chiave primaria può avere valori NULL.', 'F'),
(51, 1, 'Cyber Security', 'Il phishing è un tipo di attacco informatico che utilizza e-mail fraudolente per rubare informazioni sensibili.', 'V'),
(52, 1, 'Sistemi e reti', 'I firewall possono impedire l\'accesso non autorizzato a una rete.', 'V'),
(53, 2, 'Cyber Security', 'Il social engineering è una tecnica di hacking che si basa sulla manipolazione delle persone piuttosto che sull\'uso di strumenti tecnologici.', 'V'),
(54, 2, 'Sistemi e reti', 'Il Wi-Fi pubblico è sicuro quanto la rete domestica se utilizzi una VPN.', 'F'),
(55, 3, 'Sistemi e reti', 'La crittografia è una tecnica che codifica i dati, rendendoli illeggibili senza la chiave corretta per decodificarli.', 'V'),
(56, 3, 'Cyber Security', 'Le vulnerabilità zero-day sono exploit conosciuti che hanno già delle patch disponibili.', 'F'),
(57, 4, 'Cyber Security', 'L\'attacco Man-in-the-Middle (MitM) consente a un attaccante di intercettare e alterare le comunicazioni tra due parti senza che esse se ne accorgano.', ''),
(58, 5, 'Cyber Security', 'Gli attacchi DDoS (Distributed Denial of Service) sono progettati per compromettere la riservatezza dei dati.', ''),
(59, 6, 'Cyber Security', 'Il ransomware è un tipo di malware che crittografa i dati di una vittima e richiede un riscatto per decrittarli.', 'V'),
(60, 7, 'Cyber Security', 'Gli attacchi di forza bruta possono essere mitigati implementando limiti di tentativi di login.', 'V'),
(61, 4, 'Sistemi e reti', 'Le chiavi di crittografia asimmetrica utilizzano la stessa chiave per criptare e decriptare i dati.', 'F'),
(62, 5, 'Sistemi e reti', 'I certificati digitali utilizzano la crittografia simmetrica per garantire l\'identità di un sito web.', 'F'),
(63, 6, 'Sistemi e reti', 'Le firme digitali garantiscono sia l\'integrità che l\'autenticità di un messaggio o documento.', 'V'),
(64, 8, 'Cyber security', 'Il software antivirus elimina automaticamente tutte le minacce senza bisogno di intervento umano.', ''),
(65, 9, 'Cyber Security', 'Una VPN protegge completamente da tutti i tipi di attacchi informatici.', 'F'),
(66, 7, 'Sistemi e reti', 'Tutti i siti web con HTTPS sono sicuri e affidabili.', 'F'),
(67, 8, 'Sistemi e reti', 'Le reti Wi-Fi protette con WPA2 non possono essere compromesse.', 'F'),
(68, 10, 'Cyber Security', 'Un software antimalware può rilevare e prevenire gli attacchi zero-day.', 'F'),
(69, 9, 'Sistemi e reti', 'Il protocollo HTTPS protegge la riservatezza e l\'integrità dei dati trasmessi tra il client e il server.', 'V'),
(70, 10, 'Sistemi e reti', 'Le reti wireless protette con WPA3 sono completamente immuni agli attacchi informatici.', 'F'),
(71, 1, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può imparare autonomamente dai dati forniti.', 'V'),
(72, 2, 'Intelligenza Artificiale', 'Tutti gli algoritmi di intelligenza artificiale sono in grado di apprendimento automatico.', 'F'),
(73, 3, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può superare gli esseri umani in tutti i compiti cognitivi.', 'F'),
(74, 4, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può essere utilizzata per diagnosticare malattie mediche.', 'V'),
(75, 5, 'Intelligenza Artificiale', 'Tutte le forme di intelligenza artificiale richiedono una grande quantità di dati per funzionare correttamente.', 'F'),
(76, 6, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può essere utilizzata per migliorare la sicurezza informatica.', 'V'),
(77, 7, 'Intelligenza Artificiale', 'L\'intelligenza artificiale non può comprendere emozioni umane.', 'V'),
(78, 8, 'Intelligenza Artificiale', 'Tutti i robot sono dotati di intelligenza artificiale.', 'F'),
(79, 9, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può essere utilizzata per analizzare grandi quantità di dati in modo più efficiente rispetto agli esseri umani.', 'V'),
(80, 10, 'Intelligenza Artificiale', 'L\'intelligenza artificiale può essere utilizzata per ottimizzare processi industriali.', 'V'),
(81, 1, 'Progettazione Web', 'I cookies possono essere utilizzati per memorizzare informazioni sul dispositivo dell\'utente per scopi di tracciamento e autenticazione.', 'V'),
(82, 2, 'Progettazione Web', 'Le sessioni sono spesso utilizzate per mantenere lo stato dell\'utente tra le richieste HTTP. ', 'V'),
(83, 3, 'Progettazione Web', 'La validazione dei dati lato client è sufficiente per garantire la sicurezza di un\'applicazione web. ', 'F'),
(84, 4, 'Progettazione Web', 'JavaScript è necessario solo per creare pagine web dinamiche e interattive.', 'F'),
(85, 5, 'Progettazione Web', 'PHP è un linguaggio di programmazione comunemente utilizzato per sviluppare applicazioni web.', 'V'),
(86, 6, 'Progettazione Web', 'TypeScript è una versione fortemente tipizzata di JavaScript che offre un maggior controllo sulla struttura del codice.', 'V'),
(87, 7, 'Progettazione Web', 'Il linguaggio PHP è stato progettato specificamente per lo sviluppo web.', 'F'),
(88, 8, 'Progettazione Web', 'L\'HTML5 introduce nuovi elementi semantici come header, footer, e article, che migliorano la struttura e l\'accessibilità del codice. ', 'V'),
(89, 9, 'Progettazione Web', 'Un file JavaScript può essere incluso in un documento HTML usando il tag \"script\".', 'V'),
(90, 10, 'Progettazione Web', 'Il metodo GET di HTTP è utilizzato per inviare dati al server senza visualizzare i dati nella URL. ', 'F');

-- --------------------------------------------------------

--
-- Struttura della tabella `risposte`
--

CREATE TABLE `risposte` (
  `ID` int(11) NOT NULL,
  `argomento` varchar(50) NOT NULL,
  `n-domanda` int(11) NOT NULL,
  `risposta-data` char(1) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `ID_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `risposte`
--

INSERT INTO `risposte` (`ID`, `argomento`, `n-domanda`, `risposta-data`, `data`, `ID_utente`) VALUES
(136, 'Blockchain', 1, 'V', '2024-06-04', 12),
(137, 'Blockchain', 2, 'F', '2024-06-04', 12),
(138, 'Blockchain', 3, 'F', '2024-06-04', 12),
(139, 'Blockchain', 4, 'V', '2024-06-04', 12),
(140, 'Blockchain', 5, 'V', '2024-06-04', 12),
(141, 'Blockchain', 6, 'F', '2024-06-04', 12),
(142, 'Blockchain', 7, 'V', '2024-06-04', 12),
(143, 'Blockchain', 8, 'F', '2024-06-04', 12),
(144, 'Blockchain', 9, 'F', '2024-06-04', 12),
(145, 'Blockchain', 10, 'F', '2024-06-04', 12),
(146, 'Cyber Security', 1, 'V', '2024-06-04', 12),
(147, 'Database', 1, 'V', '2024-06-04', 13),
(148, 'Database', 2, 'F', '2024-06-04', 13),
(149, 'Database', 3, 'F', '2024-06-04', 13),
(150, 'Database', 4, 'F', '2024-06-04', 13),
(151, 'Database', 5, 'V', '2024-06-04', 13),
(152, 'Database', 8, 'F', '2024-06-04', 13),
(153, 'Database', 10, 'V', '2024-06-04', 13),
(154, 'Blockchain', 1, 'V', '2024-06-05', 12),
(155, 'Blockchain', 2, 'F', '2024-06-05', 12),
(156, 'Blockchain', 3, 'V', '2024-06-05', 12),
(157, 'Blockchain', 4, 'V', '2024-06-05', 12),
(158, 'Blockchain', 5, 'F', '2024-06-05', 12),
(159, 'Blockchain', 6, 'F', '2024-06-05', 12),
(160, 'Blockchain', 7, 'V', '2024-06-05', 12),
(161, 'Blockchain', 8, 'V', '2024-06-05', 12),
(162, 'Blockchain', 9, 'F', '2024-06-05', 12),
(163, 'Blockchain', 10, 'V', '2024-06-05', 12),
(164, 'Intelligenza Artificiale', 1, 'V', '2024-06-05', 12),
(165, 'Progettazione Web', 1, 'F', '2024-06-05', 12),
(166, 'Progettazione Web', 2, 'V', '2024-06-05', 12),
(167, 'Progettazione Web', 3, 'V', '2024-06-05', 12),
(168, 'Progettazione Web', 4, 'V', '2024-06-05', 12),
(169, 'Progettazione Web', 5, 'V', '2024-06-05', 12),
(170, 'Progettazione Web', 6, 'F', '2024-06-05', 12),
(171, 'Progettazione Web', 7, 'F', '2024-06-05', 12),
(172, 'Database', 1, 'V', '2024-06-14', 14),
(173, 'Database', 2, 'F', '2024-06-14', 14),
(174, 'Database', 3, 'V', '2024-06-14', 14),
(175, 'Database', 4, 'V', '2024-06-14', 14),
(176, 'Database', 5, 'V', '2024-06-14', 14),
(177, 'Database', 6, 'F', '2024-06-14', 14),
(178, 'Database', 7, 'V', '2024-06-14', 14),
(179, 'Database', 8, 'F', '2024-06-14', 14),
(180, 'Database', 9, 'V', '2024-06-14', 14),
(181, 'Database', 10, 'V', '2024-06-14', 14),
(182, 'Database', 1, 'V', '2024-06-14', 14),
(183, 'Database', 2, 'F', '2024-06-14', 14),
(184, 'Database', 3, 'V', '2024-06-14', 14),
(185, 'Database', 4, 'V', '2024-06-14', 14),
(186, 'Database', 5, 'V', '2024-06-14', 14),
(187, 'Database', 6, 'F', '2024-06-14', 14),
(188, 'Database', 7, 'V', '2024-06-14', 14),
(189, 'Database', 8, 'F', '2024-06-14', 14),
(190, 'Database', 9, 'F', '2024-06-14', 14),
(191, 'Database', 10, 'V', '2024-06-14', 14),
(192, 'Blockchain', 1, 'V', '2024-06-26', 15),
(193, 'Blockchain', 2, 'V', '2024-06-26', 15),
(194, 'Blockchain', 3, 'F', '2024-06-26', 15),
(195, 'Blockchain', 4, 'V', '2024-06-26', 15),
(196, 'Blockchain', 5, 'V', '2024-06-26', 15),
(197, 'Blockchain', 6, 'F', '2024-06-26', 15),
(198, 'Blockchain', 7, 'F', '2024-06-26', 15),
(199, 'Blockchain', 8, 'V', '2024-06-26', 15),
(200, 'Blockchain', 9, 'V', '2024-06-26', 15),
(201, 'Blockchain', 10, 'F', '2024-06-26', 15),
(202, 'Cyber Security', 1, 'V', '2024-06-26', 15),
(203, 'Cyber Security', 2, 'F', '2024-06-26', 15),
(204, 'Cyber Security', 3, 'V', '2024-06-26', 15),
(205, 'Cyber Security', 4, 'V', '2024-06-26', 15),
(206, 'Progettazione Web', 1, 'V', '2024-06-26', 15),
(207, 'Progettazione Web', 2, 'V', '2024-06-26', 15),
(208, 'Progettazione Web', 3, 'F', '2024-06-26', 15),
(209, 'Progettazione Web', 4, 'V', '2024-06-26', 15),
(210, 'Progettazione Web', 5, 'V', '2024-06-26', 15),
(211, 'Progettazione Web', 6, 'F', '2024-06-26', 15),
(212, 'Progettazione Web', 7, 'V', '2024-06-26', 15),
(213, 'Progettazione Web', 8, 'V', '2024-06-26', 15),
(214, 'Progettazione Web', 9, 'V', '2024-06-26', 15),
(215, 'Progettazione Web', 10, 'F', '2024-06-26', 15),
(216, 'Progettazione Web', 1, 'V', '2024-06-26', 15),
(217, 'Progettazione Web', 2, 'F', '2024-06-26', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID_utente` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cognome` varchar(200) NOT NULL,
  `data_nascita` date NOT NULL,
  `classe` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID_utente`, `email`, `password`, `nome`, `cognome`, `data_nascita`, `classe`) VALUES
(12, 'luca@gmail.com', '$2y$10$OKrF/qpL.diNZUPLwKIq3uETmhi0809TH499T7g/X2VzH7ZjTas4e', 'Luca', 'De Lorenzis', '2006-01-07', 5),
(13, 'marta@gmail.com', '$2y$10$gahj3zY/.AkcuCKPVAOlxuMApfwr2CHDDarD/rWmTDi21q83.4D1W', 'marta', 'bianchi', '2006-06-01', 4),
(14, 'matt@gmail.com', '$2y$10$Fg.20Q5dS8ffVIQ8RPWePujfEv9sgUtPHmKNKzUBqMQ47SrcrDddu', 'mattia', 'verri', '2001-04-15', 0),
(15, 'fab@gmail.com', '$2y$10$a.feoVSP6mnnb/EfEdEjUOYI.khaotLpT7pxTKZMhPNaIznxdMWOW', 'brizio', 'santoro', '2005-03-21', 5),
(16, 'storm@gmail.com', '$2y$10$UdCQ/3NVQUqCdvX.ilm3qubzuQep3oDxO/fNppMACgij8I1OyWh/C', 'matteo', 'stomeo', '2004-05-12', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `card-quiz`
--
ALTER TABLE `card-quiz`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `risposte`
--
ALTER TABLE `risposte`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FOREIGN` (`ID_utente`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_utente`),
  ADD UNIQUE KEY `ESTERNA` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `card-quiz`
--
ALTER TABLE `card-quiz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `domande`
--
ALTER TABLE `domande`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT per la tabella `risposte`
--
ALTER TABLE `risposte`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `risposte`
--
ALTER TABLE `risposte`
  ADD CONSTRAINT `id_utente` FOREIGN KEY (`ID_utente`) REFERENCES `user` (`ID_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
